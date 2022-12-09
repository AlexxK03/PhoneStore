<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;



class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $stores = Store::all();
        // $stores = Store::paginate(3);

        return view('admin.stores.index')->with('stores', $stores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $stores = Store::all();
        return view('admin.stores.create')->with('stores', $stores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'name' => 'required',
            'address' => 'required',

        ]);

        Store::create([
            'name' => $request->name,
            'address' => $request->address

        ]);

        return to_route('admin.stores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.stores.show')->with('store', $store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {



        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.stores.edit')->with('store', $store);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $store->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return to_route('admin.stores.show', $store)->with('success', 'Store Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $store->delete(); // deletes phone from database

        return to_route('admin.stores.index');
    }
}
