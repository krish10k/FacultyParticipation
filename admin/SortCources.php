<!DOCTYPE html>
<html>
<head>

<title>Sorted Courses</title>

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
            
            <a href="courses_attended.php" class="search-btn1">
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
            <th>CourseDetails</th>
            <th>CourseType</th>
            <th>StartDate</th>
            <th>EndDate</th>
            <th>Weeks</th>
            <th>Organizer</th>
            <th>RegistrationAmount</th>
            <th>Amountfunded</th>
            <th>fdp</th>
            <th>ResultP</th>
            <th>Result</th>
            <th>Topper</th>
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
    
    
	$query = "SELECT * FROM courses_attended WHERE (
    ((StartDate Between '$txtStartDate' AND '$txtEndDate') AND (EndDate Between '$txtStartDate' AND '$txtEndDate')) AND (NameOfFaculty = '$NameOfFaculty') OR ((NameOfFaculty = '$NameOfFaculty') OR ((StartDate Between '$txtStartDate' AND '$txtEndDate') AND (EndDate Between '$txtStartDate' AND '$txtEndDate'))) ) ORDER BY StartDate";
    
//    $query = "SELECT * FROM syllabus_settings WHERE ((Date Between '$txtStartDate' AND '$txtEndDate') OR (NameOfFaculty = '$NameOfFaculty'))" ;
    
    
	$count = @mysqli_query($conn,$query);


        
?>

<?php


    while($row = @mysqli_fetch_array($count)){
        
        echo "<tr>"; 
        
            echo "<td>" . $row['sr'] . "</td>"; 
            echo "<td>" . $row['sdrn'] . "</td>"; 
            echo "<td>" . $row['NameOfFaculty'] . "</td>";
            echo "<td>" . $row['CourseDetails'] . "</td>";
            echo "<td>" . $row['CourseType'] . "</td>";
            echo "<td>" . $row['StartDate'] . "</td>";
            echo "<td>" . $row['EndDate'] . "</td>";
            echo "<td>" . $row['Weeks'] . "</td>";
            echo "<td>" . $row['Organizer'] . "</td>";
            echo "<td>" . $row['RegistrationAmount'] . "</td>";
            echo "<td>" . $row['Amountfunded'] . "</td>";
            echo "<td>" . $row['fdp'] . "</td>";
            echo "<td>" . $row['ResultP'] . "</td>";
            echo "<td>" . $row['Result'] . "</td>";
            echo "<td>" . $row['Topper'] . "</td>";
           

        echo "</tr>";
    }       
}


?>



</table>
</div>

</body>
</html>


<!--	$query = "SELECT * FROM seminar_webinar WHERE ((name_of_faculty = '$name_of_faculty') OR ((start_date Between '$txtStartDate' AND '$txtEndDate') AND (end_date Between '$txtStartDate' AND '$txtEndDate'))) ORDER BY start_date";-->