@extends('layout.main')
@section('content')

<div style="margin-top: 150px;">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		
		@if(Auth::user()->levels==2)
		<button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#scan">
			<img src="{{url('logo/scan1.png')}}" style="height: 30px;">&nbsp;Scanner
		</button>
		@endif
	</div>
	<div class="row mb-3">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">FG</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$fg}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/kardus.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Earnings (Annual) Card Example -->
		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">RM</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$rm}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/kardus.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>

		

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">CUSTOMER</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/customer.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">VENDOR</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$vendor}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/vendor.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">LINE</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$line}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/line.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-md-6 mb-4">
			<div class="card h-100">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-uppercase mb-1">RAK</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">{{$rak}}</div>

						</div>
						<div class="col-auto">
							<img src="{{url('logo/rak.png')}}" style="height: 70px; width: 70px;">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="scan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Scanner</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div id="reader" width="600px"></div>
				<input type="text" name="" id="result" class="form-control mt-3">
				
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
@endsection