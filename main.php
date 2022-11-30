<html>
    <head>
        <meta>
    </head>
    <body>
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
        <h1>Success University Database</h1>

        <h2>Check students enrolled in classes</h2>
        <form action="show_course_by_year.php" method="post">
            <select name="course">
                <option value="">Select Course</option>
                <?php 
                $query ="SELECT course_id,course_title FROM COURSE";
                $result = $conn->query($query);
                if($result->num_rows> 0){
                    while($optionData=$result->fetch_assoc()){
                    $option =$optionData['course_title'];
                    $id =$optionData['course_id'];
                ?>
                <option value="<?php echo $id; ?>" ><?php echo $option; ?> </option>
            <?php
                }}
                ?>
            </select>
            <select name="year">
                <option value="">Select Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <input type="submit" name="Search">
            </form>

        <hr>
        <h2>Check student enrollment</h2>
        <form action="show_student_schedule.php" method="post">
            <select name="student">
                <option value="">Select Student</option>
                <?php 
                $student_query ="SELECT student_id, first_name, last_name FROM STUDENT";
                $student_result = $conn->query($student_query);
                if($student_result->num_rows> 0){
                    while($student_option=$student_result->fetch_assoc()){
                    $full_student_name =$student_option['first_name'] . " " . $student_option['last_name'];
                    $student_id =$student_option['student_id'];
                ?>
                <option value="<?php echo $student_id; ?>" ><?php echo $full_student_name; ?> </option>
            <?php
                }}
                ?>
            </select>
            <select name="year_schedule">
                <option value="">Select Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <input type="submit" name="Search">

        </form>
        <hr>

        <h2>Check Available Sessions Classes in the year</h2>
        <form action="show_sections.php" method="post">
            <select name="course_section">
                <option value="">Select Course</option>
                <?php 
                $section_query ="SELECT course_id,course_title FROM COURSE";
                $section_result = $conn->query($section_query);
                if($section_result->num_rows> 0){
                    while($section_options=$section_result->fetch_assoc()){
                    $section_option =$section_options['course_title'];
                    $section_id =$section_options['course_id'];
                ?>
                <option value="<?php echo $section_id; ?>" ><?php echo $section_option; ?> </option>
            <?php
                }}
                ?>
            </select>
            <select name="year_section">
                <option value="">Select Year</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <input type="submit" name="Search">

        </form>
        
        <hr>

        <h2>Check Car registration, Parking and permits </h2>
        <form action="show_cars.php" method="post">
            <label>Start permit</label>
            <select name="year_start">
                <option value="">Select Year Start</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <label>End permit</label>
            <select name="year_end">
                <option value="">Select Year End</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <!-- <input type="checkbox" id="plates" name="plates" value="true">
            <label for="plates">Show plates</label><br> -->

            <input type="checkbox" id="car_info" name="car_info" value="true">
            <label for="car_info">Show car info</label><br>
            
            <label>Professors or Students (Optional)</label>
            <select name="stu_or_prof">
                <option value=""></option>
                <option value="pro">Professors</option>
                <option value="stu">Students</option>
            </select>

            <label>Order By</label>
            <select name="order_by">
                <option value="start_date">Start Date</option>
                <option value="end_date">End Date</option>
            </select>
            <input type="submit" name="Search">
        </form>

        <h3>Student</h3>
        <table border="1" align="center">
        <tr>
        <td> student_id</td>
        <td> first_name</td>
        <td> last_name</td>
        <td> birth_date</td>
        <td> registration_date</td>
        <td> car_id</td>
        <td> advisor_id</td>        
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM STUDENT") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['student_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['birth_date']}</td>
                            <td>{$row['registration_date']}</td>
                            <td>{$row['car_id']}</td>
                            <td>{$row['advisor_id']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Professor</h3>
        <table border="1" align="center">
        <tr>
        <td> professor_id</td>
        <td> first_name</td>
        <td> last_name</td>
        <td> pro_address</td>
        <td> City</td>
        <td> State</td>
        <td> zip_code</td>
        <td> birth_date</td>
        <td> date_started</td>
        <td> car_id</td>
        <td> dept_id</td>        
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM PROFESSOR") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['professor_id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['pro_address']}</td>
                            <td>{$row['City']}</td>
                            <td>{$row['State']}</td>
                            <td>{$row['zip_code']}</td>
                            <td>{$row['birth_date']}</td>
                            <td>{$row['date_started']}</td>
                            <td>{$row['car_id']}</td>
                            <td>{$row['dept_id']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Vehicle</h3>
        <table border="1" align="center">
        <tr>
        <td> car_id</td>
        <td> car_year</td>
        <td> car_make</td>
        <td> car_model</td>
        <td> car_plate</td>     
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM VEHICLE") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['car_id']}</td>
                            <td>{$row['car_year']}</td>
                            <td>{$row['car_make']}</td>
                            <td>{$row['car_model']}</td>
                            <td>{$row['car_plate']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Department</h3>
        <table border="1" align="center">
        <tr>
        <td> dept_id</td>
        <td> dept_name</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM DEPARTMENT") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['dept_id']}</td>
                            <td>{$row['dept_name']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Course</h3>
        <table border="1" align="center">
        <tr>
        <td> course_id</td>
        <td> course_title</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM COURSE") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['course_id']}</td>
                            <td>{$row['course_title']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Parking</h3>
        <table border="1" align="center">
        <tr>
        <td> parking_id</td>
        <td> car_id</td>  
        <td> start_date</td>  
        <td> end_date</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM PARKING_ASSIGNMENT") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['parking_id']}</td>
                            <td>{$row['car_id']}</td>
                            <td>{$row['start_date']}</td>
                            <td>{$row['end_date']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Semester</h3>
        <table border="1" align="center">
        <tr>
        <td> semester_id</td>
        <td> START_DATE</td>  
        <td> end_date</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM SEMESTER") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['semester_id']}</td>
                            <td>{$row['START_DATE']}</td>
                            <td>{$row['end_date']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Section</h3>
        <table border="1" align="center">
        <tr>
        <td> section_id</td>
        <td> course_id</td>  
        <td> professor_id</td> 
        <td> semester_id</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM SECTION") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['section_id']}</td>
                            <td>{$row['course_id']}</td>
                            <td>{$row['professor_id']}</td>
                            <td>{$row['semester_id']}</td>
        </tr>";
        }
        ?>
        </table>

        <h3>Enrollment</h3>
        <table border="1" align="center">
        <tr>
        <td> section_id</td>
        <td> student_id</td>  
        </tr>


        <?php
        $query = mysqli_query($conn, "SELECT * FROM ENROLLMENT") or die (mysqli_error($conn));


        while ($row = mysqli_fetch_array($query)){
                    echo
                            "<tr>
                            <td>{$row['section_id']}</td>
                            <td>{$row['student_id']}</td>
        </tr>";
        }
        ?>
        </table>
    </body>
</html>