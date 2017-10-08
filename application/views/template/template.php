<html>
<head>
    <title> Raven </title>
    <link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
        body
        {
            background-image:url('/data/raven.png');
        }
    </style>

</head>


<body>

<nav class="navbar navbar-default">
    <div class="container">

        <div class="navbar-header" align="right">
            <a class="navbar-brand" href="/">Raven</a>
        </div>
        <div id="navbar">
            {menubar}
        </div>

        <div class="nav navbar-nav navbar-right">
            <a href="#"><img id="logo" src="/data/1501195216209.png" height="45" width="45" /></a>
        </div>

    </div>
</nav>
<div class="container">

   {content}
</div>
<div id="footer" class="panel panel-default">

    <div class="panel-body">
        <a>Copyright &copy; 2017,  group Raven</a>.
    </div> 
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

