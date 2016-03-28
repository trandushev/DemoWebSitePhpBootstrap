<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">MeOutdoor</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="destinations.php">Дестинации</a>
                    </li>
                    <li>
                        <a href="galeryAll.php">Галерия</a>
                    </li>
                    <li>
                        <a href="pitepisi.php">Пътеписи</a>
                    </li>
                    <li>
                        <a href="about.php">За Нас</a>
                    </li>
                    <li>
                        <a href="contactus.php">Контакти</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav  navbar-right">
                    <li>
                        <a href="login.php.php">Login</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="profileSimple.php">Профил</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="col-sm-6 col-md-4 col-md-offset-4">
        <h1 class="text-center login-title">Sign in to continue to MeOutdoor</h1>
        <div class="account-wall">
            <form class="form-signin">
                <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="register.php" class="pull-right need-help">Create an account</a><span class="clearfix"></span>
            </form>
        </div>

    </div>

    <!-- Put your page content here! -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
