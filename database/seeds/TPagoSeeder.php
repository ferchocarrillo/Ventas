<?php

use Illuminate\Database\Seeder;

class TPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_pagos')->truncate();

        DB::table('t_pagos')->insert(['tipoPagos'=>'12 Cuotas']);
        DB::table('t_pagos')->insert(['tipoPagos'=>'18 Cuotas']);
        DB::table('t_pagos')->insert(['tipoPagos'=>'6 Cuotas']);
        DB::table('t_pagos')->insert(['tipoPagos'=>'3 Cuotas']);
        DB::table('t_pagos')->insert(['tipoPagos'=>'24 Cuotas']);
        DB::table('t_pagos')->insert(['tipoPagos'=>'De Contado']);
    }
}
