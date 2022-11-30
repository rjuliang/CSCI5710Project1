<?php

include("database_conn.php");

if(isset($_POST['student'])){
    $student_id= $_POST['student'];
    $year= $_POST['year_schedule'];
    $query ="select s.section_id, c.course_title, sem.start_date, sem.end_date
    from SECTION as s, COURSE as c, SEMESTER as sem, STUDENT as stu, ENROLLMENT as e
    where s.course_id = c.course_id 
    and s.semester_id = sem.semester_id 
    and stu.student_id = e.student_id 
    and e.section_id = s.section_id 
    and sem.start_date >= '$year-01-01' and sem.end_date <= '$year-12-31'
    and stu.student_id = $student_id;";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $classes= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $classes=[];
    }

}

?>

    <?php
    if(isset($classes)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Section Id</th>
        <th>Course Title</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    <?php
       if(count($classes)>0)
       {
            foreach ($classes as $class) {
            ?>
            <tr>
                <td><?php echo $class['section_id']; ?></td>
                <td><?php echo $class['course_title']; ?></td>
                <td><?php echo $class['start_date']; ?></td>
                <td><?php echo $class['end_date']; ?></td>
            </tr>
            
        <?php
        }
        }else{
            echo "<tr><td colspan='3'>The students has no class in this timeframe</td></tr>";
        }
        ?>
</table>
<?php
}
?>
