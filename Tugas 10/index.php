<?php
   include 'config.php';
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
<div class="maincontainer">
   <h1>Halaman Paginasi</h1>
   <table>
   <tr>
      <th>No</th>
      <th>Nama</th>     
      <th>Umur</th>   
      <th>Email</th>      
      <th>Jenis Kelamin</th>           
   </tr>
   <?php 
   $halaman = 1;
   $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
   $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
   $result = mysqli_query($mysqli,"SELECT * FROM biodata");
   $total = mysqli_num_rows($result);
   $pages = ceil($total/$halaman);            
   $query = mysqli_query($mysqli,"select * from biodata LIMIT $mulai, $halaman");
   $no =$mulai+1;
   
   
   while ($data = mysqli_fetch_assoc($query)) {
      ?>
      <tr>
         <td><?php echo $no++; ?></td>                  
         <td><?php echo $data['nama']; ?></td>              
         <td><?php echo $data['umur']; ?></td>   
         <td><?php echo $data['email']; ?></td> 
         <td><?php echo $data['jenis_kelamin']; ?></td>          
      </tr>
   
      <?php               
   } 
   ?>
   
   
   </table>          
   
</div>

<div class="footer">
   <ul>

  <?php for ($i=1; $i<=$pages ; $i++){ ?>

  <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 
  <?php } ?>
  </ul>
 
</div>
</body>
</html>

