<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Api\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use DB;

class CitiesController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $cities = City::all();

         return response()->json($cities);

    }
public function countries()
    {
         $countries = DB::table('countries')->get();

         return response()->json($countries);

    }



    /**
     * Store a new city in the storage.
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
            
            $city = City::create($data);

            return $this->successResponse(
			    trans('cities.model_was_added'),
			    $this->transform($city)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('cities.unexpected_error'));
        }
    }

    /**
     * Display the specified city.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::findOrFail($id);

        return $this->successResponse(
		    trans('cities.model_was_retrieved'),
		    $this->transform($city)
		);
    }

    /**
     * Update the specified city in the storage.
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
            
            $city = City::findOrFail($id);
            $city->update($data);

            return $this->successResponse(
			    trans('cities.model_was_updated'),
			    $this->transform($city)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('cities.unexpected_error'));
        }
    }

    /**
     * Remove the specified city from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();

            return $this->successResponse(
			    trans('cities.model_was_deleted'),
			    $this->transform($city)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('cities.unexpected_error'));
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
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    /**
     * Transform the giving city to public friendly array
     *
     * @param App\Models\City $city
     *
     * @return array
     */
    protected function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
            'name_ar' => $city->name_ar,
        ];
    }


}
