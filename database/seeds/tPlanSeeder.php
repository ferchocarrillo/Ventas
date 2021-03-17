<?php

use Illuminate\Database\Seeder;

class tPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tPlanes')->truncate();

        DB::table('tPlanes')->insert(['tipoP'=>'Mayor A $75.990']);
        DB::table('tPlanes')->insert(['tipoP'=>'Menor A $75.990']);
        DB::table('tPlanes')->insert(['tipoP'=>'Prepago']);
    }
}
