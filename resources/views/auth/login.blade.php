@section('title', 'Login')
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{asset('img/icons/icon-48x48.png')}}" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>@yield('title') --StudentMangement</title>

	{{-- <link href="css/app.css" rel="stylesheet"> --}}
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container" style="display: flex;justify-content: center;align-items: center;height: 100%;">
<div style=''>

    <div class='mt-5'>
        <h1 class='text-center fw-bolder mb-3'>Login Here</h1>
    </div>
    @if ($errors->any())
    <div>
        <strong class="text-danger">{{ $errors->first('error') }}</strong>
    </div>
    @endif
    
    @if (session()->has('message'))
    <div>
        <strong class="text-success">{{ session('message') }}</strong>
    </div>
@endif

    <div style="width: 400px" class="mx-auto">
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="username" class="form-control" placeholder="User Name">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" placeholder="Password" name="password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary mb-5">Login</button>
        </form>
    </div>
</div>
</div>
</body>
</html>