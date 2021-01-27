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
                  </tr>
                </thead>
                <tbody>
@foreach ($countPortases as $countPortas)  <td> {{  $countPortas  }} </td>@endforeach
@foreach ($countupgrades as $countupgrade) <td> {{  $countupgrade }} </td>@endforeach
@foreach ($countfijas as $countfija)       <td> {{  $countfija    }} </td>@endforeach
@foreach ($countpreposts as $countprepost) <td> {{  $countprepost }} </td>@endforeach
@foreach ($countPortadigitalses as $countPortadigital)  <td> {{  $countPortadigital  }} </td>@endforeach
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

<script>
    var ctx = document.getElementById('myChartpdigital1').getContext('2d');
    var myLineChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
    labels: ['ok', 'Perdida', 'Recuperdada'],
    datasets: [{
    data: [ {{  $okPortadigital  }} , {{  $perdidaPortadigital  }} , {{  $recuperadaPortadigital  }}],
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
var ctx = document.getElementById('myChart1').getContext('2d');
var myLineChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ['Portabilidad', 'Upgrade', 'Fija', 'Prepost','Porta Digital'],
datasets: [{
label: 'Cantidad de ventas',
data: [{{  $countPortas }},{{  $countupgrade }},{{  $countfija }},{{  $countprepost }},{{  $countPortadigital }}],
backgroundColor:
['rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 206, 86, 0.2)',
'rgba(255, 159, 64, 0.2)',
'rgba(255, 149, 79, 0.2)'
],
borderColor:
['rgba(255, 99, 132, 1)',
 'rgba(54, 162, 235, 1)',
 'rgba(255, 206, 86, 1)',
 'rgba(255, 159, 64, 1)',
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
{{--
<script type="text/javascript">
    //<![CDATA[
    // Nieve en el blog
    /** @license

    */
    var snowStorm=function(e,d){function g(a,d){isNaN(d)&&(d=0);return Math.random()*a+d}function o(){e.setTimeout(function(){a.start(true)},20);a.events.remove(i?d:e,"mousemove",o)}function r(){if(!a.excludeMobile||!s)a.freezeOnBlur?a.events.add(i?d:e,"mousemove",o):o();a.events.remove(e,"load",r)}this.flakesMax=128;this.flakesMaxActive=120;this.animationInterval=40;this.excludeMobile=true;this.flakeBottom=null;this.followMouse=true;this.snowColor="#ffffff";this.snowCharacter="&bull;";this.snowStick=true;
    this.targetElement=null;this.useMeltEffect=true;this.usePositionFixed=this.useTwinkleEffect=false;this.freezeOnBlur=true;this.flakeRightOffset=this.flakeLeftOffset=0;this.flakeHeight=this.flakeWidth=8;this.vMaxX=5;this.vMaxY=4;this.zIndex=0;var a=this,y=this,i=navigator.userAgent.match(/msie/i),z=navigator.userAgent.match(/msie 6/i),A=navigator.appVersion.match(/windows 98/i),s=navigator.userAgent.match(/mobile/i),B=i&&d.compatMode==="BackCompat",t=s||B||z,h=null,k=null,j=null,m=null,u=null,v=null,



    p=1,n=false,q;a:{try{d.createElement("div").style.opacity="0.5"}catch(C){q=false;break a}q=true}var w=false,x=d.createDocumentFragment();this.timers=[];this.flakes=[];this.active=this.disabled=false;this.meltFrameCount=20;this.meltFrames=[];this.events=function(){function a(b){var b=f.call(b),c=b.length;l?(b[1]="on"+b[1],c>3&&b.pop()):c===3&&b.push(false);return b}function d(a,c){var e=a.shift(),f=[b[c]];if(l)e[f](a[0],a[1]);else e[f].apply(e,a)}var l=!e.addEventListener&&e.attachEvent,f=Array.prototype.slice,
    b={add:l?"attachEvent":"addEventListener",remove:l?"detachEvent":"removeEventListener"};return{add:function(){d(a(arguments),"add")},remove:function(){d(a(arguments),"remove")}}}();this.randomizeWind=function(){var c;c=g(a.vMaxX,0.2);u=parseInt(g(2),10)===1?c*-1:c;v=g(a.vMaxY,0.2);if(this.flakes)for(c=0;c<this.flakes.length;c++)this.flakes[c].active&&this.flakes[c].setVelocities()};this.scrollHandler=function(){var c;m=a.flakeBottom?0:parseInt(e.scrollY||d.documentElement.scrollTop||d.body.scrollTop,
    10);isNaN(m)&&(m=0);if(!n&&!a.flakeBottom&&a.flakes)for(c=a.flakes.length;c--;)a.flakes[c].active===0&&a.flakes[c].stick()};this.resizeHandler=function(){e.innerWidth||e.innerHeight?(h=e.innerWidth-(!i?16:16)-a.flakeRightOffset,j=a.flakeBottom?a.flakeBottom:e.innerHeight):(h=(d.documentElement.clientWidth||d.body.clientWidth||d.body.scrollWidth)-(!i?8:0)-a.flakeRightOffset,j=a.flakeBottom?a.flakeBottom:d.documentElement.clientHeight||d.body.clientHeight||d.body.scrollHeight);k=parseInt(h/2,10)};this.resizeHandlerAlt=
    function(){h=a.targetElement.offsetLeft+a.targetElement.offsetWidth-a.flakeRightOffset;j=a.flakeBottom?a.flakeBottom:a.targetElement.offsetTop+a.targetElement.offsetHeight;k=parseInt(h/2,10)};this.freeze=function(){var c;if(a.disabled)return false;else a.disabled=1;for(c=a.timers.length;c--;)clearInterval(a.timers[c])};this.resume=function(){if(a.disabled)a.disabled=0;else return false;a.timerInit()};this.toggleSnow=function(){a.flakes.length?(a.active=!a.active,a.active?(a.show(),a.resume()):(a.stop(),



    a.freeze())):a.start()};this.stop=function(){var c;this.freeze();for(c=this.flakes.length;c--;)this.flakes[c].o.style.display="none";a.events.remove(e,"scroll",a.scrollHandler);a.events.remove(e,"resize",a.resizeHandler);a.freezeOnBlur&&(i?(a.events.remove(d,"focusout",a.freeze),a.events.remove(d,"focusin",a.resume)):(a.events.remove(e,"blur",a.freeze),a.events.remove(e,"focus",a.resume)))};this.show=function(){var a;for(a=this.flakes.length;a--;)this.flakes[a].o.style.display="block"};this.SnowFlake=
    function(a,e,l,f){var b=this;this.type=e;this.x=l||parseInt(g(h-20),10);this.y=!isNaN(f)?f:-g(j)-12;this.vY=this.vX=null;this.vAmpTypes=[1,1.2,1.4,1.6,1.8];this.vAmp=this.vAmpTypes[this.type];this.melting=false;this.meltFrameCount=a.meltFrameCount;this.meltFrames=a.meltFrames;this.twinkleFrame=this.meltFrame=0;this.active=1;this.fontSize=10+this.type/5*10;this.o=d.createElement("div");this.o.innerHTML=a.snowCharacter;this.o.style.color=a.snowColor;this.o.style.position=n?"fixed":"absolute";this.o.style.width=
    a.flakeWidth+"px";this.o.style.height=a.flakeHeight+"px";this.o.style.fontFamily="arial,verdana";this.o.style.overflow="hidden";this.o.style.fontWeight="normal";this.o.style.zIndex=a.zIndex;x.appendChild(this.o);this.refresh=function(){if(isNaN(b.x)||isNaN(b.y))return false;b.o.style.left=b.x+"px";b.o.style.top=b.y+"px"};this.stick=function(){t||a.targetElement!==d.documentElement&&a.targetElement!==d.body?b.o.style.top=j+m-a.flakeHeight+"px":a.flakeBottom?b.o.style.top=a.flakeBottom+"px":(b.o.style.display=
    "none",b.o.style.top="auto",b.o.style.bottom="0px",b.o.style.position="fixed",b.o.style.display="block")};this.vCheck=function(){if(b.vX>=0&&b.vX<0.2)b.vX=0.2;else if(b.vX<0&&b.vX>-0.2)b.vX=-0.2;if(b.vY>=0&&b.vY<0.2)b.vY=0.2};this.move=function(){var d=b.vX*p;b.x+=d;b.y+=b.vY*b.vAmp;if(b.x>=h||h-b.x<a.flakeWidth)b.x=0;else if(d<0&&b.x-a.flakeLeftOffset<-a.flakeWidth)b.x=h-a.flakeWidth-1;b.refresh();if(j+m-b.y<a.flakeHeight)b.active=0,a.snowStick?b.stick():b.recycle();else{if(a.useMeltEffect&&b.active&&
    b.type<3&&!b.melting&&Math.random()>0.998)b.melting=true,b.melt();if(a.useTwinkleEffect)if(b.twinkleFrame)b.twinkleFrame--,b.o.style.visibility=b.twinkleFrame&&b.twinkleFrame%2===0?"hidden":"visible";else if(Math.random()>0.9)b.twinkleFrame=parseInt(Math.random()*20,10)}};this.animate=function(){b.move()};this.setVelocities=function(){b.vX=u+g(a.vMaxX*0.12,0.1);b.vY=v+g(a.vMaxY*0.12,0.1)};this.setOpacity=function(a,b){if(!q)return false;a.style.opacity=b};this.melt=function(){!a.useMeltEffect||!b.melting?
    b.recycle():b.meltFrame<b.meltFrameCount?(b.meltFrame++,b.setOpacity(b.o,b.meltFrames[b.meltFrame]),b.o.style.fontSize=b.fontSize-b.fontSize*(b.meltFrame/b.meltFrameCount)+"px",b.o.style.lineHeight=a.flakeHeight+2+a.flakeHeight*0.75*(b.meltFrame/b.meltFrameCount)+"px"):b.recycle()};this.recycle=function(){b.o.style.display="none";b.o.style.position=n?"fixed":"absolute";b.o.style.bottom="auto";b.setVelocities();b.vCheck();b.meltFrame=0;b.melting=false;b.setOpacity(b.o,1);b.o.style.padding="0px";b.o.style.margin=
    "0px";b.o.style.fontSize=b.fontSize+"px";b.o.style.lineHeight=a.flakeHeight+2+"px";b.o.style.textAlign="center";b.o.style.verticalAlign="baseline";b.x=parseInt(g(h-a.flakeWidth-20),10);b.y=parseInt(g(j)*-1,10)-a.flakeHeight;b.refresh();b.o.style.display="block";b.active=1};this.recycle();this.refresh()};this.snow=function(){for(var c=0,d=0,e=0,f=null,f=a.flakes.length;f--;)a.flakes[f].active===1?(a.flakes[f].move(),c++):a.flakes[f].active===0?d++:e++,a.flakes[f].melting&&a.flakes[f].melt();if(c<a.flakesMaxActive&&
    (f=a.flakes[parseInt(g(a.flakes.length),10)],f.active===0))f.melting=true};this.mouseMove=function(c){if(!a.followMouse)return true;c=parseInt(c.clientX,10);c<k?p=-2+c/k*2:(c-=k,p=c/k*2)};this.createSnow=function(c,d){var e;for(e=0;e<c;e++)if(a.flakes[a.flakes.length]=new a.SnowFlake(a,parseInt(g(6),10)),d||e>a.flakesMaxActive)a.flakes[a.flakes.length-1].active=-1;y.targetElement.appendChild(x)};this.timerInit=function(){a.timers=!A?[setInterval(a.snow,a.animationInterval)]:[setInterval(a.snow,a.animationInterval*
    3),setInterval(a.snow,a.animationInterval)]};this.init=function(){var c;for(c=0;c<a.meltFrameCount;c++)a.meltFrames.push(1-c/a.meltFrameCount);a.randomizeWind();a.createSnow(a.flakesMax);a.events.add(e,"resize",a.resizeHandler);a.events.add(e,"scroll",a.scrollHandler);a.freezeOnBlur&&(i?(a.events.add(d,"focusout",a.freeze),a.events.add(d,"focusin",a.resume)):(a.events.add(e,"blur",a.freeze),a.events.add(e,"focus",a.resume)));a.resizeHandler();a.scrollHandler();a.followMouse&&a.events.add(i?d:e,"mousemove",
    a.mouseMove);a.animationInterval=Math.max(20,a.animationInterval);a.timerInit()};this.start=function(c){if(w){if(c)return true}else w=true;if(typeof a.targetElement==="string"&&(c=a.targetElement,a.targetElement=d.getElementById(c),!a.targetElement))throw Error('Snowstorm: Unable to get targetElement "'+c+'"');if(!a.targetElement)a.targetElement=!i?d.documentElement?d.documentElement:d.body:d.body;if(a.targetElement!==d.documentElement&&a.targetElement!==d.body)a.resizeHandler=a.resizeHandlerAlt;



    a.resizeHandler();a.usePositionFixed=a.usePositionFixed&&!t;n=a.usePositionFixed;if(h&&j&&!a.disabled)a.init(),a.active=true};a.events.add(e,"load",r,false);return this}(window,document);
    //]]>
    </script>--}}
@stop
@endsection
