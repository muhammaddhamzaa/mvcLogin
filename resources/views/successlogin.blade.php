<!DOCTYPE html>
<html>
<head>
    <title> Login Application </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<br/>
<div class="container box">
    <h3 align="center">Success Page</h3>
    <br/>
    @if (isset (\Illuminate\Support\Facades\Auth::user()->email))
        <div class="alert alert-success succes-block">
            <!--Content-->
            <strong> Welcome {{\Illuminate\Support\Facades\Auth::user()->email}}</strong>
            <br/>
            <a href="{{ url('/main/logout') }}">Logout</a>
        </div>
        @else
        <script>window.location = "/main";</script>
    @endif

</div>
</body>
</html>