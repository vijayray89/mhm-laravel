<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- All js include here -->
    <script src="{{asset('js/bootstrap.min.js')}}" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    <!-- all css include here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

</head>
<body>
    <div class="header">
        @section('header')
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="{{asset('images/logo.png')}}" alt="health meter" srcset=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                  
                   
                    <?php
                    var_dump(session()->has('logData'));
                    if (session()->has('logData')) { ?>
                         <li class="nav-item">
                            <a class="nav-link" href="dashboard">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list">Users</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Doctor Master</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="doctor">Manage Docters</a>
                            <!-- <a class="dropdown-item" href="#">Doctor List</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Manage Patient</a>
                           
                        </div>
                        </li>
                      
                        <li>
                             <a class="nav-link" href="logout">Logout</a>
                        </li>
                    <?php } else { ?>
                        
                        <li class="nav-item">
                        <a class="nav-link" href="/">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="create">Create Account</a>
                        </li> 
                        
                        <?php } ?>
                    
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form> -->
                </div>
            </div>
        </nav>
        @show
    </div>
    <div class="content">
        @section('content')
        <div class="container-fluid">
    
        </div>
        @show
    </div>
    <div class="footer">
        @section('footer')
         <!-- Remove the container if you want to extend the Footer to full width. -->
                <div class="container-fluid footer-login">

                <!-- Footer -->
                <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
             

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)" > © 2022 Copyright:
                    <a class="text-white" href="https://www.myhealthmeter.com/">MHM</a>
                </div>
                <!-- Copyright -->
                </footer>
                <!-- Footer -->

                </div>
                <!-- End of .container -->
        @show
    </div>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        $("document").ready(function(){

            // hide alert box globaly
            setTimeout(function(){
            $("div.alert").remove();
            }, 5000 ); // 5 secs


    
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Work',     11],
                    ['Eat',      2],
                    ['Commute',  2],
                    ['Watch TV', 2],
                    ['Sleep',    7]
                    ]);

                    var options = {
                    title: 'Male Vs Female'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }


                google.charts.load("current", {packages:['corechart']});
                google.charts.setOnLoadCallback(barChart);
                function barChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Jan-22", "Density", { role: "style" } ],
                    ["Feb-22", 8.94, "#b87333"],
                    ["March-22", 10.49, "silver"],
                    ["April-22", 19.30, "gold"],
                    ["May-22", 21.45, "color: #e5e4e2"],
                    ["Jun-22", 10.49, "silver"],
                    ["July-22", 19.30, "gold"],
                    ["August-22", 21.45, "color: #e5e4e2"]
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                                { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                2]);

                var options = {
                    title: "Density of Precious Metals, in g/cm^3",
                    width: 900,
                    height: 500,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(view, options);
            }
  

        });

       $(document).on('click','.btn-cancel',function(){
            $('.modal').modal('hide');
       });
    </script>
</body>
</html>