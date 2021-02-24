<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PhpParser\Node\Stmt\Break_;
use App\Porta;
use App\Upgrade;
use App\Fija;
use App\fijaDigital;
use App\JhonatanPermission\Models\Prepost as ModelsPrepost;
use App\PortaDigital;
use App\Prepost;
use App\prepostDigital;
use App\upgradeDigital;
use App\lineaNueva;
use App\phoenix;
use Carbon\Carbon;
use Carbon\Traits\IntervalStep;

//ventas//
class HomeController extends Controller

{
    /**

     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setlocale('es');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
     $portas=Porta::all();
     $upgradedigitales= Upgrade::all();
     $fijas= Fija::all();
     $preposts= Prepost::all();
     $portadigitals= PortaDigital::all();
     $upgrades= Upgrade::all();
     $prepostDigitals = prepostDigital::all();

     $countPortases       ['portas']    = Porta::where    ('revisados', 'ok')->count();
     $okPortases          ['portas']    = Porta::where    ('revisados', 'ok')->count();
     $perdidaPortases     ['portas']    = Porta::where    ('revisados', 'Perdida')->count();
     $recuperadaPortases  ['portas']    = Porta::where    ('revisados', 'Recuperar')->count();
     $revisadoPortases    ['portas']    = Porta::where    ('revisados','<>', null )->count();
     $sinrevisarPortases  ['portas']    = Porta::where    ('revisados', null)->count();

     $countPortadigitalses       ['portadigitals']    = PortaDigital::where    ('revisados', 'ok')->count();
     $okPortadigitalses          ['portadigitals']    = PortaDigital::where    ('revisados', 'ok')->count();
     $perdidaPortadigitalses     ['portadigitals']    = PortaDigital::where    ('revisados', 'Perdida')->count();
     $recuperadaPortadigitalses  ['portadigitals']    = PortaDigital::where    ('revisados', 'Recuperar')->count();
     $revisadoPortadigitalses    ['portadigitals']    = PortaDigital::where    ('revisados','<>', null )->count();
     $sinrevisarPortadigitalses  ['portadigitals']    = PortaDigital::where    ('revisados', null)->count();

     $countupgrades       ['upgrade']   =Upgrade::where   ('revisados' , 'ok')->count();
     $okUpgrades          ['upgrade']   =Upgrade::where   ('revisados', 'ok')->count();
     $perdidaUpgrades     ['upgrade']   =Upgrade::where   ('revisados', 'Perdida')->count();
     $recuperadaUpgrades  ['upgrade']   =Upgrade::where   ('revisados', 'Recuperar')->count();
     $revisadoUpgrades    ['upgrade']   =Upgrade::where   ('revisados','<>', null)->count();
     $sinrevisarUpgrades  ['upgrade']   =Upgrade::where   ('revisados', null)->count();

     $dgcountupgrades      ['upgrade_digitals']=upgradeDigital::where('revisados' , 'ok')->count();
     $dgokUpgrades         ['upgrade_digitals']=upgradeDigital::where('revisados', 'ok')->count();
     $dgperdidaUpgrades    ['upgrade_digitals']=upgradeDigital::where('revisados', 'Perdida')->count();
     $dgrecuperadaUpgrades ['upgrade_digitals']=upgradeDigital::where('revisados', 'Recuperar')->count();
     $dgrevisadoUpgrades   ['upgrade_digitals']=upgradeDigital::where('revisados','<>', null)->count();
     $dgsinrevisarUpgrades ['upgrade_digitals']=upgradeDigital::where('revisados', null)->count();


     $countfijas          ['fijas']     =Fija::where      ('revisados' , 'ok')->count();
     $okFijas             ['fijas']     = Fija::where     ('revisados', 'ok')->count();
     $perdidaFijas        ['fijas']     = Fija::where     ('revisados', 'Perdida')->count();
     $recuperadaFijas     ['fijas']     = Fija::where     ('revisados', 'Recuperar')->count();
     $revisadoFijas       ['fijas']     = Fija::where     ('revisados','<>', null)->count();
     $sinrevisarFijas     ['fijas']     = Fija::where     ('revisados', null)->count();

     $countpreposts       ['preposts']  =Prepost::where   ('revisados' , 'ok')->count();
     $okPreposts          ['preposts']  = Prepost::where  ('revisados', 'ok')->count();
     $perdidaPreposts     ['preposts']  = Prepost::where  ('revisados', 'Perdida')->count();
     $recuperadaPreposts  ['preposts']  = Prepost::where  ('revisados', 'Recuperar')->count();
     $revisadoPreposts    ['preposts']  = Prepost::where  ('revisados','<>', null)->count();
     $sinrevisarPreposts  ['preposts']  = Prepost::where  ('revisados', null)->count();


     $dgcountpreposts       ['prepost_digitals']  = prepostDigital::where   ('revisados' , 'ok')->count();
     $dgokPreposts          ['prepost_digitals']  = prepostDigital::where  ('revisados', 'ok')->count();
     $dgperdidaPreposts     ['prepost_digitals']  = prepostDigital::where  ('revisados', 'Perdida')->count();
     $dgrecuperadaPreposts  ['prepost_digitals']  = prepostDigital::where  ('revisados', 'Recuperar')->count();
     $dgrevisadoPreposts    ['prepost_digitals']  = prepostDigital::where  ('revisados','<>', null)->count();
     $dgsinrevisarPreposts  ['prepost_digitals']  = prepostDigital::where  ('revisados', null)->count();


     $dgcountfijas          ['fija_digitals']     = fijaDigital::where     ('revisados' , 'ok')->count();
     $dgokFijas             ['fija_digitals']     = fijaDigital::where     ('revisados', 'ok')->count();
     $dgperdidaFijas        ['fija_digitals']     = fijaDigital::where     ('revisados', 'Perdida')->count();
     $dgrecuperadaFijas     ['fija_digitals']     = fijaDigital::where     ('revisados', 'Recuperar')->count();
     $dgrevisadoFijas       ['fija_digitals']     = fijaDigital::where     ('revisados','<>', null)->count();
     $dgsinrevisarFijas     ['fija_digitals']     = fijaDigital::where     ('revisados', null)->count();



     $lineanuevacountes     ['linea_nuevas']     = lineaNueva::where     ('revisados','ok')->count();
     $lineanuevaoks         ['linea_nuevas']     = lineaNueva::where     ('revisados','ok')->count();
     $lineanuevaperdidas    ['linea_nuevas']     = lineaNueva::where     ('revisados','Perdida')->count();
     $lineanuevarecuperadas ['linea_nuevas']     = lineaNueva::where     ('revisados','Recuperar')->count();
     $lineanuevarevisadas   ['linea_nuevas']     = lineaNueva::where     ('revisados','<>', null)->count();
     $lineanuevanorevisadas ['linea_nuevas']     = lineaNueva::where     ('revisados', null)->count();


     $phoenixcountes     ['phoenixes']     = phoenix::where     ('revisados','ok')->count();
     $phoenixoks         ['phoenixes']     = phoenix::where     ('revisados','ok')->count();
     $phoenixperdidas    ['phoenixes']     = phoenix::where     ('revisados','Perdida')->count();
     $phoenixrecuperadas ['phoenixes']     = phoenix::where     ('revisados','Recuperar')->count();
     $phoenixrevisadas   ['phoenixes']     = phoenix::where     ('revisados','<>', null)->count();
     $phoenixnorevisadas ['phoenixes']     = phoenix::where     ('revisados', null)->count();

     $fechaportases         ['portas']   = Porta::where ('created_at', 'exchange')->orderBy('created_at', 'asc')->count();

     return view('home',compact(
     'dgcountupgrades',
     'dgokUpgrades',
     'dgperdidaUpgrades',
     'portas',
     'countPortases',
     'okPortases',
     'perdidaPortases',
     'recuperadaPortases',
     'revisadoPortases',
     'sinrevisarPortases',
     'fechaportases',
     'upgrades',
     'countupgrades',
     'okUpgrades',
     'perdidaUpgrades',
     'recuperadaUpgrades',
     'revisadoUpgrades',
     'sinrevisarUpgrades',
     'fijas',
     'countfijas',
     'okFijas',
     'perdidaFijas',
     'recuperadaFijas',
     'revisadoFijas',
     'sinrevisarFijas',
     'preposts',
     'countpreposts',
     'okPreposts',
     'perdidaPreposts',
     'recuperadaPreposts',
     'revisadoPreposts',
     'sinrevisarPreposts',
     'countPortadigitalses',
     'okPortadigitalses',
     'perdidaPortadigitalses',
     'recuperadaPortadigitalses',
     'revisadoPortadigitalses',
     'sinrevisarPortadigitalses',
     'dgrecuperadaUpgrades',
     'dgrevisadoUpgrades',
     'dgsinrevisarUpgrades',
     'dgcountpreposts',
     'dgokPreposts',
     'dgperdidaPreposts',
     'dgrecuperadaPreposts',
     'dgrevisadoPreposts',
     'dgsinrevisarPreposts',
     'dgcountfijas',
     'dgokFijas',
     'dgperdidaFijas',
     'dgrecuperadaFijas',
     'dgrevisadoFijas',
     'dgsinrevisarFijas',
     'lineanuevacountes',
     'lineanuevaoks',
     'lineanuevaperdidas',
     'lineanuevarecuperadas',
     'lineanuevarevisadas',
     'lineanuevanorevisadas',
     'phoenixcountes',
     'phoenixoks',
     'phoenixperdidas',
     'phoenixrecuperadas',
     'phoenixrevisadas',
     'phoenixnorevisadas'


));
    }
}
