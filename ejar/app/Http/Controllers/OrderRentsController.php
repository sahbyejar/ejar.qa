<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order_rent;
use Illuminate\Http\Request;
use Exception;
use App\Models\Produit;
use App\Models\User;
use Auth;

class OrderRentsController extends Controller
{

    /**
     * Display a listing of the order rents.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
       
if(Auth::user()->type == 'admin' ){
       $orderRents = Order_rent::paginate(25);
    }elseif(Auth::user()->type == 'seller' ){
      $orderRents = Order_rent::where('user_id', Auth::user()->id)->paginate(25);   
    }

        return view('order_rents.index', compact('orderRents'));
    }

    /**
     * Show the form for creating a new order rent.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::where('type','user')->get();
        $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('rent_sale','on')->where('user_id',Auth::user()->id)->get();
        return view('order_rents.create',compact('produits','users'));
    }

    /**
     * Store a new order rent in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            Order_rent::create($data);

            return redirect()->route('order_rents.order_rent.index')
                ->with('success_message', trans('order_rents.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_rents.unexpected_error')]);
        }
    }

    /**
     * Display the specified order rent.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orderRent = Order_rent::findOrFail($id);

        return view('order_rents.show', compact('orderRent'));
    }

    /**
     * Show the form for editing the specified order rent.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orderRent = Order_rent::findOrFail($id);
$users = User::where('type','user')->get();
        $produits = Produit::where('DELETED','off')->where('accepted','Yes')->where('rent_sale','on')->where('user_id',Auth::user()->id)->get();

        return view('order_rents.edit', compact('orderRent','produits','users'));
    }

    /**
     * Update the specified order rent in the storage.
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

            $orderRent = Order_rent::findOrFail($id);
            $orderRent->update($data);

            return redirect()->route('order_rents.order_rent.index')
                ->with('success_message', trans('order_rents.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_rents.unexpected_error')]);
        }
    }

    /**
     * Remove the specified order rent from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orderRent = Order_rent::findOrFail($id);
            $orderRent->delete();

            return redirect()->route('order_rents.order_rent.index')
                ->with('success_message', trans('order_rents.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('order_rents.unexpected_error')]);
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
            'dateend' => 'string|min:1|nullable',
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
