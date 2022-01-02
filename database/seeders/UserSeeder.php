<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $user= User::create([
        'first_name' => 'Omar',
        'last_name'=>'Badr',
        'email' => 'omar@admin.com',
        'phone'=>'01090807013',
        'image' => 'profile/kbawaXKYWAx6oW2evqTjtNxbd1178Jt1GzsezJSh.jpg',
        'password' => Hash::make('123456789'),
    ]
);



        $role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $permissions = Permission::pluck('id')->all();
        $role->permissions()->sync($permissions);
        $user->assignRole([$role->id]);

    }
}
