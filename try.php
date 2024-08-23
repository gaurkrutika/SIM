<?php 
  
// Create connection 
// Localhost is the server name,  
// root is the username,  
// password is empty 
// database name is gfg 
$db = new mysqli('localhost', 'root', '', 'ims'); 
  
// Checking connection 
if ($db->connect_errno) { 
  echo "Failed " . $db->connect_error; 
  exit(); 
} 
?>
  
<h1> 
    html table code for displaying  
    details like name, rollno, city  
    in tabular format and store in  
    database 
</h1> 
  
<table align="center" width="800" 
    border="1" style= 
    "border-collapse: collapse;  
    border:1px solid #ddd;"  
    cellpadding="5"
    cellspacing="0"> 
  
    <thead> 
        <tr bgcolor="#FFCC00"> 
            <th> 
                <center>NAME</center> 
            </th> 
            <th> 
                <center>ROLL NO</center> 
            </th> 
            <th> 
                <center>CITY</center> 
            </th>
            <th> 
                <center>UPDATE</center> 
            </th>
            <th> 
                <center>DELETE</center> 
            </th> 
  
        </tr> 
    </thead> 
    <tbody> 
        <?php 
  
        // Get csv file 
        if(($handle = fopen("line 7.csv", "r")) !== FALSE) { 
            $n = 1; 
            while(($row = fgetcsv($handle)) !== FALSE) { 
  
                // SQL query to store data in  
                // database our table name is 
                // table2
                $sql='INSERT INTO sim_line7  VALUES ("'.$row[1].'", "'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'","'.$row[6].'","'.$row[7].'","'.$row[8].'","'.$row[9].'","'.$row[10].'","'.$row[11].'","'.$row[12].'","'.$row[13].'","'.$row[14].'","'.$row[15].'","'.$row[16].'","'.$row[17].'","'.$row[18].'","'.$row[19].'","'.$row[20].'","'.$row[21].'","'.$row[22].'","'.$row[23].'","'.$row[24].'", "'.$row[25].'","'.$row[26].'","'.$row[27].'","'.$row[28].'","'.$row[29].'","'.$row[30].'","'.$row[0].'","'.$row[31].'","'.$row[32].'")';
                // echo $sql;
                $db->query($sql); 
  
                // row[0] = name 
                // row[1] = rollno 
                // row[2] = city 
                if($n>1) { 
                ?> 
                <tr> 
                    <td> 
                        <center> 
                            <?php echo $row[0];?> 
                        </center> 
                    </td> 
                    <td> 
                        <center> 
                            <?php echo $row[1];?> 
                        </center> 
                    </td> 
                    <td> 
                        <center> 
                            <?php echo $row[2];?> 
                        </center> 
                    </td> 
                    <td> 
                        <center> 
                        <a href="#" class="btn btn-success">Update</a> 
                        </center> 
                    </td> 
                    <td> 
                        <center> 
                        <a href="#" class="btn btn-danger">Delete</a> 
                        </center> 
                    </td> 
                </tr> 
                    <?php 
                } 
              
                // Increment records 
                $n++; 
            } 
              
        // Closing the file 
        fclose($handle); 
    } 
    ?> 
    </tbody> 
</table>