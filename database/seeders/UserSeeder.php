<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Bryan';
        $user->lastname = 'Mora Rodriguez';
        $user->birthday = '1994-12-20';
        $user->role = 1;
        $user->is_web = 1;
        $user->is_brouchure = 1;
        $user->is_voucher = 1;
        $user->username = 'bmoraadmin';
        $user->phone = '+50689600001';
        $user->email = 'bryanmora1994@gmail.com';
        $user->status = 1;
        $user->email_verified_at = now();
        $user->password = bcrypt('20121994Mora.');

        $user->save();

    }
}
