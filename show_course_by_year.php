<?php

include("database_conn.php");

if(isset($_POST['course'])){
    $courseId= $_POST['course'];
    $year= $_POST['year'];
    $query ="select stu.student_id, stu.first_name, stu.last_name
    from COURSE as c, SECTION as s, ENROLLMENT as e, STUDENT as stu, SEMESTER as sem
    where s.course_id = c.course_id 
    AND s.section_id = e.section_id 
    AND e.student_id = stu.student_id
    AND s.semester_id = sem.semester_id
    AND sem.START_DATE >= '$year-01-01' AND sem.end_date <= '$year-12-31'
    AND c.course_id = $courseId;";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $students= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $students=[];
    }

}

?>

    <?php
    if(isset($students)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Student Id</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    <?php
       if(count($students)>0)
       {
            foreach ($students as $student) {
            ?>
            <tr>
                <td><?php echo $student['student_id']; ?></td>
                <td><?php echo $student['first_name']; ?></td>
                <td><?php echo $student['last_name']; ?></td>
            </tr>
            
        <?php
        }
        }else{
            echo "<tr><td colspan='3'>No Students have enrolled in this section</td></tr>";
        }
        ?>
</table>
<?php
}
?>
