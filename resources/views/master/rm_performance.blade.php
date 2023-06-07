@extends('layout.main')
@section('content')

<div style="margin-top: 150px;">
	<h2 class="text-center">RM PERFORMANCE SCAN QR&nbsp;<i class="bi bi-qr-code-scan"></i></h2>
	<div class="card" >
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


				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_modal_rm">
					<i class="bi bi-plus-circle"></i>&nbsp;Add
				</button>

				<div role="group" style="float: right;">
					<a href="{{url('/cetak/pdf/rm')}}" class="btn btn-danger">
						<i class="bi bi-filetype-pdf"></i>&nbsp;Print
					</a>
					<a href="{{url('/export/excel/rm')}}" class="btn btn-success">
						<i class="bi bi-file-earmark-excel"></i>&nbsp;Export
					</a>
				</div>


				<br><br>


				<table class="table table-bordered" id="table">

					<thead>
						<tr>
							<th class="text-center">PART NO KBN</th>
							<th class="text-center">SPACE & SIZE MATERIAL</th>
							<th class="text-center">QR CODE</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						@foreach($data as $x)
						<tr>
							<td>{{$x->part_no_kbn}}</td>   
							<td>{{$x->spece_size_mateial}}</td> 
							<td>
								{!! QrCode::eye('square')->size(200)->generate('http://192.168.1.84/stock_barang/public/data/rm-performance/'.$x->id);!!}




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
</div>

<!--modal-->
<div class="modal fade" id="add_modal_rm" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Rm Performance</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{url('/create/rm_performance')}}" method="post">
				<div class="modal-body">
					@csrf
					<div class="input-container">
						<div class="row">
							<div class="col">


								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-10">
										<select class="form-control" id="set_2" style="width: 100%;" name="status">
											<option value="" selected>-pilih status--</option>
											<option value="0">Kosong</option>
											<option value="1">Over</option>
											<option value="2">Normal</option>
											<option value="3">Shortage</option>
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Cust
									</label>
									<div class="col-sm-10">
										<select class="form-control" id="cus" style="width: 100%;" name="customer_id">
											<option value="" selected>-pilih Customer--</option>
											@foreach($customer as $x)
											<option value="{{$x->id}}">{{$x->name_customer}}</option>
											@endforeach

										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label class="col-sm-2 col-form-label">Model</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-code" name="model" value="{{old('part_no')}}" id="input-code">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										No.Kbn
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control input-code" name="part_no_kbn" value="{{old('part_no')}}" id="input-code">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
									Jenis</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="jenis"
										value="{{old('part_name')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										BQ
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="bq" value="{{old('line_proces')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Space & Size
									</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" 
										name="spece_size_mateial" value="{{old('spece_size_mateial')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Vendor
									</label>
									<div class="col-sm-10">
										<select class="form-control" id="ven" style="width: 100%;" name="vendor_id">
											<option value="" selected>-pilih vendor--</option>
											@foreach($vendor as $x)
											<option value="{{$x->id}}">{{$x->name_vendor}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>



							<div class="col">
								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Line
									</label>
									<div class="col-sm-10">
										<select class="form-control" id="line" style="width: 100%;" name="line_id">
											<option value="" selected>-pilih line--</option>
											@foreach($line as $x)
											<option value="{{$x->id}}">{{$x->name_line}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">Rak</label>
									<div class="col-sm-10">
										<select class="form-control" id="rak" style="width: 100%;" name="rak_id">
											<option value="" selected>-pilih rak--</option>
											@foreach($rak as $x)
											<option value="{{$x->id}}">{{$x->name_rak}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										STD Pack
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" 
										name="std_pck_pcs" value="{{old('std_pck_pcs')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Min
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="min" value="{{old('min')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Max
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" 
										name="max" value="{{old('max')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Act Kbn
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="act_kbn" 
										value="{{old('act_kbn')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Act Pcs
									</label>
									<div class="col-sm-10">
										<input type="number" class="form-control" name="act_pcs" 
										value="{{old('act_pcs')}}">
									</div>
								</div>

								<div class="mb-3 row">
									<label for="inputPassword" class="col-sm-2 col-form-label">
										Status Mov
									</label>
									<div class="col-sm-10">
										<select class="form-control" id="set_mov" 
										style="width: 100%;" name="status_moving">
										<option value="" selected>-pilih status mov--</option>
										<option value="1">Slow Moving</option>
										<option value="2">Fast Moving</option>

									</select>
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

<!-- Modal -->
@foreach($data as $p)
<div class="modal fade" id="zoom-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Scan <i class="bi bi-qr-code-scan"></i></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					{!! QrCode::eye('square')->size(200)->generate('http://192.168.1.84/stock_barang/public/data/rm-performance/'.$p->id);!!}
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