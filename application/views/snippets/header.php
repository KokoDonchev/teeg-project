<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= HTTP_CSS_PATH; ?>bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= HTTP_CSS_PATH; ?>slick.css" rel="stylesheet">
    <link href="<?= HTTP_CSS_PATH; ?>slick-theme.css" rel="stylesheet">
    <link href="<?= HTTP_CSS_PATH; ?>style.css" rel="stylesheet">
    <link href="<?= HTTP_CSS_PATH; ?>site.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="template-general template-<?php echo $handle ?>">

<!-- Navigation -->
<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <!--<img src="http://placehold.it/150x50&text=Logo" alt="">-->
                <img src="<?= HTTP_IMAGES_PATH; ?>/teeg_logo.png" alt="">
            </a>
        </div>
        <div class="header__search">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Search materials">
                </div>
                <button type="submit" class="btn btn-default">S</button>
            </form>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="#">My courses</a>
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hi</a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/account"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<?php

// current_url()
// 'action'
// url helper?

?>