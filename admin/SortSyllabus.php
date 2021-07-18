<!DOCTYPE html>
<html>
<head>

<title>Sorted Syllabus</title>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        color: #606060;
        font-family: inherit;
        font-size: 20px;
        text-align: left;
    }
    
    th {
        background-color: #c9243f;
        color: white;
    }
    
    tr:nth-child(even) {background-color: #f2f2f2}
    
    h2{
        text-align: center;
        font-family: inherit;
        color: slategray;
    }
    
    .search-btn{
        text-align: center;
        vertical-align: middle;
        padding: .57em .57em;
        cursor: pointer;
        background-color: #4CBB17;
        color: white;
    }
    
    .search-btn1{
        text-align: center;
        vertical-align: middle;
        padding: .57em .57em;
        cursor: pointer;
        background-color: skyblue;
        color: black;
        text-decoration: none;
        font-family: serif;
    }
    
    .name-field{
        text-align: center;
        vertical-align: middle;
        padding: .37em .37em;
        
    }
    
</style>

</head>


<body>

<h2>***  Data of Seminar table  ***</h2>

<br>

<div class="container">
    <center>
       
        <form method="post">
            <input type="date" name="txtStartDate">
            <input type="date" name="txtEndDate">
            <input class="name-field" type="text" name="NameOfFaculty" placeholder="Enter Name of the Faculty">


            <input class="search-btn" type="submit" name="search" value="View Record">
            
            <a href="syllabus_settings.php" class="search-btn1">
                All Records
            </a>

            
        </form>
        
    </center>
    
    <br>
    
    <table border="3px">
       
        <tr>
            <th>sr</th>
            <th>sdrn</th>
            <th>NameOfFaculty</th>
            <th>University</th>
            <th>Subject</th>
            <th>Semester</th>
            <th>Venue</th>
            <th>Date</th>
        </tr>
    
    <br>


<?php


$conn = mysqli_connect("localhost","root","","faculty_par");
    
if(!$conn){
	die("Connection Failed:" .mysqli_connect_error());
}

if(isset($_POST['search']))
    
{
    
    $NameOfFaculty = $_POST['NameOfFaculty'];
	$txtStartDate = $_POST['txtStartDate'];
	$txtEndDate = $_POST['txtEndDate'];
    
    
//	$query = "SELECT * FROM syllabus_settings WHERE (
//    ((start_date Between '$txtStartDate' AND '$txtEndDate') AND (end_date Between '$txtStartDate' AND '$txtEndDate')) AND (NameOfFaculty = '$NameOfFaculty') OR ((NameOfFaculty = '$NameOfFaculty') OR ((start_date Between '$txtStartDate' AND '$txtEndDate') AND (end_date Between '$txtStartDate' AND '$txtEndDate'))) ) ORDER BY start_date";
    
    $query = "SELECT * FROM syllabus_settings WHERE ((Date Between '$txtStartDate' AND '$txtEndDate') OR (NameOfFaculty = '$NameOfFaculty'))" ;
    
    
	$count = @mysqli_query($conn,$query);


        
?>

<?php


    while($row = @mysqli_fetch_array($count)){
        
        echo "<tr>"; 
        
            echo "<td>" . $row['sr'] . "</td>"; 
            echo "<td>" . $row['sdrn'] . "</td>"; 
            echo "<td>" . $row['NameOfFaculty'] . "</td>";
            echo "<td>" . $row['University'] . "</td>";
            echo "<td>" . $row['Subject'] . "</td>";
            echo "<td>" . $row['Semester'] . "</td>";
            echo "<td>" . $row['Venue'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>";
           

        echo "</tr>";
    }        
}


?>



</table>
</div>

</body>
</html>


<!--	$query = "SELECT * FROM seminar_webinar WHERE ((name_of_faculty = '$name_of_faculty') OR ((start_date Between '$txtStartDate' AND '$txtEndDate') AND (end_date Between '$txtStartDate' AND '$txtEndDate'))) ORDER BY start_date";-->