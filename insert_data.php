<?php
include 'connection.php';
if(isset($_POST['add_students'])){
// $a =$_POST['sno'];
$b = $_POST['nm_mm_no'];
$d= $_POST['critical_non_critical'];
$e= $_POST['system'];
$f= $_POST['description'];
$g= $_POST['partnumber'];
$h= $_POST['total_installed_population'];
$i= $_POST['supplier'];
$j= $_POST['pac_non_pac'];
$k= $_POST['unit'];
$l= $_POST['price_inr'];
$m= $_POST['gst'];
$n= $_POST['contractual_qty'];
$o= $_POST['received_qty'];
$p= $_POST['balanced_qty'];
$q= $_POST['dcos_mkpd'];
$r= $_POST['cs_mkpd'];
$s= $_POST['fls_mkpr'];
$t= $_POST['fls_mvpo'];
$u= $_POST['fls_mupr'];
$v= $_POST['atp_mkpd'];
$w= $_POST['atp_vnd'];
$x= $_POST['total_availability'];
$y= $_POST['under_pipeline'];
$z= $_POST['total_buffer_pos'];
$AB= $_POST['given_on_loan_basis'];
$CD= $_POST['failure2020'];
$EF= $_POST['failure2021'];
$GH= $_POST['failure2022'];
$IJ= $_POST['total_failure'];
$KL= $_POST['avg_failure_yearly'];
$MN= $_POST['final_qty_to_be_procured'];
$OP= $_POST['remarks'];
if($b==""|| empty($b)) {
header('location: line7.php?message=You need to fill in the first name!');
}
else{
    $query = "INSERT INTO `sim_line7`(`SNO`, `NM_n`, `CRI_NC`, `SYSTEM`, `DESC`, `PARTNO`, `TIP`, `SUPPLIER`, `PACNON_PAC`, `UNIT`, `PRICE`, `GST`, `CONTRQTY`, `RCQTY`, `BALQTY`, `DCOSMKPD`, `CSMKPD`, `FLSMKPR`, `FLSMVPO`, `MUPR`, `ATPMKPD`, `VND`, `TOTALAVAIL`, `UNDERPIP`, `TOTBUF`, `GIVLOAN`, `FAILURE20`, `FAILURE21`, `FAILURE22`, `TOTFAILURE`, `AVGFAIL`, `FINALQTY`, `REMARKS`) VALUES (NULL, '$b',
'$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w',
'$x','$y','$z','$AB','$CD','$EF','$GH','$IJ','$KL','$MN','$OP')";
echo $query;
$result = mysqli_query($db,$query);
if(!$result) {
die("Query Failed".mysqli_error());
}
else{
header('location: line_7.php?insert_msg=You data has been added successfully');
}
}
}
?>
