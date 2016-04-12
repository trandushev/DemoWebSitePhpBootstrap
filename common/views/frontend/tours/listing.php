<?php require_once __DIR__.'/../include/header.php'; ?>
<?php require_once __DIR__.'/../include/nav.php'; ?>
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php
                $categoryCollection = new CategoryCollection();
                $categories = $categoryCollection->getOne($_GET['id']);
                ?>

                <?php if(($_GET['id']) == 0){
                    echo "Всички дестинации";
                }else {
                    echo $categories->getName();
                };
                ?>
                <small><a href=""></a></small>

            </h1>

        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <?php foreach($tours as $tour): ?>

        <div class="col-md-6 img-portfolio">
            <a href="index.php?c=tours&m=show&id=<?php echo $tour->getId(); ?>">
                <img class="img-responsive img-hover" src="admin/uploads/tours/<?php echo $tour->getImage(); ?>" alt="">
            </a>
            <h3>
                <a href="index.php?c=tours&m=show&id=<?php echo $tour->getId(); ?>"><?php echo $tour->getName(); ?></a>
            </h3>
            <p><?php echo $tour->getDescription(); ?></p>
        </div>
       <?php endforeach; ?>
    </div>
    <!-- /.row -->




    <hr>

    <!-- Pagination -->
    <div class="row text-center">
       <?php echo $pagination->create(); ?>
    </div>
    <!-- /.row -->

    <?php require_once __DIR__.'/../include/footer.php'; ?>