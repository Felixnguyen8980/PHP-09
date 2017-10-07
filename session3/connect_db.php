<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop_php09";
$conn = mysqli_connect($servername,$username,$password,$database);
//Check connection 
if (!$conn) {
	die("Connection failed :". mysqli_connect_error());
}
echo "conenction successfully";

//insert into db
$sql = "INSERT INTO `user`(`name`, `Age`, `email`, `Class`) VALUES ('Canh Luong','25','Canh@gmail.com','PHP09')";
if (mysqli_query($conn,$sql)) {
	echo "New record created successfully";
} else {
	echo "Error :" .$sql ."<br>" . mysqli_error($conn);
}
?>
