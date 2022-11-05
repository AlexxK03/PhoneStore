<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StorePhoneRequest;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch in order of when they were last updated - latest updated returned first
        // $phones = Phone::where('id', Auth::id())->paginate(5);
        $phones = Phone::latest('updated_at')->paginate(5);


        //  dd($phones);
        return view('phones.index')->with('phones', $phones);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view ('phones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:120',
            'brand' => 'required',
            'specs' => 'required',
            'phone_image' => 'file|image',
        ]);
        $phone_image = $request->file('phone_image');
        $extention = $phone_image->getClientOriginalExtension();

        $filename = date('d-m-Y') . '_' . $request->input('name'). '.' . $extention;

        $path = $phone_image->storeAs('public/images', $filename);



        Phone::create([
            // Ensure you have the use statement for
            // Illuminate\Support\Str at the top of this file.
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'phone_image' => "phone_placeholder.jpg",
            'name' => $request->name,
            'brand' => $request->brand,
            'specs' => $request->specs

        ]);

        return to_route('phones.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        if($phone->user_id != Auth::id()){
            return abort(403);
        }

       return view('phones.show')->with('phone', $phone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        if($phone->user_id != Auth::id()){
            return abort(403);
        }

       return view('phones.edit')->with('phone', $phone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {

        if($phone->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'phone_image' => "phone_placeholder.jpg",
            'name' => 'required',
            'brand' => 'required',
            'specs' => 'required'
        ]);

        $phone->update([
            'phone_image' => "phone_placeholder.jpg",
            'name' => $request->name,
            'brand' => $request->brand,
            'specs' => $request->specs
        ]);

        return to_route('phones.show', $phone)->with('success', 'Phone Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        if($phone->user_id != Auth::id()){
            return abort(403);
        }

        $phone->delete();

        return to_route('phones.index');
    }
}
