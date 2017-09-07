<?php
include_once "php/connection.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'PICAB Team';
include_once "layout/header.php";
?>
<style>
    #over1 {
        position: absolute;
    }
    #over2 {
        position: absolute;
    }
    #over3 {
        position: absolute;
    }
    #over4 {
        position: absolute;
    }
    .img {
        max-width: 100%;
        max-height: 100%;
    }
    .square {
        height: 267px;
        width: 267px;
    }
</style>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div class="col-lg-12">
            <div class="square" align="left">
                <img id="over1" src="img/test1.png" alt="10 of diamonds"  class="animated flipInY img" >
                <img id="over2" src="img/test2.png" alt="10 of diamonds" class="animated flipInX img" >
                <img id="over3" src="img/test3.png" alt="10 of diamonds" class="animated fadeInDownBig img" >
                <img id="over4" src="img/test4.png" alt="10 of diamonds" class="animated slideInRight img" >
            </div>
        </div>
        <div class="col-lg-12">
        <h3>Welcome to IN+</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="http://webapplayers.com/inspinia_admin-v2.7.1/index.html">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
        </form>
        </div>

        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
