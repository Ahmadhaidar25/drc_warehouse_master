
@extends('layout.main')
@section('content')

<div class="row" style="margin-top: 150px;">
	<div class="col-lg-8" style="padding: 1em;">
		<div class="card mb-6">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table mt-3">
						<thead class="text-center">
							<tr>

								<th class="bg-secondary">Status</th>
								<th class="bg-secondary">CUST</th>
								<th class="bg-secondary">PART NO</th>
								<th class="bg-secondary">PART NAME</th>
								<th class="bg-secondary">LINE PROSESS</th>
								<th class="bg-secondary">BOX TYPE</th>
								<th class="bg-secondary">QTY/KBN</th>
								<th class="bg-warning">MIN STOCK</th>
								<th class="bg-primary">MAX STOCK</th>
								<th class="bg-success">ACT STOCK</th>
								<th class="bg-secondary">STOCK PERFORMANCE</th>
							</tr>
						</thead>
						<tbody class="text-center">

							<tr>
								@if($data->status==0)
								<td class="bg-danger text-white">KOSONG</td>
								@elseif($data->status==1)
								<td class="bg-warning text-white">BELUM ADA</td>
								@else
								<td class="bg-success text-white">NORMAL</td>
								@endif
								<td class="bg-dark text-white">{{$data->cust}}</td>
								<td class="bg-dark text-white">{{$data->part_no}}</td>
								<th class="bg-dark text-white">{{$data->part_name}}</th>
								<td class="bg-dark text-white">{{$data->line_proces}}</td>
								<td class="bg-dark text-white">{{$data->box_type}}</td>
								<td class="bg-dark text-white">{{$data->qty_kanban}}</td>
								<td class="bg-warning">{{$data->min_stock}}</td>
								<td class="bg-primary">{{$data->max_stock}}</td>
								<td class="bg-success">{{$data->act_stock}}</td>
								<td>
									<div class="progress">
										<div class="progress-bar bg-warning" role="progressbar" style="width: {{$data->min_stock}}px" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{$data->min_stock}}</div>
									</div>

									<div class="progress">
										<div class="progress-bar bg-primary" role="progressbar" style="width: {{$data->max_stock}}px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$data->max_stock}}</div>
									</div>

									<div class="progress">
										<div class="progress-bar bg-success" role="progressbar" style="width: {{$data->act_stock}}px" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{$data->act_stock}}</div>
									</div>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="card mt-3">
			<div class="card-body">
				<table class="table table-bordered">
					<thead class="bg-info">
						<tr>
							<th colspan="3" class="text-center">PERFORMANCE ITEM</th>			
						</tr>
					</thead>
					<tbody class="text-center">
						<tr>
							<th>STATUS ITEM:</th>
							<td>KOSONG</td>
							<td rowspan="2" class="bg-dark text-white">{{$hari_ini}}<br>{{$tgl_ini}}</td>

						</tr>

						<tr>
							<th>TOTAL ITEM:</th>
							<td>{{$barang_kosong}}</td>


						</tr>

					</tbody>
				</table>

				<table class="table table-bordered">
					<thead class="bg-info text-center">
						<tr>
							<th>PART NO</th>
							<th>PART NAME</th>			
						</tr>
					</thead>
					<tbody class="text-center">
						@if($data_barang_kosong->count())

						@foreach($data_barang_kosong as $x)
						@if($x->status==0)
						<tr>
							<td>{{$x->part_no}}</td>
							<td>{{$x->part_name}}</td>
						</tr>
						@endif
						@endforeach

						@else
						<tr>
							<td colspan="2">No Data</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-4" style="padding: 1em;">
		<div class="card mb-6 mt-2">
			<div class="card-body">
				<figure class="highcharts-figure">
					<div id="container"></div>

				</figure>
			</div>
		</div>




	</div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>
	// Data retrieved from https://www.ssb.no/statbank/table/10467/
	var chart = Highcharts.chart('container', {

		chart: {
			type: 'cylinder'
		},

		title: {
			text: 'Grafik Stok Barang'
		},

		legend: {
			align: 'right',
			verticalAlign: 'middle',
			layout: 'vertical'
		},


		series: [
			
			{color:'yellow',name: 'Min Stock',data: [{{$data->min_stock}}]},

			

			{color:'#0073e6',name: 'Max Stock',data: [{{$data->max_stock}}]},
			

			
			{color:'#00b33c',name: 'Act Stock',data: [{{$data->act_stock}}]},
			
			
			],

		responsive: {
			rules: [{
				condition: {
					maxWidth: 500
				},
				chartOptions: {
					legend: {
						align: 'center',
						verticalAlign: 'bottom',
						layout: 'horizontal'
					},
					
					
				}
			}]
		}
	});


	
</script>
@endsection
