<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Nhân viên kho</strong></h1>
		</div>

		<div class="row">
			
			<div class="col-6"></div>
			<div class="col-3"></div>

			<!-- BEGIN primary modal -->
			<button type="button" class="btn btn-primary col-2 m-4" data-bs-toggle="modal" data-bs-target="#AddEmployeeModel">
				<i class="align-middle" data-feather="plus-circle"></i>
				Thêm nhân viên kho
			</button>
			
			<div class="modal fade" id="AddEmployeeModel" tabindex="-1" role="dialog" aria-hidden="true">
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
									<form id="AddEmployeeForm" enctype="multipart/form-data">
										@csrf
										<div class="mb-3">
											<label class="form-label">Họ tên</label>
											<input type="text" class="form-control" id="name" name="name" >
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input type="email" class="form-control" id="email" name="email" >
										</div>
										<div class="mb-3">
											<label class="form-label">Địa chỉ</label>
											<input type="text" class="form-control" id="address" name="address">
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label">Số điện thoại</label>
												<input type="text" class="form-control" id="phone" name="phone">
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Ảnh</label>
												<input type="file" class="form-control" id="image" name="image">
											</div>
										</div>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label">Giới tính</label>
												<select class="form-select" name="gender" id="gender" required>
													<option value="1">Nam</option>
													<option value="2">Nữ</option>
													<option value="3">Khác</option>
												</select>
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Năm sinh</label>
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
			</div>
			<!-- END primary modal -->

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<table id="datatables-buttons" class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>STT</th>
									<th>Tên nhân viên</th>
									<th>Địa chỉ</th>
									<th>Số điện thoại</th>
									<th>Năm sinh</th>
									<th>Giới tính</th>
									<th>Ảnh</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								@php
									$stt = 1;
								@endphp
								@if(!empty($emps))
									@foreach ($emps as $emp)
									
									<tr id="eid{{$emp->id}}">
										<td>{{$stt++}}</td>
										<td>{{$emp->name}}</td>
										<td>{{$emp->address}}</td>
										<td>{{$emp->phone}}</td>
										<td>{{$emp->dob}}</td>
										<td>
											@if($emp->gender == 1)
												Nam
											@elseif($emp->gender == 2)
												Nữ
											@else Khác
											@endif
										</td>
										<td>
											<img src="{{asset('storage/users/'.$emp->image)}}" alt="" width="50px" height="50px">
										</td>
										<td>
											@php
												$id = $emp->id;
											@endphp
											<a href="#" onclick="updateEmp({{$id}})" class="editIcon" data-bs-toggle="modal" data-bs-target="#EditEmployeeModel{{$id}}">
												<i class="align-middle" data-feather="edit-2"></i>
											</a>
											<div class="modal fade" id="EditEmployeeModel{{$id}}" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="col-md-12">
															<div class="card">
																<div class="card-header">
																	<h5 class="card-title">Nhân viên kho</h5>
																	<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																</div>
																<div class="card-body">
																	<form id="EditEmployeeForm{{$id}}" enctype="multipart/form-data">
																		@csrf
																		<input type="hidden" name="id" value="{{$id}}">
																		<input type="hidden" name="password" id="password" value="{{$emp->password}}">
																		<div class="mb-3">
																			<label class="form-label" for="name">Họ tên</label>
																			<input type="text" class="form-control" id="edit_name" name="name" value="{{$emp->name}}">
																		</div>
																		<div class="mb-3">
																			<label class="form-label" for="name">Email</label>
																			<input type="email" class="form-control" id="edit_email" name="email" value="{{$emp->email}}">
																		</div>
																		<div class="mb-3">
																			<label class="form-label" for="inputAddress">Địa chỉ</label>
																			<input type="text" class="form-control" id="edit_address" name="address" value="{{$emp->address}}">
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="phone">Số điện thoại</label>
																				<input type="text" class="form-control" id="edit_phone" name="phone" value="{{$emp->phone}}">
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="image">Ảnh</label>
																				<input type="file" class="form-control" name="image" value="{{$emp->image}}">
																			</div>
																			<div class="mb-3" id="edit_image">
																				<img src="{{asset('storage/users/'.$emp->image)}}" alt="" width="50px" height="50px">
																			</div>
																		</div>
																		<div class="row">
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="gender">Giới tính</label>
																				<select class="form-select" name="gender" id="edit_gender" >
																					<option value="1" <?php echo ($emp->gender == 1) ? 'selected' : '' ?> >Nam</option>
																					<option value="2" <?php echo ($emp->gender == 2) ? 'selected' : '' ?> >Nữ</option>
																					<option value="3" <?php echo ($emp->gender == 3) ? 'selected' : '' ?> >Khác</option>
																				</select>
																			</div>
																			<div class="mb-3 col-md-6">
																				<label class="form-label" for="dob">Năm sinh</label>
																				<input type="number" class="form-control" id="edit_dob" name="dob" value="{{$emp->dob}}">
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
											<a href="javascript:void(0)" onclick="deleteEmp({{$id}})" class="deleteIcon">
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
	function updateEmp(id){
		$('#EditEmployeeForm'+id).submit(function(e){
			e.preventDefault();
			
			const formData = new FormData($('#EditEmployeeForm'+id)[0]);
			
			$.ajax({
				url: "{{route('admin.updateEmp')}}",
				method :"POST",
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				dataType: 'json',
				success: function(response){
					if(response.status == 200){
						$('#EditEmployeeForm'+id)[0].reset();
						$('#EditEmployeeModel'+id).modal('hide');
						location.reload();
						alert("Sửa nhân viên thành công!");
					}
				}
			});
		});
	}

</script>

<script>
	//upload
	$('#AddEmployeeForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#AddEmployeeForm')[0]);

		$.ajax({
			url: "{{route('admin.postEmp')}}",
			method: "POST",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function(response){
				if(response.status == 200){
					$('#AddEmployeeForm')[0].reset();
					$('#AddEmployeeModel').modal('hide');
					location.reload();
					alert("Thêm nhân viên kho mới thành công!");
				}
			}
		});
	});
</script>


<script>
	function deleteEmp(id){
		if(confirm("Bạn có chắc chắn muốn xóa nhân viên này không?")){
			$.ajax({
				url:'nhan-vien/'+id,
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