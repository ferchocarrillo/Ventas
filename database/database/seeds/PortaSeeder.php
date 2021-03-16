<?php

use Illuminate\Database\Seeder;

class PortaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Porta::class,2000)->create();
    }
}
