<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercise_types')->insert([
            ['name' => 'Wyciskanie sztangi na płaskiej'],
            ['name' => 'Wyciskanie hantelek na ławce ze skosem dodatnim'],
            ['name' => 'Rozpiętki na bramie'],
            ['name' => 'Sciąganie linek od dołu na bramie'],
            ['name' => 'Wyciskanie hantelek nad głowe siedząc'],
            ['name' => 'Unoszenie hantli bokiem stojąc'],
            ['name' => 'Uginanie ramion z suplinacją nadgarstka'],
            ['name' => 'Gryf łamany na modlitewniku'],
            ['name' => 'Uginanie ramion z hantelką oburącz'],
            ['name' => 'Trzymanie ketli w pozycji stojącej'],
        ]);
    }
}
