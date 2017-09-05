<?php
include_once "php/connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PICAB ref | Users</title>
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
                        <a href="index.php">
                            <i class="fa fa-area-chart"></i> <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="users.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Users</span></a>
                    </li>
                    <li>
                        <a href="hardware.php"><i class="fa fa-microchip"></i> <span class="nav-label">Hardware</span></a>
                    </li>
                    <li>
                        <a href="Receipts.php"><i class="fa fa-cog fa-spin fa-1x"></i> <span class="nav-label">Receipts</span></a>
                    </li>
                    <li>
                        <a href="PICABteam.php"><i class="fa fa-users fa-1x"></i> <span class="nav-label">PICAB team</span></a>
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
                <h2><p>Users</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Add a user</button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Search and view users information</h5>
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
                                            <th>Name</th>
                                            <th>Job</th>
                                            <th>Dom/App ID</th>
                                            <th>Dom/App PW</th>
                                            <th>Prosecution</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $result = mysqli_query($con,"
                                                Select user.username,
                                                  job.jobname,
                                                  user.userid,
                                                  user.userappid,
                                                  user.userapppw,
                                                  user.createddate,
                                                  prosecution.prosecutionname
                                                From job
                                                  Inner Join user On user.jobid = job.jobid
                                                  Inner Join prosecution On prosecution.prosecutionid = user.prosecutionid
                                                Order By user.username") or die(mysqli_error($con));
                                            while($row = mysqli_fetch_assoc($result)) {
$result2 = mysqli_query($con,"
Select category.categoryname,
  hardware.hardwarename,
  hardware.hardwaresn
From hardware
  Inner Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
  Inner Join category On hardware.categoryid = category.categoryid
Where user_has_hardware.userid = $row[userid] ") or die(mysqli_error($con)); ?>
                                                <tr data-child-value="
                                                <?php
                                                while($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo $row2['categoryname']." - ".$row2['hardwarename']."- SN: ".$row2['hardwaresn'];
                                                    if (mysqli_num_rows($result) > 1) {
                                                        echo "<br>";
                                                    }
                                                }
                                                ?>
">
                                                    <td>
                                                        <?php
                                                        $result2 = mysqli_query($con,"
Select category.categoryname,
  hardware.hardwarename,
  hardware.hardwaresn
From hardware
  Inner Join user_has_hardware On user_has_hardware.hardwareid =
    hardware.hardwareid
  Inner Join category On hardware.categoryid = category.categoryid
Where user_has_hardware.userid =  $row[userid] AND user_has_hardware.status = '1'") or die(mysqli_error($con));
                                                        while($row2 = mysqli_fetch_assoc($result2)) {
                                                            echo $row2['categoryname']." - ".$row2['hardwarename']."- SN: ".$row2['hardwaresn'];
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="details-control"></td>
                                                    <td class="middle wrap"><?php echo $row['username'] ?></td>
                                                    <td class="middle wrap"><?php echo $row['jobname'] ?></td>
                                                    <td class="middle wrap"><font
                                                                size="3"><?php echo $row['userappid'] ?></font></td>
                                                    <td class="middle wrap"><font
                                                                size="3"><?php echo $row['userapppw'] ?></font></td>
                                                    <td class="middle wrap"><?php echo $row['prosecutionname'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
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
    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert a user</h4>
                </div>
                <div class="modal-body">
                    Information
                    <form method="post" action="php/insertuser.php" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Username</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="username"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Job</label>
                            <div class="col-sm-10"><div class="input-group"><select class="chosen-select form-control" name="jobid">
                                        <option></option>
                                        <?php
                                        $query = "SELECT * FROM job";
                                        $results=mysqli_query($con, $query);
                                        //loop
                                        foreach ($results as $job){
                                            ?>
                                            <option value="<?php echo $job["jobid"];?>"><?php echo $job["jobname"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> <span class="input-group-btn">
                                                    <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addjob">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    </span></div>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Domain/App ID</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="userappid"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Domain/App PW</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="userapppw"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Prosecution</label>
                            <div class="col-sm-10"><div class="input-group"><select class="chosen-select form-control" name="prosecutionid" onchange="getId(this.value);">
                                        <option></option>
                                        <?php
                                        $query = "SELECT * FROM prosecution";
                                        $results=mysqli_query($con, $query);
                                        //loop
                                        foreach ($results as $prosecution){
                                            ?>
                                            <option value="<?php echo $prosecution["prosecutionid"];?>"><?php echo $prosecution["prosecutionname"];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select> <span class="input-group-btn">
                                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addpros">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </span></div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        Hardware
                        <div class="form-group"><label class="col-sm-2 control-label">Choose an item</label>
                            <div class="col-sm-10"><div class="input-group"> <select id="hardwarelist" class="form-control dual_select" name="hardwareid[]" multiple >
                                    </select> <span class="input-group-btn">
                                                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#additem">
                                                        <i class="fa fa-plus"></i>
                                                    </button> </span></div>
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
<div class="modal inmodal" id="additem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title">Insert hardware item</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="php/insertitem.php" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <div class="input-group"><select required="required" name="categoryname" class="chosen-select" form-control">
                                <option></option>
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM `category`");
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['categoryid'] ?>"> <?php echo $row['categoryname']?> </option>
                                <?php } ?>
                                </select> <span class="input-group-btn"> <button
                                            class="btn btn-primary " type="button"
                                            data-toggle="modal" data-target="#addcat"><i
                                                class="fa fa-plus"></i></button>
                                                    </span></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10"><input required="required" name="hardwarename" type="text" class="form-control"><span
                                    class="help-block m-b-none">Like (HP - Dell - Canon - etc)</span>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">serial</label>

                        <div class="col-sm-10"><input name="hardwaresn" type="text" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">IP</label>

                        <div class="col-sm-10"><input name="hardwareip" type="text" class="form-control"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">Store in</label>
                        <div class="col-sm-10">
                            <div class="input-group"><select required="required" class="chosen-select form-control" name="prosecution">
                                    <option></option>
                                    <?php
                                    $query = "SELECT * FROM prosecution";
                                    $results=mysqli_query($con, $query);
                                    //loop
                                    foreach ($results as $prosecution){
                                        ?>
                                        <option value="<?php echo $prosecution["prosecutionid"];?>"><?php echo $prosecution["prosecutionname"];?></option>
                                        <?php
                                    }
                                    ?>
                                </select> <span class="input-group-btn"> <button
                                            class="btn btn-primary " type="button"
                                            data-toggle="modal" data-target="#addpros"><i
                                                class="fa fa-plus"></i></button>
                                                    </span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">

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
    <div class="modal inmodal" id="addpros" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated rollIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                    <h4 class="modal-title">Insert prosecution</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="php/insertpros.php" class="form-horizontal">
                        <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input name="prosecutionname" type="text" class="form-control">
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
<div class="modal inmodal" id="addjob" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated rollIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title">Insert a job</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="php/insertjob.php" class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="jobname" class="form-control">
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
</font>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

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
                targets: 1
            }],
            columnDefs: [{
                targets: 0,
                visible: false
            }],
            order: [2, 'asc']

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
    function getId(val){
        //We create ajax function
        $.ajax({
            type: "POST",
            url: "php/gethardware.php",
            data: "prosecution="+val,
            success: function(data){
                $("#hardwarelist").html(data);
                $("#hardwarelist").bootstrapDualListbox('refresh', true);
            }
        });
    }
</script>
</body>
</html>