<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\artist;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('artist')->insert([
        //     "name" => Str::random(10),
        //     "email" => Str::random(10) . "@gmail.com",
        //     "password" => Hash::make("password"),
        //     "username" => Str::random(10),
        //     "created_at" => Carbon::now()->format('Y-m-d H:i:s'),
        // ]);
        artist::factory()
            ->count(50)
            ->create();
    }
}
