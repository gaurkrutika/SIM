<?php
require("connection.php");?>

<?php
if(isset($_POST['SUB'])){
    
    $sql="UPDATE `sim_line7` SET `NM_n`='$_POST[nm_mm_no]',`CRI_NC`='$_POST[critical_non_critical]',`SYSTEM`='$_POST[system]',`DESC`='$_POST[description]',`PARTNO`='$_POST[partnumber]',`TIP`='$_POST[total_installed_population]',`SUPPLIER`='$_POST[supplier]',`PACNON_PAC`='$_POST[pac_non_pac]',`UNIT`='$_POST[unit]',`PRICE`='$_POST[price_inr]',`GST`='$_POST[gst]',`CONTRQTY`='$_POST[contractual_qty]',`RCQTY`='$_POST[received_qty]',`BALQTY`='$_POST[balanced_qty]',`DCOSMKPD`='$_POST[dcos_mkpd]',`CSMKPD`='$_POST[cs_mkpd]',`FLSMKPR`='$_POST[fls_mkpr]',`FLSMVPO`='$_POST[fls_mvpo]',`MUPR`='$_POST[fls_mupr]',`ATPMKPD`='$_POST[atp_mkpd]',`VND`='$_POST[atp_vnd]',`TOTALAVAIL`='$_POST[total_availability]',`UNDERPIP`='$_POST[under_pipeline]',`TOTBUF`='$_POST[total_buffer_pos]',`GIVLOAN`='$_POST[given_on_loan_basis]',`FAILURE20`='$_POST[failure2020]',`FAILURE21`='$_POST[failure2021]',`FAILURE22`='$_POST[failure2022]',`TOTFAILURE`='$_POST[total_failure]',`AVGFAIL`='$_POST[avg_failure_yearly]',`FINALQTY`='$_POST[final_qty_to_be_procured]',`REMARKS`='$_POST[remarks]' WHERE `SNO`='$_POST[sno]'";
    mysqli_query($db,$sql);
    echo 'Updated Succesfully';
    exit(0);
}
if(isset($_GET['action']) && ($_GET['action']) =='del'){
    $sql='DELETE FROM `sim_line7` WHERE `SNO` ="'.$_GET['id'].'"';
    mysqli_query($db,$sql);
    echo 'Deleted Succesfully';
    exit(0);
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'ims');
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `sim_line7` WHERE `SNO`='$id'";
    $ex = mysqli_query($conn, $sql);

    if (!$ex) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($fe = mysqli_fetch_array($ex)) {
        echo '<form method="post"><div class="modal-body">
          <table>
                        <tr>
                            <th>Sno</th>
                            <td><input readonly type="text" id="sno" name="sno" value="'.$fe['SNO'].'"></td>
                        </tr>
                        <tr>
                            <th>NM/ MM No</th>
                            <td><input type="text" id="nm_mm_no" name="nm_mm_no" value="'.$fe['NM_n'].'"></td>
                        </tr>
                        <tr>
                            <th>Critical/ Non-Critical</th>
                            <td><input type="text" id="critical_non_critical" name="critical_non_critical" value="'.$fe['CRI_NC'].'"></td>
                        </tr>
                        <tr>
                            <th>System</th>
                            <td><input type="text" id="system" name="system" value="'.$fe['SYSTEM'].'"></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><input type="text" id="description" name="description" value="'.$fe['DESC'].'"></td>
                        </tr>
                        <tr>
                            <th>Partnumber</th>
                            <td><input type="text" id="partnumber" name="partnumber" value="'.$fe['PARTNO'].'"></td>
                        </tr>
                        <tr>
                            <th>Total installed Population</th>
                            <td><input type="text" id="total_installed_population" name="total_installed_population" value="'.$fe['TIP'].'"></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td><input type="text" id="supplier" name="supplier" value="'.$fe['SUPPLIER'].'"></td>
                        </tr>
                        <tr>
                            <th>PAC/NON-PAC</th>
                            <td><input type="text" id="pac_non_pac" name="pac_non_pac" value="'.$fe['PACNON_PAC'].'"></td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td><input type="text" id="unit" name="unit" value="'.$fe['UNIT'].'"></td>
                        </tr>
                        <tr>
                            <th>Price (INR)</th>
                            <td><input type="text" id="price_inr" name="price_inr" value="'.$fe['PRICE'].'"></td>
                        </tr>
                        <tr>
                            <th>GST (%)</th>
                            <td><input type="text" id="gst" name="gst" value="'.$fe['GST'].'"></td>
                        </tr>
                        <tr>
                            <th>Contractual Qty (as per PS)</th>
                            <td><input type="text" id="contractual_qty" name="contractual_qty" value="'.$fe['CONTRQTY'].'"></td>
                        </tr>
                        <tr>
                            <th>Received Qty</th>
                            <td><input type="text" id="received_qty" name="received_qty" value="'.$fe['RCQTY'].'"></td>
                        </tr>
                        <tr>
                            <th>Balanced Qty</th>
                            <td><input type="text" id="balanced_qty" name="balanced_qty" value="'.$fe['BALQTY'].'"></td>
                        </tr>
                        <tr>
                            <th>DCOS MKPD</th>
                            <td><input type="text" id="dcos_mkpd" name="dcos_mkpd" value="'.$fe['DCOSMKPD'].'"></td>
                        </tr>
                        <tr>
                            <th>CS MKPD</th>
                            <td><input type="text" id="cs_mkpd" name="cs_mkpd" value="'.$fe['CSMKPD'].'"></td>
                        </tr>
                        <tr>
                            <th>FLS MKPR</th>
                            <td><input type="text" id="fls_mkpr" name="fls_mkpr" value="'.$fe['FLSMKPR'].'"></td>
                        </tr>
                        <tr>
                            <th>FLS MVPO</th>
                            <td><input type="text" id="fls_mvpo" name="fls_mvpo" value="'.$fe['FLSMVPO'].'"></td>
                        </tr>
                        <tr>
                            <th>FLS MUPR</th>
                            <td><input type="text" id="fls_mupr" name="fls_mupr" value="'.$fe['MUPR'].'"></td>
                        </tr>
                        <tr>
                            <th>ATP MKPD</th>
                            <td><input type="text" id="atp_mkpd" name="atp_mkpd" value="'.$fe['ATPMKPD'].'"></td>
                        </tr>
                        <tr>
                            <th>ATP VND</th>
                            <td><input type="text" id="atp_vnd" name="atp_vnd" value="'.$fe['VND'].'"></td>
                        </tr>
                        <tr>
                            <th>Total Availability</th>
                            <td><input type="text" id="total_availability" name="total_availability" value="'.$fe['TOTALAVAIL'].'"></td>
                        </tr>
                        <tr>
                            <th>Under Pipeline</th>
                            <td><input type="text" id="under_pipeline" name="under_pipeline" value="'.$fe['UNDERPIP'].'"></td>
                        </tr>
                        <tr>
                            <th>Total Buffer Pos</th>
                            <td><input type="text" id="total_buffer_pos" name="total_buffer_pos" value="'.$fe['TOTBUF'].'"></td>
                        </tr>
                        <tr>
                            <th>Given on loan basis</th>
                            <td><input type="text" id="given_on_loan_basis" name="given_on_loan_basis" value="'.$fe['GIVLOAN'].'"></td>
                        </tr>
                        <tr>
                            <th>Failure 2020</th>
                            <td><input type="text" id="failure2020" name="failure2020" value="'.$fe['FAILURE20'].'"></td>
                        </tr>
                        <tr>
                            <th>Failure 2021</th>
                            <td><input type="text" id="failure2021" name="failure2021" value="'.$fe['FAILURE21'].'"></td>
                        </tr>
                        <tr>
                            <th>Failure 2022</th>
                            <td><input type="text" id="failure2022" name="failure2022" value="'.$fe['FAILURE22'].'"></td>
                        </tr>
                        <tr>
                            <th>Total Failure</th>
                            <td><input type="text" id="total_failure" name="total_failure" value="'.$fe['TOTFAILURE'].'"></td>
                        </tr>
                        <tr>
                            <th>Avg Failure Yearly</th>
                            <td><input type="text" id="avg_failure_yearly" name="avg_failure_yearly" value="'.$fe['AVGFAIL'].'"></td>
                        </tr>
                        <tr>
                            <th>Final Qty to be procured</th>
                            <td><input type="text" id="final_qty_to_be_procured" name="final_qty_to_be_procured" value="'.$fe['FINALQTY'].'"></td>
                        </tr>
                        <tr>
                            <th>Remarks</th>
                            <td><input type="text" id="remarks" name="remarks" value="'.$fe['REMARKS'].'"></td>
                        </tr>
                    </table>
          </div>
          <div class="modal-footer">
            
            <button type="submit" name= "SUB" class="btn btn-success">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    </form>';
    }

    mysqli_close($conn);
}
?>


<!--<form>
<div class="modal-body">
      <table>
                    <tr>
                        <th>Sno</th>
                        <td><input type="text" id="sno" name="sno"></td>
                    </tr>
                    <tr>
                        <th>NM/ MM No</th>
                        <td><input type="text" id="nm_mm_no" name="nm_mm_no"></td>
                    </tr>
                    <tr>
                        <th>Critical/ Non-Critical</th>
                        <td><input type="text" id="critical_non_critical" name="critical_non_critical"></td>
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
                        <td><input type="text" id="total_installed_population" name="total_installed_population"></td>
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
                        <td><input type="text" id="final_qty_to_be_procured" name="final_qty_to_be_procured"></td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td><input type="text" id="remarks" name="remarks"></td>
                    </tr>
                </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>-->