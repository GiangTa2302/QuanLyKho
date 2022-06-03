<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Đơn hàng xuất kho</strong></h1>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>Mã đơn hàng</th>
									<th>Ngày xuất</th>
									<th>Khách hàng</th>
									<th>Địa chỉ</th>
									<th>Tổng tiền</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($orders as $order)
									<tr>
										<td>{{$order->id}}</td>
										<td>{{$order->created_at}}</td>
										<td>{{$order->name}}</td>
										<td>{{$order->address}}, {{$order->provice}}, {{$order->city}}</td>
										<td>{{$order->total}}</td>
										<td>
											<a href="{{route('admin.xacnhan',['id'=>$order->id])}}">Xác nhận</a>
											<a href="{{route('admin.huy',['id'=>$order->id])}}">Hủy</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@include('admin.js.listProduct')