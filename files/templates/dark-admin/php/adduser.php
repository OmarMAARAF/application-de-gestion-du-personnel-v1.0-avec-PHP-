<?php
include '../ConnectDb.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $sql = "select * from login where id = '".$id."'";
    $result = mysqli_query($data, $sql);
    $row=mysqli_num_rows ( $result );
    if($row >0){
        echo "<script>alert('Il existe déja un utilisateur avec le méme id')</script>";
    }
    else{
        $sql = "insert into  login (id,password) values('" . $id . "','" . $password . "')";

        $result = mysqli_query($data, $sql);
        header("location:../adduser.html");
    }


    
}