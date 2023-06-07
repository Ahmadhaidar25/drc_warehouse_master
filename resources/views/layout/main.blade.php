<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stock Barang</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
	integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

	<style type="text/css">
		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		.switch input {display:none;}

		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked + .slider {
			background-color: #2196F3;
		}

		input:focus + .slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

/* Rounded sliders */
.slider.round {
	border-radius: 34px;
}

.slider.round:before {
	border-radius: 50%;
}
</style>
</head>
<body>
	<header id="header" class="fixed-top shadow p-3 mb-5 bg-body rounded" style="background: white;">
		<div class="container d-flex align-items-center justify-content-between">
			<img src="{{url('logo/gambar1.png')}}" alt="" class="img-fluid" 
			style="width: 70px;">
			<!-- Uncomment below if you prefer to use an image logo -->
			<a href="index.html" class="logo"></a>

			<nav id="navbar" class="navbar">
				<ul class="nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link active text-secondary" aria-current="page" href="{{url('dashboard')}}">
							<i class="bi bi-speedometer2"></i></i>&nbsp;DASHBOARD</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link text-secondary dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="bi bi-menu-down"></i>&nbsp;Menu
							</a>

							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="table-responsive">
									
									<li><a class="dropdown-item" href="{{url('fg_performance')}}">FG Performance</a></li>
									<li><a class="dropdown-item" href="{{url('rm_performance')}}">RM Performance</a></li>
									<li><a class="dropdown-item" href="{{url('/summery')}}">TOTAL SUMMERY</a></li>
								

									
									
									<li><a class="dropdown-item" href="{{url('/master/user')}}">ADD USER</a></li>

									<li><a class="dropdown-item" href="{{url('/master/vendor')}}">VENDOR</a></li>
									<li><a class="dropdown-item" href="{{url('/master/customer')}}">CUSTOMER</a></li>
									<li><a class="dropdown-item" href="{{url('/master/vendor')}}">VENDOR</a></li>
									<li><a class="dropdown-item" href="{{url('/master/line')}}">LINE</a></li>
									<li><a class="dropdown-item" href="{{url('/master/rak')}}">RAK</a></li>
									

								</div>
							</ul>

						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								
								<li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav><!-- .navbar -->
			</div>
		</header><!-- End Header -->
		<div class="container">
			@yield('content')
		</div>

		

	</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>

		$(document).ready( function () {
			$('#table').DataTable();
		} );

		$(document).ready( function () {
			$('#table2').DataTable();
		} );

		$(document).ready( function () {
			$('.table_rm_detail').DataTable();
		} );



		$(document).ready(function() {
			$("#set_1").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#exampleModal")
			});
		});

		$(document).ready(function() {

			$("#set_2").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});

			$("#set_mov").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});

			$("#cus").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});

			$("#ven").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});

			$("#line").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});

			$("#rak").select2({
				theme: 'bootstrap4',
				dropdownParent: $("#add_modal_rm")
			});
		});


		let counter = 1

		$('#add_button').click(function(){
			counter++

			let newInput ='<div class="row mt-3" id="hapus"><div class="col"><div class="mb-3 row"><label class="col-sm-2 col-form-label">Status</label><div class="col-sm-10"><select class="form-control" id="set" style="width: 100%;" name="status[]"><option></option></select></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Curs</label><div class="col-sm-10"><input type="text" class="form-control" name="curs[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Part No</label><div class="col-sm-10"><input type="text" class="form-control" name="part_no[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Part</label><div class="col-sm-10"><input type="text" class="form-control" name="part_name[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Line</label><div class="col-sm-10"><input type="text" class="form-control" name="line_process[]"></div></div></div><div class="col"><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Box Type</label><div class="col-sm-10"><input type="text" class="form-control" name="box_type[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Qry Kbn</label><div class="col-sm-10"><input type="number" class="form-control" name="qty_kanban[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Min</label><div class="col-sm-10"><input type="number" class="form-control" name="min_stock[]"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Max</label><div class="col-sm-10"><input type="number" class="form-control" name="max_stock"></div></div><div class="mb-3 row"><label for="inputPassword" class="col-sm-2 col-form-label">Act</label><div class="col-sm-10"><input type="number" class="form-control" name="act[]"></div></div></div></div></div><hr>'

			$('#tambah_inputan').append(newInput)
		})

		$('#remove').click(function(){

			$('#hapus').remove()
			counter--
		})

		$(".hapus").click(function(e){
			e.preventDefault();
			var hapus = $(this).attr('href');
			Swal.fire({
				title: 'Sure',
				text: "the data will be deleted",
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = hapus;
				}
			})
		})

		function onScanSuccess(decodedText, decodedResult) {

				//console.log(`Code matched = ${decodedText}`, decodedResult);
			$('#result').val(decodedText);
				//window.open(result.text, '_blank');
		}

		function onScanFailure(error) {

			console.warn(`Code scan error = ${error}`);
		}

		let html5QrcodeScanner = new Html5QrcodeScanner(
			"reader",
			{ fps: 10, qrbox: {width: 250, height: 250} }, false);
		html5QrcodeScanner.render(onScanSuccess, onScanFailure);




	</script>
	@include('sweetalert::alert')
	</html>