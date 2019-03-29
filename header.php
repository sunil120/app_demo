<?php
	include "conn.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="EN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="css/fontawesome-free-5.3.1-web/css/all.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container-fluid">
    <header>
    	<div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.prontowebsolution.com">
                    <h1>DemoScrap</h1>
                </a>
            </div>
            <nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                <ul class="nav navbar-nav navbar-right ">
                   	<li <?php if ($active==1) { ?>class="active"<?php } ?>> <a href="http://www.prontowebsolution.com/demo">Home</a></li>
                    <li <?php if ($active==2) { ?>class="active"<?php } ?>><a href="scrap.php">Scrap</a> </li>
                </ul>
            </nav>
        </div><!-- /.container-fluid -->
    </header>