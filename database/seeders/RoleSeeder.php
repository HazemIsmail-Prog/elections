<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id' => '1', 'name' => 'مسؤول عام'],
            ['id' => '2', 'name' => 'مسؤول نظام'],
            ['id' => '3', 'name' => 'مراقب'],
            ['id' => '4', 'name' => 'وكيل'],
            ['id' => '5', 'name' => 'مسؤول لجان'],
        ];
        Role::insert($roles);
        User::find(1)->roles()->sync(1);
    }
}
