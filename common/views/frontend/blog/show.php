<?php require_once __DIR__.'/../include/header.php'; ?>
<?php require_once __DIR__.'/../include/nav.php'; ?>


<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $blog->getTitle(); ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php?c=blog&m=index">Дестинации</a>
                </li>
                <li class="active">Create at:<?php echo $blog->getCreatedAt() ;?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="admin/uploads/blog/<?php echo $blog->getImage(); ?>" alt="">
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            
           <p><?php echo $blog->getDescription(); ?></p>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Related Projects</h3>
        </div>

        <?php foreach($blogImages as $blogImage): ?>
        <div class="col-sm-3 col-xs-6">
            <a href="admin/uploads/blog/<?php echo $blogImage->getImage(); ?>">
                <img class="img-responsive img-hover img-related" src="admin/uploads/blog/<?php echo $blogImage->getImage(); ?>" alt="">
            </a>
        </div>
        <?php endforeach; ?>
      

    </div>
    <!-- /.row -->

    <hr>



</div>




<?php require_once __DIR__.'/../include/footer.php'; ?>
