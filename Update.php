<?php
require "connection.php";

if(isset($_POST["update_employee"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $birth = $_POST["birth"];
    $position = $_POST["position"];
    $date = $_POST["date"];
    $salary = $_POST["salary"];
    $address = $_POST["address"];

    $updateQuery = "UPDATE `add_employee` SET `name`=?, `email`=?, `phoneno`=?, `birth`=?, `position`=?, `date`=?, `salary`=?, `address`=? WHERE `id`=?";
    $stmt = $connection->prepare($updateQuery);
    $stmt->bind_param("ssssssssi", $name, $email, $phoneno, $birth, $position, $date, $salary, $address, $id);

    if($stmt->execute()) {
        echo "<script>alert('Employee Information Updated Successfully');</script>";
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
        .main{
    margin: 30px;
    padding: 30px;
    flex: 1; 
    margin-top: 5%;
    border: 5px solid #585757;
    border-radius: 5px;
    width: 900px;
    height:800px ;
    text-align: left;
    
    margin-left:10%;
    background-color: #e5fcb4a2;
    color:#0b0b0b;
}
input[type="text"],input[type="email"],input[type="phoneno"],
input[type="date"],input[type="salary"],input[type="department"],input[type="position"]
 {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 2px solid #ccc;
    border-radius: 5px;
    margin-right: 20%;
}
h1{
    text-align: center;
    text-decoration: dotted;
}
h2{
    text-align: left;
    text-decoration: dotted;
}


button{
   
    padding: 15px 100px;
    font-size: 20px;
    color: white;
    background-color: rgb(2, 88, 193);
    border: none;
    margin-left: 30%;
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
        <body>
       
        <main id="main">
        <div class="main">
        <h1>Update Employee Information</h1>
        <form action="Update.php" method="POST">
             
                <label for="employee_id">Employee ID:</label>
                <input type="text" id="employee_id" name="id" required>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="phoneno">Phone number:</label>
                <input type="text" id="phoneno" name="phoneno" required>
                <label for="birth">Date of Birth:</label>
                <input type="date" id="birth" name="birth" required>
                <label for="position">Position:</label>
                <input type="text" id="position" name="position" required>
                <label for="date">Joining Date:</label>
                <input type="date" id="date" name="date" required>
                <label for="salary">Salary:</label>
                <input type="text" id="salary" name="salary" required>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
                <button type="submit" name="update_employee">Update Employee</button>
            </form>

        </div>
  <section id="section">
        <div class="section">
            <h2>Update table</h2>
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

          
            <p>.</p>
        </div>
</section>
</body>
</html>