


<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Products Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<div>
    <?php
    require 'header.php';
    ?>

    <div class="container">
        <div class="jumbotron">
            <h1>Welcome to our Products Store!</h1>
            <p>We have the best Products ,we have all in one place.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">



            <?php
            session_start();
            require 'check_if_added.php';

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "blog";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) { ?>

                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="admin/storage/app/<?php echo $row["photo"]; ?>"
                                     alt="<?php echo $row["name"]; ?>">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3> <?php echo $row["name"]; ?> </h3>
                                    <?php echo $row["description"]; ?>
                                </div>
                            </center>
                        </div>
                    </div>

                <?php }
            }else{
                echo "0 Results";
            }?>




        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <footer class="footer">
        <div class="container">
            <center>
            <p>Copyright &copy <a href="#">Ecommerce Website </a> Store. All Rights Reserved.</p>
                   <p>This website is developed by Abitha..</p>
            </center>
        </div>
    </footer>
</div>
</body>
</html>