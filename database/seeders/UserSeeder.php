<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        User::create([
            'name' => 'Emir Sanchez',
            'phone' => '3511159550',
            'email' => 'emir2104@gmail.com',
            'profile' => 'ADMIN',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);
        User::create([
            'name' => 'Makol Sulca',
            'phone' => '3549873214',
            'email' => 'makol@gmail.com',
            'profile' => 'EMPLOYEE',
            'status' => 'ACTIVE',
            'password' => bcrypt('123')
        ]);

        // crear role Administrador
        $admin    = Role::create(['name' => 'Admin']);

        // crear permisos componente categories
        Permission::create(['name' => 'Category_Create']);
        Permission::create(['name' => 'Category_Search']);
        Permission::create(['name' => 'Category_Update']);
        Permission::create(['name' => 'Category_Destroy']);

        // asignar permisos al rol Admin sobre categories
        $admin->givePermissionTo(['Category_Create', 'Category_Search', 'Category_Update', 'Category_Destroy']);

        // asignar role Admin al usuario Emir Sanchez
        $uAdmin = User::find(1);
        $uAdmin->assignRole('Admin');
    }
}
