<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/nav.php'; ?>

<div class="container" style="padding-top: 60px;">
    <h1 class="page-header">Edit Profile</h1>
    <div class="row">
        <!-- left column -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="http://images.entertainment.ie/images_content/rectangle/620x372/success-kid.jpg" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>
                <input type="file" class="text-center center-block well well-sm">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

            <h3>Personal info</h3>
            <form class="form-horizontal" role="form" method="post">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username:</label>
                    <div class="col-lg-8">
                        <label name="username" class="col-lg-3 control-label"><?php echo $_SESSION['client']->getUsername(); ?></label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="<?php echo $_SESSION['client']->getEmail(); ?>" name="email" type="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" name="password" value="<?php echo $_SESSION['client']->getPassword(); ?>" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <form ">
                            <a href="index.php?c=profile&m=update"><input class="btn btn-primary" value="Edit User" name="edit" type="submit"></a>
                        </form>
                        <span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
