<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=dashboard">MeOutdoor</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Дестинации<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                        $categoryCollection = new CategoryCollection();
                        $categories = $categoryCollection->getAll();
                        ?>
                        <li>
                            <a href="index.php?c=tours&m=index&id=0">Всички дестинации</a>
                        </li>
                        <?php foreach($categories as $category): ?>
                        <li>
                            <a href="index.php?c=tours&m=index&id=<?php echo $category->getId(); ?>"><?php echo $category->getName(); ?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="index.php?c=blog&m=index">Пътеписи</a>
                </li>
                <li>
                    <a href="index.php?c=galery&m=index">Галерия</a>
                </li>
                <li>
                    <a href="index.php?c=about&m=index">За Нас</a>
                </li>
                <li>
                    <a href="index.php?c=contact&m=index">Contact us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav  navbar-right">
                <li >
                    <a  href="#">
                        <?php if($this->loggedInFront()): ?>
                            <?php echo $_SESSION['client']->getUsername(); ?>
                        <?php endif; ?>
                        <span class="label label-info"></span>
                    </a>
                </li>
                <?php if(!$this->loggedInFront()): ?>
                    <li><a href="index.php?c=login&m=login"><i class="halflings-icon off"></i>Login</a></li>
                <?php else: ?>
                    <li><a href="index.php?c=profile&m=index"><i class="halflings-icon user"></i> Profile</a></li>
                    <li><a href="index.php?c=login&m=logout"><i class="halflings-icon off"></i> Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>