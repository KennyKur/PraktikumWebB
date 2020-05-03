<?php
   include "config.php";
   $result = mysqli_query($mysqli,"SELECT * FROM biodata");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="header">
      <h1>Index Biodata</h1>
   </div>
   <div class="maincontainer">
         <table>
            <thead>
               <td>
                  Nama
               </td>
               <td>
                  Umur
               </td>
               <td>
                  Email
               </td>
               <td>
                  Jenis Kelamin
               </td>
            </thead>
            <?php
            while($user = mysqli_fetch_array($result)){
               echo "<tr>";
               echo "<td>".$user['nama']."</td>";
               echo "<td>".$user['umur']."</td>";
               echo "<td>".$user['email']."</td>";
               echo "<td>".$user['jenis_kelamin']."</td>";
               echo "<td><a href='edit.php?id=$user[id_user]'><button type='button'>edit</button></a> <a href='delete.php?id=$user[id_user]'><button type='button'>delete</button></a></td>";
               echo "</tr>";
            }
            ?>
         </table>
         <div class="mainbutton">
            <a href="add.php">
               <button type="button">tambah data</button>
            </a>
         </div>
   </div>
</body>
</html>