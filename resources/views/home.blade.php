@extends('adminlte::page')
@section('content')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<div class="container">
    <div class="pull-right">
        <div class="col-md-12">
            <div class="card">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<body input type = "time" onload="HoraActual(<?php echo date("H").", ".date("i").", ".date("s"); ?>)">
    <div id="contenedor_reloj"></div>
    <link rel="shortcut icon" href="home">
    <img src="\theme\images\movistar.jpg"  align= "center" height="90" width="150">
</body>
   <h1 align= "center">Dashboard</h1>
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ventas</h5>
               <canvas id="myChart2" width="400" height="400"></canvas>
                <table class="table">
                 <thead>
                  <tr>
                    <th scope="col">Portabilidad</th>
                    <th scope="col">Upgrade</th>
                    <th scope="col">Fija</th>
                    <th scope="col">Prepost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12</td>
                    <td>19</td>
                    <td>3</td>
                    <td>5</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Asistencia</h5>
               <canvas id="myChart4" width="400" height="400"></canvas>
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
                    <td>22</td>
                    <td>5</td>
                    <td>7</td>
                    <td>10</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Resultado de la revision</h5>
                 <canvas id="myChart5" width="400" height="400"></canvas>
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
                        <td>25</td>
                        <td>10</td>
                        <td>4</td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
<div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Estado de revision </h5>
               <canvas id="myChart3" width="400" height="400"></canvas>
               <table class="table">
                <thead>
                  <tr>
                    <th scope="col">revisda</th>
                    <th scope="col">no revisado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>19</td>
                    <td>12</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>

<div>



<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Portabilidad', 'Upgrade', 'Fija', 'Prepost'],
            datasets: [{
                label: 'Cantidad de ventas',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',

                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',

                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 2
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
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Portabilidad', 'Upgrade', 'Fija', 'Prepost'],
                datasets: [{
                    label: 'Cantidad de ventas',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',

                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',

                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
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
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['no revisada', 'revisada'],
                    datasets: [{
                        label: 'Estado de revision',
                        data: [12, 19,],
                        backgroundColor: [
,
                            'rgba(255, 206, 86, 0.2)',

                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [

                            'rgba(255, 206, 86, 1)',

                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
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
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Ingreso', 'Break', 'Almuerzo', 'Salida'],
                        datasets: [{
                            label: 'Agentes registados',
                            data: [22, 5, 7, 10, ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',

                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',

                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 2
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
                                label: 'Cantidad de ventas',
                                data: [25, 10, 4],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                   'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 2
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
                                labels: ['Portabilidad', 'Upgrade', 'Fija', 'Prepost'],
                                datasets: [{
                                    label: 'Cantidad de ventas',
                                    data: [12, 19, 3, 5, 2, 3],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',

                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',

                                        'rgba(255, 159, 64, 1)'
                                    ],
                                    borderWidth: 2
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
@stop
@endsection







