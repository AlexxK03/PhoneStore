<?php

namespace App\Http\Controllers;
use App\Models\Phone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StorePhoneRequest;

use Illuminate\Http\Request;

class PhoneController extends Controller
{

    public function index()
    {
        // Fetch in order of when they were last updated - latest updated returned first
        $phones = Phone::where('user_id', Auth::id())->latest('updated_at')->paginate(5);

        // Gets phones, Authorizes what user is logged in and gets their phones. Displays them in latest updated order and shows
        // five before moving onto the next paGE

        return view('phones.index')->with('phones', $phones);

    }

    public function create()
    {
     return view ('phones.create'); // Shows phones.create page
    }

    public function store(Request $request)
    {
        $request->validate([             //Declares what fields need to be filled and if they are the required or not
            'name' => 'required|max:120',
            'brand' => 'required',
            'specs' => 'required',
            'phone_image' => 'file|image',
        ]);

        $phone_image = $request->file('phone_image'); //declare phone image variable and what file to look in

        $extention = $phone_image->getClientOriginalExtension(); // returns file extension name (jpg, png etc.) from file name

        $filename = date('d-m-Y') . '_' . $request->input('name'). '.' . $extention; //declares file name variable and format of file name to be displyed for images

        $path = $phone_image->storeAs('public/images', $filename); // declares path and where to store images



        Phone::create([  //attributes of what information stored for each phone in the database
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'phone_image' => $filename,
            'name' => $request->name,
            'brand' => $request->brand,
            'specs' => $request->specs

        ]);

        return to_route('phones.index');
    }


    public function show(Phone $phone)
    {
        if($phone->user_id != Auth::id()){  //Veifies that desired phone was created by the logged in user
            return abort(403);
        }

       return view('phones.show')->with('phone', $phone);
    }

    public function edit(Phone $phone) //Veifies that desired phone was created by the logged in user
    {
        if($phone->user_id != Auth::id()){
            return abort(403);
        }

       return view('phones.edit')->with('phone', $phone);
    }

    public function update(Request $request, Phone $phone)
    {

        if($phone->user_id != Auth::id()){ //if phone is not under users id return 403 error screen
            return abort(403);
        }

        $request->validate([
            'phone_image' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'specs' => 'required'
        ]);

        $phone->update([
            'phone_image' => $request->phone_image,
            'name' => $request->name,
            'brand' => $request->brand,
            'specs' => $request->specs
        ]);

        return to_route('phones.show', $phone)->with('success', 'Phone Updated successfully');
    }


    public function destroy(Phone $phone)
    {
        if($phone->user_id != Auth::id()){ // verifies phone
            return abort(403);
        }

        $phone->delete(); // deletes phone from database

        return to_route('phones.index');
    }
}
