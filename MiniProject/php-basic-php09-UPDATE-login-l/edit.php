<?php  include 'connect.php';?>
<?php
	$idEdit = $_GET['id'];
	//get data
	$sqlGetUserEdit = "SELECT * FROM users WHERE id = $idEdit";
	$resultGetUserEdit = $conn_php09_basic->query($sqlGetUserEdit);

	while($elementGetUserEdit = $resultGetUserEdit->fetch_assoc()) {
		$id       = $elementGetUserEdit["id"];
		$name     = $elementGetUserEdit["name"];
		$username = $elementGetUserEdit["username"];
		$password = $elementGetUserEdit["password"];
		$avatar   = $elementGetUserEdit["avatar"];
	}
	if(isset($_POST['submit'])){
	   $name       = $_POST['name'];
	   $username   = $_POST['username'];
	   $password   = $_POST['password'];
	   $avatarUpload = $_FILES['avatar'];
	   $avatar = strtotime('now').$_FILES['avatar']['name'];
	   //upload avatar into folder
	   $folderUploads = 'uploads/';
	   move_uploaded_file($avatarUpload['tmp_name'], $folderUploads.$avatar);

	   // update data users table
	   $sqlUpdateUser = "UPDATE users SET name = '$name', username = '$username',password = '$password', avatar = '$avatar' WHERE id = $idEdit";
	   // update
	   $conn_php09_basic->query($sqlUpdateUser);
	}
?>
<h2>Edit user</h2>
<p><a href='select.php'>List users</a></p>
<form action = "<?php echo "edit.php?id=$idEdit";?>" method = "post" enctype="multipart/form-data">
   <p>Name: <input type="text" name="name" value="<?php echo $name;?>"></p>
   <p>Username: <input type="text" name="username" value="<?php echo $username;?>"></p>
   <p>Password: <input type="text" name="password" value="<?php echo $password;?>"></p>
   <p>Avatar: <input type="file" name="avatar"></p>
   <p><img src="uploads/<?php echo $avatar;?>" alt="Avatar" width="100" height = "150"></p>
   <input type="submit" value="Edit" name = "submit">
</form>