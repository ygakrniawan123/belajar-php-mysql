<?php
require 'koneksi.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>training-php&mysql</title>
</head>
<body>

<table>
    <tr>
        <th>id</th>
        <th>username</th>
        <th>email</th>
    </tr>
    <?php $id = 1; ?>
    <?php while($q1 = mysqli_fetch_assoc($result)) {?>  
    <tr>
        <td><?php echo $id++; ?></td>
        <td><?php echo $q1['username']; ?></td>
        <td><?php echo $q1['email']; ?></td>
    </tr>


    <?php } ?>
</table>
<a href="tambah.php"><button>tambah user</button></a>
<a href="tambah.php"><button>hapus user</button></a>


</body>
</html>