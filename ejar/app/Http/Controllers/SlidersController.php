<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Auth;
class SlidersController extends Controller
{

    /**
     * Display a listing of the sliders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        if(Auth::user()->type == 'superadmin' ){
       $sliders = Slider::paginate(25);
    }elseif (Auth::user()->type == 'admin') {
        $sliders = Slider::where('countre_id',Auth::user()->countries->id)->paginate(25);
    }

        

        return view('sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('sliders.create');
    }

    /**
     * Store a new slider in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Slider::create($data);

            return redirect()->route('sliders.slider.index')
                ->with('success_message', trans('sliders.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sliders.unexpected_error')]);
        }
    }

    /**
     * Display the specified slider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);

        return view('sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified slider.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        

        return view('sliders.edit', compact('slider'));
    }

    /**
     * Update the specified slider in the storage.
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
            
            $slider = Slider::findOrFail($id);
            $slider->update($data);

            return redirect()->route('sliders.slider.index')
                ->with('success_message', trans('sliders.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sliders.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified slider from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $slider = Slider::findOrFail($id);
            $slider->delete();

            return redirect()->route('sliders.slider.index')
                ->with('success_message', trans('sliders.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('sliders.unexpected_error')]);
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
                'link' => 'string|min:1|nullable',
            'photo' => ['file','nullable'],
            'Date_start' => 'nullable',
            'Date_end' => 'nullable', 
        ];
        
        $data = $request->validate($rules);
        if ($request->has('custom_delete_photo')) {
            $data['photo'] = null;
        }
        if ($request->hasFile('photo')) {
             $path = Storage::disk('images')->put('slider', $request->file('photo'));
    // Save thumb
            
    $img = InterventionImage::make($request->file('photo'))->widen(100);
    Storage::disk('thumbs')->put($path, $img->encode());
            $data['photo'] = $path;

        }
        $data['countre_id']=Auth::user()->countries->id;
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
        

        $path = config('laravel-code-generator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
