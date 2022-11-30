<?php

include("database_conn.php");

if(isset($_POST['course_section'])){
    $course_id= $_POST['course_section'];
    $year= $_POST['year_section'];
    $query ="select section_id, course_title,  sem.start_date, sem.end_date, p.first_name, p.last_name
    from SECTION as s, COURSE as c, SEMESTER as sem, PROFESSOR as p
    where s.course_id = c.course_id 
    and s.semester_id = sem.semester_id 
    and sem.start_date >= '$year-01-01' 
    and sem.end_date <= '$year-12-31' 
    and s.professor_id = p.professor_id
    and c.course_id = $course_id
    order by section_id";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $sections= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $sections=[];
    }

}

?>

    <?php
    if(isset($sections)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Section Id</th>
        <th>Course Title</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Professor</th>
    </tr>
    <?php
       if(count($sections)>0)
       {
            foreach ($sections as $section) {
            ?>
            <tr>
                <td><?php echo $section['section_id']; ?></td>
                <td><?php echo $section['course_title']; ?></td>
                <td><?php echo $section['start_date']; ?></td>
                <td><?php echo $section['end_date']; ?></td>
                <td><?php echo $section['first_name'] ." ". $section['last_name']; ?></td>
            </tr>
            
        <?php
        }
        }else{
            echo "<tr><td colspan='3'>No available sections found</td></tr>";
        }
        ?>
</table>
<?php
}
?>
