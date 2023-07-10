<!DOCTYPE html>
<html>
 <head>
  <title>Product List</title>

  <meta charset="utf-8"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <a href="product_registration.php">Product Registration</a>

        <?php echo "<h1>Product List</h1>"; ?>

        <?php
            $db_host = 'db';
            $db_user = 'user';
            $db_pass = 'test';
            $db_name = 'shoppingCart';
            // Connection check
            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


            $query = 'SELECT * From Product';
            $result = mysqli_query($conn, $query);

            echo '<table class="table table-striped">';
            echo '<thead><tr><th></th><th>id</th><th>name</th><th>price</th><th>details</th></tr></thead>';
            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<tr>';
                echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
                foreach($value as $element){
                    echo '<td>' . $element . '</td>';
                }

                echo '</tr>';
            }
            echo '</table>';

            $result->close();

            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
