@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card" style="background-image: linear-gradient(#EAF2F8, #FDFEFE);">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

    <div id="contenedor_reloj"></div>
    <link rel="shortcut icon" href="home">
    <div class="card-inline">
<center style="background-image: linear-gradient(#EAF2F8, #AAB7B8);">
    <img src="\theme\images\pngegg.png" float="left" height="120" width="300">
    <h3 aline="center" >DASHBOARD</h3>
</center>
</div>
</body>
{{--  inicio tabla principal  --}}
<div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ventas</h5><br>
               <canvas id="myChart1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                <table class="table">
                 <thead>
                     <tr>
                    <th scope="col">Portabilidad</th>
                    <th scope="col">Upgrade</th>
                    <th scope="col">Fija</th>
                    <th scope="col">Prepost</th>
                    <th scope="col">Porta Digital</th>
                    <th scope="col">Upgrade Digital</th>
                    <th scope="col">Prepost Digital</th>
                    <th scope="col">Fija Digital</th>
                    <th scope="col">Linea Nueva</th>
                    <th scope="col">Phoenix</th>

                  </tr>
                </thead>
                <tbody>
@foreach ($countPortases        as $countPortas)        <td> {{  $countPortas  }}       </td>@endforeach
@foreach ($countupgrades        as $countupgrade)       <td> {{  $countupgrade }}       </td>@endforeach
@foreach ($countfijas           as $countfija)          <td> {{  $countfija    }}       </td>@endforeach
@foreach ($countpreposts        as $countprepost)       <td> {{  $countprepost }}       </td>@endforeach
@foreach ($countPortadigitalses as $countPortadigital)  <td> {{  $countPortadigital  }} </td>@endforeach
@foreach ($dgcountupgrades      as $dgcountupgrade)     <td> {{  $dgcountupgrade }}     </td>@endforeach
@foreach ($dgcountpreposts      as $dgcountprepost)     <td> {{  $dgcountprepost }}     </td>@endforeach
@foreach ($dgcountfijas         as $dgcountfija)        <td> {{  $dgcountfija }}        </td>@endforeach
@foreach ($lineanuevacountes    as $lineanuevacount)    <td> {{  $lineanuevacount }}    </td>@endforeach
@foreach ($phoenixcountes       as $phoenixcount)       <td> {{  $phoenixcount }}    </td>@endforeach

</tbody>
              </table>
            </div>
          </div>
        </div>
       {{-- <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Asistencia</h5>
               <canvas id="myChart2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Entrada</th>
                    <th scope="col">Break</th>
                    <th scope="col">Almuerzo</th>
                    <th scope="col">Salida</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> 15</td>
                    <td> 5 </td>
                    <td> 9 </td>
                    <td> 3 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
--}}

<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
    labels: ['Portabilidad', 'Upgrade', 'Fija', 'Prepost','Porta Digital','Upgrade Digital', 'Prepost Digital','Fija Digital', 'Linea Nueva' ,'Phoenix'],
    datasets: [{
    label: 'Cantidad de ventas',
    data: [{{  $countPortas }},{{  $countupgrade }},{{  $countfija }},{{  $countprepost }},{{  $countPortadigital }} ,{{  $dgcountupgrade }} ,{{  $dgcountprepost }},{{  $dgcountfija }} , {{ $lineanuevacount }} ,{{ $phoenixcount}} ],
    backgroundColor:
    ['rgba(255, 99, 132, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(255, 206, 86, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(255, 149, 79, 0.2)',
    'rgba(255, 149, 56, 0.2)',
    'rgba(255, 129, 30, 0.2)',
    'rgba(230, 101, 64, 0.2)',
    'rgba(255, 160, 22, 0.2)',
    'rgba(255, 149, 79, 0.2)'

    ],
    borderColor:
    ['rgba(255, 99, 132, 1)',
     'rgba(54, 162, 235, 1)',
     'rgba(255, 206, 86, 1)',
     'rgba(255, 159, 64, 1)',
     'rgba(255, 149, 79, 1)',
     'rgba(255, 149, 56, 1)',
     'rgba(255, 129, 30, 1)',
     'rgba(230, 101, 64, 1)',
     'rgba(255, 160, 22, 1)',
     'rgba(255, 149, 79, 1)'
     ],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>

{{--  fin cuadro principal  --}}

        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Resultado de la revision Porta</h5>
                 <canvas id="myChart3" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">OK</th>
                        <th scope="col">Perdida</th>
                        <th scope="col">Recuperda</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
@foreach ($okPortases as $okPortas)                <td> {{  $okPortas  }}         </td>@endforeach
@foreach ($perdidaPortases as $perdidaPortas)      <td> {{  $perdidaPortas  }}    </td>@endforeach
@foreach ($recuperadaPortases as $recuperadaPortas)<td> {{  $recuperadaPortas  }} </td>@endforeach
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
<div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Estado de revision Porta </h5>
               <canvas id="myChart4" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Revisada</th>
                    <th scope="col">No revisado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
@foreach ($revisadoPortases as $revisadoPortas)    <td> {{  $revisadoPortas    }} </td>@endforeach
@foreach ($sinrevisarPortases as $sinrevisarPortas)<td> {{  $sinrevisarPortas  }} </td>@endforeach
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Resultado de la revision Upgrade</h5>
                     <canvas id="myChart5" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">OK</th>
                            <th scope="col">Perdida</th>
                            <th scope="col">Recuperda</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
@foreach ($okUpgrades as $okUpgrade)                <td> {{  $okUpgrade  }}         </td>@endforeach
@foreach ($perdidaUpgrades as $perdidaUpgrade)      <td> {{  $perdidaUpgrade  }}    </td>@endforeach
@foreach ($recuperadaUpgrades as $recuperadaUpgrade)<td> {{  $recuperadaUpgrade  }} </td>@endforeach
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
    <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Estado de revision Upgrade</h5>
                   <canvas id="myChart6" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                   <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Revisada</th>
                        <th scope="col">No revisado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
@foreach ($revisadoUpgrades as $revisadoUpgrade)<td>{{$revisadoUpgrade}}</td>@endforeach
@foreach ($sinrevisarUpgrades as $sinrevisarUpgrade)<td>{{$sinrevisarUpgrade}}</td>@endforeach
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
               <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Resultado de la revision Fija</h5>
                         <canvas id="myChart7" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                         <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">OK</th>
                                <th scope="col">Perdida</th>
                                <th scope="col">Recuperda</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
@foreach ($okFijas as $okFija)<td> {{  $okFija  }} </td>@endforeach
@foreach ($perdidaFijas as $perdidaFija)<td> {{  $perdidaFija  }} </td>@endforeach
@foreach ($recuperadaFijas as $recuperadaFija)<td> {{  $recuperadaFija  }} </td>@endforeach
                              </tr>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>


        <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Estado de revision Fija </h5>
                       <canvas id="myChart8" width="20" height="10" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                       <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Revisada</th>
                            <th scope="col">No revisado</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
@foreach ($revisadoFijas as $revisadoFija)<td>{{$revisadoFija}}</td>@endforeach
@foreach ($sinrevisarFijas as $sinrevisarFija)<td>{{$sinrevisarFija}}</td>@endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
                    <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Resultado de la revision Prepost </h5>
                             <canvas id="myChart9" width="20" height="10" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                             <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">OK</th>
                                    <th scope="col">Perdida</th>
                                    <th scope="col">Recuperda</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
@foreach ($okPreposts as $okPrepost)<td> {{  $okPrepost  }} </td>@endforeach
@foreach ($perdidaPreposts as $perdidaPrepost)<td> {{  $perdidaPrepost  }} </td>@endforeach
@foreach ($recuperadaPreposts as $recuperadaPrepost)<td> {{  $recuperadaPrepost  }} </td>@endforeach
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                      </div>
            <div class="col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Estado de revision Prepost</h5>
                           <canvas id="myChart10" width="20" height="10" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
                           <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Revisada</th>
                                <th scope="col">No revisado</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
@foreach ($revisadoPreposts as $revisadoPrepost)    <td>{{$revisadoPrepost}}  </td>@endforeach
@foreach ($sinrevisarPreposts as $sinrevisarPrepost)<td>{{$sinrevisarPrepost}}</td>@endforeach
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>




    <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Resultado de la revision Porta Digital </h5>
             <canvas id="myChartpdigital1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
             <table class="table">
                <thead>
                  <tr>
                    <th scope="col">OK</th>
                    <th scope="col">Perdida</th>
                    <th scope="col">Recuperda</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
@foreach ($okPortadigitalses as $okPortadigital)                <td> {{  $okPortadigital  }}         </td>@endforeach
@foreach ($perdidaPortadigitalses as $perdidaPortadigital)      <td> {{  $perdidaPortadigital  }}    </td>@endforeach
@foreach ($recuperadaPortadigitalses as $recuperadaPortadigital)<td> {{  $recuperadaPortadigital  }} </td>@endforeach
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
      </div>
<div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Estado de revision Porta Digital </h5>
           <canvas id="myChartpdigital2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
           <table class="table">
            <thead>
              <tr>
                <th scope="col">Revisada</th>
                <th scope="col">No revisado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
@foreach ($revisadoPortadigitalses as $revisadoPortadigital)    <td> {{  $revisadoPortadigital    }} </td>@endforeach
@foreach ($sinrevisarPortadigitalses as $sinrevisarPortadigital)<td> {{  $sinrevisarPortadigital  }} </td>@endforeach
              </tr>
            </tbody>
          </table>
        </div>
    </div>
</div>

{{--inicio del nuevo canvas--}}

<div class="col-sm-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Resultado de la revision Prepost Digital </h5>
       <canvas id="prepostdigital1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
       <table class="table">
          <thead>
            <tr>
              <th scope="col">OK</th>
              <th scope="col">Perdida</th>
              <th scope="col">Recuperda</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@foreach ($dgokPreposts as $dgokPrepost)                <td> {{  $dgokPrepost  }}         </td>@endforeach
@foreach ($dgperdidaPreposts as $dgperdidaPrepost)      <td> {{  $dgperdidaPrepost  }}    </td>@endforeach
@foreach ($dgrecuperadaPreposts as $dgrecuperadaPrepost )<td> {{ $dgrecuperadaPrepost   }} </td>@endforeach
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>

<script>
  var ctx = document.getElementById('prepostdigital1').getContext('2d');
  var myLineChart = new Chart(ctx, {
  type: 'polarArea',
  data: {
  labels: ['ok', 'Perdida', 'Recuperdada'],
  datasets: [{
  data: [ {{  $dgokPrepost  }} , {{  $dgperdidaPrepost  }} , {{  $dgrecuperadaPrepost  }}],
  backgroundColor:
  ['rgba(54, 88, 100, 0.2)',
   'rgba(255, 99, 32, 0.2)',
   'rgba(255, 159, 64, 0.2)'],
  borderColor:
  ['rgba(54, 88, 100, 1)',
   'rgba(255, 99, 32, 1)',
   'rgba(255, 159, 64, 1)'],
  borderWidth: 5
  }]
  },
  options: {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true
  }
  }]
  }
  }
  });
  </script>

