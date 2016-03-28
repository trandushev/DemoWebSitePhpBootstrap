<?php require_once __DIR__.'/include/header.php'; ?>
<?php require_once __DIR__.'/include/nav.php'; ?>

<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->

    <div class="carousel-inner">
        <?php foreach($randomTours as $randomTour): ?>
        <div class="item active "">
            <div class="fill"  style="background-image:url('admin/uploads/tours/<?php echo $randomTour->getImage(); ?>');"></div>
        </div>
        <?php endforeach ?>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel ">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Предложения за приключение
            </h1>
        </div>
        <div class="row">
            <?php foreach($randomTours as $randomTour): ?>
                <div class="col-md-3 thumbnail " style="height: 370px">
                    <a href="index.php?c=tours&m=show&id=<?php echo $randomTour->getId();?>">
                        <img  class="img-responsive img-hover" src="admin/uploads/tours/<?php echo $randomTour->getImage(); ?>" alt="">
                    </a>
                    <h3>
                        <a href="index.php?c=tours&m=show&id=<?php echo $randomTour->getId();?>"><?php echo $randomTour->getName(); ?></a>
                    </h3>
                    <p><?php echo substr($randomTour->getDescription(), 0, 250); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Последни пътеписи
            </h1>
        </div>
        <div class="row">
            <?php foreach($lastBlogPosts as $lastPost): ?>
            <div class="col-md-4 img-portfolio thumbnail" style="height: 490px">
                <a href="index.php?c=blog&m=show&id=<?php echo $lastPost->getId()?>">
                    <img  class="img-responsive img-hover" src="admin/uploads/blog/<?php echo $lastPost->getImage(); ?>" alt="">
                </a>
                <h3>
                    <a href="index.php?c=blog&m=show&id=<?php echo $lastPost->getId()?>"><?php echo $lastPost->getTitle(); ?></a>
                </h3>
                <p><?php echo substr($lastPost->getDescription(), 0, 150).'...'; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
    </div>


    <!-- /.row -->
    <!-- Features Section -->
    <hr>
</div>
<!-- /.container -->

<?php require_once __DIR__.'/include/footer.php'; ?>

