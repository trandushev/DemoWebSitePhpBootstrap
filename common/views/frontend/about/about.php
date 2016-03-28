<?php require_once __DIR__ . '/../include/header.php'; ?>
<?php require_once __DIR__ . '/../include/nav.php'; ?>

    <div class="container">
                <div class="row">

                    <div class="col-lg-12 " >
                        <img class="img img-responsive img-center" src="https://www.rmiguides.com/about/_images/guides_header.jpg" alt="">
                    </div>
                </div>
        <h1 class="tagline">MeOutDoor's Guides</h1>
        <hr>

        <div class="row">
            <div class="col-sm-8">
                <h2>What We Do</h2>
                <p>Introduce the visitor to the business using clear, informative text. Use well-targeted keywords within your sentences to make sure search engines can find the business.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae similique eligendi reiciendis sunt distinctio odit? Quia, neque, ipsa, adipisci quisquam ullam deserunt accusantium illo iste exercitationem nemo voluptates asperiores.</p>

            </div>
            <
        </div>
        <!-- /.row -->

        <hr>
            <div class="row">
            <?php foreach($guides as $guide): ?>
                <div class="col-sm-4">
                    <a href="index.php?c=about&m=show&id=<?php echo $guide->getId(); ?>">
                    <img class="img-circle img-responsive img-center" src="/../../../admin/uploads/pic/<?php echo $guide->getImage(); ?>" alt="">
                    </a>
                    <a href="index.php?c=about&m=show&id=<?php echo $guide->getId(); ?>">
                    <h2><?php echo $guide->getName(); ?></h2>
                    </a>
                </div>
            <?php endforeach; ?>
            </div>



        <hr>

<?php require_once __DIR__ . '/../include/footer.php'; ?>