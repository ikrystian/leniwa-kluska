<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achivments')->insert([
            ['name' => 'weight', 'condition' => 'larger_than', 'value' => 10000],
        ]);
    }
}
