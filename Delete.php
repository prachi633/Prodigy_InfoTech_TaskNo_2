<?php
require "connection.php";

if (isset($_POST["delete_employee"])) {
    $id = $_POST["id"];

    $deleteQuery = "DELETE FROM `add_employee` WHERE `id` = ?";
    $stmt = $connection->prepare($deleteQuery);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Employee Deleted Successfully');</script>";
        header("Location: home.php#view");      
    } else {
        die("Error: " . $stmt->error);
    }

    $stmt->close();
    $connection->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
  .delete{
    margin: 30px;
    padding: 30px;
    flex: 1; 
    margin-left:30%;
    margin-top: 5%;
    border: 5px solid #585757;
    border-radius: 5px;
    width: 300px;
    height:100px ;
    text-align: left;
    background-color: #e5fcb4a2;
    color:#0b0b0b;
}
.delete button{
    padding: 15px 20px;
    font-size: 15px;
    margin-top: 10%;
    color: white;
    background-color: rgb(2, 88, 193) ;
    border: none;
    
    margin-left: 20%;
    border-radius: 5px;
    cursor: pointer;
}
 .section {
     margin: 30px;
      padding: 30px;
      margin-top: 5%; 
      height: 0px;
     text-align: left;
           

  }
 h1{
   text-align: center;
   text-decoration: dotted;
           }
 table {
     width: 100%;
   border-collapse: collapse;
      margin-top: 20px;
        }
         table, th, td {
            border: 3px solid black;
        }
 th, td {
            padding: 10px;
            text-align: left;
        }
th {
            background-color:grey;
            color:white;
        }
          tr:nth-child(even) {
            background-color: #f9f9f9;
     }
    tr:hover {
            background-color: #f1f1f1;
        }
        </style>
        </head>
        <body><h1>Delete Employee Information</h1>
        <delete id="delete">
        <div class="delete">
        <form action="Delete.php" method="POST">
            <label for="id">Employee ID:</label>
            <input type="text" id="id" name="id" required>
            <button type="submit" name="delete_employee">Delete Employee</button>
        </form>
        </div>
    </delete>
  <section id="section">
        <div class="section">
            <h2>View Delete Table</h2>
            <?php

$link = mysqli_connect("localhost:3370", "root", "","employee");
 

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sqli = "SELECT * FROM `add_employee`";
if($result = mysqli_query($link, $sqli)){
    if(mysqli_num_rows($result) > 0){
        

        echo'<table class="table">';
        
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Name</th>";
                echo"<th>Email</th>";
                echo "<th>Phoneno</th>";
                echo "<th>BirthDate</th>";
                echo "<th>Position</th>";
                echo "<th>JoiningDate</th>";
                echo "<th>Salary</th>";
                echo"<th>Address</th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phoneno'] . "</td>"; 
                echo "<td>" . $row['birth'] . "</td>"; 
                echo "<td>" . $row['position'] . "</td>"; 
                echo "<td>" . $row['date'] . "</td>"; 
                echo "<td>" . $row['salary'] . "</td>"; 
                echo "<td>" . $row['address'] . "</td>"; 

            echo "</tr>";
        }
        echo "</table>";
      
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sqli. " . mysqli_error($link);
}
 

mysqli_close($link);
?>

            
           
</div>
</section>
</body>
</html>