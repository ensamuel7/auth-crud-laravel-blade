<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('companies')->insert([
            'Name' => $faker->company,
            'Email' => $faker->email,
            'Logo' => $faker->image('storage/app/public',100,100, null, false),
            'Website' => $faker->domainName,
        ]);
    }
}
