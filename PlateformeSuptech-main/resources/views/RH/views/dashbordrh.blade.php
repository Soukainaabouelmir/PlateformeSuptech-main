<!-- resources/views/RH/views/dashboardrh.blade.php -->

@extends('RH.layouts.navbarrh')

<style>
    .card {
        width:210px;
        border-radius: 15px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
body{
    background-color: rgb(0, 0, 0);
}
    .card:hover {
        transform: translateY(-5px);
    }

    .card-body {
        padding: 20px;
        text-align: center rgb(235, 245, 87) rgb(255, 255, 255);
        box-shadow: 0 8px 14px rgba(16, 16, 16, 0.1);
    }

    .card-title, .card-text {
        font-size: 24px;
        font-weight: bold;
    }

    .content {
        margin-left: 230px;
        margin-top: 100px;
        overflow: hidden;
    }
    canvas{
        padding: 20px;
        margin: 20px;
        background-color: rgb(255, 250, 250);
        box-shadow: 0 6px 12px rgba(16, 16, 16, 0.1);
    }
   
</style>


@section('contenu')
<body style="background-color: #f4f4f4;">
<div style="margin-left: 240px;margin-top:100px;">
<div class="container">
  
<div class="row mb-4">
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card text-white" style="background-color:rgb(255, 250, 250);">
            <div class="card-body" style="color: rgb(26, 131, 160)">
                <h5 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16" style="color: rgb(26, 131, 160);">
                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                        <path d="M4.176 9.032a.5.5 0 0 1-.656.327l-.5 1.7a.5.5 0 0 1 .294.605l4.5 1.8a.5.5 0 0 1 .372 0l4.5-1.8a.5.5 0 0 1 .294-.605l-.5-1.7a.5.5 0 0 1-.656-.327L8 10.466z"/>
                    </svg>&nbsp;Étudiants
                </h5>
                <p class="card-text">{{ $etudiantsCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card text-white" style="background-color:rgb(255, 250, 250);">
            <div class="card-body">
                <h5 class="card-title" style="color:rgb(71, 0, 85); ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16" style="color:rgb(71, 0, 85);">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>&nbsp;Enseignant
                </h5>
                <p class="card-text" style="color:rgb(71, 0, 85);">{{ $enseignantsCount }}</p>
            </div>
        </div>
    </div>
  
    
    
    
    
    <div class="col-lg-3 col-md-6 mb-3">
        <div class="card text-white" style="background-color:rgb(255, 250, 250);">
            <div class="card-body" style="color:rgb(174, 6, 109)">
                <h5 class="card-title">Personnel</h5>
                <p class="card-text" style="color:rgb(174, 6, 109)" >{{ $personnelCount }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->


<div class="row">
    
    
   
    <div class="col-md-12">
        <canvas id="lineChart" width="400" height="400"></canvas>

    </div>

    
    
  


        <div class="col-md-6">
            <canvas id="demandessChart" width="800" height="400"></canvas></div>
        
    
   
   
    
</div></div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel@1.0.3"></script>





<script>
    document.addEventListener('DOMContentLoaded', function () {
        var labels = @json($labels);
        var datass = @json($datass);

        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre',
                    data: datass,
                    backgroundColor: 'rgb(174, 6, 109)',
                    borderColor: 'rgb(174, 6, 109)',
                    borderWidth: 1,
                    barThickness: 50, // Définir la largeur des barres en pixels
                    fill: false // Assure que la zone sous la ligne n'est pas remplie
                }]
            },
            options: {
                layout: {
                    padding: {
                        top: 10,
                        bottom: 10,
                        left: 10,
                        right: 10
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre'
                        },
                        ticks: {
                            min: 0,
                            max: 100 // Ajustez selon vos données
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Catégorie'
                        }
                    }
                }
            }
        });
    });
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    var data = @json($data);

    function createDoughnutChart(ctx, labels, data, ville) {
        // Calculate total students count for the center label
        var totalStudents = data.reduce((sum, value) => sum + value, 0);

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre d\'étudiantes',
                    data: data,
                    backgroundColor: [
                        'rgb(174, 6, 109)',
                        'rgb(57, 102, 194)',
                        'rgb(3, 69, 47)',
                        ' rgb(103, 75, 6)',
                        'rgb(8, 8, 133)',
                        'rgb(235, 245, 87)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgb(235, 245, 87)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Nombre d\'Étudiantes par Filière - ' + ville
                    },
                    datalabels: {
                        color: 'rgb(255, 255, 255)',
                        formatter: (value, ctx) => {
                            return value;
                        }
                    },
                    doughnutlabel: {
                        labels: [
                            {
                                text: totalStudents,
                                font: {
                                    size: 20,
                                    weight: 'bold'
                                }
                            },
                            {
                                text: 'Total',
                                font: {
                                    size: 12
                                }
                            }
                        ]
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    }

    var ctxEssaouira = document.getElementById('doughnutChartEssaouira').getContext('2d');
    if (ctxEssaouira) {
        var essaouiraData = data['ESSAOUIRA'];
        var essaouiraLabels = [];
        var essaouiraCounts = [];
        for (var i = 0; i < essaouiraData.length; i++) {
            essaouiraLabels.push(essaouiraData[i].label);
            essaouiraCounts.push(essaouiraData[i].count);
        }
        createDoughnutChart(ctxEssaouira, essaouiraLabels, essaouiraCounts, 'ESSAOUIRA');
    }

    var ctxMohammadia = document.getElementById('doughnutChartMohammadia').getContext('2d');
    if (ctxMohammadia) {
        var mohammadiaData = data['MOHAMMEDIA'];
        var mohammadiaLabels = [];
        var mohammadiaCounts = [];
        for (var i = 0; i < mohammadiaData.length; i++) {
            mohammadiaLabels.push(mohammadiaData[i].label);
            mohammadiaCounts.push(mohammadiaData[i].count);
        }
        createDoughnutChart(ctxMohammadia, mohammadiaLabels, mohammadiaCounts, 'MOHAMMEDIA');
    }
});
</script>





</body>

@endsection