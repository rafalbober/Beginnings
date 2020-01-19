<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('teachers')->insert([
            'name' => 'Zdzisław',
            'surname' => 'Uwodziciel',
            'email' => 'siwy@ggios.pl',
            'password' => bcrypt('hahaha'),
        ]);

        DB::table('teachers')->insert([
            'name' => 'Kazimierz',
            'surname' => 'Zwodziciel',
            'email' => 'lysy@ggios.pl',
            'password' => bcrypt('hahaha'),
        ]);
        DB::table('teachers')->insert([
            'name' => 'Maciej',
            'surname' => 'Przywodziciel',
            'email' => 'chudy@ggios.pl',
            'password' => bcrypt('hahaha'),
        ]);
    }
}