<div class="col-sm-6">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Estado de revision Prepost Digital </h5>
     <canvas id="prepostdigital2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
     <table class="table">
      <thead>
        <tr>
          <th scope="col">Revisada</th>
          <th scope="col">No revisado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
@foreach ($dgrevisadoPreposts as $dgrevisadoPrepost)    <td> {{  $dgrevisadoPrepost    }} </td>@endforeach
@foreach ($dgsinrevisarPreposts as $dgsinrevisarPrepost)<td> {{  $dgsinrevisarPrepost  }} </td>@endforeach
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>


<script>
  var ctx = document.getElementById('prepostdigital2').getContext('2d');
  var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
  labels: ['no revisada', 'revisada'],
  datasets: [{
  label: 'Estado de revision',
  data: [ {{$dgrevisadoPrepost}},{{$dgsinrevisarPrepost}}],
  backgroundColor:
  ['rgba(255, 206, 99, 0.2)',
   'rgba(54, 88, 100, 0.2)'],
  borderColor:
  ['rgba(255, 206, 50, 1)',
   'rgba(54, 88, 100, 1)'],
  borderWidth: 5
  }]
  },
  options: {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true
  }
  }]
  }
  }
  });
  </script>


{{--final del nuevo canvas--}}



{{--incio grafico fija digital--}}


