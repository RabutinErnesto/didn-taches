<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacheMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tache_maintenances')->insert([
            [ 'tache'=>'Recuperation adresse MAC',
              'maintenance_id' => '1'
            ],
            [ 'tache'=>'Verification debit',
              'maintenance_id' => '1'
            ],
            [ 'tache'=>'Redemarrage Switch',
            'maintenance_id' => '1'
            ],
            [ 'tache'=>'Installation reseaux',
                'maintenance_id' => '1'
            ],
            [ 'tache'=>'Changement de fiche RG45',
            'maintenance_id' => '1'
            ],
            [ 'tache'=>'Changement de cable reseaux',
            'maintenance_id' => '1'
            ],
            [ 'tache'=>'Unite centrale',
            'maintenance_id' => '2'
            ],
            [ 'tache'=>'imprimante',
            'maintenance_id' => '2'
            ],
            [ 'tache'=>'Carte mere',
            'maintenance_id' => '2'
            ],
            [ 'tache'=>'Reparation Onduleur',
            'maintenance_id' => '3'
            ],
            [ 'tache'=>'Reparation Stabilisateur',
            'maintenance_id' => '3'
            ],
            [ 'tache'=>'Reparation Adapteur',
            'maintenance_id' => '3'
            ],
            [ 'tache'=>'Reparation Ecran',
            'maintenance_id' => '3'
            ],
         ]);
    }
}
