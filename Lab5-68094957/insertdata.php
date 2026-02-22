<?php
require('dbconnect.php');


$name = mysqli_real_escape_string($connect, $_POST["name"]);
$country_code = mysqli_real_escape_string($connect, $_POST["country_code"]);
$district = mysqli_real_escape_string($connect, $_POST["district"]);
$population = (int)$_POST["population"];

$sql = "INSERT INTO city (Name, CountryCode, District, Population) 
        VALUES ('$name', '$country_code', '$district', $population)";

if(mysqli_query($connect, $sql)){
    echo "<script>
            alert('เพิ่มข้อมูลเมือง $name เรียบร้อยแล้ว!');
            window.location='showdata.php?query=1';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}

mysqli_close($connect);
?>