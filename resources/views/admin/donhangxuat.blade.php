<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Đơn hàng xuất kho</strong></h1>
		</div>

		<div class="row justify-content-center mt-3 mb-2">
			<div class="col-auto">
				<nav class="nav btn-group">
					<a href="#monthly" class="btn btn-outline-primary active" data-bs-toggle="tab">Đơn hàng Xuất</a>
					<a href="#annual" class="btn btn-outline-primary" data-bs-toggle="tab">Đơn hàng Hủy</a>
				</nav>
			</div>
		</div>
		<div class="tab-content">
			<div class="row tab-pane fade show active" id="monthly">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table id="datatables-buttons" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>STT</th>
										<th>Ngày xuất</th>
										<th>Khách hàng</th>
										<th>Địa chỉ</th>
										<th>Tổng tiền</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									@foreach ($orders as $order)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$order->created_at}}</td>
											<td>{{$order->name}}</td>
											<td>{{$order->address}}, {{$order->province}}, {{$order->city}}</td>
											<td>
												@php
													echo number_format($order->total).' đ';
												@endphp
											</td>
											<td>
												@php
													$id = $order->id;
													$stt = 1;
												@endphp
												<a href="#" data-bs-toggle="modal" data-bs-target="#ShowOrderModel{{$id}}">
													Chi tiết đơn
												</a>
												<div class="modal fade" id="ShowOrderModel{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
																				<label class="form-label" for="tenSP">Họ và tên: {{$order->name}}</label>
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
																					@if($order->id == $item->order_id)
																						<tr>
																							<td>{{$stt++}}</td>
																							<td>{{$item->tenSP}}</td>
																							<td>{{$item->DVT}}</td>
																							<td>{{$item->quantity}}</td>
																							<td>
																								@php
																									echo number_format($item->price).'đ';
																								@endphp
																							</td>
																							<td>
																								@php
																									echo number_format($item->quantity * $item->price).'đ';
																								@endphp
																							</td>
																						</tr>
																						@endif
																					@endforeach
																				</tbody>
																			</table>
																			<div class="mb-3">
																				<label class="form-label" for="tenSP">Tổng số tiền: @php
																							echo number_format($order->total).'đ';
																						@endphp
																				</label>
																			</div>
																			<div class="mb-3">
																				<label class="form-label">Trạng thái:
																					@if($order->is_payment == 0)
																					<span class="text-danger">Chưa thanh toán</span>
																					@else
																					<span class="text-success">Đã thanh toán</span>
																					@endif
																				</label>
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
																						<td>{{$order->tenNVK}}</td>
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
			<div class="row tab-pane fade" id="annual">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table id="datatables-buttons" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>STT</th>
										<th>Ngày xuất</th>
										<th>Khách hàng</th>
										<th>Địa chỉ</th>
										<th>Tổng tiền</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									@php
										$i = 1;
									@endphp
									@foreach ($destroy as $order)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$order->created_at}}</td>
											<td>{{$order->name}}</td>
											<td>{{$order->address}}, {{$order->province}}, {{$order->city}}</td>
											<td>
												@php
													echo number_format($order->total).' đ';
												@endphp
											</td>
											<td>
												@php
													$id = $order->id;
													$stt = 1;
												@endphp
												<a href="#" data-bs-toggle="modal" data-bs-target="#ShowOrderModel{{$id}}">
													Chi tiết đơn
												</a>
												<div class="modal fade" id="ShowOrderModel{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="col-md-12">
																<div class="card">
																	<div class="card-header">
																		<h5 class="card-title">PHIẾU HỦY XUẤT KHO</h5>
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
																				<label class="form-label" for="tenSP">Họ và tên: {{$order->name}}</label>
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
																					@foreach ($order_destroy as $item)
																					@if($order->id == $item->order_id)
																						<tr>
																							<td>{{$stt++}}</td>
																							<td>{{$item->tenSP}}</td>
																							<td>{{$item->DVT}}</td>
																							<td>{{$item->quantity}}</td>
																							<td>
																								@php
																									echo number_format($item->price).'đ';
																								@endphp
																							</td>
																							<td>
																								@php
																									echo number_format($item->quantity * $item->price).'đ';
																								@endphp
																							</td>
																						</tr>
																						@endif
																					@endforeach
																				</tbody>
																			</table>
																			<div class="mb-3">
																				<label class="form-label" for="tenSP">Tổng số tiền: @php
																							echo number_format($order->total).'đ';
																						@endphp
																				</label>
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
																						<td>{{$order->tenNVK}}</td>
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
		</div>
		
	</div>
</main>

@include('admin.js.listProduct')