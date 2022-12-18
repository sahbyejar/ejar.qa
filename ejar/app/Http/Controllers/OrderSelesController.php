<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order_sele;
use Illuminate\Http\Request;
use Exception;
use App\Models\Produit;
use App\Models\User;
use Auth;

class OrderSelesController extends Controller
{

    /**
     * Display a listing of the order seles.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
         if(Auth::user()->type == 'admin' ){
        $orderSeles = Order_sele::paginate(25);
    }elseif(Auth::user()->type == 'seller' ){
      $orderSeles = Order_sele::where('user_id', Auth::user()->id)->paginate(25);   
    }

        return view('order_seles.index', compact('orderSeles'));
    }

    /**
     * Show the form for creating a new order sele.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::where('type','user')->get();
        $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('rent_sale','off')->where('user_id',Auth::user()->id)->get();
        
        return view('order_seles.create',compact('produits','users'));
    }

    /**
     * Store a new order sele in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Order_sele::create($data);

            return redirect()->route('order_seles.order_sele.index')
                ->with('success_message', trans('order_seles.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_seles.unexpected_error')]);
        }
    }

    /**
     * Display the specified order sele.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orderSele = Order_sele::findOrFail($id);

        return view('order_seles.show', compact('orderSele'));
    }

    /**
     * Show the form for editing the specified order sele.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orderSele = Order_sele::findOrFail($id);
        $users = User::where('type','user')->get();
        $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('rent_sale','off')->where('user_id',Auth::user()->id)->get();

        return view('order_seles.edit', compact('orderSele','produits','users'));
    }

    /**
     * Update the specified order sele in the storage.
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
            
            $orderSele = Order_sele::findOrFail($id);
            $orderSele->update($data);

            return redirect()->route('order_seles.order_sele.index')
                ->with('success_message', trans('order_seles.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_seles.unexpected_error')]);
        }        
    }

    /**
     * Remove the specified order sele from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orderSele = Order_sele::findOrFail($id);
            $orderSele->delete();

            return redirect()->route('order_seles.order_sele.index')
                ->with('success_message', trans('order_seles.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_seles.unexpected_error')]);
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
                'Produit' => 'string|min:1|nullable',
            'User' => 'string|min:1|nullable',
            'price' => 'string|min:1|nullable',
            'datestart' => 'string|min:1|nullable',
           
            'cautionnement' => 'string|min:1|nullable',
            'total' => 'numeric|nullable', 
        ];
        
        $data = $request->validate($rules);

   $produit =Produit::find($data['Produit']);
        $data['Produit'] = $produit->name .'/'. $produit->name_ar;
         $data['user_id'] = Auth::user()->id;
        return $data;
    }

}
