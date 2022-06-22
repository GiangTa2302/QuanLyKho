<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Sản phẩm</strong></h1>
		</div>

		<div class="row">
			
			<div class="col-6"></div>
			<div class="col-3"></div>

			<!-- BEGIN primary modal -->
			<button type="button" class="btn btn-primary col-2 m-4" data-bs-toggle="modal" data-bs-target="#AddProductModel">
				<i class="align-middle" data-feather="plus-circle"></i>
				Thêm sản phẩm
			</button>
			
			<div class="modal fade" id="AddProductModel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="col-md-12">
							<div class="card">
								<ul class="alert alert_warning d-none" id="save_errorList"></ul>
								<div class="card-header">
									<h5 class="card-title">Sản phẩm</h5>
									<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
								</div>
								<div class="card-body">
									<form id="AddProductForm" enctype="multipart/form-data" >
										@csrf
										<div class="mb-3">
											<label class="form-label" for="tenSP">Tên sản phẩm</label>
											<input type="text" class="form-control" id="tenSP" name="tenSP" >
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="DVT">Đơn vị tính</label>
												<input type="text" class="form-control" id="DVT" name="DVT">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="mauSac">Màu sắc</label>
												<input type="text" class="form-control" id="mauSac" name="mauSac">
											</div>
										</div>
										
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="tgBaoQuan">Hạn sử dụng</label>
												<input type="date" class="form-control" id="tgBaoQuan" name="tgBaoQuan">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="image">Ảnh</label>
												<input type="file" class="form-control" id="image" name="image">
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="phone">Giá nhập</label>
												<input type="text" class="form-control" id="giaNhap" name="giaNhap">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="giaXuat">Giá xuất</label>
												<input type="text" class="form-control" id="giaXuat" name="giaXuat">
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="description">Mô tả</label>
												<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="giaXuat">Danh mục</label>
												<select class="form-select" name="category_id" id="category_id" >
													@foreach ($cats as $cat)
													<option value="{{$cat->id}}">{{$cat->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="mb-3 text-center">
											<button type="submit" class="btn btn-primary text-center">Thêm mới</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END primary modal -->

			<div class="row justify-content-center mt-3 mb-2">
				<div class="col-auto">
					<nav class="nav btn-group">
						<a href="#monthly" class="btn btn-outline-primary active" data-bs-toggle="tab">Sản phẩm</a>
						<a href="#annual" class="btn btn-outline-primary" data-bs-toggle="tab">Sản phẩm hết hạn</a>
					</nav>
				</div>
			</div>
			<div class="tab-content">
				<div class="col-12 tab-pane fade show active" id="monthly">
					<div class="card">
						<div class="card-body">
							<table id="datatables-buttons" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>STT</th>
										<th>Tên sản phẩm</th>
										<th>Ảnh</th>
										<th>Màu sắc</th>
										<th>Đơn vị tính</th>
										<th>Giá Nhập</th>
										<th>Giá Xuất</th>
										<th>Số lượng</th>
										<th>Hạn sử dụng</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($pros1))
										@php
											$i = 1;
										@endphp
										@foreach ($pros1 as $pro)
										<tr id="pid{{$pro->id}}">
											<td>{{$i++}}</td>
											<td>{{$pro->tenSP}}</td>
											<td>
												<img src="{{asset('storage/products/'.$pro->image)}}" alt="" width="50px" height="50px">
											</td>
											<td>{{$pro->mauSac}}</td>
											<td>{{$pro->DVT}}</td>
											<td>
												@php
													echo number_format($pro->giaNhap).'đ';
												@endphp
											</td>
											<td>
												@php
													echo number_format($pro->giaXuat).'đ';
												@endphp
											</td>
											<td>{{$pro->quantity}}</td>
											<td>
												@php
													echo date('d-m-Y', strtotime($pro->tgBaoQuan));
												@endphp
											</td>
											<td>
												@php
													$id = $pro->id;
												@endphp
												<a href="#" onclick="updatePro({{$id}})" data-bs-toggle="modal" data-bs-target="#EditProductModel{{$id}}">
													<i class="align-middle" data-feather="edit-2"></i>
												</a>
												<div class="modal fade" id="EditProductModel{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="col-md-12">
																<div class="card">
																	<div class="card-header">
																		<h5 class="card-title">Sản phẩm</h5>
																		<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																	</div>
																	<div class="card-body">
																		<form id="EditProductForm{{$id}}" enctype="multipart/form-data">
																			@csrf
																			<input type="hidden" name="id" value="{{$pro->id}}">
																			<div class="mb-3">
																				<label class="form-label" for="tenSP">Tên sản phẩm</label>
																				<input type="text" class="form-control" id="edit_tenSP" name="tenSP" value="{{$pro->tenSP}}">
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="DVT">Đơn vị tính</label>
																					<input type="text" class="form-control" id="edit_DVT" name="DVT" value="{{$pro->DVT}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="mauSac">Màu sắc</label>
																					<input type="text" class="form-control" id="edit_mauSac" name="mauSac" value="{{$pro->mauSac}}">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="tgBaoQuan">Hạn sử dụng</label>
																					@php
																						$time = date('Y-m-d', strtotime($pro->tgBaoQuan));
																					@endphp
																					<input type="date" class="form-control" id="edit_tgBaoQuan" name="tgBaoQuan" value="{{$time}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="image">Ảnh</label>
																					<input type="file" class="form-control" name="image" value="{{$pro->image}}">
																				</div>
																				<div id="edit_image" class="img-fluid">
																					<img src="{{asset('storage/products/'.$pro->image)}}" alt="" width="50px" height="50px">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="giaNhap">Giá nhập</label>
																					<input type="text" class="form-control" id="edit_giaNhap" name="giaNhap" value="{{$pro->giaNhap}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="giaXuat">Giá xuất</label>
																					<input type="text" class="form-control" id="edit_giaXuat" name="giaXuat" value="{{$pro->giaXuat}}">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="description">Mô tả</label>
																					<textarea name="description" id="edit_description" cols="30" rows="10" class="form-control" >{{$pro->description}}</textarea>
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="category_id">Danh mục</label>
																					<select class="form-select" name="category_id" id="edit_category_id" >
																						@foreach ($cats as $cat)
																						<option value="{{$cat->id}}" 
																						@php
																							echo ($cat->id == $pro->category_id) ? 'selected' : ''
																						@endphp >{{$cat->name}}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<div class="mb-3 text-center">
																				<button type="submit" class="btn btn-primary text-center">Cập nhật</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<a href="javascript:void(0)" onclick="deletePro({{$id}})" class="deleteIcon">
													<i class="align-middle text-danger" data-feather="trash-2"></i>
												</a>
											</td>
										</tr>
										@endforeach
									@else
										<tr>
											<td colspan="5">Không có nhân viên</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-12 tab-pane fade" id="annual">
					<div class="card">
						<div class="card-body">
							<table id="datatables-buttons" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>STT</th>
										<th>Tên sản phẩm</th>
										<th>Ảnh</th>
										<th>Màu sắc</th>
										<th>Đơn vị tính</th>
										<th>Giá Nhập</th>
										<th>Giá Xuất</th>
										<th>Số lượng</th>
										<th>Hạn sử dụng</th>
										<th>Hành động</th>
									</tr>
								</thead>
								<tbody>
									@if(!empty($pros2))
										@php
											$i = 1;
										@endphp
										@foreach ($pros2 as $pro)
										<tr id="pid{{$pro->id}}">
											<td>{{$i++}}</td>
											<td>{{$pro->tenSP}}</td>
											<td>
												<img src="{{asset('storage/products/'.$pro->image)}}" alt="" width="50px" height="50px">
											</td>
											<td>{{$pro->mauSac}}</td>
											<td>{{$pro->DVT}}</td>
											<td>
												@php
													echo number_format($pro->giaNhap).'đ';
												@endphp
											</td>
											<td>
												@php
													echo number_format($pro->giaXuat).'đ';
												@endphp
											</td>
											<td>{{$pro->quantity}}</td>
											<td>
												@php
													echo date('d-m-Y', strtotime($pro->tgBaoQuan));
												@endphp
											</td>
											<td>
												@php
													$id = $pro->id;
												@endphp
												<a href="#" onclick="updatePro({{$id}})" data-bs-toggle="modal" data-bs-target="#EditProductModel{{$id}}">
													<i class="align-middle" data-feather="edit-2"></i>
												</a>
												<div class="modal fade" id="EditProductModel{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="col-md-12">
																<div class="card">
																	<div class="card-header">
																		<h5 class="card-title">Sản phẩm</h5>
																		<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																	</div>
																	<div class="card-body">
																		<form id="EditProductForm{{$id}}" enctype="multipart/form-data">
																			@csrf
																			<input type="hidden" name="id" value="{{$pro->id}}">
																			<div class="mb-3">
																				<label class="form-label" for="tenSP">Tên sản phẩm</label>
																				<input type="text" class="form-control" id="edit_tenSP" name="tenSP" value="{{$pro->tenSP}}">
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="DVT">Đơn vị tính</label>
																					<input type="text" class="form-control" id="edit_DVT" name="DVT" value="{{$pro->DVT}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="mauSac">Màu sắc</label>
																					<input type="text" class="form-control" id="edit_mauSac" name="mauSac" value="{{$pro->mauSac}}">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="tgBaoQuan">Hạn sử dụng</label>
																					@php
																						$time = date('Y-m-d', strtotime($pro->tgBaoQuan));
																					@endphp
																					<input type="date" class="form-control" id="edit_tgBaoQuan" name="tgBaoQuan" value="{{$time}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="image">Ảnh</label>
																					<input type="file" class="form-control" name="image" value="{{$pro->image}}">
																				</div>
																				<div id="edit_image" class="img-fluid">
																					<img src="{{asset('storage/products/'.$pro->image)}}" alt="" width="50px" height="50px">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="giaNhap">Giá nhập</label>
																					<input type="text" class="form-control" id="edit_giaNhap" name="giaNhap" value="{{$pro->giaNhap}}">
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="giaXuat">Giá xuất</label>
																					<input type="text" class="form-control" id="edit_giaXuat" name="giaXuat" value="{{$pro->giaXuat}}">
																				</div>
																			</div>
																			<div class="row">
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="description">Mô tả</label>
																					<textarea name="description" id="edit_description" cols="30" rows="10" class="form-control" >{{$pro->description}}</textarea>
																				</div>
																				<div class="mb-3 col-md-6">
																					<label class="form-label" for="category_id">Danh mục</label>
																					<select class="form-select" name="category_id" id="edit_category_id" >
																						@foreach ($cats as $cat)
																						<option value="{{$cat->id}}" 
																						@php
																							echo ($cat->id == $pro->category_id) ? 'selected' : ''
																						@endphp >{{$cat->name}}</option>
																						@endforeach
																					</select>
																				</div>
																			</div>
																			<div class="mb-3 text-center">
																				<button type="submit" class="btn btn-primary text-center">Cập nhật</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<a href="javascript:void(0)" onclick="deletePro({{$id}})" class="deleteIcon">
													<i class="align-middle text-danger" data-feather="trash-2"></i>
												</a>
											</td>
										</tr>
										@endforeach
									@else
										<tr>
											<td colspan="10" style="text-align: center;">Không có sản phẩm nào</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>
</main>

<script>
	function updatePro(id){
		$('#EditProductForm'+id).submit(function(e){
			e.preventDefault();
			
			const formData = new FormData($('#EditProductForm'+id)[0]);
			
			$.ajax({
				url: "{{route('admin.updatePro')}}",
				method :"POST",
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				dataType: 'json',
				success: function(response){
					if(response.status == 200){
						$('#EditProductForm'+id)[0].reset();
						$('#EditProductModel'+id).modal('hide');
						location.reload();
						alert("Sửa sản phẩm thành công!");
					}
				}
			});
		});
	}
</script>

<script>
	$('#AddProductForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#AddProductForm')[0]);

		$.ajax({
			url: "{{route('admin.postPro')}}",
			method: "POST",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function(response){
				if(response.status == 200){
					$('#AddProductForm')[0].reset();
					$('#AddProductModel').modal('hide');
					location.reload();
					alert("Thêm sản phẩm mới thành công!");
				}
			}
		});
	});
</script>


<script>
	function deletePro(id){
		if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")){
			$.ajax({
				url:'san-pham/'+id,
				type:'DELETE',
				data:{
					_token: $("input[name=_token]").val()
				},
				success:function(response){
					alert(response.success);
					location.reload();
				}
			});
		}
	}
</script>

@include('admin.js.listProduct')