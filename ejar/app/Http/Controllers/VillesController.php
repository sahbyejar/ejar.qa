<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Ville;
use Illuminate\Http\Request;
use Exception;

class VillesController extends Controller
{

    /**
     * Display a listing of the villes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $villes = Ville::with('city')->paginate(500);

        return view('villes.index', compact('villes'));
    }

    /**
     * Show the form for creating a new ville.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $cities = City::pluck('name','id')->all();
        
        return view('villes.create', compact('cities'));
    }

    /**
     * Store a new ville in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Ville::create($data);

            return redirect()->route('villes.ville.index')
                ->with('success_message', trans('villes.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('villes.unexpected_error')]);
        }
    }

    /**
     * Display the specified ville.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $ville = Ville::with('city')->findOrFail($id);

        return view('villes.show', compact('ville'));
    }

    /**
     * Show the form for editing the specified ville.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $ville = Ville::findOrFail($id);
        $cities = City::pluck('name','id')->all();

        return view('villes.edit', compact('ville','cities'));
    }

    /**
     * Update the specified ville in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $ville = Ville::findOrFail($id);
            $ville->update($data);

            return redirect()->route('villes.ville.index')
                ->with('success_message', trans('villes.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('villes.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified ville from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $ville = Ville::findOrFail($id);
            $ville->delete();

            return redirect()->route('villes.ville.index')
                ->with('success_message', trans('villes.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('villes.unexpected_error')]);
        }
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

}
