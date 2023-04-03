<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(DirectionSeeder::class);
       $this->call(MaterielSeeder::class);
       $this->call(ServiceDIDNSeeder::class);
       $this->call(ServiceMETFPSeeder::class);
       //$this->call(TachesSeeder::class);
       $this->call(ResultatSeeder::class);
       $this->call(ProblemeSeeder::class);
       $this->call(SolutionSeeder::class);
    }
}
