@extends('layouts.app')

@section('content')



<!-- <link href="../vendor/charts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 -->
    <!-- MetisMenu CSS -->
<!--     <link href="../vendor/charts/metisMenu/metisMenu.min.css" rel="stylesheet">
 -->
    <!-- Custom CSS -->
<!--     <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
 -->
    <!-- Morris Charts CSS -->
  <!--   <link href="../vendor/charts/morrisjs/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
 <!--    <link href="../vendor/charts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
 -->

   <!-- Morris -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>



    <div class="col-md-12">
        <h1>Analysis of a company</h1>
        <hr>


      <center>
            <div class="row">
                <div class="col-md-12">
                    <div id="bar-example1" style="height: 200px;"></div>
                    <center><p>MAX AVG Salaries(Departments)</p></center>
                </div>
            </div>
     </center>   

         

       <center>   
            <div class="row">
                <div class="col-md-12">
                    <div id="chart1" style="height: 200px;"></div>
                    <center><p>Total employees in each department</p></center>
                </div>
            </div>
</center>
            <br><br>
        
        
    </div>


<center>
            <div class="row">
                <div class="col-md-12">
                    <div id="bar-example" style="height: 200px;"></div>
                    <center><p>Top 4 Salaries</p></center>
                </div>
            </div>
     </center>   
       
<script type="text/javascript">
    $.get('http://localhost:8000/departments', function(data, status){
        console.log(data)
        Morris.Bar({
          element: 'chart1',
          data: data,
          xkey: 'dept_name',
          ykeys: ['emp'],
          hideHover: 'always',
          resize: true
        });

    });


</script>


<script type="text/javascript">
    Morris.Bar({
element: 'bar-example',
data: [
{ y: 'Hauke(Sales)', a: 101987 },
{ y: 'Hauke (Sales)', a: 99766 },
{ y: 'Peternela(Quality Management)', a: 93193 },
{ y: 'Margareta(Marketing)', a: 92165 }
],
xkey: 'y',
ykeys: ['a'],
labels: ['Calls'],
hideHover: 'always',
barColors: function (row, series, type) {
console.log("--> "+row.label, series, type);
if(row.label == "Hauke(Sales)") return "#AD1D28";
else if(row.label == "Hauke (Sales)") return "#DEBB27";
else if(row.label == "Peternela(Quality Management)") return "#fec04c";
else if(row.label == "Margareta(Marketing)") return "#1AB244";
}
});
</script>

<script type="text/javascript">
    Morris.Bar({
element: 'bar-example1',
data: [
{ y: 'Customer Service', a: 99987 },
{ y: 'Development', a: 140766 },
{ y: 'Finance', a: 150193 },
{ y: 'Marketing', a: 85165 }
],
xkey: 'y',
ykeys: ['a'],
labels: ['Calls'],
hideHover: 'always',
barColors: function (row, series, type) {
console.log("--> "+row.label, series, type);
if(row.label == "Customer Service") return "#4286f4";
else if(row.label == "Development") return "#f441f4";
else if(row.label == "Finance") return "#f44149";
else if(row.label == "Marketing") return "#41f443";
}
});
</script>






            
   
    </div>
</div>


<!--   <script src="../vendor/charts/jquery/jquery.min.js"></script>


    <script src="../vendor/charts/bootstrap/js/bootstrap.min.js"></script>

 
    <script src="../vendor/charts/metisMenu/metisMenu.min.js"></script>

  
    <script src="../vendor/charts/raphael/raphael.min.js"></script>
    <script src="../vendor/charts/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>


    <script src="../dist/js/sb-admin-2.js"></script> -->

  
@endsection