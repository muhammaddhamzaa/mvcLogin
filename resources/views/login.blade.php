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
    <h3 align="center">Login Page</h3>
    <br/>

    <!--if the user is authenticated, route to success login url-->
    @if (isset(\Illuminate\Support\Facades\Auth::user()->email))
        <script>window.location="/main/successlogin";</script>
    @endif

<!--if there is any error in the session eg. session expired-->
    @if ($message = \Illuminate\Support\Facades\Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

<!--if there are errors, display them one by one in a list-->
    @if (count($errors) >0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

<!--login form-->
    <form method="post" action = "{{ url('/main/checklogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Enter Username: </label>
            <input type="text" name="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Enter Password: </label>
            <input type="password" name="password" class="form-control"/>
        </div>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="Login"/>
        </div>
    </form>
</div>
</body>
</html>