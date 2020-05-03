<?php
include_once("config.php");

   if(isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['nama'];
      $umur = $_POST['umur'];
      $email = $_POST['email'];
      $jenis_kelamin = $_POST['jk'];


      $result = mysqli_query($mysqli, "UPDATE biodata SET nama='$name', umur='$umur',email='$email', jenis_kelamin='$jenis_kelamin' WHERE id_user ='$id'");
      header("Location: index.php");
   }
?>
<?php
   $id = $_GET['id'];
   $result = mysqli_query($mysqli,"SELECT * FROM biodata WHERE id_user ='$id'");
   while($user = mysqli_fetch_array($result))
   {
      $nama = $user['nama'];
      $umur = $user['umur'];
      $email = $user['email'];
      $jenis_kelamin = $user['jenis_kelamin'];
   }
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
      <h1>Edit biodata</h1>
   </div>
   <div class="container">
      <form action="" method="POST">
         <div class="input-card">
            Nama <input name="nama" type="text" required="" value="<?php echo$nama ?>">
         </div>
         <div class="input-card">
            Umur <input name="umur" type="number" required="" value="<?php echo$umur ?>">
         </div>
         <div class="input-card">
            Email <input name="email" type="email" required="" value="<?php echo$email ?>">
         </div>
         <div class="input-card">
            Jenis Kelamin                            
            <input type="radio" name="jk" value="laki-laki" required=""> Laki-laki
            <input type="radio" name="jk" value="perempuan" required=""> perempuan
         </div>
         <input type="hidden" name="id" value="<?php echo$id ?>">
         <div class="conbutton">
            <button name="update" type="submit">Update</button>
         </div>
      </form>
   </div>
</body>
</html>
