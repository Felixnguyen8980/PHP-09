<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="UTF-8">
	</head>
<body>
	

	<?php
		$student = array(
		 	array("Nguyen Tan Nam","male",'DUT'),
			array("Nguyen Tan Dung","male",'working'),
			array("Truong Tan Sang","male",'Duy Tan'),
			array("Nguyen Minh Thy","female",'Duy Tan'),
			array("Truong Nu","female",'Duy Tan'),
			array("Truong Gai","female",'Duy Tan'),
			array("Truong Ho Ngoc Nu","female",'Duy Tan'),
		);

		{
			$rowsize = sizeof($student);
			$colsize = sizeof($student[0]);
			for ($row = 0; $row < $rowsize; $row++) {
			  echo "<b>Hoc Vien $row : </b>";
			 
			  for ($col = 0; $col < $colsize; $col++) {
			    echo $student[$row][$col];
			    if ($col< ($colsize-1)){
			    	echo " - ";
			    }
			  }
			  echo "<br>";
			}
			
		}

	?>
	<form method="post">
		<h2>Tim kiem theo:</h2><br>
		Gioi Tinh: Male<input type="radio" name="gender" value="male" > - Female<input type="radio" name="gender" value="female">  - Other<input type="radio" name="gender" value="other" checked><br>
		Subname:<input type="text" name="subname" value=""  ><br>
		Character:<input type="text" name="Character" value=""><br>
		School:<input type="text" name="School" value=""br>
		<input type="submit" name="submit" value="submit" />
	</form>
	<?php
		
		if(isset($_POST['submit'])){
				$checkGender = $_POST['gender'];
				$Subname = $_POST['subname'];
				$Character = $_POST['Character'];
                $School = $_POST['School'];

                echo "<h2> Ket Qua : </h2>";
            	echo "Character :". $Character."<br>";
                for ($row = 0; $row < $rowsize; $row++) {
				  if ( ($Subname=='') || ((strpos($student[$row][0],$Subname)) !== FALSE) && strpos($student[$row][0],$Subname) == 0 ) // Check if subname can be located in fullname
				  if ( ($checkGender == 'other') || ($student[$row][1] == $checkGender))
				  if ( ($School == '') || ($student[$row][2] == $School))	
				  if ( ($Character == '') || ((strpos($student[$row][0],$Character)) !== FALSE))
				  {		
				  	  echo "<b>Hoc Vien $row : </b>";
					  for ($col = 0; $col < $colsize; $col++) {
					    echo $student[$row][$col];
					    if ($col< ($colsize-1)){
					    	echo " - ";
					    }
					  }
					  echo "<br>";
					}
				}

		}
	?>
</body>
</html>
