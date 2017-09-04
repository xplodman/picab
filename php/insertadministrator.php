<?php
include_once "connection.php";

$administratorname=$_POST['administratorname'];
$administratorappid=$_POST['administratorappid'];
$administratorapppw=$_POST['administratorapppw'];

$maxadministratorid = mysqli_query($con, "Select Max(`administrator`.`administratorid`) From `administrator`");
$maxadministratorid = mysqli_fetch_row($maxadministratorid);
$maxadministratorid = implode("", $maxadministratorid);
$maxadministratorid =$maxadministratorid+1;

$query = mysqli_query($con, "INSERT INTO `administrator`(`administratorid`, `administratorname`, `administratorappid`, `administratorapppw`, `createddate`, `updatedate`) VALUES ('$maxadministratorid','$administratorname','$administratorappid','$administratorapppw',NOW(),NULL);")or die(mysqli_error($con));

$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
if ($query) {
mysqli_commit($con);

    header('Location: '.$uri_parts[0].'?backresult=1');
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;
}
else {

    header('Location: '.$uri_parts[0].'?backresult=0');
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;}
?>