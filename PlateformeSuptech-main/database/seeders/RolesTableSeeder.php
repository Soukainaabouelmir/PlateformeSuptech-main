<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role; 
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
        public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Accueil']);
        Role::create(['name' => 'RH']);
        Role::create(['name' => 'Prof']);
        Role::create(['name' => 'Scolarité']);
    }
    
}
