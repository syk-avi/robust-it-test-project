<?php

namespace App\Modules\User\Database\Seeds;

use App\Modules\User\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'username' => 'superadmin',
            'email' => 'admin@gmail.com',
            'user_type' => 'super_admin',
            'password' => bcrypt('admin'),
        ]);


    }
}
