<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metro</title>
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

	<!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


</head>

<body class="">
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
                            <font color="red">M</font>etro
                        </div>
                    </li>
                    <li>
                        <a href="index-2.html"><i class="fa fa-area-chart"></i> <span class="nav-label"> الصفحة الرئيسية </span></a>
                    </li>
                    <li class="active">
                        <a href="Suppliers.html"><i class="fa fa-users"></i> <span class="nav-label">الموردين</span></a>
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
                        <a href="login.html">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><p>الموردين</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button"><i class="fa fa-plus"></i>&nbsp;إضافة مورد</button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Basic Data Tables example with responsive plugin</h5>
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
                                            <th class="arabic">أسم الشركة</th>
                                            <th>أسم صاحب الشركة</th>
                                            <th>رقم تليفون صاحب الشركة</th>
                                            <th>أسم البائع</th>
                                            <th>رقم تليفون البائع</th>
                                            <th>أصناف المورد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr data-child-value="

عنوان الفرع الرئيسي : ش45
<br>
عنوان الفرع : ش45
<br>
 نوع التحصيل: كاش (500) جنية - تقسيط (1000) جنية
<br>
">
                                            <td>عنوان الفرع الرئيسي : ش45 عنوان الفرع : ش45 نوع التحصيل: كاش (500) جنية</td>
                                            <td class="details-control"></td>
                                            <td class="middle wrap">بي تك</td>
                                            <td class="middle wrap">أحمد</td>
                                            <td class="middle wrap"><font size="3">01234567891 - 01234567891</font></td>
                                            <td class="middle wrap">محمد</td>
                                            <td class="middle wrap"><font size="3">01234567891 - 01234567891</font></td>
                                            <td class="middle wrap">
                                                <a href="" class="btn btn-info " type="button">كي بورد</a>
                                                <a href="" class="btn btn-info " type="button">لاب توب</a>
                                            </td>


                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>data 2a</td>
                                            <th></th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                            <th>CSS grade</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Line Chart Example
                                <small>With custom colors.</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <div id="lineChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2017
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- d3 and c3 charts -->
<script src="js/plugins/d3/d3.min.js"></script>
<script src="js/plugins/c3/c3.min.js"></script>

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
    $(document).ready(function () {

    c3.generate({
        bindto: '#lineChart',
        size: {
            height: '100%',
        },
        data: {
            x : 'x',
            columns: [
                ['x', 'منشية', 'باب شرقي', 'إستئناف'],
                ['case',  10, 18, 24],
                ['printer', 5, 9, 13],
                ['ups', 4, 2, 3],
            ],
        },
        axis: {
            x: {
                type: 'category',
                tick: {
                    rotate: 75,
                    size: 11,
                    multiline: false,
                },
            }
        }
    });
    });
</script>

</body>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jul 2017 11:39:12 GMT -->

</html>