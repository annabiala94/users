<!doctype html>
<html>
    <head>
        <title>Insert</title>
        <meta charset="utf-8" />
    </head>
    <body>

        <?php
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $street = $_POST['street'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];



        if ($name and $gender and $street and $number and $email and $phone) {
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


            $sql = "CREATE TABLE Users (
           id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
           name varchar(15) not null,  
           gender varchar(10) not null, 
           street varchar(50) not null, 
           number varchar(10) not null, 
           email varchar(50) not null, 
           phone varchar(20) not null, 
           image LONGBLOB NULL
          )";

             /* if ($conn->query($sql) === TRUE) {
              echo "Table Users created successfully";
              } else {
              echo "Error creating table: " . $conn->error;
              } */
                if ($conn->query($sql) === FALSE) {
               // die($conn->error);

            }


            if (empty($_POST['id'])) {
                $sql2 = "INSERT INTO Users (name, gender, street, number, email, phone, image)
      VALUES ('$name', '$gender', '$street','$number', '$email', '$phone', '')";


                if ($conn->query($sql2) === TRUE) {
                    header("Location: table.php");
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
            }
            if (!empty($_POST['id'])) {
                $id = $_POST['id'];
                $sql5 = "UPDATE Users SET name='$name', gender='$gender',street='$street',number='$number',email='$email',phone='$phone' WHERE id=$id";

                if ($conn->query($sql5) === TRUE) {
                    header("Location: table.php");
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            $conn->close();
        }
        ?>
        <br/>


    </body>
</html>