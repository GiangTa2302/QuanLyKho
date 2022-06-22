<main class="content">
	<div class="container-fluid p-0">

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle"><strong>Khách hàng</strong></h1>
		</div>

		<div class="row">
			
			<div class="col-6"></div>
			<div class="col-3"></div>

			<!-- BEGIN primary modal -->
			<button type="button" class="btn btn-primary col-2 m-4" data-bs-toggle="modal" data-bs-target="#AddCateModel">
				<i class="align-middle" data-feather="plus-circle"></i>
				Thêm danh mục
			</button>
			
			<div class="modal fade" id="AddCateModel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="col-md-12">
							<div class="card">
								<ul class="alert alert_warning d-none" id="save_errorList"></ul>
								<div class="card-header">
									<h5 class="card-title">Danh mục sản phẩm</h5>
									<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
								</div>
								<div class="card-body">
									<form id="AddCateForm" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="mb-3">
											<label class="form-label" for="name">Tên danh mục</label>
											<input type="text" class="form-control" id="name" name="name" >
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
									<th>Tên danh mục</th>
									<th>Hành động</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@if(!empty($cats))
									@foreach ($cats as $cat)
									<tr id="cid{{$cat->id}}">
										<td>{{$i++}}</td>
										<td>{{$cat->name}}</td>
										<td> 
											<a href="#" id="{{$cat->id}}" class="editIcon" data-bs-toggle="modal" data-bs-target="#EditCateModel">
												<i class="align-middle" data-feather="edit-2"></i>
											</a>
											<div class="modal fade" id="EditCateModel" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="col-md-12">
															<div class="card">
																<div class="card-header">
																	<h5 class="card-title">Danh mục sản phẩm</h5>
																	<h6 class="card-subtitle text-muted">Thông tin chi tiết</h6>
																</div>
																<div class="card-body">
																	<form id="EditCateForm" enctype="multipart/form-data">
																		@csrf
																		<input type="hidden" name="id" id="id">
																		<div class="mb-3">
																			<label class="form-label" for="name">Tên danh mục</label>
																			<input type="text" class="form-control" id="edit_name" name="name" >
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
											<a href="javascript:void(0)" onclick="deleteCate({{$cat->id}})" class="deleteIcon">
												<i class="align-middle text-danger" data-feather="trash-2"></i>
											</a>
										</td>
									</tr>
									@endforeach
								@else
									<tr>
										<td colspan="5" style="text-align: center">Không có danh mục</td>
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
			url: 'danh-muc/'+id,
			data: {
				id: id,
            	_token: '{{ csrf_token() }}'
			},
			success: function(response){
				$('#id').val(response.id);
				$('#edit_name').val(response.name);
			}
		})
	});

	//upload
	$('#EditCateForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#EditCateForm')[0]);
		
		$.ajax({
			url: "{{route('admin.updateCate')}}",
			method :"POST",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response){
				console.log(response);
				if(response.status == 200){
					$('#EditCateForm')[0].reset();
					$('#EditCateModel').modal('hide');
					location.reload();
					alert("Sửa danh mục thành công!");
				}
			}
		});
	});

	$('#AddCateForm').submit(function(e){
		e.preventDefault();
		const formData = new FormData($('#AddCateForm')[0]);
		$.ajax({
			url: "{{route('admin.postCate')}}",
			method: 'POST',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			success: function(response){
				if(response.status == 200){
					$('#AddCateForm')[0].reset();
					$('#AddCateModel').modal('hide');
					location.reload();
					alert("Thêm danh mục mới thành công!");
				}
			}
		});
	});
</script>


<script>
	function deleteCate(id){
		if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")){
			$.ajax({
				url:'danh-muc/'+id,
				type:'DELETE',
				data:{
					_token: $("input[name=_token]").val()
				},
				success:function(response){
					// $("#cid"+id).remove();
					alert(response.success);
					location.reload();
				}
			});
		}
	}
</script>

@include('admin.js.listProduct')