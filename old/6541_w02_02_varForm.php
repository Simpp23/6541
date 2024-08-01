<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
   
</head>
<body>
    
<?php
    $fname = "Nattawat";
    $lname = "Subsomboon" ;
    $email = "nattawat71710@gmail.com" ;
    $age = 20;
    $phone = "0928271710";
    $genderMale = "Male";
    $genderFemale = "Female";
    $selectedGender = $genderMale;
    $skill = ["HTML","CSS","JAVA","PHP"];  
    $note = "Interested in Computer field na kub ;)";
?>
<h3 style='background-color:red; color:white;'>Workshop01</h3>
<h1 style='padding-right:10px'>Information about me: <?php echo "<span style='color:blue;'>$fname"." "."$lname</span>" ?></h1>
<form action="">
<fieldset style='display:flex; flex-direction:column;'>
    <legend>Text Field</legend>
    <label for="fname">First Name</label>
    <input  style='width:150px; color:blue;' type="text" required name="fname" id="fname" value="<?php echo $fname;  ?>">
    <label for="lname">Last name</label>
    <input style='width:150px; color:blue;' type="text" name="lname" id="lname" value="<?php echo $lname; ?>">
    <label for="email">Email</label>
    <input style='width:250px; color:blue;' type="text" name="email" value="<?php echo $email; ?>" id="email">
    <label for="age">Age</label>
    <input style='width:50px; color:blue;' type="text" value="<?php echo $age; ?>" name="age" id="age">
    <label for="phone">Phone</label>
    <input style='width:100px; color:blue;' type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
</fieldset>

<fieldset>
    <legend>Radio Button</legend>
    <label for="gender">Gender:</label>
    <input type="radio" id="genderMale" name="gender" value="<?php echo $genderMale; ?>" >
    <label for="genderMale">Male</label>
    <input type="radio" id="genderFemale" name="gender" value="<?php echo $genderFemale; ?>" checked>
    <label for="genderFemale">Female</label>
    
</fieldset>

 <fieldset>
        <legend>CheckBox</legend>
        <label>Skill</label>
        <input id="html" name="skills" value="<?php echo $skills[0] ?>" type="checkbox">
        <label for="html"><?php echo $skill[0]?></label>
        <input id="css" name="skills" value="<?php echo $skills[3] ?>" type="checkbox">
        <label for="css"><?php echo $skill[3]?></label>
        <input id="php" name="skills" value="<?php echo $skills[2] ?>" type="checkbox">
        <label for="php"><?php echo $skill[2]?></label>
        <input id="java" name="skills" value="<?php echo $skills[1] ?>" type="checkbox">
        <label for="java"><?php echo $skill[1] ?></label>
        
    </fieldset>

    <fieldset>
        <legend>Textarea with CSS</legend>
        <label for="">Note:</label>
        <textarea style='color:blue;' name="" class="" cols=150 rows=10 id=""><?php echo $note ?></textarea>
    </fieldset>
    <input style='margin-top:10px' type="submit" value="ยืนยัน"/>
</form>

</body>
</html>