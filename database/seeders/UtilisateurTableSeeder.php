<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UtilisateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_utilisateur')->insert([
            [
                'codeUtil' => 'EMP-0004',
                'nomUtil' => 'Port Autonome de Lomé',
                'droitUtil' => 'admin',
                'pseudoUtil' => 'admin',
                'password' => bcrypt('password-admin'),
                'email' => 'pal@gmail.com',
            ]
        ]);
        // User::factory()
        //     ->count(1)
        //     ->create();
        // factory(Post::class, 1)->create();
    }
}
