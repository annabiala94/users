<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <?php
        if (!empty($_POST['id'])) {

            $id = $_POST['id'];
             $servername = "mysql.cba.pl";
              $username = "aannaa";
              $password = "Alamakota94";            
              $dbname = "aaannaaa"; 
              
            /*$servername = "localhost";
            $username = "anna";
            $password = "alamakota";
            $dbname = "mysql";*/



            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM Users WHERE id=$id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
        ?>



        <form action="insorupd.php" method="post">
            <div class="box">    
                <h1><?php if (empty($_POST['id'])) {
            echo "Add user";
        } ?></h1>
                <h1><?php if (!empty($_POST['id'])) {
            echo "Edit user";
        } ?></h1>


                <label>
                    <h3>Personal info</h3><br/><br/>
                    <span>Name:</span><input type="text" class="lab" name="name" size="30"  pattern="[A-Z|a-z]{\s}{2,20}" placeholder="Anna Nowak" value="<?php if (!empty($_POST['id'])) {
            echo $row["name"];
        } ?>" required/><br/>

                    <span>Gender:</span>
                    <select id="" name="gender"  class="lab" >
                        <option value="F" label="F" ></option>
                        <option value="M" label="M"  ></option>
                    </select><br/>
                </label>

                <label>
                    <h3>Adress</h3><br/><br/>
                    <span>Street:</span><input type="text" name="street" class="lab" size="30"   placeholder="Wrzosowa" value="<?php if (!empty($_POST['id'])) {
            echo $row["street"];
        } ?>"  pattern="[A-Z|a-z]{\s}{2,20}" required/><br/>

                    <span>Number:</span><input type="number" name="number" class="lab"  placeholder="10" min="1" max="100" value="<?php if (!empty($_POST['id'])) {
            echo $row["number"];
        } ?>" required/><br/>
                </label>
                <label>
                    <h3>Contact</h3><br/><br/>
                    <span>Email:</span><input type="email" name="email" class="lab" size="30"  placeholder="nowak@gmail.com" value="<?php if (!empty($_POST['id'])) {
            echo $row["email"];
        } ?>" required/><br/>                                

                    <span>Phone number:</span><input type="tel" name="phone" class="lab"  placeholder="601102203" value="<?php if (!empty($_POST['id'])) {
            echo $row["phone"];
        } ?>" pattern="[0-9]{9}" required/><br/>
                </label>
                <input type="hidden" name="id" class="lab" value="<?php if (!empty($_POST['id'])) echo $row["id"]; ?>" />
                <label>  
                    <a href="table.php">Data table</a>
                    <input type="submit"  class="button" value="confirm" name="conbt" />
                </label>
            </div>  
        </form>












<?php ?>
    </body>
</html>
