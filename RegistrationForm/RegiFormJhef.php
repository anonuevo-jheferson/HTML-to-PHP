<?php
$fname= $_POST["fname"];
$mname= $_POST["mname"];
$lname= $_POST["lname"];
$email= $_POST["email"];
$sex= $_POST["sex"];
$subjects= $_POST["subjects"];
function backtofile(){  
echo "<script>alert('Invalid Email') 
window.location.href='../../Registrationform/RegiFormJhef.html';
</script>"; 
}
echo "First Name: ".$fname."<br/>";
echo "Middle Name: ".$mname."<br/>";
echo "Last Name: ".$lname."<br/>";
echo "Sex: ".$sex."<br/>";

if(filter_var($email, FILTER_VALIDATE_EMAIL)==true){
    } else{ backtofile();
    }
echo "Email: ".$email."<br/>";
echo "Subjects taken: <br/>";
for($i = 0; $i < count($subjects); $i++){
    echo $subjects[$i]."<br/>";
}
echo "<hr/>";
$csv=array(
    array("First Name","Middle Name", "Last Name", "Sex", "Email", "Subjects Taken"),
    array($fname, $mname, $lname, $sex, $email, implode(",",$subjects))
);

$exists = false;
if(file_exists('database.csv')){
 $exists = true;
}

if(!$exists){
 $file = fopen("database.csv",'w'); 
 fputcsv($file, $csv[0]);
 fputcsv($file, $csv[1]);
 fclose($file);
}
else{
 $file = fopen("database.csv",'a');
 fputcsv($file, $csv[1]);
 fclose($file);
}
echo "CSV File Has been created.";
echo "<hr/>";
echo '<table border="1">';
echo '<tr>';
echo '<th>First Name</th>';
echo '<th>Middle Name</th>';
echo '<th>Last Name</th>';
echo '<th>Sex</th>';
echo '<th>Email</th>';
echo '<th>Subjects taken</th>';
echo '</tr>';
echo '<tr>';
echo '<td>'.$fname.'</td>';
echo '<td>'.$mname.'</td>';
echo '<td>'.$lname.'</td>';
echo '<td>'.$sex.'</td>';
echo '<td>'.$email.'</td>';
echo '<td>'.implode(",",$subjects).'</td>';
echo '</tr>';
echo '</table>';
?>