<?php
date_default_timezone_set("Europe/Amsterdam");
echo date('Y-m-d h:m:s A');
echo "<br>";

date_default_timezone_set("Asia/Tokyo");
echo date('Y-m-d h:m:s A');
echo "<br>";
date_default_timezone_set("Asia/Ho_Chi_Minh");
echo date('D, M d-Y ');
echo "<br>";
?>