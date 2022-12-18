<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class VillesController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $villes = Ville::where('city_id',$request->id)->get();

       return response()->json($villes);
    }

    /**
     * Store a new ville in the storage.
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
            
            $ville = Ville::create($data);

            return $this->successResponse(
			    trans('villes.model_was_added'),
			    $this->transform($ville)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('villes.unexpected_error'));
        }
    }

    /**
     * Display the specified ville.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $ville = Ville::with('city')->findOrFail($id);

        return $this->successResponse(
		    trans('villes.model_was_retrieved'),
		    $this->transform($ville)
		);
    }

    /**
     * Update the specified ville in the storage.
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
            
            $ville = Ville::findOrFail($id);
            $ville->update($data);

            return $this->successResponse(
			    trans('villes.model_was_updated'),
			    $this->transform($ville)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('villes.unexpected_error'));
        }
    }

    /**
     * Remove the specified ville from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ville = Ville::findOrFail($id);
            $ville->delete();

            return $this->successResponse(
			    trans('villes.model_was_deleted'),
			    $this->transform($ville)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('villes.unexpected_error'));
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
            'ville' => 'string|min:1|nullable',
            'name_ar' => 'string|min:1|nullable',
            'city_id' => 'nullable', 
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
                'ville' => 'string|min:1|nullable',
            'name_ar' => 'string|min:1|nullable',
            'city_id' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    /**
     * Transform the giving ville to public friendly array
     *
     * @param App\Models\Ville $ville
     *
     * @return array
     */
    protected function transform(Ville $ville)
    {
        return [
            'id' => $ville->id,
            'ville' => $ville->ville,
            'name_ar' => $ville->name_ar,
            'city_id' => optional($ville->city)->name,
        ];
    }


}
