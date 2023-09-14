<?php

namespace Database\Seeders;

use App\TacheMaintenance;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       $this->call(MaterielSeeder::class);
       $this->call(ServiceDIDNSeeder::class);
       $this->call(RoleSeeder::class);
       $this->call(UsersSeeder::class);
        $this->call(ResultatSeeder::class);
        $this->call(MaintenanceSeeder::class);
        $this->call(TacheMaintenanceSeeder::class);
       $this->call(ProblemeSeeder::class);
       $this->call(SolutionSeeder::class);
    }
}
