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
        $prefix = '[SettingSeeder] ';


        $this->command->info("$prefix Truncating Table");
        DB::statement('TRUNCATE settings');

        $this->command->info("$prefix Filling Table");
        DB::table('settings')->insert([
            'setting' => "networkmanager_integration",
            'value' => 1,
        ]);
        DB::table('settings')->insert([
            'setting' => 'litebans_integration',
            'value' => 1,
        ]);
        DB::table('settings')->insert([
            'setting' => 'luckperms_integration',
            'value' => 1,
        ]);
        DB::table('settings')->insert([
            'setting' => 'nameless_integration',
            'value' => 1,
        ]);

        $this->command->info("$prefix Filling Table Done");

    }
}
