<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" media="all" href="./css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="./css/text.css" />
        <link rel="stylesheet" type="text/css" media="all" href="./css/style.css" />
        <link rel="stylesheet" type="text/css" media="all" href="./css/lightbox.css" />
        </head>
	<body>
        <div id="wrapper">
            <div id="header">
                <span class="myhead">Simple Image Gallery</span>
                <span class="mynav">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/about">About</a></li>
                    </ul>
                </span>
            </div>
            <div class="alone"></div>
            <div id="content">
               {content}
            </div>
            <div id="footer" class="span12">
                Copyright &copy; 2014,  <a href="mailto:someone@somewhere.com">Me</a>.
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script> 
        <script type="text/javascript" src="js/lightbox.min.js"></script> 
	</body>
</html>