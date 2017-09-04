<?php
include_once "connection.php";
if (!empty($_POST["cid"])) {
    $cid = $_POST["cid"];
    $query="SELECT * FROM `hardware` WHERE `prosecutionid` = $cid";
    $results = mysqli_query($con, $query);

    foreach ($results as $city){
        ?>
        <option value="<?php echo $city["hardwareid"];?>"><?php echo $city["hardwareid"];?>
        </option>
        <?php
    }
}
?>