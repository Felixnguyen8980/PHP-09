<?php
	echo "<h2>Danh Sach nguoi dung</h2>";
	echo "<a href='index.php?action=add&table=users'>add users</a>"."<br>";
	foreach($listUser as $Users){
		echo $Users->id."--";
		echo $Users->name."--";
		echo $Users->email."--";
		echo $Users->phone."--";
		echo $Users->role."--";
		echo "<a href='index.php?action=delete&id=$Users->id&table=users'>delete</a>"."--";
		echo "<a href='index.php?action=edit'>edit</a>";
		echo "<br>";
	}
?>