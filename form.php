<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';


    $name = $_POST['name'];
    $email = $_POST['email'];
    $studentname = $_POST['studentname'];
    $mobilenumber = $_POST['mobilenumber'];

   
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
     
        $stmt = $conn->prepare("INSERT INTO audience (name, email, studentname, mobilenumber) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
       
            error_log('Prepare failed: ' . $conn->error);
            die('There was an error processing your request.');
        }
        
        
        $stmt->bind_param("ssss", $name, $email, $studentname, $mobilenumber);

        if ($stmt->execute()) {
            echo "Registration Successful...visit our montessori for more....";
        } else {
           
            error_log('Execution failed: ' . $stmt->error);
            echo "There was an error processing your request.";
        }


        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="p1.jpg" type="image/x-icon">
    <title>SEAT Reservations</title>
    <link rel="stylesheet" href="style.css" />

    <style>
        body {
            background-image: url('main.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            margin: 0;
            height: 100vh;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container label {
            color: white;
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="number"],
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header class="section-navbar">
        <div class="container">
            <div class="navbar-brand">
                <a href="index.html">
                    <img src="p1.jpg" alt="Site Logo" width="56" height="auto" />
                </a>
            </div>
        </div>
    </header>

 

    <div class="form-container">
        <form action="" method="post">
            <h1 align="center">Seat Reservations Form</h1>
            <label for="name">Guardians Name:</label>
            <input type="text" id="name" name="name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="studentname">Student Name:</label>
            <input type="text" id="studentname" name="studentname" required />

            <label for="mobilenumber">Mobile Number:</label>
            <input type="text" id="mobilenumber" name="mobilenumber" required />

            <input type="submit" value="Submit" />
            
        </form>
    </div>
</body>
</html>

