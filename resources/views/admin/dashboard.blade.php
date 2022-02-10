@extends('layouts.admin')

@section('content')

    <div class="d-flex row-flex justify-content-between">
        <div class="card text-center text-white bg-info mb-3" style="width: 18rem;">
            <div class="card-header">КНОПКИ</div>
            <div class="card-body">
                <h1 class="card-title"><strong>{{ DB::table('contact_profile')->count() }}</strong></h1>
            </div>
        </div>
        <div class="card text-center text-white bg-success mb-3" style="width: 18rem;">
            <div class="card-header">АКТИВ</div>
            <div class="card-body">
                <h1 class="card-title"><strong>{{\App\Models\User::where('status',1)->count()}}</strong></h1>
            </div>
        </div>

        <div class="card text-center text-white bg-secondary mb-3" style="width: 18rem;">
            <div class="card-header">ПАСИВ</div>
            <div class="card-body">
                <h1 class="card-title"><strong>{{\App\Models\User::where('status',0)->count()}}</strong></h1>
            </div>
        </div>

        <div class="card text-center text-white bg-warning mb-3" style="width: 18rem;">
            <div class="card-header">ПРОШИТ</div>
            <div class="card-body">
                <h1 class="card-title"><strong>{{\App\Models\User::where('status',2)->count()}}</strong></h1>
            </div>
        </div>

        <div class="card text-center text-white bg-primary mb-3" style="width: 18rem;">
            <div class="card-header">ВСЕГО</div>
            <div class="card-body">
                <h1 class="card-title"><strong>{{\App\Models\User::count()}}</strong></h1>
            </div>
        </div>
    </div>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <!-- Styles -->
        <style>
            #chartdiv {
                width: 100%;
                height: 500px;
            }

        </style>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

        <!-- Chart code -->
        <script>
            am4core.ready(function () {

// Themes begin
                am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
                var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
                chart.data = <?=$charts?>;

// Set input format for the dates
                chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

// Create axes
                var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "value";
                series.dataFields.dateX = "date";
                series.tooltipText = "{value}"
                series.strokeWidth = 2;
                series.minBulletDistance = 15;

// Drop-shaped tooltips
                series.tooltip.background.cornerRadius = 20;
                series.tooltip.background.strokeOpacity = 0;
                series.tooltip.pointerOrientation = "vertical";
                series.tooltip.label.minWidth = 40;
                series.tooltip.label.minHeight = 40;
                series.tooltip.label.textAlign = "middle";
                series.tooltip.label.textValign = "middle";

// Make bullets grow on hover
                var bullet = series.bullets.push(new am4charts.CircleBullet());
                bullet.circle.strokeWidth = 2;
                bullet.circle.radius = 4;
                bullet.circle.fill = am4core.color("#b6a8a8");

                var bullethover = bullet.states.create("hover");
                bullethover.properties.scale = 1.3;

// Make a panning cursor
                chart.cursor = new am4charts.XYCursor();
                chart.cursor.behavior = "panXY";
                chart.cursor.xAxis = dateAxis;
                chart.cursor.snapToSeries = series;

// Create vertical scrollbar and place it before the value axis
                chart.scrollbarY = new am4core.Scrollbar();
                chart.scrollbarY.parent = chart.leftAxesContainer;
                chart.scrollbarY.toBack();

// Create a horizontal scrollbar with previe and place it underneath the date axis
                chart.scrollbarX = new am4charts.XYChartScrollbar();
                chart.scrollbarX.series.push(series);
                chart.scrollbarX.parent = chart.bottomAxesContainer;

                dateAxis.start = 0.79;
                dateAxis.keepSelection = true;


            }); // end am4core.ready()
        </script>

        <!-- HTML -->
        <div id="chartdiv"></div>



@endsection
