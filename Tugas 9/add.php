
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
      <h1>Tambah Biodata</h1>
   </div>
   <div class="container">
      <form action="index.php" method="POST">
         <div class="input-card">
            Nama <input name="nama" type="text" required="">
         </div>
         <div class="input-card">
            Umur <input name="umur" type="number" required="">
         </div>
         <div class="input-card">
            Email <input name="email" type="email" required="">
         </div>
         <div class="input-card">
            Jenis Kelamin                            
            <input type="radio" name="jk" value="laki-laki" required=""> Laki-laki
            <input type="radio" name="jk" value="perempuan" required=""> perempuan
         </div>
         <div class="conbutton">
            <button name="submit" type="submit">Submit</button>
         </div>
      </form>
   </div>
</body>
</html>
<?php
include_once("config.php");
   if(isset($_POST['submit'])) {
      $name = $_POST['nama'];
      $umur = $_POST['umur'];
      $email = $_POST['email'];
      $jenis_kelamin = $_POST['jk'];

      // include database connection file
      
      $result = mysqli_query($mysqli, "INSERT INTO biodata(nama,umur,email,jenis_kelamin) VALUES('$name','$umur','$email','$jenis_kelamin')");
  
   }
?>