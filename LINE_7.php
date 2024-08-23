<?php
require("connection.php");
session_start();
if(isset($_SESSION['login']) and $_SESSION['login']=='YES'){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINE 7</title>
    <style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        font-size: .5em;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>



    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script defer src="app.js"></script>
</head>

<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" style="display:none">


            <h3 class="dashboard_logo" id="dashboard_sidebar">SIM</h3>
            <div class="dashboard_sidebar_user" id="dashboard_logo">
                <img src="" alt="User image." />
                <span></span>
            </div>

        </div>
        <div class="dasboard_content_container" id="dasboard_content_container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="width:100%">
            <a class="navbar navbar- dark bg-light" href="DASHBOARD2.PHP">SIM</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <span class="navbar-text">
                        <a href="logout.php" id="logoutBtn"><i class="fa fa-power-off"></i> Log-out</a>
                    </span>
                </div>
            </nav>





            <!-- <h1>INVENTORY</h1> -->
            <?php
                    if(isset($_GET['message'])){
                        echo "<h6>".$_GET['message']."</h6>";}?>
            <?php
                    if(isset($_GET['insert_msg'])){
                        echo "<h6>".$_GET['insert_msg']."</h6>";}?>
            <script>
            function validateForm() {
                let isValid = true;
                let fields = ["sno", "nm_mm_no", "critical_non_critical", "system", "description", "partnumber",
                    "total_installed_population", "supplier", "pac_non_pac", "unit", "price_inr", "gst",
                    "contractual_qty", "received_qty", "balanced_qty", "dcos_mkpd", "cs_mkpd", "fls_mkpr",
                    "fls_mvpo", "fls_mupr", "atp_mkpd", "atp_vnd", "total_availability", "under_pipeline",
                    "total_buffer_pos", "given_on_loan_basis", "failure2020", "failure2021", "failure2022",
                    "total_failure", "avg_failure_yearly", "final_qty_to_be_procured", "remarks"
                ];
                fields.forEach(field => {
                    let value = document.forms["inventoryForm"][field].value;
                    if (value === "") {
                        isValid = false;
                        document.getElementById(field).classList.add("is-invalid");
                    } else {
                        document.getElementById(field).classList.remove("is-invalid");
                    }
                });
                return isValid;
            }
            </script>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <form action="insert_data.php" method="POST">

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD NEW ENTRY</h1>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <tr>
                                        <th>Sno</th>
                                        <td><input type="text" readonly id="sno" >Auto Assigned</td>
                                    </tr>
                                    <tr>
                                        <th>NM/ MM No</th>
                                        <td><input type="text" id="nm_mm_no" name="nm_mm_no"></td>
                                    </tr>
                                    <tr>
                                        <th>Critical/ Non-Critical</th>
                                        <td><input type="text" id="critical_non_critical" name="critical_non_critical">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>System</th>
                                        <td><input type="text" id="system" name="system"></td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td><input type="text" id="description" name="description"></td>
                                    </tr>
                                    <tr>
                                        <th>Partnumber</th>
                                        <td><input type="text" id="partnumber" name="partnumber"></td>
                                    </tr>
                                    <tr>
                                        <th>Total installed Population</th>
                                        <td><input type="text" id="total_installed_population"
                                                name="total_installed_population"></td>
                                    </tr>
                                    <tr>
                                        <th>Supplier</th>
                                        <td><input type="text" id="supplier" name="supplier"></td>
                                    </tr>
                                    <tr>
                                        <th>PAC/NON-PAC</th>
                                        <td><input type="text" id="pac_non_pac" name="pac_non_pac"></td>
                                    </tr>
                                    <tr>
                                        <th>Unit</th>
                                        <td><input type="text" id="unit" name="unit"></td>
                                    </tr>
                                    <tr>
                                        <th>Price (INR)</th>
                                        <td><input type="text" id="price_inr" name="price_inr"></td>
                                    </tr>
                                    <tr>
                                        <th>GST (%)</th>
                                        <td><input type="text" id="gst" name="gst"></td>
                                    </tr>
                                    <tr>
                                        <th>Contractual Qty (as per PS)</th>
                                        <td><input type="text" id="contractual_qty" name="contractual_qty"></td>
                                    </tr>
                                    <tr>
                                        <th>Received Qty</th>
                                        <td><input type="text" id="received_qty" name="received_qty"></td>
                                    </tr>
                                    <tr>
                                        <th>Balanced Qty</th>
                                        <td><input type="text" id="balanced_qty" name="balanced_qty"></td>
                                    </tr>
                                    <tr>
                                        <th>DCOS MKPD</th>
                                        <td><input type="text" id="dcos_mkpd" name="dcos_mkpd"></td>
                                    </tr>
                                    <tr>
                                        <th>CS MKPD</th>
                                        <td><input type="text" id="cs_mkpd" name="cs_mkpd"></td>
                                    </tr>
                                    <tr>
                                        <th>FLS MKPR</th>
                                        <td><input type="text" id="fls_mkpr" name="fls_mkpr"></td>
                                    </tr>
                                    <tr>
                                        <th>FLS MVPO</th>
                                        <td><input type="text" id="fls_mvpo" name="fls_mvpo"></td>
                                    </tr>
                                    <tr>
                                        <th>FLS MUPR</th>
                                        <td><input type="text" id="fls_mupr" name="fls_mupr"></td>
                                    </tr>
                                    <tr>
                                        <th>ATP MKPD</th>
                                        <td><input type="text" id="atp_mkpd" name="atp_mkpd"></td>
                                    </tr>
                                    <tr>
                                        <th>ATP VND</th>
                                        <td><input type="text" id="atp_vnd" name="atp_vnd"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Availability</th>
                                        <td><input type="text" id="total_availability" name="total_availability"></td>
                                    </tr>
                                    <tr>
                                        <th>Under Pipeline</th>
                                        <td><input type="text" id="under_pipeline" name="under_pipeline"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Buffer Pos</th>
                                        <td><input type="text" id="total_buffer_pos" name="total_buffer_pos"></td>
                                    </tr>
                                    <tr>
                                        <th>Given on loan basis</th>
                                        <td><input type="text" id="given_on_loan_basis" name="given_on_loan_basis"></td>
                                    </tr>
                                    <tr>
                                        <th>Failure 2020</th>
                                        <td><input type="text" id="failure2020" name="failure2020"></td>
                                    </tr>
                                    <tr>
                                        <th>Failure 2021</th>
                                        <td><input type="text" id="failure2021" name="failure2021"></td>
                                    </tr>
                                    <tr>
                                        <th>Failure 2022</th>
                                        <td><input type="text" id="failure2022" name="failure2022"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Failure</th>
                                        <td><input type="text" id="total_failure" name="total_failure"></td>
                                    </tr>
                                    <tr>
                                        <th>Avg Failure Yearly</th>
                                        <td><input type="text" id="avg_failure_yearly" name="avg_failure_yearly"></td>
                                    </tr>
                                    <tr>
                                        <th>Final Qty to be procured</th>
                                        <td><input type="text" id="final_qty_to_be_procured"
                                                name="final_qty_to_be_procured"></td>
                                    </tr>
                                    <tr>
                                        <th>Remarks</th>
                                        <td><input type="text" id="remarks" name="remarks"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="add_students" class="btn btn-success">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-3" id="hoo" style="height:100vh;width:30vh;background: #323232;">
                    <div class="row text-right">
                        <div class="col"><?php 
        // session_start();
        echo '<span style="color:white;font-italic">'.$_SESSION['Username'].'</span>';
        
        
        ?>
                            <button id="toggleBtn" onClick='kru()'><a href=""></a><i
                                    class="fa fa-times"></i></a></button>
                        </div>
                    </div>
                    <span styel='color:white'></span>
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 1</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 2</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 3</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 4</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 5</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 6</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="Line_7.php">
            <div class="row">
                <div class="col">Line 7</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 8</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 9</div>
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-center text-light fa fa-dashboard menuIcons" href="#">
            <div class="row">
                <div class="col">Line 10</div>
            </div>
        </a>
    </li>
</ul>

                </div>
                <div class="col-1" id="ho" style="height:100vh;width:30vh;background: #323232; display:none ">
                    <div class="row text-right">
                        <div class="col">
                            <button id="toggleBtn" onClick='kru()'><a href=""></a><i
                                    class="fa fa-navicon"></i></a></button>
                        </div>

                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 1</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 2</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 3</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 4</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 5</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 6</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 7</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 8</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 9</div>
                    </div>
                    <div class="row text-center text-light">
                        <div class="col"> 10</div>
                    </div>
                </div>

                <div class="col" style=width:70vh;>

                    <?php
$db=mysqli_connect('localhost', 'root', '', 'ims'); 
$sql="select * from `sim_line7`";
$ex=mysqli_query($db,$sql);
echo'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Row
</button><table class="table font-weight-bold"><thead class="bg-warning"><tr><td>Action</td><td>Sno</td><td>NM/ MM No</td><td>Critical/ Non-Critical</td><td>System</td><td>Description</td><td>Partnumber</td><td>Total installed Population</td>
<td>Supplier</td>
<td>PAC/NON-PAC</td><td>Unit</td><td>Price(inr)</td><td>GST(%)</td><td>Contarctual Qty(as per PS)</td><td>Received Qty</td><td>Balanced Qty</td>
<td>DCOS MKPD</td><td>CS MKPD</td><td>FLS MKPR</td>
<td>FLS MVPO</td><td>FLS MUPR</td><td>ATP MKPD</td><td>ATP VND</td>
<td>Total Availability</td><td>Under Pipeline</td><td>Total Buffer Pos</td><td>Given on loan basis</td><td>Failure2020</td><td>Failure2021</td><td>Failure2022</td><td>Total Failure</td>
<td>Avg Failure Yearly</td><td>Final Qty to be procured</td><td>Remarks</td></tr></thead><tbody>';
while($fe=mysqli_fetch_array($ex)){
    echo "<tr><td><a href=\"update.php?id=".$fe['SNO']."\" >Update</a>&nbsp;<a class='text-danger' href=\"update.php?id=".$fe['SNO']."&action=del\" >Delete</a></td><td>".$fe['SNO']."</td><td>".$fe['NM_n']."</td><td>".$fe['CRI_NC']."</td><td>".$fe['SYSTEM']."</td><td>".$fe['DESC']."</td><td>".$fe['PARTNO']."</td><td>".$fe['TIP']."</td><td>".$fe['SUPPLIER']."</td><td>".$fe['PACNON_PAC']."</td><td>".$fe['UNIT']."</td><td>".$fe['PRICE']."</td><td>".$fe['GST']."</td><td>".$fe['CONTRQTY']."</td><td>".$fe['RCQTY']."</td><td>".$fe['BALQTY']."</td><td>".$fe['DCOSMKPD']."</td><td>".$fe['CSMKPD']."</td><td>".$fe['FLSMKPR']."</td><td>".$fe['FLSMVPO']."</td><td>".$fe['MUPR']."</td><td>".$fe['ATPMKPD']."</td><td>".$fe['VND']."</td><td>".$fe['TOTALAVAIL']."</td><td>".$fe['UNDERPIP']."</td><td>".$fe['TOTBUF']."</td><td>".$fe['GIVLOAN']."</td><td>".$fe['FAILURE20']."</td><td>".$fe['FAILURE21']."</td><td>".$fe['FAILURE22']."</td><td>".$fe['TOTFAILURE']."</td><td>".$fe['AVGFAIL']."</td><td>".$fe['FINALQTY']."</td><td>".$fe['REMARKS']."</td></tr>";
}

echo"</tbody></table>"

?>

                </div>



                <script>
                var y = 1;

                function kru() {

                    var x = document.getElementById('hoo');
                    var z = document.getElementById('ho');
                    if (y % 2 == 1) {
                        x.style.display = 'none';
                        z.style.display = 'block';
                        y++;
                    } else {
                        z.style.display = 'none';
                        x.style.display = 'block';
                        y--;
                    }
                }
                </script>

                <?php
    }
    else{
        header('Location:login.php');
    }
    ?>

</body>


</html>