<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:e,

        DB::table('settings')->insert(
            [
                'setting' => "networkmanager_integration",
                'value' => 1,
            ]);
        DB::table('settings')->insert(
            [
                'setting' => 'litebans_integration',
                'value' => 1,
            ]);
    }
}
