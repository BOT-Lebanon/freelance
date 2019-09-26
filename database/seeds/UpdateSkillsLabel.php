<?php

use Illuminate\Database\Seeder;

class UpdateSkillsLabel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $statement = "update  ".env('DB_PREFIX')."`labelsforms`
                     set labeleng='Functional Skills and Interests'
                     where
                     labelcode='functionalskills';";
        DB::unprepared($statement);
    }
}
