<?php  
include 'connect.php';
if(isset($_POST['submit'])){
   $name       = $_POST['name'];
   $username   = $_POST['username'];
   $password   = $_POST['password'];
   $avatar     = $_FILES['avatar'];
   $avatarName = strtotime('now').$_FILES['avatar']['name'];

   //upload avatar into folder
   $folderUploads = 'uploads/';
   move_uploaded_file($avatar['tmp_name'], $folderUploads.$avatarName);

   // insert data into users table
   $sqlInsertUser = "INSERT INTO users (name, username, password, avatar) 
                     VALUES ('$name', '$username', '$password', '$avatarName')";
   // insert
   $conn_php09_basic->query($sqlInsertUser);
}
?>
<h2>Add user</h2>
<p><a href='select.php'>List users</a></p>
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post" enctype="multipart/form-data">
   <p>Name: <input type="text" name="name"></p>
   <p>Username: <input type="text" name="username"></p>
   <p>Password: <input type="text" name="password"></p>
   <p>Avatar: <input type="file" name="avatar"></p>
   <input type="submit" value="Add" name = "submit">
</form>
