<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
<script src="js/modernizr.js"></script> <!-- Modernizr -->
<?php require_once __DIR__.'/../include/header.php'; ?>
<?php require_once __DIR__.'/../include/nav.php'; ?>


<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row" role="banner">
        <div class="col-lg-12">
            <h1 class="page-header">
                <?php echo $tour->getName(); ?>
            </h1>
            <ol class="breadcrumb">
                <li><span class="price"><?php echo $tour->getPrice().''.'.00лв'; ?></span>
                </li>
                <nav class="main-nav">
                    <ul>
                        <!-- inser more links here -->
                        <li><a class="cd-signup" href="#0">Запиши се за събитието</a></li>
                    </ul>
                </nav>
            </ol>



        </div>
    </div>


        <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
            <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
                <ul class="cd-switcher" class="center-block">
                    <li><a href="#0">Попълнете своите данни</a></li>
                </ul>


                <div id="cd-signup"> <!-- sign up form -->
                    <form class="cd-form">
                        <p class="fieldset">
                            <label class="image-replace cd-username" for="signup-username">Име и Фамилия</label>
                            <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Име и фалимиля">
                            <span class="cd-error-message">Error message here!</span>
                        </p>

                        <p class="fieldset">
                            <label class="image-replace cd-email" for="signup-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
                            <span class="cd-error-message">Error message here!</span>
                        </p>

                        <p class="fieldset">
                            <label class="image-replace cd-password" for="signup-password">Номер за връзка</label>
                            <input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Номер за връзка">
                            <a href="#0" class="hide-password">Hide</a>
                            <span class="cd-error-message">Error message here!</span>
                        </p>

                        <p class="fieldset">
                            <input type="checkbox" id="accept-terms">
                            <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
                        </p>

                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Записвам се">
                        </p>
                    </form>

                    <!-- <a href="#0" class="cd-close-form">Close</a> -->
                </div> <!-- cd-signup -->

                <div id="cd-reset-password"> <!-- reset password form -->
                    <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                    <form class="cd-form">
                        <p class="fieldset">
                            <label class="image-replace cd-email" for="reset-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                            <span class="cd-error-message">Error message here!</span>
                        </p>

                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Reset password">
                        </p>
                    </form>

                    <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
                </div> <!-- cd-reset-password -->
                <a href="#0" class="cd-close-form">Close</a>
            </div> <!-- cd-user-modal-container -->
        </div> <!-- cd-user-modal
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->


                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="img-responsive" src="admin/uploads/tours/<?php echo $tour->getImage(); ?>" alt="">
                    </div>
                </div>

                <!-- Controls -->

            </div>
        </div>

        <div class="col-md-4">
            
           <p><?php echo $tour->getDescription(); ?></p>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Снимки от събитието</h3>
        </div>

        <?php foreach($tourImages as $tourImage): ?>
        <div class="col-sm-3 col-xs-6">
            <a href="admin/uploads/tours/<?php echo $tourImage->getImage(); ?>">
                <img class="img-responsive img-hover img-related" src="admin/uploads/tours/<?php echo $tourImage->getImage(); ?>" alt="">
            </a>
        </div>
        <?php endforeach; ?>
      

    </div>
    <!-- /.row -->

    <hr>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/main.js"></script>



        <?php require_once __DIR__.'/../include/footer.php'; ?>
