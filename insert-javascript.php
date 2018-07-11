<?php
include ('studentdata.php');
$obj=new studentdata();
?>
<html>
<head>
<style>
.error{color : #FF0000;}
</style>
</head>
<body>
<?php
if ($_SERVER[REQUEST_METHOD] == 'POST')
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $result=$obj->insert($name,$email);
if($result){
echo "New student added successfully";
}
}
?>
<script>
function validateForm() {
    var x= document.forms["myform"]["name"].value;
    var y=document.forms["myform"]["email"].value;
    var val=/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
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

    if(y == "")
    {
        alert("Email must be filled out");
        return false;
    }
    if(y!==val);
    {
        alert("enter valid email");
        document.forms["myform"]["name"].select();
        return false;
    }

}
</script>
</head>
<body>
<body bgcolor ="pink">
<form name="myform" action="testinsert.php" onsubmit= "return validateForm()" method="POST">
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
