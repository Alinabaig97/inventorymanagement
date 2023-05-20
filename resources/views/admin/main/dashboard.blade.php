@extends('admin.main.layout.master')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Welcome {{ $admin->name }}</h1>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Total Customers :</h5>
                            <p class="card-text">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Total Products :</h5>
                            <p class="card-text">{{ $products }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders :</h5>
                            <p class="card-text">{{ $order }}</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <div class="card bg-info">
                            <div class="card-body">
                                <h5 class="card-title">Daily Sales :</h5>
                                <p class="card-text">{{ $sales }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5 pb-5">
                <div class="col-md-6">
                <div id="sales_material" style=" height: 500px;" class="mt-3"></div>
            </div>
            <div class="col-md-6">
                <div id="expense" style=" height: 500px;" class="mt-3"></div>
            </div>
        </div>
        </div>
    </main>

</div>
@endsection

<script>
    google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable({{ Js::from($result) }});
   
       var options = {
          'legend':'left',
          'title':'Sales',
          'is3D':true,
          'width':600,
          'height':500,
        }
  
        var chart = new google.charts.Bar(document.getElementById('sales_material'));
  
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    
</script>

<script>
    google.charts.load('expense', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable({{ Js::from($results) }});
   
       var options = {
          'legend':'left',
          'title':'Expense',
          'is3D':true,
          'width':600,
          'height':500,
        }
  
        var expenseChart = new google.charts.Bar(document.getElementById('expense'));
  
        expenseChart.draw(data, google.charts.Bar.convertOptions(options));
      }
        
</script>