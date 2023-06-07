@extends('layout.main')
@section('content')

<div class="card" style="margin-top: 150px;">
	<div class="table-responsive">
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


			<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
				<i class="bi bi-plus-circle"></i>&nbsp;Add
			</button>
			<br><br>


			<table class="table table-bordered" id="table">

				<thead>
					<tr>
						<th class="text-center">PART NO</th>
						<th class="text-center">PART NAME</th>
						<th class="text-center">QR CODE</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>

				<tbody class="text-center">
					@foreach($data as $x)
					<tr>
						<td>{{$x->part_no}}</td>   
						<td>{{$x->part_name}}</td> 
						<td>
							{!! QrCode::eye('square')->size(200)->generate('http://192.168.1.11/stock_barang/public/data/barang/'.$x->id);!!}

							


						</td>
						<td>
							<div class="btn-group" role="group" aria-label="Basic mixed styles example">
								<a href="" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#zoom-{{$x->id}}"><i class="bi bi-zoom-in"></i></a>
								
								
							</div>
						</td>

					</tr>
					@endforeach
				</tbody>

			</thead>

		</table>


	</div>
</div>





<!--modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Part</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/create/part')}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="input-container">
						<div class="row">
							<div class="col">
								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-10">
										<select class="form-control" id="set" style="width: 100%;" name="status">
											<option value="" selected>-pilih status--</option>
											<option value="0">Kosong</option>
											<option value="1">Belum Ada</option>
											<option value="2">Normal</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Cust
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="cust" value="{{old('cust')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Part No
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-code" name="part_no" value="{{old('part_no')}}" id="input-code">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
									Part</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="part_name"
										value="{{old('part_name')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Line
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="line_proces" value="{{old('line_proces')}}">
									</div>
								</div>
							</div>

							<div class="col">
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">Box Type</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="box_type" 
										value="{{old('box_type')}}">
									</div>
								</div>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Qry Kbn
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" 
										name="qty_kanban" value="{{old('qty_kanban')}}">
									</div>
								</div>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Min
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="min_stock" value="{{old('min_stock')}}">
									</div>
								</div>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Max
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" 
										name="max_stock" value="{{old('max_stock')}}">
									</div>
								</div>
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Act
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="act_stock" 
										value="{{old('act_stock')}}">
									</div>
								</div>


								


							</div>
						</div>


					<!--<button type="button" class="btn btn-success" id="add_button">Add</button>
					<button type="button" class="btn btn-danger" id="remove">Delete</button>
					<br>
					<div id="tambah_inputan">
						
					</div>-->
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
</div>
<!--end modal-->

@foreach($data as $p)
<div class="modal fade" id="zoom-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
				
			</div>
			<div class="modal-body">
				<div class="text-center">
					{!! QrCode::eye('square')->size(200)->generate('http://192.168.1.11/stock_barang/public/data/barang/'.$p->id);!!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection