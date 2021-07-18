<!DOCTYPE html>
<html>
<head>
	<title>All Records Seminar</title>
	
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #588c7e;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
    
    th {
        background-color: #c9243f;
        color: white;
    }
    
    tr:nth-child(even) {background-color: #f2f2f2}
    button{
        align-items: center;
        background-color: lightyellow;
    }
    h2{
        text-align: center;
        font-family: inherit;
        color: slategray;
    }
    .btn {
    text-align: center;
    vertical-align: middle;
    padding: .67em .67em;
    cursor: pointer;
    }
    .btn-primary {
    color: white;
    background-color: #56CCF2;
    border: none;
    border-radius: .3em;
    font-weight: bold;
    }
    
</style>
</head>

<body>
<h2>***  Data of Seminar table  ***</h2>

<br>

<table border="3px">
    <tr>
        <th>sr_no</th>
        <th>sdrn</th>
        <th>name_of_faculty</th>
        <th>seminar_webinar</th>
        <th>seminar_webinar_name</th>
        <th>sponsorship</th>
        <th>venue</th>
        <th>start_date</th>
        <th>end_date</th>
        <th>no_of_days</th>
        <th>organizer</th>
        <th>local_state_national_international</th>
        <th>source_of_funding</th>
        <th>registration_amount</th>
        <th>amount_funded</th>
        <th>TA</th>
    </tr>

<?php
$conn = mysqli_connect("localhost","root","","faculty_par");
if($conn -> connect_error) {
	die("Connection failed:" . $conn -> connect_error);
}

$sql = "SELECT * FROM seminar_webinar";
$result = $conn-> query($sql);

if($result -> num_rows > 0){
	while($row = $result -> fetch_assoc()) {
		echo "<tr>
        <td>" . $row["sr_no"]."</td>
        <td>" . $row["sdrn"]."</td>
        <td>".$row["name_of_faculty"]."</td>
        <td>".$row["seminar_webinar"]."</td><td>".$row["seminar_webinar_name"]."</td><td>".$row["sponsorship"]."</td><td>".$row["venue"]."</td><td>".$row["start_date"]."</td><td>".$row["end_date"]."</td><td>".$row["no_of_days"]."</td><td>".$row["organizer"]."</td><td>".$row["local_state_national-international"]."</td><td>".$row["source_of_funding"]."</td><td>".$row["registration_amount"]."</td><td>".$row["amount_funded"]."</td><td>".$row["TA"]."</td></tr>";
}
echo "</table>";
}
else{
echo "0 result";
}
 
$conn -> close();
?>

</table>

<br>
<br>

<h2>

<a href="Seminar_Excel_all.php">
    <button class="btn btn-primary shop-item-button">Download</button>
</a>

</h2>


</body>
</html>