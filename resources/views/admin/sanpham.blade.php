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
									<form id="AddProductForm" method="POST" enctype="multipart/form-data" >
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
												<label class="form-label" for="phone">Giá cũ</label>
												<input type="text" class="form-control" id="regular_price" name="regular_price">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="sale_price">Giá mới</label>
												<input type="text" class="form-control" id="sale_price" name="sale_price">
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="description">Mô tả</label>
												<textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="sale_price">Danh mục</label>
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

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>Tên sản phẩm</th>
									<th>Ảnh</th>
									<th>Màu sắc</th>
									<th>Đơn vị tính</th>
									<th>Giá</th>
									<th>Hạn sử dụng</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($pros))
									@foreach ($pros as $pro)
									<tr id="pid{{$pro->id}}">
										<td>{{$pro->tenSP}}</td>
										<td>
											<img src="{{asset('storage/products/'.$pro->image)}}" alt="" width="50px" height="50px">
										</td>
										<td>{{$pro->mauSac}}</td>
										<td>{{$pro->DVT}}</td>
										<td>{{$pro->sale_price}}</td>
										<td>{{$pro->tgBaoQuan}}</td>
										<td>
											<a href="#" id="{{$pro->id}}" class="editIcon" data-bs-toggle="modal" data-bs-target="#EditProductModel">
												<i class="align-middle" data-feather="edit-2"></i>
											</a>
											<div class="modal fade" id="EditProductModel" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="col-md-12">
															<div class="card">
																<div class="card-header">
																	<h5 class="card-title">Nhân viên kho</h5>
																	<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																</div>
																<div class="card-body">
																	<form id="EditProductForm" method="POST" enctype="multipart/form-data">
																		@csrf
																		<input type="hidden" name="id" id="id">
																		<input type="hidden" name="pro_image" id="pro_image">
																		<div class="mb-3">
																			<label class="form-label" for="tenSP">Tên sản phẩm</label>
																			<input type="text" class="form-control" id="edit_tenSP" name="tenSP" >
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="DVT">Đơn vị tính</label>
																				<input type="text" class="form-control" id="edit_DVT" name="DVT">
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="mauSac">Màu sắc</label>
																				<input type="text" class="form-control" id="edit_mauSac" name="mauSac">
																			</div>
																		</div>
																		
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="tgBaoQuan">Hạn sử dụng</label>
																				<input type="date" class="form-control" id="edit_tgBaoQuan" name="tgBaoQuan">
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="image">Ảnh</label>
																				<input type="file" class="form-control" name="image">
																			</div>
																			<div id="edit_image" class="img-fluid"></div>
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="regular_price">Giá cũ</label>
																				<input type="text" class="form-control" id="edit_regular_price" name="regular_price">
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="sale_price">Giá mới</label>
																				<input type="text" class="form-control" id="edit_sale_price" name="sale_price">
																			</div>
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="description">Mô tả</label>
																				<textarea name="description" id="edit_description" cols="30" rows="10" class="form-control"></textarea>
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="category_id">Danh mục</label>
																				<select class="form-select" name="category_id" id="edit_category_id" >
																					@foreach ($cats as $cat)
																					<option value="{{$cat->id}}">{{$cat->name}}</option>
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
											<a href="javascript:void(0)" onclick="deletePro({{$pro->id}})" class="deleteIcon">
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
		</div>

	</div>
</main>

<script>

	//edit
	$(document).on('click', '.editIcon', function(e){
		e.preventDefault();

		let id = $(this).attr('id');
		
		$.ajax({
			url: 'san-pham/'+id,
			data: {
				id: id,
            	_token: '{{ csrf_token() }}'
			},
			success: function(response){
				$('#id').val(response.id);
				$('#edit_tenSP').val(response.tenSP);
				$('#edit_DVT').val(response.DVT);
				$('#edit_mauSac').val(response.mauSac);
				$('#edit_tgBaoQuan').val(response.tgBaoQuan);
				$('#edit_regular_price').val(response.regular_price);
				$('#edit_sale_price').val(response.sale_price);
				$('#edit_description').val(response.description);
				$('#edit_image').html(`<img src="{{asset('storage/products/${response.image}')}}" alt="" width="50px" height="50px">`);
				$("#pro_image").val(response.image);
				$("#edit_category_id").val(response.category_id);
			}
		})
	});

	//upload
	$('#EditProductForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#EditProductForm')[0]);
		
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
					$('#EditProductForm')[0].reset();
					$('#EditProductModel').modal('hide');
					location.reload();
					alert("Sửa sản phẩm thành công!");
				}
			}
		});
	});

	$('#AddProductForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#AddProductForm')[0]);
		$.ajax({
			url: "{{route('admin.postPro')}}",
			method: 'POST',
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
					$("#pid"+id).remove();
					alert(response.success);
					location.reload();
				}
			});
		}
	}
</script>

@include('admin.js.listProduct')