<div class="col-sm-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Resultado de la revision Fija Digital </h5>
       <canvas id="fijadgital1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
       <table class="table">
          <thead>
            <tr>
              <th scope="col">OK</th>
              <th scope="col">Perdida</th>
              <th scope="col">Recuperda</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@foreach ($dgokFijas as $dgokFija)                <td> {{  $dgokFija  }}         </td>@endforeach
@foreach ($dgperdidaFijas as $dgperdidaFija)      <td> {{  $dgperdidaFija  }}    </td>@endforeach
@foreach ($dgrecuperadaFijas as $dgrecuperadaFija)<td> {{  $dgrecuperadaFija  }} </td>@endforeach
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>

<script>
  var ctx = document.getElementById('fijadgital1').getContext('2d');
  var myLineChart = new Chart(ctx, {
  type: 'polarArea',
  data: {
  labels: ['ok', 'Perdida', 'Recuperdada'],
  datasets: [{
  data: [ {{  $dgokFija  }} , {{  $dgperdidaFija  }} , {{  $dgrecuperadaFija  }}],
  backgroundColor:
  ['rgba(54, 88, 100, 0.2)',
   'rgba(255, 99, 32, 0.2)',
   'rgba(255, 159, 64, 0.2)'],
  borderColor:
  ['rgba(54, 88, 100, 1)',
   'rgba(255, 99, 32, 1)',
   'rgba(255, 159, 64, 1)'],
  borderWidth: 5
  }]
  },
  options: {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true
  }
  }]
  }
  }
  });
  </script>
