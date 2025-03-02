<?php
require "connect.php";

$result = mysqli_query($conn, "SELECT * FROM data_usr");

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="table p-5">
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Kls</th>
                  <th scope="col">Age</th>
                </tr>
              </thead>
              <tbody>
                <?php while ( $q1 = mysqli_fetch_assoc($result) ) { ?>
                <tr>
                  <th scope="row">1</th>
                  <td><?php echo $q1["nama"] ?></td>
                  <td>><?php echo $q1["jk"] ?></td>
                  <td>><?php echo $q1["usia"] ?></td>
                </tr>
                <?php } ?>
                
              </tbody>
        </table>
           
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>