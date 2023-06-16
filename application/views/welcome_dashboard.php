<?
$this->load->view('header');?>
<style>

	@import url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/library.less");
@import url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/variables.less");
@body: #252830;

body {
	background-color: white;
	font-family: "Lato";
}

.container-fluid {
	.center;
	width: 100%;

	@media (max-width: 768px) {
		margin-bottom: 15px;
	}
}

.quick-stats {
	font-weight: 300;
	margin: 15px 0;
	position: relative;
	text-align: center;
	text-transform: uppercase;
	
	span {
		background-color: white;
		letter-spacing: 2px;
		padding: 0 10px;
		position: relative;
		z-index: 1;
	}
	
	&:after {
		background-color: @body;
		content: "";
		height: 1px;
		left: 0;
		position: absolute;
		top: 50%;
		width: 100%;
	}
}

.chart {
	color: white;
	text-align: left;
	
	canvas {
		margin-top: 5px;
	}
	
	@media (max-width: 768px) {
		+ .chart {
			margin-top: 15px;
		}
	}
}

.chart-inner {
	#mdShadows > .depth-2;
	transition: all .15s linear;
	border-radius: 3px;
	
	&:hover {
		#mdShadows > .depth-3;
	}
}

.header {
	.box-sizing;
	padding: 30px 15px;
	position: relative;
	
	&:after {
		background-color: white;
		bottom: 0;
		content: "";
		position: absolute;
		height: 1px;
		left: 0;
		width: 100%;
	}
}

.tagline {
	opacity: 0.75;
	text-transform: uppercase;
}

.count {
	display: inline-block;
	font-size: 32px;
	vertical-align: middle;
}

.velocity {
	display: inline-block;
	font-size: 12px;
	margin-left: 15px;
	vertical-align: middle;
	i {
		font-size: 10px;
	}
}

.stat-1 {
	background-color: #3EC1D3;
}
.stat-2 {
	background-color: #FF9A00;
}
.stat-3 {
	background-color: #FF165D;
}

// **********
// Material Design Shadows
#mdShadows {
    .depth-1(@color: black) {
        box-shadow: 0 1px 3px fade(@color, 12%), 
                    0 1px 2px fade(@color, 24%);
    }
    .depth-2(@color: black) {
        box-shadow: 0 3px 6px fade(@color, 16%), 
                    0 3px 6px fade(@color, 23%);
    }
    .depth-3(@color: black) {
        box-shadow: 0 10px 20px fade(@color, 19%), 
                    0 6px 6px fade(@color, 23%);
    }
    .depth-4(@color: black) {
        box-shadow: 0 14px 28px fade(@color, 25%), 
                    0 10px 10px fade(@color, 22%);
    }
    .depth-5(@color: black) {
        box-shadow: 0 19px 38px fade(@color, 30%), 
                    0 15px 12px fade(@color, 22%);
    }
}
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
<script type="text/javascript">
	
"use strict";
class Charts {
    constructor() {
        this.chartOptions = {
            scales: {
                xAxes: [{
                        display: false
                    }],
                yAxes: [{
                        display: false
                    }]
            },
            tooltips: {
                enabled: false
            },
            legend: {
                display: false
            }
        };
        this.initLineCurved();
    }
    initLineCurved() {
        var ctx_1 = $("#lineChart_1"), ctx_2 = $("#lineChart_2"), ctx_3 = $("#lineChart_3"), chartData_1 = {
            type: 'line',
            data: {
                labels: ["A", "B", "C", "D", "E", "F"],
                datasets: [
                    {
                        lineTension: 0.3,
                        borderColor: "rgb(255, 255, 255)",
                        backgroundColor: "rgba(255, 255, 255, 0.3)",
                        pointBorderWidth: 0,
                        pointRadius: 0,
                        data: [35, 59, 78, 60, 81, 65]
                    }
                ]
            },
            options: this.chartOptions
        }, chartData_2 = {
            type: 'line',
            data: {
                labels: ["A", "B", "C", "D", "E", "F"],
                datasets: [
                    {
                        lineTension: 0.3,
                        borderColor: "rgb(255, 255, 255)",
                        backgroundColor: "rgba(255, 255, 255, 0.3)",
                        pointBorderWidth: 0,
                        pointRadius: 0,
                        data: [35, 29, 78, 61, 81, 65]
                    }
                ]
            },
            options: this.chartOptions
        }, chartData_3 = {
            type: 'line',
            data: {
                labels: ["A", "B", "C", "D", "E", "F"],
                datasets: [
                    {
                        lineTension: 0.3,
                        borderColor: "rgb(255, 255, 255)",
                        backgroundColor: "rgba(255, 255, 255, 0.3)",
                        pointBorderWidth: 0,
                        pointRadius: 0,
                        data: [30, 34, 78, 60, 81, 95]
                    }
                ]
            },
            options: this.chartOptions
        }, myLineChart_1 = new Chart(ctx_1, chartData_1), myLineChart_2 = new Chart(ctx_2, chartData_2), myLineChart_3 = new Chart(ctx_3, chartData_3);
    }
    convertHex(hex, opacity) {
        hex = hex.replace('#', '');
        var r = parseInt(hex.substring(0, 2), 16);
        var g = parseInt(hex.substring(2, 4), 16);
        var b = parseInt(hex.substring(4, 6), 16);
        var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity / 100 + ')';
        return result;
    }
}
new Charts();


</script>


<div class="container-fluid">
  <div class="quick-stats"><span>Quick stats</span></div>
  <div class="row">
    <div class="chart col-md-4 col-sm-4 col-xs-12">
      <div class="chart-inner stat-1">
        <div class="header">
          <div class="tagline">page views</div>
          <div class="count">5,923</div>
          <div class="velocity">8%<i class="icon icon-arrow-up"></i></div>
        </div>
        <canvas id="lineChart_1" height="100"></canvas>
      </div>
    </div>
    <div class="chart col-md-4 col-sm-4 rounded hidden-xs">
      <div class="chart-inner stat-2">
        <div class="header">
          <div class="tagline">unique visitors</div>
          <div class="count">1,277</div>
          <div class="velocity">14%<i class="icon icon-arrow-up"></i></div>
        </div>
        <canvas id="lineChart_2" height="100"></canvas>
      </div>
    </div>
    <div class="chart col-md-4 col-sm-4 hidden-xs">
      <div class="chart-inner stat-3">
        <div class="header">
          <div class="tagline">active users</div>
          <div class="count">814</div>
          <div class="velocity">2.5%<i class="icon icon-arrow-down"></i></div>
        </div>
        <canvas id="lineChart_3" height="100"></canvas>
      </div>
    </div>
  </div>
</div>