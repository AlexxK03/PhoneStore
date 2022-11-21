<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

        return view('user.phones.index')->with('phones', $phones);

    }



    public function show(Phone $phone)
    {
        if($phone->user_id != Auth::id()){  //Veifies that desired phone was created by the logged in user
            return abort(403);
        }

       return view('user.phones.show')->with('phone', $phone);
    }


}


