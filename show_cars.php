<?php

include("database_conn.php");

if(isset($_POST['year_start'])){
    $year_start= $_POST['year_start'];
    $year_end= $_POST['year_end'];
    $order_by = $_POST['order_by'];
    $select = "select p.parking_id, v.car_plate, p.start_date, p.end_date ";
    $from = "from PARKING_ASSIGNMENT as p, VEHICLE as v";
    $where = "where p.car_id = v.car_id and p.start_date >= '$year_start-01-01' and p.end_date <= '$year_end-12-31'";
    //if(isset($_POST['plates'])) $plates= $_POST['plates'];
    if(isset($_POST['car_info'])){ 
        $car_info= $_POST['car_info'];
        $select .= ", v.car_year, v.car_make, v.car_model";
    } else {
        $car_info= "false";
    }
    if($_POST['stu_or_prof'] != "") {
        $stu_or_prof= $_POST['stu_or_prof'];
        $select .= ", $stu_or_prof.first_name, $stu_or_prof.last_name ";
        $where .= "and p.car_id = $stu_or_prof.car_id";
        if($stu_or_prof == "stu") $from .= ", STUDENT as stu ";
        if($stu_or_prof == "pro") $from .= ", PROFESSOR as pro ";
    } else {
        $stu_or_prof= "false";
    }
    //$year= $_POST['year'];

    $query = "$select
    $from
    $where
    order by p.$order_by";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $cars= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
     $cars=[];
    }

}

?>

    <?php
    if(isset($cars)>0)
    {
    ?>
    <table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>Parking Id</th>
        <th>Car plate</th>
        <th>Start Date</th>
        <th>End Date</th>
        <?php
            if($car_info == "true")
            {
            ?>
            <th>Car year</th>
            <th>Car make</th>
            <th>Car model</th>
            <?php
            }
        ?>
        <?php
            if($stu_or_prof == "stu" || $stu_or_prof == "pro")
            {
            ?>
            <th>First Name</th>
            <th>Last Name</th>
            <?php
            }
        ?>
    </tr>
    <?php
       if(count($cars)>0)
       {
            foreach ($cars as $car) {
            ?>
            <tr>
                <td><?php echo $car['parking_id']; ?></td>
                <td><?php echo $car['car_plate']; ?></td>
                <td><?php echo $car['start_date']; ?></td>
                <td><?php echo $car['end_date']; ?></td>

                <?php
                    if($car_info == "true")
                    {
                    ?>
                    <td><?php echo $car['car_year']; ?></td>
                    <td><?php echo $car['car_make']; ?></td>
                    <td><?php echo $car['car_model']; ?></td>
                    <?php
                    }
                ?>
                <?php
                    if($stu_or_prof == "stu" || $stu_or_prof == "pro" )
                    {
                    ?>
                    <td><?php echo $car['first_name']; ?></td>
                    <td><?php echo $car['last_name']; ?></td>
                <?php
                    }
                ?>
            </tr>
            <?php
            }
        }else{
            echo "<tr><td colspan='3'>No cars have been found</td></tr>";
        }
        ?>
</table>
<?php
}
?>