<div class="col-sm-6">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Estado de revision Fija Digital </h5>
     <canvas id="fijadgital2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
     <table class="table">
      <thead>
        <tr>
          <th scope="col">Revisada</th>
          <th scope="col">No revisado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
@foreach ($dgrevisadoFijas as $dgrevisadoFija)    <td> {{  $dgrevisadoFija    }} </td>@endforeach
@foreach ($dgsinrevisarFijas as $dgsinrevisarFija)<td> {{  $dgsinrevisarFija  }} </td>@endforeach
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<script>
  var ctx = document.getElementById('fijadgital2').getContext('2d');
  var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
  labels: ['no revisada', 'revisada'],
  datasets: [{
  label: 'Estado de revision',
  data: [ {{$dgrevisadoFija}},{{$dgsinrevisarFija}}],
  backgroundColor:
  ['rgba(255, 206, 99, 0.2)',
   'rgba(54, 88, 100, 0.2)'],
  borderColor:
  ['rgba(255, 206, 50, 1)',
   'rgba(54, 88, 100, 1)'],
  borderWidth: 5
  }]
  },
  options: {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true
  }
  }]
  }
  }
  });
  </script>


{{--final grafico fija digital--}}


<div class="col-sm-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Resultado de la revision Upgrade Digital</h5>
       <canvas id="upgradeDigital1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
       <table class="table">
          <thead>
            <tr>
              <th scope="col">OK</th>
              <th scope="col">Perdida</th>
              <th scope="col">Recuperda</th>
            </tr>
          </thead>
          <tbody>
            <tr>
@foreach ($dgokUpgrades as $dgokUpgrade)                <td> {{  $dgokUpgrade  }}         </td>@endforeach
@foreach ($dgperdidaUpgrades as $dgperdidaUpgrade)      <td> {{  $dgperdidaUpgrade  }}    </td>@endforeach
@foreach ($dgrecuperadaUpgrades as $dgrecuperadaUpgrade)<td> {{  $dgrecuperadaUpgrade  }} </td>@endforeach
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
<script>
  var ctx = document.getElementById('upgradeDigital1').getContext('2d');
  var myLineChart = new Chart(ctx, {
  type: 'polarArea',
  data: {
  labels: ['ok', 'Perdida', 'Recuperdada'],
  datasets: [{
  data: [ {{  $dgokUpgrade  }} , {{  $dgperdidaUpgrade  }} , {{  $dgrecuperadaUpgrade  }}],
  backgroundColor:
  ['rgba(255, 99, 132, 0.2)',
   'rgba(54, 162, 235, 0.2)',
   'rgba(255, 159, 64, 0.2)'],
  borderColor:
  ['rgba(255, 99, 132, 1)',
   'rgba(54, 162, 235, 1)',
   'rgba(255, 159, 64, 1)'],
  borderWidth: 5
  }]
  },
  options: {
  scales: {
  yAxes: [{
  ticks: {
  beginAtZero: true
  }
  }]
  }
  }
  });
  </script>



