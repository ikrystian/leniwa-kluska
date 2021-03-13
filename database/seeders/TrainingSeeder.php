<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'user_id' => 1,
            'training_date' => '2021-03-13',
            'name' => '2021-03-13',
            'start' => '2021-03-13 20:03:35',
            'end' => '2021-03-13 23:05:00'
        ]);
    }
}
