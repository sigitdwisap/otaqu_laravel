<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $employees = [
        //     [
        //         'name' => 'Name One',
        //         'phone_number' => 'Phone One',
        //         'email' => 'Email One',
        //         'address' => 'Address One'
        //     ],
        //     [
        //         'name' => 'Name Two',
        //         'phone_number' => 'Phone Two',
        //         'email' => 'Email Two',
        //         'address' => 'Address Two'
        //     ]
        // ];

        // foreach ($employees as $key => $value) {
        //     Employee::create($value);
        // }

        $faker = Faker::create();
        foreach (range(1, 100000) as $index) {
            Employee::create([
                'name' => $faker->name,
                'phone_number' => rand(100000000000, 999999999999),
                'email' => $faker->email,
                'address' => $faker->address,
            ]);
        }
    }
}
