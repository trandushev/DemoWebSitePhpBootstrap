<?php require_once __DIR__.'/../include/header.php'; ?>
<?php require_once __DIR__.'/../include/nav.php'; ?>

<div class="container">

    <h1 class="tagline"><?php echo $guide->getName(); ?></h1>
    <hr>
    <div class="row">

        <div class="col-sm-4">
            <img class="img-circle img-responsive img-center" src="/../../../admin/uploads/pic/<?php echo $guide->getImage(); ?>" alt="">
        </div>

    </div>


    <div class="row">
        <div class="col-sm-8">
            <h2>About Me</h2>
            <p><?php echo $guide->getDescription(); ?></p>
        </div>
    </div>
    <!-- /.row -->

    <hr>


    <hr>




<?php require_once __DIR__.'/../include/footer.php'; ?>
