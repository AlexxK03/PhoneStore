<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BrandController extends Controller
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

        $brands = Brand::paginate(10);

        return view('admin.brands.index')->with('brands', $brands);
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

        $brands = Brand::all();
        return view('admin.brands.create')->with('brands', $brands);
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

        $request->validate([             //Declares what fields need to be filled and if they are the required or not
            'name' => 'required|max:120',
            'address' => 'required',
        ]);

        Brand::create([  //attributes of what information stored for each phone in the database
            'name' => $request->name,
            'address' => $request->specs

        ]);

        return to_route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        // $brands = Brand::all();


        return view('admin.brands.show')->with('brand', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brands = Brand::all();



        $user = Auth::user();
        $user->authorizeRoles('admin');

        return view('admin.brands.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $brand->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return to_route('admin.brands.show', $brand)->with('success', 'Brand Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
