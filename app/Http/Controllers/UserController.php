<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artist;
use Faker\Factory as faker;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // mutators demo
    public function index()
    {
        $faker = Faker::create();
        $artist = new artist;
        foreach (range(1, 10) as $value) {
            DB::table('artist')->insert([
                $artist->name = "Anuj",
                $artist->email = "ahp.pzz2000",
                $artist->password = $faker->password,
                $artist->username = $faker->userName,
                $artist->save(),
            ]);
        }
    }
    // function viewload()
    // {
    //     $data = ["ap", "pp", "cs", "ac"];
    //     return view("about", ["users" => $data]);
    // }

    // public function getAddressRelation()
    // {
    //     return $this->hasOne(related:'App\')
    // }
}
