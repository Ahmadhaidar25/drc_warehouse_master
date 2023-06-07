<!DOCTYPE html>
<html>
<head>
	<title>Cetak Pdf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	@php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Fg-Performance.xls");
	@endphp
	<center>
		<h1>REPORT EXCEL DATA FG PERFORMANCE</h1>
		<table border="1">
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
				@foreach($cetak as $data)
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
				@endforeach
			</tbody>
		</table>
	</body>
	</html>