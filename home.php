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
.hero{
  padding-top: 3%;
}
nav {
          margin-left:10%;
            overflow: hidden;
           
        }

 nav a {    
            margin: 0 10px;
            font-size:18px;
            float: left;
            display: block;
           background-color: #a79cfc;
            color: rgb(252, 251, 251);
            text-align: center;
            padding: 20px 40px;
            text-decoration: none;
            transition: background-color 0.3s;
            box-shadow: rgba(198, 236, 224, 0.2) 0px 7px 29px 0px;
            border: 2px;
            border-radius: 10px;
            font-weight: bold;
        }
  nav a:hover {
            background-color:rgb(20, 20, 20);
        }

  nav a.active {
            background-color: #3dedac;
            color: white;
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
      padding-top: 3%;
     margin-right:3%;
     background-repeat: no-repeat;
}
   
 </style>
    </head>
    <body>
      
        <div class="hero"> 
            <nav>
                <a href="Add.php">Add Employee</a>
                <a href="Update.php">Update Employee</a>
                <a href="Delete.php">Delete Employee</a>
                <a href="#view">View Employee</a>
            </nav>
           <div>
           <img src="img.png">
        </div>
        <view id="view">
        <div class="view">
        <h2>Employee List</h2>
            <?php
            require "connection.php";
            $link = mysqli_connect("localhost:3370", "root", "", "employee");
            if ($link === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $sqli = "SELECT * FROM `add_employee`";
            if ($result = mysqli_query($link, $sqli)) {
                if (mysqli_num_rows($result) > 0) {
                    echo '<table>';
                    echo "<tr>";
                    echo "<th>Id</th>";
                    echo "<th>Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phoneno</th>";
                    echo "<th>Birth Date</th>";
                    echo "<th>Position</th>";
                    echo "<th>Joining Date</th>";
                    echo "<th>Salary</th>";
                    echo "<th>Address</th>";
                    echo "</tr>";
                    while ($row = mysqli_fetch_array($result)) {
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
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute $sqli. " . mysqli_error($link);
            }
            mysqli_close($link);
            ?>
        </div>
    </view>
       
    </body>
</html>
