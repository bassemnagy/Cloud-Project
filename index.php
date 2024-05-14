<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Student Records</h1>
        <?php
        // Your PHP code for fetching and displaying student data here
        $servername = 'db'; // service name
        $username = 'php_docker'; // username
        $password = 'password'; // password
        $database = 'cloud_project'; // db table

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $table_name = "student";

        $query = "SELECT * FROM $table_name";

        $response = $conn->query($query);

        if ($response->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Student ID</th><th>Name</th><th>CGPA</th><th>Age</th></tr>";
            // output data of each row
            while($row = $response->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["Student_ID"] . "</td>";
                echo "<td>" . $row["First_Name"] . "</td>";
                echo "<td>" . $row["CGPA"] . "</td>";
                echo "<td>" . $row["Age"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No student records found.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>

