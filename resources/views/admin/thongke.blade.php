<main class="content">
<div class="container-fluid p-0">

	<h1 class="h3 mb-3">Thống kế</h1>

	<div class="row">

		<div class="">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">Bar Chart</h5>
					<div class="row">
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

</div>
</main>

@include('admin.js.chartjs')