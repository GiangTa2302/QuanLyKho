<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Danh sách nhà cung cấp</strong></h1>
		</div>

		<div class="row">
			
			<div class="col-6"></div>
			<div class="col-3"></div>

			<!-- BEGIN primary modal -->
			{{-- <button type="button" class="btn btn-primary col-2 m-4" data-bs-toggle="modal" data-bs-target="#AddUserModel">
				<i class="align-middle" data-feather="plus-circle"></i>
				Thêm khách hàng
			</button>
			
			<div class="modal fade" id="AddUserModel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="col-md-12">
							<div class="card">
								<ul class="alert alert_warning d-none" id="save_errorList"></ul>
								<div class="card-header">
									<h5 class="card-title">Nhân viên kho</h5>
									<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
								</div>
								<div class="card-body">
									<form id="AddUserForm" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="mb-3">
											<label class="form-label" for="name">Họ tên</label>
											<input type="text" class="form-control" id="name" name="name" >
										</div>
										<div class="mb-3">
											<label class="form-label" for="inputAddress">Địa chỉ</label>
											<input type="text" class="form-control" id="address" name="address">
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="phone">Số điện thoại</label>
												<input type="text" class="form-control" id="phone" name="phone">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="image">Ảnh</label>
												<input type="file" class="form-control" id="image" name="image">
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label" for="gender">Giới tính</label>
												<select class="form-select" name="gender" id="gender" required>
													<option value="1">Nam</option>
													<option value="2">Nữ</option>
													<option value="3">Khác</option>
												</select>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label" for="dob">Năm sinh</label>
											<input type="number" class="form-control" id="dob" name="dob">
											</div>
										</div>
										<div class="mb-3 text-center">
											<button type="submit" class="btn btn-primary text-center">Thêm</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
			<!-- END primary modal -->

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>Tên nhà cung cấp</th>
									<th>Địa chỉ</th>
									<th>Số điện thoại</th>
									<th>Email</th>
									<th>Ảnh</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($users))
									@foreach ($users as $user)
									<tr id="uid{{$user->id}}">
										<td>{{$user->name}}</td>
										<td>{{$user->address}}</td>
										<td>{{$user->phone}}</td>
										<td>{{$user->email}}</td>
										<td>
											<img src="{{asset('storage/users/'.$user->image)}}" alt="" width="50px" height="50px">
										</td>
										<td> 
											<a href="#" id="{{$user->id}}" class="editIcon" data-bs-toggle="modal" data-bs-target="#EditUserModel">
												<i class="align-middle" data-feather="edit-2"></i>
											</a>
											<div class="modal fade" id="EditUserModel" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="col-md-12">
															<div class="card">
																<div class="card-header">
																	<h5 class="card-title">Nhà cung cấp</h5>
																	<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																</div>
																<div class="card-body">
																	<form id="EditUserForm" enctype="multipart/form-data">
																		@csrf
																		<input type="hidden" name="id" id="id">
																		<input type="hidden" name="user_image" id="user_image">
																		<div class="mb-3">
																			<label class="form-label" for="name">Họ tên</label>
																			<input type="text" class="form-control" id="edit_name" name="name" >
																		</div>
																		<div class="mb-3">
																			<label class="form-label" for="inputAddress">Địa chỉ</label>
																			<input type="text" class="form-control" id="edit_address" name="address">
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="phone">Số điện thoại</label>
																				<input type="text" class="form-control" id="edit_phone" name="phone">
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="image">Ảnh</label>
																				<input type="file" class="form-control" name="image">
																			</div>
																			<div class="mb-3" id="edit_image"></div>
																		</div>
																		
																		<div class="row">
																			<label class="form-label" for="email">Email</label>
																			<input type="email" class="form-control" id="edit_email" name="email">
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
											<a href="javascript:void(0)" onclick="deleteUser({{$user->id}})" class="deleteIcon">
												<i class="align-middle text-danger" data-feather="trash-2"></i>
											</a>
										</td>
									</tr>
									@endforeach
								@else
									<tr>
										<td colspan="5">Không nhà cung cấp</td>
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
			url: 'nha-cung-cap/'+id,
			data: {
				id: id,
            	_token: '{{ csrf_token() }}'
			},
			success: function(response){
				$('#id').val(response.id);
				$('#edit_name').val(response.name);
				$('#edit_address').val(response.address);
				$('#edit_phone').val(response.phone);
				$('#edit_email').val(response.email);
				$('#edit_image').html(`<img src="{{asset('storage/users/${response.image}')}}" alt="" width="50px" height="50px">`);
				$("#user_image").val(response.image);
				
			}
		})
	});

	//upload
	$('#EditUserForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#EditUserForm')[0]);
		
		$.ajax({
			url: "{{route('admin.updateUser')}}",
			method :"POST",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status == 200){
					$('#EditUserForm')[0].reset();
					$('#EditUserModel').modal('hide');
					location.reload();
					alert("Sửa nhà cung cấp thành công!");
				}
			}
		});
	});

	$('#AddUserForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#AddUserForm')[0]);
		$.ajax({
			url: "{{route('admin.postUser')}}",
			method: 'POST',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function(response){
				if(response.status == 200){
					$('#AddUserForm')[0].reset();
					$('#AddUserModel').modal('hide');
					location.reload();
					alert("Thêm nhà cung cấp mới thành công!");
				}

				
			}
		});
	});
</script>


<script>
	function deleteUser(id){
		if(confirm("Bạn có chắc chắn muốn xóa nhà cung cấp này không?")){
			$.ajax({
				url:'nha-cung-cap/'+id,
				type:'DELETE',
				data:{
					_token: $("input[name=_token]").val()
				},
				success:function(response){
					$("#uid"+id).remove();
					alert(response.success);
					location.reload();
				}
			});
		}
	}
</script>

@include('admin.js.listProduct')