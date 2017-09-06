<?php
function active($currect_page){
    $url=strtok($_SERVER["REQUEST_URI"],'?');
    $url_array =  explode('/', $url) ;
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <font face="myFirstFont">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Ahmed</strong>
                             </span> <span class="text-muted text-xs block">System admin<b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        <font color="red">PIC</font>AB<br><small>ref</small>
                    </div>
                </li>
                <li class="<?php active('index.php');?>">
                    <a href="index.php">
                        <i class="fa fa-area-chart"></i> <span class="nav-label">Dashboard</span>
                    </a>
                </li>
                <li class="<?php active('users.php');?>">
                    <a href="users.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Users</span></a>
                </li>
                <li class="<?php active('hardware.php');?>">
                    <a href="hardware.php"><i class="fa fa-microchip"></i> <span class="nav-label">Hardware</span></a>
                </li>
                <li class="<?php active('Receipts.php');?>">
                    <a href="Receipts.php"><i class="fa fa-cog fa-spin fa-1x"></i> <span class="nav-label">Receipts</span></a>
                </li>
                <li class="<?php active('PICABteam.php');?>">
                    <a href="PICABteam.php"><i class="fa fa-users fa-1x"></i> <span class="nav-label">PICAB team</span></a>
                </li>
                <li class="<?php active('prosecutions.php');?>">
                    <a href="prosecutions.php"><i class="fa fa-balance-scale fa-1x"></i> <span class="nav-label">Prosecutions</span></a>
                </li>
            </ul>
        </font>
    </div>
</nav>