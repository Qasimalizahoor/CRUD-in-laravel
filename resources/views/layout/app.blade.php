<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	{{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
	<link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}" />
{{-- 
	<link rel="canonical" href="https://demo-basic.adminkit.io/" /> --}}

	<title> {{config('app.name','Test')}}</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

	{{-- Sweat Alert --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

	
</head>

<body>
	<div class="wrapper">
		{{-- Sidebar --}}
		@include('shared.sidebar')

		<div class="main">
			@include('shared.header')

			{{-- Content  --}}
			<main class="content">
				@yield('content')
			</main>

			@include('shared.footer')
		</div>
	</div>

	{{-- <script type="text/">
		window.onload = function() {
    if (window.jQuery) {  
		alert(" Work");
    } else {
        alert("Doesn't Work");
    }
	</script> --}}
	<script src="{{asset('js/js/app.js')}}">
	<script src="{{asset('js/js/app.js.map')}}">
	<script src="{{asset('js/bootstrap.js')}}">
	</script>
	

// 	<script>
// 		window.onload = function() {
//     if (window.jQuery) {  
// 		alert(" Work");
//     } else 
//         alert("Doesn't Work");
// }
// 	</script>

</body>

</html>