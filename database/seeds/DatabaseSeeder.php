<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);

        $this->call(CountrySeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(KadaaTableSeeder::class);
        $this->call(LabelformTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(UpdateSkillsLabel::class);

    }
}
