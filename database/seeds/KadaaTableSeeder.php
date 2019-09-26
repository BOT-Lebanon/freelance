<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KadaaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kadaa')->truncate();
        $statement = "INSERT INTO ".env('DB_PREFIX')."`kadaa` (`Id`, `provinceId`, `Name`) VALUES
        (1,8,\"Aakkar\"),
(2,1,\"Baalbek\"),
(3,1,\"Hermel\"),
(4,3,\"Western Beqaa\"),
(5,3,\"Rachaiya\"),
(6,3,\"Zahleh\"),
(7,6,\"Bent Jbeil\"),
(8,6,\"Hasbaiya\"),
(9,6,\"Marjaayoun\"),
(10,6,\"Nabatiyeh\"),
(11,5,\"Batroun\"),
(12,5,\"Bcharreh\"),
(13,5,\"Koura\"),
(14,5,\"Minieh-Danniyeh\"),
(15,5,\"Tripoli\"),
(16,5,\"Zgharta\"),
(17,7,\"Jezzine \"),
(18,7,\"Saida\"),
(19,7,\"Tyr\"),
(20,4,\"Aaley\"),
(21,4,\"Baabda\"),
(22,4,\"Chouf\"),
(23,4,\"Jbeil (Byblos)\"),
(24,4,\"Kesrouane\"),
(25,4,\"Metn\"),
(26,2,\"Beirut\");";

        DB::unprepared($statement);
    }
}
