<!DOCTYPE html>
<html lang="en">
<head>
<title>Add students here!</title>
</head>
<body>
<?php
include 'studentdata.php';
$obj=new studentdata();
         $nameErrr = $ageErrr = "";
         $name = $age = "";
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
         if (empty($_POST["name"]) || (!preg_match("/^[a-zA-Z ]*$/",($_POST["name"])))) {
         $nameErrr = "Only letters and white space allowed";
         }
	     else {
         $name = test_input($_POST["name"]);
		 }
}
           function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
		 
		$result=$obj->insert($name,$email);
        if ($result) {
        echo "Registred successfully... Thank you <br>";
}
?>
<h2>Registration Page</h2>
 <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Name:</td>
               <td><input type = "text" name = "name">
                  <span class = "error"> <?php echo $nameErrr;?></span>
               </td>
            </tr>
            <tr>
              <td>Email: </td>
              <td><input type = "text" name ="email">
              </td>
</tr>
         
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
     </form>
</body>
</html>
