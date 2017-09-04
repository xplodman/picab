<?php
include_once "php/connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PICAB ref | Receipts</title>
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url(fonts/arabicfont.otf);
        }
        p,
        th,
        td,
        tr,
        span.arabic {
            font-family: myFirstFont;
        }
    </style>

    <style type='text/css'>
        table {
            table-layout: fixed;
            /* nothing here - table is block, so should auto expand to as large as it can get without causing scrollbars? */
        }

        .left {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .middle {
            text-align: left;
            /* expand this column to as large as it can get within table? */
        }

        .wrap {
            word-wrap: break-word;
            /* use up entire cell this div is contained in? */
        }
    </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/c3/c3.min.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


</head>

<body class="animated fadeIn">
<div id="wrapper">
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
                    <li>
                        <a href="index">
                            <i class="fa fa-area-chart"></i> <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="users"><i class="fa fa-user-circle"></i> <span class="nav-label">Users</span></a>
                    </li>
                    <li>
                        <a href="hardware"><i class="fa fa-microchip"></i> <span class="nav-label">Hardware</span></a>
                    </li>
                    <li class="active">
                        <a href="Receipts"><i class="fa fa-cog fa-spin fa-1x"></i> <span class="nav-label">Receipts</span></a>
                    </li>
                </ul>
            </font>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-danger">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>See All Alerts</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInLeftBig">
            <div class="col-sm-4">
                <h2><p>Receipts</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addimport"><i class="fa fa-plus"></i> Imoprt</button>
                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addexport"><i class="fa fa-minus"></i> Export</button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Search and view receipts informations</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="table-responsive">
                                    <table id="example" class=" dataTables-example table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>extn</th>
                                            <th style="width:1em"></th>
                                            <th style="width:1em"></th>
                                            <th style="width:1em"></th><!--order column-->
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Sign</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result22 = mysqli_query($con,"
                                                Select receipt.receiptid,
                                                  receipt.receiptdate,
                                                  receipt.receipttype,
                                                  receipt.receiptsign,
                                                  receipt.createddate,
                                                  receipt.toid,
                                                  receipt.fromid
                                                From receipt") or die(mysqli_error($con));
                                        while($row22 = mysqli_fetch_assoc($result22)) {
                                            ?>
                                            <tr data-child-value="
                                             <?php
                                            $result2 = mysqli_query($con,"
Select Count(ownitem.ownitemid) As countitem,
  ownitem.ownitemname,
  owncategory.owncategoryname,
  receipt.receiptid
From ownitem
  Inner Join receipt On receipt.receiptid = ownitem.receiptid
  Inner Join owncategory On ownitem.owncategoryid = owncategory.owncategoryid
Where receipt.receiptid = $row22[receiptid]
Group By ownitem.ownitemname,
  owncategory.owncategoryname,
  receipt.receiptid") or die(mysqli_error($con));
                                            while($row2 = mysqli_fetch_assoc($result2)) {
                                                echo $row2['countitem']." - ".$row2['owncategoryname']." - ".$row2['ownitemname'];
                                            }
                                            ?> ">
                                                <td>
                                                    <?php
                                                    $result2 = mysqli_query($con,"
Select Count(ownitem.ownitemid) As countitem,
  ownitem.ownitemname,
  owncategory.owncategoryname,
  receipt.receiptid
From ownitem
  Inner Join receipt On receipt.receiptid = ownitem.receiptid
  Inner Join owncategory On ownitem.owncategoryid = owncategory.owncategoryid
Where receipt.receiptid = $row22[receiptid]
Group By ownitem.ownitemname,
  owncategory.owncategoryname,
  receipt.receiptid") or die(mysqli_error($con));
                                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                                        echo $row2['countitem']." - ".$row2['owncategoryname']." - ".$row2['ownitemname'];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <div class="lightBoxGallery">
                                                        <?php
                                                        $query = "SELECT * FROM `image` WHERE `receiptid` = $row22[receiptid]";
                                                        $results = mysqli_query($con, $query);
                                                        foreach ($results as $newresults) {
                                                            ?>
                                                            <a href="data:image/jpeg;base64, <?php echo base64_encode($newresults['imagedata']) ?>" title="Image from Unsplash" data-gallery="#<?php echo $row22['receiptid'] ?>"><i class="fa fa-eye  fa-2x"></i></a>
                                                            <?php
                                                        } ?>
                                                    </div>
                                                </td>
                                                <td class="details-control"></td>
                                                <td><?php echo $row22['receiptid'] ?></td><!--order column-->
                                                <td class="middle wrap"><!--from-->
                                                    <?php
                                                    if ($row22['receipttype'] == 1){
                                                            $result222 = mysqli_query($con,"Select `from`.fromname From `from` Where `from`.fromid = $row22[fromid]") or die(mysqli_error($con));
                                                        while($row222 = mysqli_fetch_assoc($result222)) {
                                                            echo $row222['fromname'];
                                                        }
                                                    }
                                                    else{
                                                        echo "Alex pic";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="middle wrap"><!--to-->
                                                    <?php
                                                    if ($row22['receipttype'] == 1){
                                                        echo "Alex pic";
                                                    }else{
                                                        $result222 = mysqli_query($con,"Select prosecution.prosecutionname From prosecution Where prosecution.prosecutionid = $row22[toid]") or die(mysqli_error($con));
                                                        while($row222 = mysqli_fetch_assoc($result222)) {
                                                            echo $row222['prosecutionname'];
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="middle wrap"><font size="3"><?php
                                                        if ($row22['receipttype'] == 1){
                                                            $result2221 = mysqli_query($con,"Select administrator.administratorname From administrator Where administrator.administratorid = $row22[receiptsign]") or die(mysqli_error($con));
                                                            while($row2221 = mysqli_fetch_assoc($result2221)) {
                                                                echo $row2221['administratorname'];
                                                            }                                                        }else{
                                                            echo $row22['receiptsign'];
                                                        }
                                                        ?></font></td>
                                                <td class="middle wrap"><font size="3"><?php echo $row22['receiptdate'] ?></font></td>
                                                <td class="middle wrap">

                                                    <font size="3">
                                                        <?php
                                                        if ($row22['receipttype'] == 1){
                                                            echo "Import";
                                                        }else{
                                                            echo "Export";
                                                        }
                                                        ?>
                                                    </font>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> We.Code &copy; 2017
            </div>
        </div>
    </div>
</div>
<font face="myFirstFont">
    <div class="modal inmodal" id="addimport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert import receipt</h4>
                </div>
                <div class="modal-body">
                    Information
                    <form method="post" action="php/insertreceipt.php" class="form-horizontal"  multipart="" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="1">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">From</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="chosen-select form-control" name="fromid">
                                        <option></option>
                                        <?php
                                        $query = "SELECT * FROM `from`";
                                        $results=mysqli_query($con, $query);
                                        //loop
                                        foreach ($results as $from){
                                            ?>
                                            <option value="<?php echo $from["fromid"];?>"><?php echo $from["fromname"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addfrom">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sign</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="chosen-select form-control" name="receiptsign">
                                        <option></option>
                                        <?php
                                        $query = "SELECT * FROM `administrator`";
                                        $results=mysqli_query($con, $query);
                                        //loop
                                        foreach ($results as $administrator){
                                            ?>
                                            <option value="<?php echo $administrator["administratorid"];?>"><?php echo $administrator["administratorname"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addadministrator">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="data_1">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        Images
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="file" name="userfile[]" multiple/>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        Items
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Item</label>
                            <div class="col-sm-10">
                                <div class="form-inline">
                                    <div class="field_wrapper">
                                        <div>
                                            <input style="width: 50px" type="text" class="form-control" name="itemquantity[]"/>
                                            <select class="chosen-select2 form-control" name="itemcategory[]">
                                                <option></option>
                                                <?php
                                                $query6 = "SELECT * FROM `owncategory`";
                                                $results6=mysqli_query($con, $query6);
                                                //loop
                                                foreach ($results6 as $owncategory){
                                                    ?>
                                                    <option value="<?php echo $owncategory["owncategoryid"];?>"><?php echo $owncategory["owncategoryname"];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="text" style="width: 250px" placeholder="item name" class="form-control" name="itemname[]">
                                            <button class="btn btn-primary add_button" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                        <button class="btn btn-info"  type="Submit"  name="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="addexport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Insert export receipt</h4>
                </div>
                <div class="modal-body">
                    Information
                    <form method="post" action="php/insertreceipt.php" class="form-horizontal">
                        <input type="hidden" name="type" value="2">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">to</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="chosen-select form-control" name="toid">
                                        <option></option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addfrom">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sign</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select class="chosen-select form-control" name="administratorid">
                                        <option></option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addfrom">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="data_1">
                            <label class="col-sm-2 control-label">Date</label>
                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <input type="text" class="form-control" name="date">
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        Items
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Choose an item</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <select id="hardwarelist" class="form-control dual_select" name="ownitem[]" multiple >
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#additem">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                    <button class="btn btn-info"  type="Submit"  name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="addfrom" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated rollIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert from destination</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="php/insertfrom.php" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="fromname" class="form-control">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="pull-left">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                    </button>
                    <button class="btn btn-info" type="Submit" name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal inmodal" id="addadministrator" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated rollIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert a administrator</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="php/insertadministrator.php" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="administratorname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">App ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="administratorappid" class="form-control">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">App PW</label>
                            <div class="col-sm-10">
                                <input type="text" name="administratorapppw" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        </div>
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                        <button class="btn btn-info" type="Submit" name="submit">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
</font>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- Dual Listbox -->
<script src="js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

<!-- Toastr -->
<script src="js/plugins/toastr/toastr.min.js"></script>


<script src="js/plugins/dataTables/datatables.min.js"></script>
<script>
    function format(value) {
        return '<div class="middle wrap col-sm-12"  >' + value + '</div>';
    }
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 10,
            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },
            columnDefs: [{
                className: 'control',
                orderable: false,
                targets: [ 1 ]
            }],
            columnDefs: [{
                targets: [ 0,3 ],
                visible: false
            }],

            order: [3, 'desc']
        });

    });
</script>
<script>
    $(document).ready(function() {
        <?php
        if (isset($_GET['backresult'])){
        $backresult=$_GET['backresult'];
        ?>
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            toastr.
            <?php
            if ($backresult ==  "1"){
                echo"success('تمت العملية بنجاح')";
            }else{
                echo "error('برجاء إعادة المحاولة', 'لم تتم العملية بنجاح')";
            }
            };?>;

        }, 1300);

    });
</script>

<script>
    $(document).ready(function() {
        var table = $('.dataTables-example').DataTable();
        // Add event listener for opening and closing details
        $('#example').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format(tr.data('child-value'))).show();
                tr.addClass('shown');
            }
        });
    });
    $(document).ready(function() {
        $('.dual_select').bootstrapDualListbox({
            selectorMinimalHeight: 160
        });
        $('.chosen-select').chosen({width: "100%"});
        $('.chosen-select2').chosen({width: "200px"});
        $(".category").select2({
            placeholder: "Select a category",
            allowClear: true
        });
        $(".storepros").select2({
            placeholder: "Select a prosecution",
            allowClear: true
        });
        // Setup - add a text input to each footer cell
        $('#example tfoot th').not(":eq(0)").each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" />');
        });
        // DataTable
        var table = $('#example').DataTable();
        // Apply the search
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

</script>
<script>
    $('#data_1 .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'm/d/yyyy'
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div>' +
            '<input style="width: 50px" type="text" class="form-control" name="quantity[]"/>' +
            '<select class="chosen-select2 form-control" name="category[]">' +
                '<option></option>' +
            <?php
            $query6 = "SELECT * FROM `owncategory`";
            $results6=mysqli_query($con, $query6);
            //loop
            foreach ($results6 as $owncategory){
            ?>
            '<option value="<?php echo $owncategory["owncategoryid"];?>"><?php echo $owncategory["owncategoryname"];?></option>' +
            <?php
            }
            ?>
            '</select>' +
            '<input type="text" style="width: 250px" placeholder="item name" class="form-control" name="itemname[]">' +
            '<button class="btn btn-danger remove_button" type="button">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
            '</div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function(){ //Once add button is clicked
            if(x < maxField){ //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
                $('.chosen-select2').chosen({width: "200px"});

            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
</body>
</html>