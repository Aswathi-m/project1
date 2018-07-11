<?php
include 'studentdata.php';
$obj=new studentdata();
if(isset($_GET['id'])&& $_GET['id']>0){
    $stud_id=(int)$_GET['id'];
    $test = $obj->selectStudent($stud_id);
    $data = array_shift($test);
  }
if (isset($_POST['submit'])){
//if($_POST['submit']){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $id=$_POST["id"];
    $dsresult = $obj->update($name,$email,$id);
    if($dsresult){
        echo "updated data successfully";
    }
$data["id"]="";
$data["name"]="";
$data["email"]="";
}
?>
<html>
<head>
<h1 align ="Center">STUDENT DATA UPDATE </h1>
<a href="first.php">Back</a>
<script>
function validateForm() {
    var x= document.forms["myform"]["name"].value;
    var email=document.forms["myform"]["email"].value;
    var regexEmail= /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    if(x == "") 
    {
        alert("Name must be filled out");
        return false;
    }
    if(!isNaN(x))
    {
        alert("Please Enter only characters");
        document.forms["myform"]["name"].select();
        return false;
    }
  
    if(email == "")
    {
        alert("Email must be filled out");
        return false;
    }
   /* if(!regexEmail.test(email.value)){
        alert("Please enter a valid email);
}*/
}
  
</script>
</head>
<body>
<form name="myform" action="update.php" onsubmit= "return validateForm()" method="POST">
<table>
  <tr>
    <td>
<input type="hidden" name="id" value= <?php echo $data["id"]?> >
</td>
</tr>
  <tr>
    <td>
<label>ENTER THE NAME TO BE UPDATED :</label>
<input type="text" name="name" value= <?php echo $data["name"] ?> >
</td>
</tr>
<tr>
<td>
<label>ENTER THE EMAIL TO BE UPDATED:</label>
<input type="text" name="email" value= <?php echo $data["email"] ?> >
</td>
</tr>
<tr>
<td>
<tr>
<td>
  <input class="submit" name="submit" type="submit" value="SUBMIT">
</td>
</tr>
