<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Api\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = category::all();
        foreach ($categories as $key => $value) {
            $value->photo = 'ejar/public/images/'.$value->photo;
        }

        return response()->json($categories);
    }

    /**
     * Store a new category in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            
            $category = category::create($data);

            return $this->successResponse(
			    trans('categories.model_was_added'),
			    $this->transform($category)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('categories.unexpected_error'));
        }
    }

    /**
     * Display the specified category.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::findOrFail($id);

        return $this->successResponse(
		    trans('categories.model_was_retrieved'),
		    $this->transform($category)
		);
    }

    /**
     * Update the specified category in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);
            
            $category = category::findOrFail($id);
            $category->update($data);

            return $this->successResponse(
			    trans('categories.model_was_updated'),
			    $this->transform($category)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('categories.unexpected_error'));
        }
    }

    /**
     * Remove the specified category from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = category::findOrFail($id);
            $category->delete();

            return $this->successResponse(
			    trans('categories.model_was_deleted'),
			    $this->transform($category)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('categories.unexpected_error'));
        }
    }
    
    /**
     * Gets a new validator instance with the defined rules.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Validator
     */
    protected function getValidator(Request $request)
    {
        $rules = [
            'name' => 'string|min:1|max:255|nullable',
            'name_ar' => 'string|min:1|nullable',
            'photo' => ['file','nullable'], 
        ];

        return Validator::make($request->all(), $rules);
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'string|min:1|max:255|nullable',
            'name_ar' => 'string|min:1|nullable',
            'photo' => ['file','nullable'], 
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
            $data['photo'] = $this->moveFile($request->file('photo'));
        }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('codegenerator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
    /**
     * Transform the giving category to public friendly array
     *
     * @param App\Models\category $category
     *
     * @return array
     */
    protected function transform(category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'name_ar' => $category->name_ar,
            'photo' => $category->photo,
        ];
    }


}
