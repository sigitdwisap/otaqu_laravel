<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'name' => 'Name One',
                'phone_number' => 'Phone One',
                'email' => 'Email One',
                'address' => 'Address One'
            ],
            [
                'name' => 'Name Two',
                'phone_number' => 'Phone Two',
                'email' => 'Email Two',
                'address' => 'Address Two'
            ]
        ];

        foreach ($employees as $key => $value) {
            Employee::create($value);
        }
    }
}
