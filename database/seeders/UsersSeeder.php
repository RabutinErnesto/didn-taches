<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User :: truncate();
        DB:: table('role_user')->truncate();


        $admin = User::create([
            'name'=>'Ernesto Rbt',
            'service'=>'SMAR',
            'email'=>'rabutinernesto2@gmail.com',
            'password'=>Hash::make('password')

        ]);


        $utilisateur = User::create([
          'name'=>'utilisateur',
          'service'=>'SMAR',
          'email'=>'utilisateur@gmail.com',
          'password'=>Hash::make('password')

        ]);

        $auteur = User::create([
            'name'=>'auteur',
            'service'=>'SMAR',
            'email'=>'auteur@gmail.com',
            'password'=>Hash::make('password')

          ]);

              $adminRole =  Role::where('name', 'admin')->first();
              $auteurRole =  Role::where('name', 'auteur')->first();
              $utilisateurRole = Role::where('name', 'utilisateur')->first();

              $admin->roles()->attach($adminRole);
              $auteur->roles()->attach($auteurRole);
              $utilisateur->roles()->attach($utilisateurRole);

    }
}
