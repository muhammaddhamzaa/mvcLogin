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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Hello User!</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{url("/main/leadspage")}}">Leads</a></li>
        </ul>
    </div>
</nav>
<div class="container box">
    <h3 align="center">Success Page</h3>
    <br/>
        <div class="alert alert-success succes-block">
            <!--Content-->
            <strong> Welcome </strong>
            <br/>
            <a href="{{ url('/main/logout') }}">Logout</a>
        </div>

</div>
</body>
</html>