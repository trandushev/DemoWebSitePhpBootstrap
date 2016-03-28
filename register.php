<?php
require_once 'header.php';
?>
<!-- Image Background Page Header -->
<!-- Note: The background image is set within the business-casual.css file. -->
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="tagline"></h1>
            </div>
        </div>
    </div>
</header>
<div class="container" style="margin: 10px;">
    <div class="row"><h2>New Registration</h2>
    </div>

    <form role="form">
        <div class="form-group">
            <label for="firstname" class="col-md-2">
                First Name:
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
            </div>


        </div>

        <div class="form-group">
            <label for="lastname" class="col-md-2">
                Last Name:
            </label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
            </div>


        </div>

        <div class="form-group">
            <label for="emailaddress" class="col-md-2">
                Email address:
            </label>
            <div class="col-md-10">
                <input type="email" class="form-control" id="emailaddress" placeholder="Enter email address">
                <p class="help-block">
                    Example: yourname@domain.com
                </p>
            </div>


        </div>

        <div class="form-group">
            <label for="password" class="col-md-2">
                Password:
            </label>
            <div class="col-md-10">
                <input type="password" class="form-control" id="password" placeholder="Enter Password">
                <p class="help-block">
                    Min: 6 characters (Alphanumeric only)
                </p>
            </div>


        </div>

        <div class="form-group">
            <label for="sex" class="col-md-2">
                Sex:
            </label>
            <div class="col-md-10">
                <label class="radio">
                    <input type="radio" name="sex" id="sex" value="male" checked>
                    Male
                </label>
                <label class="radio">
                    <input type="radio" name="sex" id="sex" value="female">
                    Female
                </label>
            </div>


        </div>

        <div class="form-group">
            <label for="country" class="col-md-2">
                Country:
            </label>
            <div class="col-md-10">
                <select name="country" id="country" class="form-control">
                    <option>--Please Select--</option>
                    <option>India</option>
                    <option>United States</option>
                    <option>Canada</option>
                    <option>United Kingdom</option>
                    <option>Others</option>
                </select>
            </div>




        </div>

        <div class="form-group">
            <label for="uploadimage" class="col-md-2">
                Upload Image:
            </label>
            <div class="col-md-10">
                <input type="file" name="uploadimage" id="uploadimage">
                <p class="help-block">
                    Allowed formats: jpeg, jpg, gif, png
                </p>
            </div>


        </div>

        <div class="checkbox">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <label>
                    <input type="checkbox">Terms and Conditions</label>
            </div>


        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info">
                    Register
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Page Content -->
<div class="container">

    <?php
    require_once 'footer.php';
    ?>
