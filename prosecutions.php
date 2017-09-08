<?php
include_once "php/connection.php";
 include_once "php/checkauthentication.php";
?>
<!DOCTYPE html>
<html>

<?php
$pageTitle = 'Prosecutions';
include_once "layout/header.php";
?>

<body class="animated fadeIn">
<div id="wrapper">
    <?php
    include_once "layout/menu.php";
    ?>
    <div id="page-wrapper" class="gray-bg">
        <?php
        include_once "layout/topbar.php";
        ?>
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInLeftBig">
            <div class="col-sm-4">
                <h2><p>Prosecutions</p></h2>
            </div>
            <div class="col-sm-8">
                <font face="myFirstFont">
                    <div class="title-action">
                        <button class="btn btn-primary " type="button" data-toggle="modal" data-target="#addpros"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </font>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRightBig">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Search and view prosecutions</h5>
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
                                            <th style="width:1em"></th><!--order column-->
                                            <th>Prosecution name</th>
                                            <?php
                                            $category=mysqli_query($con, "
                                            Select category.categoryname
                                            From category
                                              Inner Join hardware On hardware.categoryid = category.categoryid
                                              Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
                                            Group By category.categoryname ")or die(mysqli_error($con));
                                            $categorycount = mysqli_num_rows($category);
                                            while($categoryname = mysqli_fetch_assoc($category)) {
                                                ?>
                                                <th><?php echo $categoryname['categoryname']?></th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $result22 = mysqli_query($con,"
                                                Select prosecution.prosecutionid,
                                                  prosecution.prosecutionname
                                                From prosecution  ") or die(mysqli_error($con));
                                        while($row22 = mysqli_fetch_assoc($result22)) {
                                            ?>
                                            <tr data-child-value="
                                                <?php
                                            $jobsgroup = mysqli_query($con,"
                                                Select job.jobname,
                                                  Count(job.jobid) As jobscount
                                                From job
                                                  Inner Join user On user.jobid = job.jobid
                                                  Inner Join prosecution On user.prosecutionid = prosecution.prosecutionid
                                                Where prosecution.prosecutionid = $row22[prosecutionid]
                                                Group By job.jobname,
                                                  prosecution.prosecutionid") or die(mysqli_error($con));
                                            while($jobsgroupinfo = mysqli_fetch_assoc($jobsgroup)) {
                                                echo $jobsgroupinfo['jobscount']." - ".$jobsgroupinfo['jobname'];
                                                if (mysqli_num_rows($jobsgroup) > 1) {
                                                    echo "<br>";
                                                }
                                            }?>
"> <!--info plus-->
                                                <td><!--search in info plus-->
                                                    <?php
                                                    $jobsgroup = mysqli_query($con,"
                                                Select job.jobname,
                                                  Count(job.jobid) As jobscount
                                                From job
                                                  Inner Join user On user.jobid = job.jobid
                                                  Inner Join prosecution On user.prosecutionid = prosecution.prosecutionid
                                                Where prosecution.prosecutionid = $row22[prosecutionid]
                                                Group By job.jobname,
                                                  prosecution.prosecutionid") or die(mysqli_error($con));
                                                    while($jobsgroupinfo = mysqli_fetch_assoc($jobsgroup)) {
                                                        echo $jobsgroupinfo['jobscount']." - ".$jobsgroupinfo['jobname'];
                                                        if (mysqli_num_rows($jobsgroup) > 1) {
                                                            echo "<br>";
                                                        }
                                                    }?>
                                                </td>
                                                <td class="details-control"></td>
                                                <td>
                                                    <?php echo $row22['prosecutionid'] ?>
                                                </td><!--order column-->
                                                <td class="middle wrap">
                                                    <font size="3">
                                                        <a class="green" href="prosecution.php?prosecutionid=<?php echo $row22['prosecutionid'] ?>"><?php echo $row22['prosecutionname'] ?>
                                                        </a>
                                                    </font>
                                                </td>
                                                <?php
                                                for($z=1 ; $z <= $categorycount ; $z++)
                                                { ?>
                                                <td class="middle wrap">
                                                    <font size="4">
                                                    <?php
                                                    $result228 = mysqli_query($con,"
                                                Select category.categoryname,
                                                  Count(category.categoryid) As count
                                                From category
                                                  Inner Join hardware On hardware.categoryid = category.categoryid
                                                  Inner Join prosecution On prosecution.prosecutionid = hardware.prosecutionid
                                                Where prosecution.prosecutionid = $row22[prosecutionid] And category.categoryid = $z
                                                Group By category.categoryname,
                                                  prosecution.prosecutionid,
                                                  category.categoryid") or die(mysqli_error($con));
                                                    while($row228 = mysqli_fetch_assoc($result228)) {
                                                        echo $row228['count'];
                                                    }
                                                    ?>
                                                    </font>
                                                </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>

                                            <th></th>
                                            <th></th>
                                            <th></th>
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
<?php
include_once "layout/modals.php";
?>
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
                targets: [ 0,2 ],
                visible: false
            }],

            order: [2, 'desc']
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