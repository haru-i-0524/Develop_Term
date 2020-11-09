<?php

use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //八地区区分
        DB::table('regions')->insert([
            // region_id = 1
            ['name' => '北海道地方'],
            // region_id = 2
            ['name' => '東北地方'],
            // region_id = 3
            ['name' => '関東地方'],
            // region_id = 4
            ['name' => '中部地方'],
            // region_id = 5
            ['name' => '近畿地方'],
            // region_id = 6
            ['name' => '中国地方'],
            // region_id = 7
            ['name' => '四国地方'],
            // region_id = 8
            ['name' => '九州地方'],
        ]);
    }
}
