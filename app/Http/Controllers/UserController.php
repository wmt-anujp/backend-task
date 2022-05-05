<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artist;

class UserController extends Controller
{
    // mutators demo
    public function index()
    {
        // $artist = new artist;
        // $artist->name = "Anuj";
        // $artist->email = "ahp.pzz2000";
        // $artist->password = "1234";
        // $artist->username = "blackshit";
        // $artist->save();
    }
    function viewload()
    {
        $data = ["ap", "pp", "cs", "ac"];
        return view("about", ["users" => $data]);
    }

    // public function getAddressRelation()
    // {
    //     return $this->hasOne(related:'App\');
    // }
}
