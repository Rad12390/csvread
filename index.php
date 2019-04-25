<?php
include('connection.php');

$filename = "cars.csv";

if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }
    fclose($h);
}

//contain the data in the array

foreach($the_big_array as $key=>$value){
	$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ($value[0], $value[1], $value[2])";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>