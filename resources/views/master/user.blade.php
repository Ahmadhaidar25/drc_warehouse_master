@extends('layout.main')
@section('content')
<div class="container" style="margin-top: 150px;">
	<div class="card">
		
		<div class="card-body">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<br>
			<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
				Add
			</button>
			<br><br>
			<div class="table-responsive">
				<table class="table table-bordered" id="table">
					<thead>
						<tr>
							<td>Name</td>
							<td>Nik</td>
							<td>Gander</td>
							<td>Levels</td>
							<td>Status</td>
							<td>Action</td>
						</tr>
					</thead>

					<tbody>
						@foreach($data as $x)
						<tr>
							<td>{{$x->name}}</td>
							<td>{{$x->nik}}</td>
							@if($x->gander==1)
							<td>
								<div class="badge bg-primary text-white" style="width: 6rem;">
									Male
								</div>
							</td>
							@else
							<td>
								<div class="badge bg-danger text-white" style="width: 6rem;">
									Famale
								</div>
							</td>
							@endif
							@if($x->levels==1)
								<td>
									<div class="badge bg-secondary text-white" style="width: 6rem;">
										Admin
									</div>
								</td>
								@else
								<td>
									<div class="badge bg-warning text-white" style="width: 6rem;">
										Checker
									</div>
								</td>
								@endif


								@if($x->status==1)
									<td>
										<div class="badge bg-success text-white" style="width: 6rem;">
											Active
										</div>
									</td>
									@else
									<td>
										<div class="badge bg-danger text-white" style="width: 6rem;">
											Disable
										</div>
									</td>
									@endif

									<td>
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
											<a href="" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit-{{$x->id}}"><i class="bi bi-pencil-square"></i></a>




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


		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{url('/add/user')}}" method="post">
						<div class="modal-body">
							@csrf
							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name">
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Nik</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" name="nik">
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Gander</label>
								<div class="col-sm-10">
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gander" id="inlineRadio1" value="1">
										<label class="form-check-label" for="inlineRadio1">Male</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gander" id="inlineRadio2" value="2">
										<label class="form-check-label" for="inlineRadio2">Famale</label>
									</div>

								</div>
							</div>

							<div class="mb-3 row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<input type="hidden" name="levels" value="2">

							<div class="mb-3 row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<label class="switch">
										<input type="checkbox" name="status">
										<span class="slider round"></span>
									</label>
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>


		@foreach($data as $e)
		<div class="modal fade" id="edit-{{$e->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="{{url('/update/user/'.$e->id)}}" method="post">
						<div class="modal-body">
							@csrf
							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="name" value="{{$e->name}}">
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Nik</label>
								<div class="col-sm-10">
									<input type="number" class="form-control" name="nik" 
									value="{{$e->nik}}">
								</div>
							</div>

							<div class="mb-3 row">
								<label class="col-sm-2 col-form-label">Gander</label>
								<div class="col-sm-10">
									<div class="form-group">
										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="gander" id="male" value="1" {{ $e->gender =1 ? 'checked' : '' }}>
											<label class="form-check-label" for="inlineRadio1">Male</label>
										</div>

										<div class="form-check form-check-inline">
											<input class="form-check-input" type="radio" name="gander" id="female" value="2" {{ $e->gender == 2 ? 'checked' : '' }}>
											<label class="form-check-label" for="inlineRadio2">Famale</label>
										</div>
									</div>
								</div>
							</div>

							

							<div class="mb-3 row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<input type="hidden" name="levels" value="{{$e->levels}}">

							<div class="mb-3 row">
								<label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
								<div class="col-sm-10">
									<label class="switch">
										<input type="checkbox" name="status" {{ $e->status == 1 ? 'checked' : '' }}>
										<span class="slider round"></span>
									</label>
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endforeach
		@endsection