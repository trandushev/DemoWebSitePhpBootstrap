<?php require_once __DIR__.'/../include/header.php'; ?>
<?php require_once __DIR__.'/../include/nav.php'; ?>


<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Кой къде ходи :)
                <small>Пътеписи</small>
            </h1>

        </div>
    </div><!-- /.row --
    <?php foreach($blogs as $blog): ?>
        <!-- Blog Post Row -->
        <div class="row">
            <div class="col-md-2 text-center">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <p>Created At:<?php echo $blog->getCreatedAt(); ?></p>
            </div>
            <div class="col-md-5">
                <a href="index.php?c=blog&m=show&id=<?php echo $blog->getId(); ?>">
                <img class="img-responsive img-hover" src="admin/uploads/blog/<?php echo $blog->getImage(); ?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>
                    <a href="index.php?c=blog&m=show&id=<?php echo $blog->getId(); ?>"><?php echo $blog->getTitle(); ?></a>
                </h3>
                <p><?php echo substr($blog->getDescription(),0 , 600 ).'...'; ?></p>
                 <a class="btn btn-primary" href="index.php?c=blog&m=show&id=<?php echo $blog->getId(); ?>">Прочети <i class="fa fa-angle-right"></i></a>
            </div>
        </div><!-- /.row -->
    <hr>
    <?php endforeach; ?>

    <!-- Pager -->
    <div class="row">
       <?php echo $pagination->create(); ?>
    </div>
    <!-- /.row -->

    <hr>


<?php require_once __DIR__.'/../include/footer.php'; ?>

