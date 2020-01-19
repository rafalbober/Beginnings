<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'title' => 'Włanczam jako błąd biedy umysłowej',
            'subject_id' => '1',
            'description' => 'Wykład i zajęcia praktyczne',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Wyłanczam jako błąd biedy umysłowej',
            'subject_id' => '1',
            'description' => 'Wykład i zajęcia praktyczne',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Przełanczam jako błąd biedy umysłowej',
            'subject_id' => '1',
            'description' => 'Wykład i zajęcia praktyczne',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Załanczam jako błąd biedy umysłowej',
            'subject_id' => '1',
            'description' => 'Wykład i zajęcia praktyczne',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Odłanczam jako błąd biedy umysłowej',
            'subject_id' => '1',
            'description' => 'Wykład i zajęcia praktyczne',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Egzamin ustny',
            'subject_id' => '1',
            'description' => '5 minut na pytanie, 5 pytań',
        ]);

        DB::table('lessons')->insert([
            'title' => 'Kalkulator prosty',
            'subject_id' => '2',
            'description' => 'Funkcje i triki dla początkujących',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Kalkulator naukowy',
            'subject_id' => '2',
            'description' => 'Jak się nie pogubić. Wykład',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Zaliczenie',
            'subject_id' => '2',
            'description' => 'Praktyczne w dwójkach',
        ]);

        DB::table('lessons')->insert([
            'title' => 'Obsługa rylca',
            'subject_id' => '3',
            'description' => 'Podstawy i BHP',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Badanie właściwości skał',
            'subject_id' => '3',
            'description' => 'Badanie w terenie + zaliczenie',
        ]);

        DB::table('lessons')->insert([
            'title' => 'Wulkany i ich cechy',
            'subject_id' => '4',
            'description' => 'Wykład i dyskusja. Zaliczenie ustne po zajęciach.',
        ]);

        DB::table('lessons')->insert([
            'title' => 'BHP',
            'subject_id' => '5',
            'description' => 'Jak unikać nieprzyjemnych sytuacji pod prysznicem',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Siłownia',
            'subject_id' => '5',
            'description' => 'Ćwiczenia',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Mycie - część praktyczna',
            'subject_id' => '5',
            'description' => 'W trójkach na czas',
        ]);
        DB::table('lessons')->insert([
            'title' => 'Pierwsza pomoc',
            'subject_id' => '5',
            'description' => 'Instruktaż i ćwiczenia',
        ]);
    }
}
