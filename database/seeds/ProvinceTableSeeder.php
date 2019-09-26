<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('province')->truncate();
        $statement = "INSERT INTO ".env('DB_PREFIX')."`province` (`Id`, `Name`) VALUES
                        (1,\"Baalbek-Hermel\"),
                        (2,\"Beirut\"),
                        (3,\"Beqaa\"),
                        (4,\"Mount Lebanon\"),
                        (5,\"North Lebanon\"),
                        (6,\"Nabatiyeh\"),
                        (7,\"South Lebanon\"),
                        (8,\"Aakkar\");";
          DB::unprepared($statement);
    }
}
