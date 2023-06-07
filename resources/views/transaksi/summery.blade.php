@extends('layout.main')
@section('content')
<div class="container" style="margin-top: 150px;">
	
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-sm-6">
			<div class="card">
				<div class="card-header">
					Featured
				</div>
				<div class="card-body">
					<figure class="highcharts-figure">
						<div id="container1"></div>
						
					</figure>
				</div>
			</div>
			
		</div>

		<div class="col-sm-6">
			<div class="card mt-3">
				<div class="card-header">
					TOTAL SUMMERY
				</div>
				<div class="table-responsive">
					<div class="card-body">

						<table class="table table-bordered" id="table">
							<thead class="bg-danger text-white">
								<tr>
									<td>KOSONG</td>
									<td>DLC TO<br>MAX(KBN)</td>
									<td>DLC TO<br>MAX(PCS)</td>
									<td>LINE<br>PROCES</td>
									<td>TYPE<br>PACKING</td>
									<td>STATUS</td>

								</tr>
							</thead>

							<tbody>
								@foreach($data_kosong as $a)
								<tr>
									<td>{{$a->part_no_kbn}}</td>
									<td>{{$a->max}}</td>
									<td>{{$a->act_pcs}}</td>
									<td>{{$a->line->name_line}}</td>
									<td>{{$a->std_pck_pcs}}</td>
									@if($a->status_moving==1)
									<td class="bg-warning text-white">SLOW MOVING</td>
									@elseif($a->status_moving==2)
									<td class="bg-danger text-white">FAST MOVING</td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>

						<br>
						<br>
						<table class="table table-bordered" id="table2">
							<thead class="bg-warning text-white">
								<tr>
									<td>SHORTAGE</td>
									<td>DLC TO<br>MAX(KBN)</td>
									<td>DLC TO<br>MAX(PCS)</td>
									<td>LINE<br>PROCES</td>
									<td>TYPE<br>PACKING</td>
									<td>STATUS</td>
								</tr>
							</thead>

							<tbody>
								@foreach($data_sort as $b)
								<tr>
									<td>{{$b->part_no_kbn}}</td>
									<td>{{$b->max}}</td>
									<td>{{$b->act_pcs}}</td>
									<td>{{$b->line->name_line}}</td>
									<td>{{$b->std_pck_pcs}}</td>
									@if($b->status_moving==1)
									<td class="bg-warning text-white">SLOW MOVING</td>
									@elseif($b->status_moving==2)
									<td class="bg-danger text-white">FAST MOVING</td>
									@endif
								</tr>
								@endforeach
							</tbody>
						</table>
                     

					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card mt-3">
				<div class="card-header">
					Featured
				</div>
				<div class="card-body">
					<figure class="highcharts-figure">
						<div id="container2"></div>
						
					</figure>
				</div>
			</div>
			
		</div>
	</div>

	

	
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	Highcharts.chart('container1', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'PERFORMANCE FG STOCK DRC FAST MOVING',
			align: 'left'
		},
		
		
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Value',
			colorByPoint: true,
			data: [

			{
				color:'yellow',
				name: 'SHORTRAGE',
				y: {{$s->count()}},
			},

			{
				color:'red',
				name: 'KOSONG',
				y: {{$k->count()}},
			}, 

			{
				color:'blue',
				name: 'OVER',
				y: {{$o->count()}},
			}, 

			{
				color:'green',
				name: 'NORMAL',
				y: {{$n->count()}},

			}]
		}]
	});
</script>


<script type="text/javascript">
	Highcharts.chart('container2', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'PERFORMANCE FG STOCK DRC SLOW MOVING',
			align: 'left'
		},
		
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Value',
			colorByPoint: true,
			data: [

			{
				color:'yellow',
				name: 'SHORTRAGE',
				y: {{$s->count()}},
			},

			{
				color:'red',
				name: 'KOSONG',
				y: {{$k->count()}},
			}, 

			{
				color:'blue',
				name: 'OVER',
				y: {{$o->count()}},
			}, 

			{
				color:'green',
				name: 'NORMAL',
				y: {{$n->count()}},

			}]
		}]
	});
</script>


@endsection