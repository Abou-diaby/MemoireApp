<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);

        $user = User::find(2); // Remplacez 1 par l'ID de l'utilisateur que vous souhaitez faire admin
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
