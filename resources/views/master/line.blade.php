@extends('layout.main')
@section('content')
<div style="margin-top: 150px;">
	<h2 class="text-center">LIST LINE</h2>
	<div class="card">
		@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
		</div>
		@endif
		<div class="table-responsive">
			<div class="card-body">
				

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif


				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_customer">
					<i class="bi bi-plus-circle"></i>&nbsp;Add
				</button>
				<br><br>


				<table class="table table-bordered" id="table">

					<thead>
						<tr>
							<th class="text-center">NAME LINE</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						@foreach($data as $x)
						<tr>
							<td>{{$x->name_line}}</td>   
							<td>
								<div class="btn-group" role="group" aria-label="Basic mixed styles example">
									<a href="" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit-{{$x->id}}">
										<i class="bi bi-pencil-square"></i></a>

										<a href="{{url('/delete/line/'.$x->id)}}" class="btn btn-danger text-white hapus">
											<i class="bi bi-trash"></i>
										</a>


									</div>
								</td>

							</tr>
							@endforeach
						</tbody>

					</thead>

				</table>


			</div>
		</div>
	</div>





	<!--modal-->
	<div class="modal fade" id="add_customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Line</h5>

				</div>
				<form action="{{url('/create/line')}}" method="post">
					<div class="modal-body">
						@csrf
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">
								Name Line
							</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name_line">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--end modal-->

	@foreach($data as $p)
	<div class="modal fade" id="edit-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Line</h5>

				</div>
				<form action="{{url('/update/line/'.$p->id)}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="mb-3 row">
						<label for="inputPassword" class="col-sm-2 col-form-label">
							Name Line
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name_line" value="{{$p->name_line}}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	@endforeach
	@endsection