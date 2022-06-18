<?php

use Illuminate\Database\Seeder;

class RsvFramesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rsv_frames')->insert([
            ['rsv_frame' => 'リモ1部'],
            ['rsv_frame' => 'リモ2部'],
            ['rsv_frame' => 'リモ3部'],
            ['rsv_frame' => '本社1部'],
            ['rsv_frame' => '本社2部'],
            ['rsv_frame' => '本社3部'],
        ]);
    }
}
