<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Donation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #f4f4f9;
            }

            h1, h2 {
                color: #0033cc;
            }

            table {
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .showrecord {
                width: 100%;
                border: 1px solid #0033cc;
            }

            .showrecord, .showrecord th, .showrecord td {
                border: 1px solid #0033cc;
            }

            .showrecord th, .showrecord td {
                padding: 10px;
                text-align: left;
            }

            .showrecord tr:nth-child(even) {
                background-color: #e6f0ff;
            }

            .showrecord tr:nth-child(odd) {
                background-color: #ffffff;
            }

            .insertform {
                border: none;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .tablerecod{
                margin-top: 20px;
                border: none;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            .insertform table {
                border: none;
            }

            .insertform td {
                padding: 10px;
            }

            .insertform input[type="text"],
            .insertform input[type="date"],
            .insertform input[type="number"],
            .insertform input[type="tel"],
            .insertform textarea {
                /*width: 50%;*/
                padding: 10px;
                border: 1px solid #0033cc;
                border-radius: 5px;
                font-family: Arial, sans-serif;
                font-size: 14px; 
                color: #333333; 

            }

            .insertform input[type="submit"] {
                background-color: #0033cc;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                font-family: Arial, sans-serif; 

            }

            .insertform input[type="submit"]:hover {
                background-color: #0044cc;
            }

            .bulkform {
                margin-top: 20px;
                border: none;
                padding: 20px;
                background-color: #ffffff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .bulkform input[type="file"] {
                border: 2px dashed #0033cc;
                border-radius: 5px;
                padding: 10px;
                background-color: #f0f8ff;
                color: #0033cc;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
            }

            .bulkform input[type="file"]::file-selector-button {
                background-color: #0066ff;
                color: white;
                border: 1px solid #0044cc;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            .bulkform input[type="file"]::file-selector-button:hover {
                background-color: #0055cc;
                border-color: #0033cc;
            }
            .bulkform input[type="file"] {
                margin-bottom: 10px;
            }

            .bulkform input[type="submit"] {
                background-color: #0033cc;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-family: Arial, sans-serif;
                font-size: 16px;
            }

            .bulkform input[type="submit"]:hover {
                background-color: #0044cc;
            }

            form input[type="submit"][name="btndelete"] {
                background-color: red;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
                font-family: Arial, sans-serif; 
                font-size: 14px; 
            }

            form input[type="submit"][name="btndelete"]:hover {
                background-color: #e60000;
            }

            form input[type="submit"][name="btnedit"] {
                background-color: #4CAF50;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 5px;
                cursor: pointer;
                font-family: Arial, sans-serif;
                font-size: 14px; 
            }

            form input[type="submit"][name="btnedit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <?PHP

        //connection
        function connection() {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "db_miniproject_donation";

            $con = mysqli_connect($hostname, $username, $password, $database);
            if (!$con) {
                echo "<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>";
                exit();
            } else {
                return $con;
            }
        }

        //delete
        if (isset($_POST['btndelete'])) {
//            echo "Submit Successfully!!!";
            $con = connection();
            $id = $_POST['oid'];
            $dquery = "delete from tbldoner where id='$id'";
            if (!mysqli_query($con, $dquery)) {
                echo "Error deleting record: " . mysqli_error($con);
            } else {
                echo '<script>alert("Redcord delete Successfully!");</script>';
//                echo "<script>locaction.replace('index.php')</script>";
//                header("Location:index.php");
//                header("Refresh:0");
                echo "<meta http-equiv='refresh' content='0'>";
                exit();
            }
        }

        //editbtn
        if (isset($_POST['btnedit'])) {
            $con = connection();
            $id = $_POST['oid'];
            $uquery = "select * from tbldoner where id='$id'";
            $q = mysqli_query($con, $uquery);
            if (!$q) {
                echo "Error deleting record: " . mysqli_error($con);
            } else {
                $r = mysqli_fetch_assoc($q);
                $dname = $r['name'];
                $ddate = $r['date'];
                $damount = $r['amount'];
                $dphone = $r['phone'];
                $dpurpose = $r['purpose'];
            }
        }

        function showInvisibleCharacters($string) {
            $invisibleChars = "";
            for ($i = 0; $i < strlen($string); $i++) {
                $invisibleChars .= "Character: " . $string[$i] . " | ASCII: " . ord($string[$i]) . "<br>";
            }
            return $invisibleChars;
        }

        function removeBOM($string) {
            // Check if the string starts with the BOM characters and remove them
            if (substr($string, 0, 3) === "\xEF\xBB\xBF") {
                $string = substr($string, 3);
            }
            return $string;
        }

        //submit button:
        if (isset($_POST["submit"])) {
            $con = connection();
            $dname = $_POST["dname"];
            $ddate = $_POST["ddate"];
            $damount = $_POST["damount"];
            $dphone = $_POST["dphone"];
            $dpurpose = $_POST["dpurpose"];

            $dname = removeBOM($dname);
//            $dname = showInvisibleCharacters($dname);
//            
            // Validate inputs
            if (empty($dname) || empty($ddate) || empty($damount) || empty($dphone) || empty($dpurpose)) {
                echo '<script>alert("All fields are required!");</script>';
            } else if (!preg_match("/^[a-zA-Z ]*$/", $dname)) {
                echo '<script>alert("Enter name with only letters and spaces!");</script>';
            } else if (!filter_var($damount, FILTER_VALIDATE_INT) || $damount <= 0) {
                echo '<script>alert("Please enter a valid donation amount!");</script>';
            } else if (!preg_match("/^[0-9]{10}$/", $dphone)) {
                echo '<script>alert("Please enter a valid 10-digit phone number!");</script>';
            } else if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $ddate)) {
                echo '<script>alert("Please enter a valid date with a 4-digit year!");</script>';
            } else {
                if (isset($_POST['oid']) && !empty($_POST['oid'])) {
                    // Update record
                    $id = $_POST['oid'];
                    $qu = "UPDATE tbldoner SET name='$dname', date='$ddate', amount='$damount', phone='$dphone', purpose='$dpurpose' WHERE id='$id'";
                    if (!mysqli_query($con, $qu)) {
                        die("Error: " . mysqli_error($con));
                    } else {
                        echo '<script>alert("Record updated successfully!");</script>';
//                        header("Refresh:0");
                        echo "<meta http-equiv='refresh' content='0'>";
                        exit();
                    }
                } else {
                    // Insert record
                    $qu = "INSERT INTO tbldoner (name, date, amount, phone, purpose) VALUES ('$dname', '$ddate', '$damount', '$dphone', '$dpurpose')";
                    if (!mysqli_query($con, $qu)) {
                        die("Error: " . mysqli_error($con));
                    } else {
                        echo '<script>alert(" Record inserted successfully!");</script>';
//                        header("location:index.php");
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
            }
//            echo "<script>alert('$dname');</script>";
        }


        //bulk Insertion using explode:
        //        if (isset($_POST["upload_csv"])) {
        //            $con = connection();
        //            $file = $_FILES['csv_file']['tmp_name'];
        //            $lines = file($file);
        //
        //            if ($filetype != 'text/csv') {
        //                echo '<script>alert("Please upload a valid CSV file!!!");</script>';
        //            } else {
        //                $handle = fopen($file, "r") or die("Error while file opening");
        //                for ($i = 0; $i < count($lines); $i++) {
        //                    $data = explode(",", $lines[$i]);
        //
        //                    $dname = trim($data[0]);
        //                    $ddate = trim($data[1]);
        //                    $damount = trim($data[2]);
        //                    $dphone = trim($data[3]);
        //                    $dpurpose = trim($data[4]);
        //
        //                    $qu = "insert into tbldoner (name, date, amount, phone, purpose) values ('$dname', '$ddate', '$damount', '$dphone', '$dpurpose')";
        //
        //                    if (!mysqli_query($con, $qu)) {
        //                        echo "Error inserting record: " . mysqli_error($con);
        //                    }
        //                }
        //                fclose($handle);
        //                echo '<script>alert("CSV File Imported Successfully!");</script>';
        //                header("Refresh:0");
        //            }
        //        }        
        //bulk Insertion using fgetcsv

        if (isset($_POST["upload_csv"])) {
            $con = connection();
            $file = $_FILES['csv_file']['tmp_name'];
            $filetype = $_FILES['csv_file']['type'];

            if ($filetype != 'text/csv') {
                echo '<script>alert("Please upload a valid CSV file!!!");</script>';
            } else {
                $handle = fopen($file, "r") or die("Error while opening file");

                // Skip the header row if present
                //$header = fgetcsv($handle);

                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $dname = trim($data[0]);
                    $d = trim($data[1]);
                    $damount = trim($data[2]);
                    $dphone = trim($data[3]);
                    $dpurpose = trim($data[4]);
                    $ddate = date("Y-m-d", strtotime($d));
                    $qu = "INSERT INTO tbldoner (name, date, amount, phone, purpose) VALUES ('$dname', '$ddate', '$damount', '$dphone', '$dpurpose')";
                    if (!mysqli_query($con, $qu)) {
                        echo "Error inserting record: " . mysqli_error($con);
                    }
                }

                fclose($handle);
                echo '<script>alert("CSV File Imported Successfully!");</script>';
                echo "<meta http-equiv='refresh' content='0'>";
            }
        }
        ?>
        <!--donation form:-->
        <div class="insertform">
            <h1>Donation Form</h1>
            <form action="" method="POST">
                <input type="hidden" name="oid" value="<?php
                if (isset($_POST["btnedit"])) {
                    echo "$id";
                }
                ?>" />
                <table>
                    <tr>
                        <td>Enter Your Name:</td>
                        <td><input type="text" name="dname" 
                                   value="<?php
                                   if (isset($_POST['btnedit'])) {
                                       echo $dname;
                                   }
                                   ?>" 
                                   required 
                                   pattern="[a-zA-Z-' ]*" 
                                   title="Enter a name with only letters and spaces!" />
                        </td>

                    </tr>
                    <tr>
                        <td>Enter Donation Date:</td>
                        <td>
                            <input type="date" name="ddate"
                                   value="<?PHP
                                   if (isset($_POST["btnedit"])) {
                                       echo "$ddate";
                                   }
                                   ?>" required/>
                        </td>
                    </tr>
                    <tr>    
                        <td>Enter Donation Amount:</td>
                        <td><input type="number" name="damount" 
                                   value="<?PHP
                                   if (isset($_POST["btnedit"])) {
                                       echo "$damount";
                                   }
                                   ?>" required min="1" title="Please enter a valid donation amount!!!" /></td>
                    </tr>
                    <tr>
                        <td>Enter Your Phone:</td>
                        <td><input type="tel" name="dphone" 
                                   value="<?PHP
                                   if (isset($_POST["btnedit"])) {
                                       echo "$dphone";
                                   }
                                   ?>" required pattern="[0-9]{10}" maxlength="10" title="Please enter a valid 10-digit phone number!"/></td>
                    </tr>
                    <tr>
                        <td>Enter Donation Purpose:</td>
                        <td>
                            <textarea name="dpurpose" rows="1" required><?php
                                if (isset($_POST["btnedit"])) {
                                    echo htmlspecialchars($dpurpose);
                                }
                                ?></textarea>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Submit" name="submit" />

            </form>
        </div>

        <!--bulk insertion-->
        <div class="bulkform">
            <h2>Bulk Insertion: Upload CSV</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="csv_file" required />
                <input type="submit" name="upload_csv" value="Upload CSV" />
            </form>
        </div>

        <div class="tablerecod">
            <?php
            //tableview
            $con = connection();
            $qu = "select * from tbldoner";
            $q = mysqli_query($con, $qu);
            if (!$q) {
                die("Error:" . mysqli_error($con));
            } else {
                echo "<h2>Recordes</h2>";
                echo "<table class='showrecord'>";
                echo "<tr>"
                . "<th> ID </th>"
                . "<th> Name </th>"
                . "<th> Date </th>"
                . "<th> Amount </th>"
                . "<th> Phone </th>"
                . "<th> Purpose </th>"
                . "<th> Operation</th>"
                . "</tr>";
                while ($r = mysqli_fetch_assoc($q)) {
                    echo "<tr>";
                    echo "<td>" . $r['id'] . "</td>"
                    . "<td>" . $r['name'] . "</td>"
                    . " <td>" . $r['date'] . "</td>"
                    . " <td>" . $r['amount'] . "</td>"
                    . " <td> " . $r['phone'] . "</td>"
                    . " <td>" . $r['purpose'] . "</td>"
                    . "<td>
                    <form method = 'POST'>
                       <input type = 'hidden' name = 'oid' value = '" . $r['id'] . "'/>
                        <input type = 'submit' value = 'Edit' name = 'btnedit' />
                        <input type = 'submit' value = 'Delete' name = 'btndelete' />
                    </form>
                   </td>";
                    echo "</tr>";
                }
                echo '</table>';
            }
            ?>
        </div>
    </body>
</html>
