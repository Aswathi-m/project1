<?php
include'studentdata.php';
$obj= new studentdata();
?>
<?php
function filterName($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
    if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
    return $field;
    }else{
    return FALSE;
    }
}
function filterEmail($field){
    $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
    return $field;
    }else{
        return FALSE;
    }
} 
$nameErr = $emailErr = "";
$name = $email = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($_POST["name"])){
   $nameErr = 'Please enter your name.';
   }else{
   $name = filterName($_POST["name"]);
   if($name == FALSE){
   $nameErr = 'Please enter a valid name.';
   }
 }
if(empty($_POST["email"])){
        $emailErr = 'Please enter your email address.';
    }else{
        $email = filterEmail($_POST["email"]);
        if($email == FALSE){
        $emailErr = 'Please enter a valid email address.';
        }
    }
if(empty($nameErr) && empty($emailErr)){
$dsresult = $obj->insert($name,$email);
if($dsresult){
echo "data inserted successfully";
}
}
}
?>

<html>
<head>
<h1> Add students here!</h1>
<body>
    <style type="text/css">

        .error{ color: red; }

        .success{ color: green; }

    </style>
<form action="testinsert.php" method="post">
 <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName" value="<?php echo $name; ?>">
            <span class="error"><?php echo $nameErr; ?></span>
</p>
<p>
            <label for="inputEmail">Email:<sup>*</sup></label>
            <input type="text" name="email" id="inputEmail" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailErr; ?></span>
</p>
<input type="submit"name="submit"  value="Submit">
</form>
</body>
</html>
