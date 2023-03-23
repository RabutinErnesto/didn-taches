<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceMETFPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'abr'=>'SC',
                'libelle'=>'Service de la Communication',
                'direction_id'=>'1'
            ],

            [
            'abr'=> 'SLDC',
            'libelle'=>'Service de la Législation, de la Documentation et du Contentieux' ,
            'direction_id'=> '1'
            ],
            [
            'abr'=> 'SRI',
            'libelle'=>'Service des Relations Internationales' ,
            'direction_id'=> '1'
            ],
            [
                'abr'=> 'SF',
                'libelle'=>'Service Financier' ,
                'direction_id'=> '18'
            ],
            [
                    'abr'=> 'SPRSB',
                    'libelle'=>'Service de la Programmation et du Suivi Budgétaire' ,
                    'direction_id'=> '20'
            ],
            [
                        'abr'=> 'SGC',
                        'libelle'=>'Service de la Gestion des Carrières' ,
                        'direction_id'=> '20'
            ],
            [
                'abr'=> 'SS',
                'libelle'=>'Service de la Solde' ,
                'direction_id'=> '20'
                        ],
             [
                            'abr'=> 'SMS',
                            'libelle'=>'Service Medico-Social' ,
                            'direction_id'=> '20'
                ],
                [
                    'abr'=> 'SDS',
                    'libelle'=>'Service du Domaine Scolaire' ,
                    'direction_id'=> '19'
                ],
                [
                    'abr'=> 'SIME',
                    'libelle'=>'Service des Infrastructures, Matériels et Equipements' ,
                    'direction_id'=> '19'
                ],
                [
                    'abr'=> 'SCM',
                    'libelle'=>'Service Central de Maintenance' ,
                    'direction_id'=> '19'
                ],
                [
                    'abr'=> 'SMAR',
                    'libelle'=>'Service de Maintenance et d’Administration du Réseau' ,
                    'direction_id'=> '21'
                ],
                [
                    'abr'=>'SDNL',
                    'libelle'=>'Service de développement numérique et de logiciels',
                    'direction_id'=>'21'
                ],
                [
                    'abr'=>'SABD',
                    'libelle'=>'Service de l’administration de la base de données',
                    'direction_id'=>'21'
                ],
                [
                    'abr'=>'SPRP',
                    'libelle'=>'Service de Pilotage de la Réforme et du Partenariat',
                    'direction_id'=>'21'
                ],
                [
                    'abr'=>'SCP',
                    'libelle'=>'Service de Coordination des projets',
                    'direction_id'=>'24'
                ],
                [
                    'abr'=>'SIDE',
                    'libelle'=>'Service de l’Intégration de la Dimension Environnementale',
                    'direction_id'=>'22'
                ],
                [
                    'abr'=>'SEP',
                    'libelle'=>'Service des Etudes - Planification',
                    'direction_id'=>'23'
                ],
                [
                    'abr'=>'SS',
                    'libelle'=>'Service des Statistiques',
                    'direction_id'=>'23'
                ],
                [
                    'abr'=>'SSE',
                    'libelle'=>'Service des Suivis - Évaluation',
                    'direction_id'=>'23'
                ],
                [
                    'abr'=>'SCRP',
                    'libelle'=>'Service des Curricula et des Réformes Pédagogiques',
                    'direction_id'=>'4'
                ],
                [
                    'abr'=>'SSAQ',
                    'libelle'=>'Service du Suivi et de l’Assurance Qualité',
                    'direction_id'=>'4'
                ],
                [
                    'abr'=>'SA',
                    'libelle'=>'Service de l’Accréditation',
                    'direction_id'=>'4'
                ],
                [
                    'abr'=>'SAR',
                    'libelle'=>'Service des études et recherches',
                    'direction_id'=>'5'
                ],
                [
                    'abr'=>'SPRP',
                    'libelle'=>'Service de production des ressources pédagogiques',
                    'direction_id'=>'5'
                ],
                [
                    'abr'=>'SC',
                    'libelle'=>'Service de capitalisation',
                    'direction_id'=>'5'
                ],
                [
                    'abr'=>'SFPI',
                    'libelle'=>'Service de la Formation Professionnelle Initiale',
                    'direction_id'=>'6'
                ],
                [
                    'abr'=>'SET',
                    'libelle'=>'Service de l’Enseignement Technique',
                    'direction_id'=>'6'
                ],
                [
                    'abr'=>'SSE',
                    'libelle'=>'Service Suivi et Evaluation',
                    'direction_id'=>'6'
                ],
                [
                    'abr'=>'SOE',
                    'libelle'=>'Service de l’Organisation des Examens',
                    'direction_id'=>'7'
                ],
                [
                    'abr'=>'SDC',
                    'libelle'=>'Service des Diplômes et des Certificats',
                    'direction_id'=>'7'
                ],
                [
                    'abr'=>'SEARC',
                    'libelle'=>'Service des Etudes et d’Analyses des Répertoires des Compétences',
                    'direction_id'=>'8'
                ],
                [
                    'abr'=>'SPQC',
                    'libelle'=>'Service de la Prospection des Qualifications et des Compétences',
                    'direction_id'=>'8'
                ],
                [
                    'abr'=>'SBC',
                    'libelle'=>'Service de Base des données sur les Compétences',
                    'direction_id'=>'8'
                ],
                [
                    'abr'=>'SEER',
                    'libelle'=>'Service d’Etudes et d’Elaboration des Référentiels',
                    'direction_id'=>'9'
                ],
                [
                    'abr'=>'SEAFP',
                    'libelle'=>'Service d’Evaluation des Acquis de la Formation Professionnelle',
                    'direction_id'=>'9'
                ],
                [
                    'abr'=>'SVAE',
                    'libelle'=>'Service de Validation des Acquis de l’Expérience',
                    'direction_id'=>'9'
                ],
                [
                    'abr'=>'SFPQ',
                    'libelle'=>'Service de la Formation Professionnelle Qualifiante',
                    'direction_id'=>'10'
                ],
                [
                    'abr'=>'SP',
                    'libelle'=>'Service de Partenariat',
                    'direction_id'=>'10'
                ],
                [
                    'abr'=>'SSE',
                    'libelle'=>'Service Suivi et Évaluation',
                    'direction_id'=>'10'
                ],
                [
                    'abr'=>'SAMB',
                    'libelle'=>'Service de l’Apprentissage aux Métiers de Base',
                    'direction_id'=>'11'
                ],
                [
                    'abr'=>'SP',
                    'libelle'=>'Service de Partenariat',
                    'direction_id'=>'11'
                ],
                [
                    'abr'=>'SSE',
                    'libelle'=>'Service Suivi et Evaluation',
                    'direction_id'=>'11'
                ],
                [
                    'abr'=>'SEF',
                    'libelle'=>'Service des Établissements et des Formations',
                    'direction_id'=>'29'
                ],
                [
                    'abr'=>'SIEC',
                    'libelle'=>'Service des Ingénieries, des Examens et des Certifications',
                    'direction_id'=>'29'
                ],
                [
                    'abr'=>'SEC',
                    'libelle'=>'Service des Études des Compétences',
                    'direction_id'=>'29'
                ],
                [
                    'abr'=>'SAAF',
                    'libelle'=>'Service des Affaires Administratives et Financières',
                    'direction_id'=>'29'
                ],
                [
                    'abr'=>'SOAIP',
                    'libelle'=>'Service d’Orientation et d’Appui à l’Insertion Professionnelle',
                    'direction_id'=>'29'
                ],

    ]);

    }
}
