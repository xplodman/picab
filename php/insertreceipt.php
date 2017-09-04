<?php
include_once "connection.php";
$type=$_POST['type'];


$fromid=$_POST['fromid'];
$receiptsign=$_POST['receiptsign'];
$date=$_POST['date'];

$maxreceiptid = mysqli_query($con, "Select Max(`receipt`.`receiptid`) From `receipt`");
$maxreceiptid = mysqli_fetch_row($maxreceiptid);
$maxreceiptid = implode("", $maxreceiptid);
$maxreceiptid=$maxreceiptid+1;

$query = mysqli_query($con, "INSERT INTO `receipt`(`receiptid`, `fromid`, `toid`, `receiptsign`, `receiptdate`, `receipttype`, `createddate`, `updatedate`) VALUES ('$maxreceiptid','$fromid',NULL,'$receiptsign','$date','$type',NOW(),'$image');")or die(mysqli_error($con));

// inserting image
foreach($_FILES['userfile']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['userfile']['name'][$key];
    $file_size =$_FILES['userfile']['size'][$key];
    $file_tmp =$_FILES['userfile']['tmp_name'][$key];
    $file_type=$_FILES['userfile']['type'][$key];


    // database connection

    $maximageid = mysqli_query($con, "Select Max(`image`.`imageid`) From `image`");
    $maximageid = mysqli_fetch_row($maximageid);
    $maximageid = implode("", $maximageid);
    $maximageid=$maximageid+1;

    $imgData =addslashes (file_get_contents($file_tmp));

    // put the image in the db...

    // insert the image
    $query = mysqli_query($con, "INSERT INTO image
	(`imageid`, `imagedata`, `receiptid`, `createddate`, `updatedate`)
	VALUES
	($maximageid,'{$imgData}',$maxreceiptid, NOW(),NULL);") or die(mysqli_error($con));
}

// insert items
$itemquantity=$_POST['itemquantity'];
$itemcategory=$_POST['itemcategory'];
$itemname=$_POST['itemname'];
$lenitemquantity = count($itemquantity);
$lenitemcategory = count($itemcategory);
$lenitemname = count($itemname);

$maxitemid = mysqli_query($con, "Select Max(`ownitem`.`ownitemid`) From `ownitem`");
$maxitemid = mysqli_fetch_row($maxitemid);
$maxitemid = implode("", $maxitemid);
$maxitemid=$maxitemid+1;

for($z=0 ; $z < $lenitemname ; $z++)
{
    for($y=0 ; $y < $itemquantity[$z] ; $y++)
    {

        $query = mysqli_query($con, "INSERT INTO `ownitem` (`ownitemid`, `owncategoryid`, `ownitemname`,  `ownitemtype`, `receiptid`) VALUES ($maxitemid, '$itemcategory[$z]', '$itemname[$z]', '1', $maxreceiptid);") or die(mysqli_error($con));
        $maxitemid=$maxitemid+1;

    }
}




// return back with backresult
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