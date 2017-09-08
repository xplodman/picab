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
<?php
if(isset($_POST['submit'])) {
    session_start();
    include_once "php/connection.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($con, "Select administrator.administratorappid,
  administrator.administratorapppw,
  administrator.administratorid,
  administrator.administratorname,
  administrator.administratorrole
From administrator
Where administrator.administratorappid = '$username' And administrator.administratorapppw = '$password' ");

    if (mysqli_num_rows($result) != 0) {
        header('Location: index.php');
        $fh = fopen('/tmp/track.txt','a');
        fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
        fclose($fh);

        $row = mysqli_fetch_assoc($result);

        $result2 = mysqli_query($con, "Select prosecution.prosecutionid , prosecution.prosecutionname
From administrator_has_prosecution
  Inner Join administrator On administrator.administratorid =
    administrator_has_prosecution.administratorid
  Inner Join prosecution On prosecution.prosecutionid =
    administrator_has_prosecution.prosecutionid
Where administrator_has_prosecution.status = '1' And administrator.administratorid
  = '$row[administratorid]'");

        $prosid = [];
        $prosname = [];
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $prosid[] = $row2[prosecutionid];
            $prosname[] = $row2[prosecutionname];
        }
        $_SESSION['timestamp'] = time();
        $_SESSION["authenticate"] = "true";
        $_SESSION["role"] = $row[administratorrole];
        $_SESSION["username"] = $row[administratorname];
        $_SESSION["prosecutionname"] = $prosid;
        $_SESSION["prosecutionid"] = $prosname;
        exit;

    } else {
        header('Location: login.php?backresult=0');
        $fh = fopen('/tmp/track.txt', 'a');
        fwrite($fh, $_SERVER['REMOTE_ADDR'] . ' ' . date('c') . "\n");
        fclose($fh);
        exit;
    }

}
?>
<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div class="col-lg-12">
            <div class="square" align="left">
                <img id="over1" src="img/test1.png" class="animated flip img" >
                <img id="over2" src="img/test2.png" class="animated flip img" >
                <img id="over3" src="img/test3.png" class="animated fadeInDownBig img" >
                <img id="over4" src="img/test4.png" class="animated slideInRight img" >
            </div>
        </div>
        <div class="col-lg-12">
        <form class="m-t" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required="">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required="">
            </div>
            <button type="Submit"  name="submit" class="btn btn-primary block full-width m-b">Login</button>
        </form>
            <?php
            if (isset($_GET['backresult'])){
                $backresult=$_GET['backresult'];
                if ($backresult ==  "0") {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    Check your username and password.
                </div>
                <?php
                }
            }
            ?>
        </div>
    </div>

</div>
<div class="footer">
    <div>
        <strong>Copyright</strong> We.Code &copy; 2017
    </div>
</div>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
