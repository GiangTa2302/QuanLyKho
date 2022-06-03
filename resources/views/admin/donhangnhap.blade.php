<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Đơn hàng nhập kho</strong></h1>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>Mã đơn hàng</th>
									<th>Ngày nhập</th>
									<th>Nhà cung cấp</th>
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
										<td>{{$order->address}}, {{$order->province}}, {{$order->city}}</td>
										<td>{{$order->total}}</td>
										<td>
											<a href="#" data-bs-toggle="modal" data-bs-target="#ShowOrderModel">
												Chi tiết đơn
											</a>
											<div class="modal fade" id="ShowOrderModel" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="col-md-12">
															<div class="card">
																
																<div class="card-header">
																	<h5 class="card-title">PHIẾU XUẤT KHO</h5>
																	<h6>Thời gian: 
																		@php
																			$date = $order->updated_at;
																			echo date_format($date, "d/m/Y");
																		@endphp
																	</h6>
																	<h6>Mã số phiếu: {{$order->id}}</h6>
																</div>
																<div class="card-body">
																		<div class="mb-3">
																			<label class="form-label" for="tenSP">Nhà cung cấp: {{$order->name}}</label>
																		</div>
																		<div class="mb-3">
																			<label class="form-label" for="tenSP">Địa chỉ: {{$order->address}}, {{$order->province}}, {{$order->city}}</label>
																		</div>
																		<table id="datatables-buttons" class="table table-striped" style="width:100%">
																			<thead>
																				<tr>
																					<th>STT</th>
																					<th>Tên sản phẩm</th>
																					<th>Đơn vị tính</th>
																					<th>Số lượng</th>
																					<th>Đơn giá</th>
																					<th>Thành tiền</th>
																				</tr>
																			</thead>
																			<tbody>
																				@foreach ($order_items as $item)
																				{{-- @if($order->id == ) --}}
																					<tr>
																						<td>{{$item->id}}</td>
																						<td>{{$item->tenSP}}</td>
																						<td>{{$item->DVT}}</td>
																						<td>{{$item->quantity}}</td>
																						<td>{{$item->price}}</td>
																						<td>
																							@php
																								echo $item->quantity * $item->price
																							@endphp
																						</td>
																					</tr>
																				@endforeach
																			</tbody>
																		</table>
																		<div class="mb-3">
																			<label class="form-label" for="tenSP">Tổng số tiền: {{$order->total}}</label>
																		</div>
																		<table style="width:100%">
																			<thead>
																				<tr>
																					<th>Người lập phiếu</th>
																					<th>Người nhận hàng</th>
																					<th>Thủ kho</th>
																					<th>Kế toán trưởng</th>
																					<th>Giám đốc</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
																					<td></td>
																				</tr>
																			</tbody>
																		</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		{{-- <div class="row">
			<h1 class="h3 d-inline align-middle"><strong>Tổng tiền xuất: </strong> 400</h1>
		</div> --}}
	</div>
</main>

@include('admin.js.listProduct')