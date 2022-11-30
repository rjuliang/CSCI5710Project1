<?php
            $servername = "localhost";
            $username = "root";
            $password = "Basededatos1.";
            $db = "success_university";




            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);




            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }


            echo "Connected successfully";
?>