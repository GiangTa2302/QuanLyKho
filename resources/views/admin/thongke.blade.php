<main class="content">
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Thống kê</h1>

	<div class="row">

		<div class="">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Biểu đồ hình cột</h5>
					<div class="row justify-content-center">
						<div class="bg-primary col-1" style="margin:3px 20px;"></div> Nhập kho
						<div class="col-2"></div>
						<div class="bg-secondary col-1" style="margin:3px 20px;"></div> Xuất kho
					</div>
					
				</div>
				<div class="card-body"> 
					<div class="chart">
						<canvas id="chartjs-bar"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div>
		@php
			$i = 1;
		@endphp
		@foreach ($chart as $item)
			<input type="hidden" id="n{{$i++}}" value="{{$item->tongN}}">
		@endforeach
	</div>
	<div>
		@php
			$i = 1;
		@endphp
		@foreach ($chart as $item)
			<input type="hidden" id="x{{$i++}}" value="{{$item->tongX}}">
		@endforeach
	</div>
</div>
</main>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Bar chart
		new Chart(document.getElementById("chartjs-bar"), {
			type: "bar",
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Số lượng",
					backgroundColor: window.theme.primary,
					borderColor: window.theme.primary,
					hoverBackgroundColor: window.theme.primary,
					hoverBorderColor: window.theme.primary,
					data: [
						$('#n1').val(),
                        $('#n2').val(),
                        $('#n3').val(),
                        $('#n4').val(),
                        $('#n5').val(),
                        $('#n6').val(),
                        $('#n7').val(),
                        $('#n8').val(),
                        $('#n9').val(),
                        $('#n10').val(),
                        $('#n11').val(),
                        $('#n12').val()
					],
					barPercentage: .75,
					categoryPercentage: .5
				}, {
					label: "Số lượng",
					backgroundColor: "gray",
					borderColor: "#dee2e6",
					hoverBackgroundColor: "#dee2e6",
					hoverBorderColor: "#dee2e6",
					data: [
						$('#x1').val(),
                        $('#x2').val(),
                        $('#x3').val(),
                        $('#x4').val(),
                        $('#x5').val(),
                        $('#x6').val(),
                        $('#x7').val(),
                        $('#x8').val(),
                        $('#x9').val(),
                        $('#x10').val(),
                        $('#x11').val(),
                        $('#x12').val()
					],
					barPercentage: .75,
					categoryPercentage: .5
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				scales: {
					yAxes: [{
						gridLines: {
							display: false
						},
						stacked: false,
						ticks: {
							stepSize: 20
						}
					}],
					xAxes: [{
						stacked: false,
						gridLines: {
							color: "transparent"
						}
					}]
				}
			}
		});
	});
</script>
