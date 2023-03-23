<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceDIDNSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_d_i_d_n_s')->insert([
            [
                'abr'=>'SDNL',
                'service'=>'Service Developpement Numerique ET Logiciels',
                'chef_service'=>'IANONA Innocent',
            ],
            [
             'abr'=>'SGBD',
             'service'=>'Service Gestion Base de Donnees',
             'chef_service'=>'',
            ],
            [
             'abr'=>'SMAR',
             'service'=>'Service Maintenance et Administration Reseau',
             'chef_service'=>'',
            ],
        ]);
    }
}
