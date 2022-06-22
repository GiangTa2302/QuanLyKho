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
										<td>
											@php
												echo date('d-m-Y', strtotime($order->created_at));
											@endphp
										</td>
										<td>{{$order->name}}</td>
										<td>{{$order->address}}, {{$order->province}}, {{$order->city}}</td>
										<td>
											@php
												echo number_format($order->total).' đ';
											@endphp
										</td>
										<td>
											<a href="{{route('admin.xacnhan',['id'=>$order->id, 'role'=>Auth::user()->name])}}">Xác nhận</a>
											<a href="{{route('admin.huy',['id'=>$order->id, 'role'=>Auth::user()->name])}}">Hủy</a>
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