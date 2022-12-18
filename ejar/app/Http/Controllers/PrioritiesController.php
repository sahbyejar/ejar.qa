<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;

class PrioritiesController extends Controller
{

    /**
     * Display a listing of the priorities.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        //
       
        $priorities = Priority::with('user')->paginate(25);
          foreach ($priorities as $item) {
            if(Carbon::parse($item->date_end)>Carbon::parse($item->date_start)){
            $item->day = Carbon::parse($item->date_end)->diffInDays(Carbon::parse($item->date_start));

        }else{
            $item->day = 0;
        }

        }



        return view('priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new priority.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::where('type','campany1')->orwhere('type','campany2')->orwhere('type','campany3')->orwhere('type','campany4')->orwhere('type','campany5')->orwhere('type','campany6')->orwhere('type','campany7')->orwhere('type','campany8')->orwhere('type','campany9')->pluck('name','id')->all();
        
        return view('priorities.create', compact('users'));
    }

    /**
     * Store a new priority in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
         // dd($request);
            $data = $this->getData($request);
           
            Priority::create($data);

            return redirect()->route('priorities.priority.index')
                ->with('success_message', trans('priorities.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified priority.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $priority = Priority::with('user')->findOrFail($id);

        return view('priorities.show', compact('priority'));
    }

    /**
     * Show the form for editing the specified priority.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $priority = Priority::findOrFail($id);
        $users = User::pluck('name','id')->all();

        return view('priorities.edit', compact('priority','users'));
    }

    /**
     * Update the specified priority in the storage.
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
            
            $priority = Priority::findOrFail($id);
            $priority->update($data);

            return redirect()->route('priorities.priority.index')
                ->with('success_message', trans('priorities.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('priorities.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified priority from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $priority = Priority::findOrFail($id);
            $priority->delete();

            return redirect()->route('priorities.priority.index')
                ->with('success_message', trans('priorities.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('priorities.unexpected_error')]);
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
                'type' => 'string|min:1|nullable',
            'date_start' => 'nullable',
            'date_end' => 'nullable',
            'user_id' => 'nullable',
            'numbre' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
