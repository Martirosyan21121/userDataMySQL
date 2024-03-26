<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <style>
        /* CSS for styling the table */
        table {
            width: 50%;
            margin: auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #00b700;
        }
    </style>
</head>
<body>

<h1 style="text-align: center; color: darkgreen">All Users</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "user";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user_data (name, surname, email, password) VALUES ('$name', '$surname', '$email', '$password')";
$result = $conn->query($sql);
$sqlRead = "SELECT * FROM user.user_data";
$result = $conn->query($sqlRead);
if ($result->num_rows > 0) {

    echo "<table border='1'>";
    echo "<tr>
<th>ID</th>
<th>Name</th>
<th>Surname</th>
<th>Email</th>
<th>Password</th>
</tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td>

<td>" . $row["name"] . "</td>
<td>" . $row["surname"] . "</td>
<td>" . $row["email"] . "</td>
<td>" . $row["password"] . "</td>

</tr>";
    }
    echo "</table>";
} else {
    echo "result null";
}

$conn->close();
?>


</body>
</html>


