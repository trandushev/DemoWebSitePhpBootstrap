
<?php require_once __DIR__.'/include/header.php'; ?>
<?php require_once __DIR__.'/include/nav.php'; ?>
<link rel="stylesheet" href="css/bg.css">

<div class="col-sm-6 col-md-4 col-md-offset-4">
    <h1 class="text-center login-title">Sign in to continue to MeOutdoor</h1>
    <div class="account-wall">
        <form class="form-signin" method="post">
            <input name="username" type="text" class="form-control" placeholder="Username" required autofocus>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <label class="checkbox pull-left">
                <input type="checkbox" value="remember-me">
                Remember me
            </label>
            <a href="index.php?c=register&m=create" class="pull-right need-help">Create an account</a><span class="clearfix"></span>
        </form>
    </div>

</div>

<!-- Put your page content here! -->

<?php require_once __DIR__.'/include/footer.php'; ?>
