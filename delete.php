<!doctype html>
<html>
    <head>
        <title>Delete</title>
        <meta charset="utf-8" />
    </head>
    <body>


        <?php
        $id = $_POST['id'];


        if ($id) {
             $servername = "mysql.cba.pl";
              $username = "aannaa";
              $password = "Alamakota94";          
              $dbname = "aaannaaa";

           /* $servername = "localhost";
            $username = "anna";
            $password = "alamakota";
            $dbname = "mysql";*/



            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }



            $sql4 = "DELETE FROM Users WHERE id=$id";

            if ($conn->query($sql4) === TRUE) {
                 header("Location: table.php");
            } else {
                echo "Error deleting record: " . $conn->error;
            }



            $conn->close();
        }
      
        ?>
        <br/>

    </body>
</html>