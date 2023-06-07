<!DOCTYPE html>
<html>
<head>
	<title>Export Excel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	@php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Rm-Performance.xls");
	@endphp
	<center>
		<h1>REPORT EXCEL DATA RM PERFORMANCE</h1>
			
		</center>
		
		<table border="1">
			<thead>
				<tr>
					<th>STATUS</th>
					<th>CUST</th>
					<th>MODEL</th>
					<th>PART NO.KBN</th>
					<th>JENIS</th>
					<th>BQ</th>
					<th>SPEC & MATERIAL</th>
					<th>VENDOR</th>
					<th>LINE</th>
					<th>RAK</th>
					<th>STD PACKING</th>
					<th>MIN KBN</th>
					<th>MAX KBN</th>
					<th>ACT KBN</th>
					<th>ACT PCS</th>
					<th class="text-center">VISUAL STOCK BY COUNT</th>
					<th>Status Moving</th>

				</tr>
			</thead>

			<tbody>
				@foreach($cetak as $data)
				<tr>
					@if($data->status==0)
					<td class="bg-danger text-white">KOSONG</td>
					@elseif($data->status==1)
					<td class="bg-primary text-white">OVER</td>
					@elseif($data->status==2)
					<td class="bg-success text-white">NORMAL</td>
					@elseif($data->status==3)
					<td class="bg-warning text-white">SHORTAGE</td>
					@endif
					<td>{{$data->customer->name_customer}}</td>
					@if($data->model==null)
					<td class="bg-danger"></td>
					@else
					<td>{{$data->model}}</td>
					@endif
					<td>{{$data->part_no_kbn}}</td>
					<td>{{$data->jenis}}</td>
					<td>{{$data->bq}}</td>
					<td>{{$data->spece_size_mateial}}</td>
					@if($data->vendor_id==null)
					<td class="bg-danger"></td>
					@else
					<td>{{$data->vendor->name_vendor}}</td>
					@endif
					<td>{{$data->line->name_line}}</td>
					@if($data->rak_id==null)
					<td class="bg-danger"></td>
					@else
					<td>{{$data->rak->name_rak}}</td>
					@endif
					<td>{{$data->std_pck_pcs}}</td>
					<td>{{$data->min}}</td>
					<td>{{$data->max}}</td>
					<td class="bg-white text-danger">{{$data->act_kbn}}</td>
					<td class="bg-white text-danger">{{$data->act_pcs}}</td>
					<td>
						<div class="progress">

							@if($data->act_kbn==0)
							<div class="progress-bar bg-danger" role="progressbar" 
							style="width: 200px" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
							{{$data->act_kbn}}
						</div>
						@else
						<div class="progress-bar bg-info" role="progressbar" 
						style="width: {{$data->act_kbn}}px" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						{{$data->act_kbn}}
					</div>
					@endif

				</div>
			</td>
			@if($data->status_moving==1)
			<td class="bg-warning text-secondary">SLOW MOVING</td>
			@else
			<td class="bg-danger text-white">FAST MOVING</td>
			@endif
		</tr>
		@endforeach
	</tbody>
</table>



</body>
</html>