<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\artist;
use Faker\Factory as faker;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $value) {
            DB::table('artist')->insert([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => $faker->password,
                "username" => $faker->userName,
                "created_at" => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
                "updated_at" => $faker->dateTimeThisYear($max = '+1 year')->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
