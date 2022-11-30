<!--set default value of variables for initial page load-->
<?php
	if (!isset($cust_fName)) { $cust_fName = ''; }
	if (!isset($cust_lName)) { $cust_lName = ''; }
	if (!isset($labor_costs)) { $labor_costs = ''; }
	if (!isset($parts_cost)) { $parts_cost = ''; }

?>
<!--don't forget to save the file as index.php when done-->
<!DOCTYPE html>
<html>
<head>
    <title>Success University</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Success University</h1>
		<!--insert if statement to display $error_message if it's not empty-->
		<?php if (!empty($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } // end if ?>

        <form action="show_course_by_year.php" method="post">
            <select name="courses">
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
            <select name="years">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
            <input type="submit" name="Search">
        </form>


		
        <form action="display_invoice.php" method="post">

            <div id="data">

            <label for="classes">Class:</label>
            <select name="classes" id="classes">
                <option value="Intro to CS">Intro to CS</option>
                <option value="Intro to Business Communication">Intro to Business Communication</option>
                <option value="basics of Modular Arithmetic">basics of Modular Arithmetic</option>
                <option value="Intro to Phylosophy">Intro to Phylosophy</option>
                <option value="Intro to Phylosophy">Intro to Phylosophy</option>
            </select>
                <label>Customer First Name:</label>
                <input type="text" name="cust_fName" value="<?php echo htmlspecialchars($cust_fName); ?>">
				<!--echo statement using htmlspecialchars--><br>
				
				<label>Customer Last Name:</label>
                <input type="text" name="cust_lName" value="<?php echo htmlspecialchars($cust_lName); ?>" >
				<!--echo statement using htmlspecialchars--><br>

				<label>Labor Costs:</label>
                <input type="text" name="labor_costs" value="<?php echo htmlspecialchars($labor_costs); ?>">
				<!--echo statement using htmlspecialchars--><br>

                <label>Parts Cost:</label>
                <input type="text" name="parts_cost" value="<?php echo htmlspecialchars($parts_cost); ?>">
				<!--echo statement using htmlspecialchars--><br>
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Display Invoice"><br>
            </div>

        </form>
    </main>
</body>
</html>