<?php
include ('mysqlconnection.php');
class studentdata
{    
   var $id;
   var $name; 
   var $email;
         
function __construct(){
$this->connection=new mysqlconnection();
}
function selectStudent($stud_id=0)
{
   
    $sql="select *from studentdata";
    if($stud_id>0)
    {
      $sql.= " where id= ".$stud_id;
    }
    $dsresult=$this->connection->selectdata($sql);
    $arr= array();
    if($dsresult-> num_rows > 0)
    {
     while($row=$dsresult->fetch_assoc()) 
      {
        $arr[]=$row;
      }
    }
    return $arr;
}
  
function insert($name,$email)
{
 $sqlquery ="insert into studentdata (name,email) values('$name','$email')" ;
 $dsresult=$this->connection->selectdata($sqlquery);
 if($dsresult==true) 
 {
   return $dsresult;
 }
}

function update($name,$email,$id)
{
   $sqlquery ="update studentdata set name ='$name', email='$email' where id='$id'";
   $dsresult=$this->connection->modify($sqlquery);
   if($dsresult==true) 
   { 
       return $dsresult;
   }
   
}
function delete($id)
{
    
    $sqlquery="delete from studentdata where id='$id'";
    $dsresult=$this->connection->selectdata($sqlquery);
    if($dsresult==true)
    {
      return $dsresult;
    }
}
}
?>
