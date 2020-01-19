<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Język Polski',
            'teacher_id' => '1',
            'description' => 'Zajęcia z prawidłowego wysławiania się i czytania lektur wczesnoszkolnych',
            'signup_capacity' => '32',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Matematyka',
            'teacher_id' => '1',
            'description' => 'Nauka używania kalkulatora',
            'signup_capacity' => '32',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Geologia',
            'teacher_id' => '2',
            'description' => 'Instruktaż z używania gwoździa z Castoramy w terenie',
            'signup_capacity' => '22',
        ]);
        DB::table('subjects')->insert([
            'name' => 'Geofizyka',
            'teacher_id' => '2',
            'description' => 'Historia wulkanów',
            'signup_capacity' => '32',
        ]);
        DB::table('subjects')->insert([
            'name' => 'WF',
            'teacher_id' => '3',
            'description' => 'Ćwieczenia w parach i wspólna kapiel po zajęciach',
            'signup_capacity' => '12',
        ]);
    }
}
