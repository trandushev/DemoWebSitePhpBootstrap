<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/nav.php'; ?>
<link href="css/javascript.css" rel="stylesheet">
<link rel="stylesheet" href="css/bg1.css">


<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign up for MeOutdoor <small>It's free!</small></h3>
                    <?php
                    if(!empty($errors)) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><?php  echo $errors['username']; ?></strong>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="panel-body">

                    <form action="" role="form" method="post">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="username" id="first_name" class="form-control input-sm floatlabel" placeholder="Username">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                                </div>
                            </div>
                        </div>

                        <input type="submit" name="register" value="Register" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content -->
<div class="container">
<?php require_once __DIR__ . '/../include/footer.php'; ?>
