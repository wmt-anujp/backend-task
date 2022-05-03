<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        return "Hello controller";
    }
    function viewload()
    {
        $data = ["ap", "pp", "cs", "ac"];
        return view("about", ["users" => $data]);
    }
}
