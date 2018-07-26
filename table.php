<!doctype html>
<html>
    <head>
        <title>Data table</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style2.css" type="text/css" />
    </head>
    <body>
        <div class="box">  
            <h1>Data table</h1>
            <?php
            $servername = "mysql.cba.pl";
            $username = "aannaa";
            $password = "Alamakota94";

            $dbname = "aaannaaa";
            /* $servername = "localhost";
              $username = "anna";
              $password = "alamakota";
              $dbname = "mysql"; */


            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }



            $sql3 = "SELECT * FROM Users";
            $result = $conn->query($sql3);

            if ($result->num_rows > 0) {
                // output data of each row
                ?>
                <table border="5">
                    <tr>
                        <td class="colhead"><b>Name</b></td>	<td class="colhead"><b>Gender</b></td>  <td class="colhead"><b>Street</b></td>
                        <td class="colhead"><b>Number</b></td> <td class="colhead"><b>Email</b></td> <td class="colhead"><b>Phone</b></td>
                    </tr>

                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td class="col"> <?php echo $row["name"]; ?></td>	<td class="col"><?php echo $row["gender"]; ?></td><td class="col"><?php echo $row["street"]; ?></td> 
                            <td class="col"><?php echo $row["number"]; ?></td>  <td class="col"><?php echo $row["email"]; ?></td>  <td class="col"><?php echo $row["phone"]; ?></td> 

                            <td class="col"><form action="index.php" method="post">

                                    <input type="submit" class="buted" value="Edit" name="ButtEd" />

                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                </form></td>

                            <td class="col"> <form action="delete.php" method="post">

                                    <input type="submit" class="butdel" value="Delete" name="ButtDel" />
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                </form></td>

                        </tr>

                        <?php
                    }
                    ?> 
                </table>



                <?php
            } else {
                echo "0 results";
            }


            $conn->close();
            ?>
            <form action="index.php" method="post">
                <input type="submit" class="butnewuser" value="New user" name="addus" />      
            </form>
        </div>
    </body>
</html>