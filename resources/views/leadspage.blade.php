<!DOCTYPE html>
<html>
<head>
    <title> Login Application </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        .box {
            width: auto;
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
            <a class="navbar-brand" href="{{url('/main/successlogin')}}">Hello User!</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Leads</a></li>
            <li><a href="{{url('/main/successlogin')}}">Home</a></li>
        </ul>
    </div>
</nav>

@if(\Illuminate\Support\Facades\Session::has('leadsdata'))
    <div class="container box">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Account Name</th>
            <th>Phone Office</th>
            <th>Email</th>
            <th>User</th>
            <th>Date Entered</th>
            <th>Date Modified</th>
        </tr>
        </thead>
        <tbody>
        @foreach(\Illuminate\Support\Facades\Session::get('leadsdata') as $entity)
            <tr>
            <td> {{$entity['name']}}</td>
            <td> {{$entity['status']}}</td>
            <td> {{$entity['account_name']}}</td>
            <td> {{$entity['phone_work']}}</td>
            <td> {{$entity['email']}}</td>
            <td> {{$entity['user']}}</td>
            <td> {{$entity['date_entered']}}</td>
            <td> {{$entity['date_modified']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    </div>

@endif


</body>
</html>