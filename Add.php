<?php 

require "connection.php";

if(isset($_POST["add_employee"]))
{
  
    $name = $_POST["name"];
    $email=$_POST["email"];
    $phoneno= $_POST["phoneno"];
    $birth = $_POST['birth'];
    $position=$_POST["position"];
    $date= $_POST['date']; 
    $salary= $_POST["salary"];
    $address= $_POST["address"];


    $insertQuery = "INSERT INTO `add_employee`(`name`, `email`, `phoneno`, `birth`, `position`, `date`, `salary`, `address`) VALUES ('$name','$email','$phoneno','$birth','$position','$date','$salary','$address')";
    $result = mysqli_query($connection, $insertQuery);

    if($result)
    {
        echo "<script>alert('New Emloyee Added Successfull')</script>";
        header("Location: home.php#view");      

    }
    else
    {
        die("Error" . mysqli_error($connection));
    }
}
?> 


<!DOCTYPE html>
<html>
    <head>
        <title>Employee management system</title>
        <style>
            body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color:rgb(249, 240, 254);
   
}


.section {
    margin: 30px;
    padding: 40px;
    flex: 1; 
   margin-top: 2%;
    border: 5px solid #585757;
    border-radius: 5px;
    width: 900px;
    height:750px ;
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
h2{
    text-align: left;
    text-decoration: dotted;
    font-size:30px;
   
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


.view {
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

img{
   background-size:cover;
   padding-top: 5%;
   margin-right:3%;
   
   background-repeat: no-repeat;
}
   
        </style>
    </head>
    <body>
        
    
        <section id="section">
            <div class="section">
            <h2>Add New Employee </h2>
            <form action="Add.php" method="POST">
            <label for="name">Name:</label>
            <input type="text"id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email"id="email" name="email" required>
            <label for="phoneno">Phone number:</label>
            <input type="text"id="phoneno"  name="phoneno" required>
            <label for="birth">Date of Birth:</label>
            <input type="date"id="birth" name="birth" required>
            <label for="position">Position:</label>
            <input type="position"id="position" name="position" required>
            <label for="date">Joining Date</label>
            <input type="date"id="date" name="date" required>
            <label for="salary">Salary:</label>
            <input type="text"id="salary" name="salary" required>
            <label for="address">Address:</label>
            <input type="text"id="address" name="address" required>
            <button type="submit"name="add_employee">Add Employee</button>

</form></div>
    </section>
</body>
</html>
    
    


    