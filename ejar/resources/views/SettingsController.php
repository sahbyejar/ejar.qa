<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Exception;

class SettingsController extends Controller
{

    /**
     * Display a listing of the settings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $settingsObjects = Settings::paginate(25);

        return view('settings.index', compact('settingsObjects'));
    }

    /**
     * Show the form for creating a new settings.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('settings.create');
    }

    /**
     * Store a new settings in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
    
            $data = $this->getData($request);
            
            Settings::create($data);

            return redirect()->route('settings.settings.index')
                ->with('success_message', trans('settings.model_was_added'));
        } catch (Exception $exception) {
     
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }
    }

    /**
     * Display the specified settings.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $settings = Settings::findOrFail($id);

        return view('settings.show', compact('settings'));
    }

    /**
     * Show the form for editing the specified settings.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $settings = Settings::findOrFail($id);
        

        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified settings in the storage.
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
            
            $settings = Settings::findOrFail($id);
            $settings->update($data);

            return redirect()->route('settings.settings.index')
                ->with('success_message', trans('settings.model_was_updated'));
        } catch (Exception $exception) {

          
     dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified settings from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $settings = Settings::findOrFail($id);
            $settings->delete();

            return redirect()->route('settings.settings.index')
                ->with('success_message', trans('settings.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('settings.unexpected_error')]);
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
                'Link_instagram' => 'string|min:1|nullable',
            'Link_contact' => 'string|min:1|nullable',
            'Link_android' => 'string|min:1|nullable',
            'Link_ios' => 'string|min:1|nullable',
            'Link_facebook' => 'string|min:1|nullable',
            
            'Terms_Condition_ar' => 'string|min:1|nullable',
            'Terms_Condition_eg' => 'string|min:1|nullable', 
            'produit_user'  => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
