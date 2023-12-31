<?php
    session_start();
    include('../includes/dbconnection.php');
    include('../h_files.php');
    $o = $ProjectOperations->statistics_a();
?>
<!doctype html>
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include 'includes/title.php';?>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../assets/img/student-grade.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
        .bg-flat-color-1 {
  background: hsl(123, 54%, 74%);
}

.bg-flat-color-2 {
  background: #537A5A;
}

.bg-flat-color-3 {
  background: #7B506F;
}

.bg-flat-color-4 {
  background: #DD99BB;
}

.bg-flat-color-5 {
  background: #474A48;
}

.bg-flat-color-6 {
  background: #2C302E;
}
.bg-flat-color-7 {
  background: #2C302E;
}
.bg-flat-color-8 {
  background: #2C302E;
}
.bg-flat-color-9 {
  background: #2C302E;
}
.bg-flat-color-10 {
  background: #2C302E;
}
    </style>
</head>

<body>
    <?php $page="dashboard"; include 'includes/leftMenu.php';?>
    <div id="right-panel" class="right-panel">
        <?php include 'includes/header.php';?>
            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h3 align="center" class="dbd-username"><b><?php echo $_SESSION["firstName"]." ".$_SESSION["lastName"];?></b></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-2">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo $o["projects"][0]["total_projects"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL PROJECTS</p>
                                    </div>
                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-keypad"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-3">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo $o["tasks"][0]["total_tasks"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL TASKS</p>
                                    </div>
                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-network"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-5">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php $o["milestones"][0]["total_milestones"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL MILESTONES</p>
                                    </div>

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-users"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-1">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo $o["attachments"][0]["total_attachments"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL ATTACHMENTS</p>
                                    </div>

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-notebook"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-7">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo $o["filesharing"][0]["total_filesharing"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL FILES SHARED</p>
                                    </div>
                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-news-paper"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-8">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo $o["discussions"][0]["total_discussions"];?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">TOTAL DISCUSSIONS</p>
                                    </div>

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-culture"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-9">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo 0;?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Deleted</p>
                                    </div>

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-server"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="card text-white bg-flat-color-10">
                                <div class="card-body">
                                    <div class="card-left pt-1 float-left">
                                        <h3 class="mb-0 fw-r">
                                            <span class="currency float-left mr-1"></span>
                                            <span class="count"><?php echo 0;?></span>
                                        </h3>
                                        <p class="text-light mt-1 m-0">Blocked</p>
                                    </div>

                                    <div class="card-right float-right text-right">
                                        <i class="icon fade-5 icon-lg pe-7s-gleam"></i>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                            </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php include 'includes/footer.php';?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <!-- <script src="../assets/js/main.js"></script> -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../assets/js/init/weather-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/init/fullcalendar-init.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1, 32]], color: '#5c6bc0' },
                { label: "Tab visits", data: [[1, 33]], color: '#ef5350' },
                { label: "Mobile visits", data: [[1, 35]], color: '#66bb6a' }
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2 / 3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1, 65]], color: '#5b83de' },
                { label: "Channel Sell", data: [[1, 35]], color: '#00bfa5' }
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                }, grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2, 4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'), [{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
                {
                    series: {
                        lines: {
                            show: true,
                            lineColor: '#fff',
                            lineWidth: 2
                        },
                        points: {
                            show: true,
                            fill: true,
                            fillColor: "#ffffff",
                            symbol: "circle",
                            radius: 3
                        },
                        shadowSize: 0
                    },
                    points: {
                        show: true,
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        show: false
                    }
                });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    series: [
                        [0, 18000, 35000, 25000, 22000, 0],
                        [0, 33000, 15000, 20000, 15000, 300],
                        [0, 15000, 28000, 15000, 30000, 5000]
                    ]
                }, {
                    low: 0,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: true
                    }
                });

                chart.on('draw', function (data) {
                    if (data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById("TrafficChart");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                        datasets: [
                            {
                                label: "Visit",
                                borderColor: "rgba(4, 73, 203,.09)",
                                borderWidth: "1",
                                backgroundColor: "rgba(4, 73, 203,.5)",
                                data: [0, 2900, 5000, 3300, 6000, 3250, 0]
                            },
                            {
                                label: "Bounce",
                                borderColor: "rgba(245, 23, 66, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(245, 23, 66,.5)",
                                pointHighlightStroke: "rgba(245, 23, 66,.5)",
                                data: [0, 4200, 4500, 1600, 4200, 1500, 4000]
                            },
                            {
                                label: "Targeted",
                                borderColor: "rgba(40, 169, 46, 0.9)",
                                borderWidth: "1",
                                backgroundColor: "rgba(40, 169, 46, .5)",
                                pointHighlightStroke: "rgba(40, 169, 46,.5)",
                                data: [1000, 5200, 3600, 2600, 4200, 5300, 0]
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                });
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13], [8, 5], [10, 7], [12, 4], [14, 6], [16, 15], [18, 9], [20, 17], [22, 7], [24, 4], [26, 9], [28, 11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });

$('#menuToggle').on('click', function(event) {
  var windowWidth = $(window).width();   		 
  if (windowWidth<1010) { 
    $('body').removeClass('open'); 
    if (windowWidth<760){ 
      $('#left-panel').slideToggle(); 
    } else {
      $('#left-panel').toggleClass('open-menu');  
    } 
  } else {
    $('body').toggleClass('open');
    $('#left-panel').removeClass('open-menu');  
  } 
     
}); 

 
$(".menu-item-has-children.dropdown").each(function() {
  $(this).on('click', function() {
    var $temp_text = $(this).children('.dropdown-toggle').html();
    $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>'); 
  });
});
    </script>
</body>

</html>