<script>
    var ctx = document.getElementById('myChartpdigital1').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    data: [ {{  $dgokUpgrade  }} , {{  $dgperdidaUpgrade  }} , {{  $dgrecuperadaUpgrade  }}],
    backgroundColor:
    ['rgba(255, 99, 132, 0.2)',
     'rgba(54, 162, 235, 0.2)',
     'rgba(255, 159, 64, 0.2)'],
    borderColor:
    ['rgba(255, 99, 132, 1)',
     'rgba(54, 162, 235, 1)',
     'rgba(255, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>



    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Estado de revision Upgrade Digital </h5>
           <canvas id="upgradedigital2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
           <table class="table">
            <thead>
              <tr>
                <th scope="col">Revisada</th>
                <th scope="col">No revisado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
      @foreach ($dgrevisadoUpgrades as $dgrevisadoUpgrade)    <td> {{  $dgrevisadoUpgrade   }} </td>@endforeach
      @foreach ($dgsinrevisarUpgrades as $dgsinrevisarUpgrade)<td> {{  $dgsinrevisarUpgrade  }} </td>@endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>

      <script>
        var ctx = document.getElementById('upgradedigital2').getContext('2d');
        var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
        labels: ['no revisada', 'revisada'],
        datasets: [{
        label: 'Estado de revision',
        data: [ {{$dgrevisadoUpgrade}},{{$dgsinrevisarUpgrade}}],
        backgroundColor:
        ['rgba(255, 206, 86, 0.2)',
         'rgba(255, 159, 64, 0.2)'],
        borderColor:
        ['rgba(255, 206, 86, 1)',
         'rgba(255, 159, 64, 1)'],
        borderWidth: 5
        }]
        },
        options: {
        scales: {
        yAxes: [{
        ticks: {
        beginAtZero: true
        }
        }]
        }
        }
        });
        </script>

    <script>
    var ctx = document.getElementById('myChartpdigital2').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [ {{$revisadoPortadigital}},{{$sinrevisarPortadigital}}],
    backgroundColor:
    ['rgba(255, 206, 86, 0.2)',
     'rgba(255, 159, 64, 0.2)'],
    borderColor:
    ['rgba(255, 206, 86, 1)',
     'rgba(255, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>





<script>
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ['Entrada', 'Break', 'Almuerzo', 'Salida'],
datasets: [{
label: 'Agentes refgistrados',
data: [22, 5, 7, 10 ],
backgroundColor:
['rgba(255, 99, 132, 0.2)',
 'rgba(54, 162, 235, 0.2)',
 'rgba(255, 206, 86, 0.2)',
 'rgba(255, 159, 64, 0.2)'],
borderColor:
['rgba(255, 99, 132, 1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 206, 86, 1)',
 'rgba(255, 159, 64, 1)'],
borderWidth: 5
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>
<script>
var ctx = document.getElementById('myChart3').getContext('2d');
var myLineChart = new Chart(ctx, {
type: 'polarArea',
data: {
labels: ['ok', 'Perdida', 'Recuperdada'],
datasets: [{
data: [ {{  $okPortas  }} , {{  $perdidaPortas  }} , {{  $recuperadaPortas  }}],
backgroundColor:
['rgba(255, 99, 132, 0.2)',
 'rgba(54, 162, 235, 0.2)',
 'rgba(255, 159, 64, 0.2)'],
borderColor:
['rgba(255, 99, 132, 1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 159, 64, 1)'],
borderWidth: 5
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>
<script>
var ctx = document.getElementById('myChart4').getContext('2d');
var myPieChart = new Chart(ctx, {
type: 'pie',
data: {
labels: ['no revisada', 'revisada'],
datasets: [{
label: 'Estado de revision',
data: [ {{$sinrevisarPortas}},{{$revisadoPortas}}],
backgroundColor:
['rgba(255, 206, 86, 0.2)',
 'rgba(255, 159, 64, 0.2)'],
borderColor:
['rgba(255, 206, 86, 1)',
 'rgba(255, 159, 64, 1)'],
borderWidth: 5
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
</script>
<script>
    var ctx = document.getElementById('myChart5').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    label:'Cantidad de ventas',
    data: [{{  $okUpgrade  }} , {{  $perdidaUpgrade  }} , {{  $recuperadaUpgrade  }}],
    backgroundColor:
    ['rgba(200, 99, 132, 0.2)',
     'rgba(189, 162, 235, 0.2)',
     'rgba(35, 159, 64, 0.2)'],
    borderColor:
    ['rgba(200, 99, 132, 1)',
     'rgba(189, 162, 235, 1)',
     'rgba(35, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
    <script>
    var ctx = document.getElementById('myChart6').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [{{$sinrevisarUpgrade}},{{$revisadoUpgrade}}],
    backgroundColor:
    ['rgba(189, 162, 235, 0.2)',
     'rgba(35, 159, 64, 0.2)'],
    borderColor:
    ['rgba(189, 162, 235, 1)',
     'rgba(35, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
<script>
    var ctx = document.getElementById('myChart7').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    label: 'Cantidad de ventas',
    data: [{{  $okFija  }} , {{  $perdidaFija  }} , {{  $recuperadaFija  }}],
    backgroundColor:
    ['rgba(10, 99, 132, 0.2)',
     'rgba(255, 159, 64, 0.2)',
     'rgba(30, 159, 64, 0.2)'],
    borderColor:
    ['rgba(10, 99, 132, 1)',
     'rgba(255, 159, 64, 1)',
     'rgba(30, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
   <script>
    var ctx = document.getElementById('myChart8').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [{{$sinrevisarFija}},{{$revisadoFija}}],
    backgroundColor:
    [ 'rgba(10, 99, 132, 0.2)',
      'rgba(30, 159, 64, 0.2)'],
    borderColor:
    ['rgba(10, 99, 132, 1)',
    'rgba(30, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
<script>
    var ctx = document.getElementById('myChart9').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    label: 'Cantidad de ventas',
    data: [{{  $okPrepost  }} , {{  $perdidaPrepost  }} , {{  $recuperadaPrepost  }}],
    backgroundColor:
    ['rgba(255, 99, 132, 0.2)',
     'rgba(255, 159, 64, 0.2)',
     'rgba(54, 162, 235, 0.2)'],
    borderColor:
    ['rgba(255, 99, 132, 1)',
     'rgba(255, 159, 64, 1)',
     'rgba(54, 162, 235, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
    <script>
  var ctx = document.getElementById('myChart10').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [{{$sinrevisarPrepost}},{{$revisadoPrepost}}],
    backgroundColor:
    ['rgba(255, 206, 86, 0.2)',
     'rgba(255, 159, 64, 0.2)'],
    borderColor:
    ['rgba(255, 206, 86, 1)',
     'rgba(255, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>




{{--incio grafico linea nueva--}}


<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Resultado de la revision Linea Nueva </h5>
         <canvas id="lineanueva1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
         <table class="table">
            <thead>
              <tr>
                <th scope="col">OK</th>
                <th scope="col">Perdida</th>
                <th scope="col">Recuperda</th>
              </tr>
            </thead>
            <tbody>
              <tr>
  @foreach ($lineanuevaoks  as $lineanuevaok )                <td> {{  $lineanuevaok   }}         </td>@endforeach
  @foreach ($lineanuevaperdidas as $lineanuevaperdida)        <td> {{  $lineanuevaperdida  }}    </td>@endforeach
  @foreach ($lineanuevarecuperadas as $lineanuevarecuperada)  <td> {{  $lineanuevarecuperada  }} </td>@endforeach
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <script>
    var ctx = document.getElementById('lineanueva1').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    data: [ {{  $lineanuevaok  }} , {{  $lineanuevaperdida  }} , {{  $lineanuevarecuperada  }}],
    backgroundColor:
    ['rgba(54, 88, 100, 0.2)',
     'rgba(255, 99, 32, 0.2)',
     'rgba(255, 159, 64, 0.2)'],
    borderColor:
    ['rgba(54, 88, 100, 1)',
     'rgba(255, 99, 32, 1)',
     'rgba(255, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
  <div class="col-sm-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Estado de revision Linea Nueva </h5>
       <canvas id="lineanueva2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">Revisada</th>
            <th scope="col">No revisado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
  @foreach ($lineanuevarevisadas as $lineanuevarevisada)    <td> {{  $lineanuevarevisada    }} </td>@endforeach
  @foreach ($lineanuevanorevisadas as $lineanuevanorevisada)<td> {{  $lineanuevanorevisada  }} </td>@endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <script>
    var ctx = document.getElementById('lineanueva2').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [ {{$lineanuevarevisada}},{{$lineanuevanorevisada}}],
    backgroundColor:
    ['rgba(255, 206, 99, 0.2)',
     'rgba(54, 88, 100, 0.2)'],
    borderColor:
    ['rgba(255, 206, 50, 1)',
     'rgba(54, 88, 100, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>


  {{--final grafico linea nueva--}}


{{--incio grafico phoenix--}}


<div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Resultado de la revision Phoenix </h5>
         <canvas id="phoenix1" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
         <table class="table">
            <thead>
              <tr>
                <th scope="col">OK</th>
                <th scope="col">Perdida</th>
                <th scope="col">Recuperda</th>
              </tr>
            </thead>
            <tbody>
              <tr>
  @foreach ($phoenixoks  as $phoenixok )                <td> {{  $phoenixok   }}         </td>@endforeach
  @foreach ($phoenixperdidas as $phoenixperdida)        <td> {{  $phoenixperdida  }}    </td>@endforeach
  @foreach ($phoenixrecuperadas as $phoenixrecuperada)  <td> {{  $phoenixrecuperada  }} </td>@endforeach
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>

  <script>
    var ctx = document.getElementById('phoenix1').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    data: [ {{  $phoenixok  }} , {{  $phoenixperdida  }} , {{  $phoenixrecuperada  }}],
    backgroundColor:
    ['rgba(54, 88, 100, 0.2)',
     'rgba(255, 99, 32, 0.2)',
     'rgba(255, 159, 64, 0.2)'],
    borderColor:
    ['rgba(54, 88, 100, 1)',
     'rgba(255, 99, 32, 1)',
     'rgba(255, 159, 64, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>
  <div class="col-sm-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Estado de revision Phoenix </h5>
       <canvas id="phoenix2" width="40" height="20" style="background-image: linear-gradient(#EAF2F8, #AAB7B8);"></canvas>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">Revisada</th>
            <th scope="col">No revisado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
  @foreach ($phoenixrevisadas as $phoenixrevisada)    <td> {{  $phoenixrevisada    }} </td>@endforeach
  @foreach ($phoenixnorevisadas as $phoenixnorevisada)<td> {{  $phoenixnorevisada  }} </td>@endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <script>
    var ctx = document.getElementById('phoenix2').getContext('2d');
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
    labels: ['no revisada', 'revisada'],
    datasets: [{
    label: 'Estado de revision',
    data: [ {{$phoenixrevisada}},{{$phoenixnorevisada}}],
    backgroundColor:
    ['rgba(255, 206, 99, 0.2)',
     'rgba(54, 88, 100, 0.2)'],
    borderColor:
    ['rgba(255, 206, 50, 1)',
     'rgba(54, 88, 100, 1)'],
    borderWidth: 5
    }]
    },
    options: {
    scales: {
    yAxes: [{
    ticks: {
    beginAtZero: true
    }
    }]
    }
    }
    });
    </script>


  {{--final grafico phoenix--}}


    <script src="{{asset('js/app.js')}}"></script>
    </body>
    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop
    @section('js')
<script>
Swal.fire(
'Estadisticas',
'Aqui veras todos los datos de la operacion',
'success'
)
</script>
<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';
        // Create download link element
        downloadLink = document.createElement("a");
        document.body.appendChild(downloadLink);
        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{

            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
            // Setting the file name
            downloadLink.download = filename;
            //triggering the function
            downloadLink.click();
        }
    }
</script>
@stop
@endsection
