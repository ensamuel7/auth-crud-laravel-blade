<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\Company;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company_id = Company::all(['id'])->random()->id;
        $faker = Faker::create();
        DB::table('employees')->insert([
            'FirstName' => $faker->firstName,
            'LastName' => $faker->lastName,
            'Email' => $faker->email,
            'Phone' => $faker->phoneNumber,
            'Picture' => $faker->image('storage/app/public',640,480, null, false),
            'CompanyId' => $company_id,
        ]);
    }
}
