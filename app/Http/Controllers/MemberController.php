<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artist;

class MemberController extends Controller
{
    //
    function index()
    {
        // mutators demo
        // return artist::all();

        $artist = new artist();
        $artist->name = "Anuj";
        $artist->email = "ahp.pzz2000";
        $artist->password = "123456789";
        $artist->username = "roxor";
        $artist->save();
    }
    public function show()
    {
        return artist::all();
    }
}
