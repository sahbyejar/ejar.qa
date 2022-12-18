<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class SlidersController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        if($request->countre_id != null){
            $sliders = Slider::where('countre_id',$request->countre_id)->get();
        }else{
            $sliders = Slider::where('countre_id',174)->get();
        }
        
        

foreach ($sliders as $key => $value) {
            $value->photo = 'ejar/public/images/'.$value->photo;
        }

        return response()->json($sliders);

    }

    /**
     * Store a new slider in the storage.
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
            
            $slider = Slider::create($data);

            return $this->successResponse(
			    trans('sliders.model_was_added'),
			    $this->transform($slider)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('sliders.unexpected_error'));
        }
    }

    /**
     * Display the specified slider.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);

        return $this->successResponse(
		    trans('sliders.model_was_retrieved'),
		    $this->transform($slider)
		);
    }

    /**
     * Update the specified slider in the storage.
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
            
            $slider = Slider::findOrFail($id);
            $slider->update($data);

            return $this->successResponse(
			    trans('sliders.model_was_updated'),
			    $this->transform($slider)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('sliders.unexpected_error'));
        }
    }

    /**
     * Remove the specified slider from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();

            return $this->successResponse(
			    trans('sliders.model_was_deleted'),
			    $this->transform($slider)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('sliders.unexpected_error'));
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
            'link' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
            'Date_start' => 'date_format:j/n/Y|nullable',
            'Date_end' => 'date_format:j/n/Y|nullable', 
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
                'link' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
            'Date_start' => 'date_format:j/n/Y|nullable',
            'Date_end' => 'date_format:j/n/Y|nullable', 
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
     * Transform the giving slider to public friendly array
     *
     * @param App\Models\Slider $slider
     *
     * @return array
     */
    protected function transform(Slider $slider)
    {
        return [
            'id' => $slider->id,
            'link' => $slider->link,
            'photo' => $slider->photo,
            'Date_start' => $slider->Date_start,
            'Date_end' => $slider->Date_end,
        ];
    }


}
