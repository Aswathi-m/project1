<?php
include ('studentdata.php');
$obj=new studentdata();
?>
<?php
if ($_SERVER[REQUEST_METHOD] == 'GET')
{
    $id=$_GET["id"];
    $result=$obj->delete($id);
if($result){
echo "Student deleted successfully";
}
}
?>



