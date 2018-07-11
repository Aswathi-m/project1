<?php
include ('studentdata.php');
$obj=new studentdata();
?>
<html>
<head>
<body bgcolor="pink">
<h1><center>STUDENT DETAILS</center></h1>
<a href="first.php">Back</a>

<?php
$result=$obj->selectStudent();
?>
<table border="1" align="center" width="400">
 <thead>
    <tr>
       <th>Id</th> 
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
<?php
     foreach($result as $row)
{
?>
    <tr>
        <td><label><?php echo $row['id'];?></label></td>
        <td><label><?php echo $row['name'];?></label></td>
        <td><label><?php echo $row['email'];?></label></td>
        <td><?php echo "<a href='update.php? id=",$row['id'],"'>Edit</a>"?> </td>
        <td><?php echo "<a href='delete.php? id=",$row['id'],"'>Delete</a>"?> </td>

</tr>
<?php } ?>
</tbody>
</table>
</body>
</html>

