<html>
<head>
    <title> Raven </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://bootswatch.com/slate/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

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
        <div class="container-fluid">
            <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Raven</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">

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
    <footer class="footer">
        <div id="footer" class="panel panel-default">

           <div class="panel-body">
               <a>Copyright &copy; 2017,  group Raven</a>.
           </div> 
        </div>
    </footer>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>