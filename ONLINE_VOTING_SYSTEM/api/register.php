<?php
    include("connect.php");

    $name=$_POST['Name'];
    $mobile   =$_POST['Mobile'];
    $password  =$_POST['password'];
    $cpassword  =$_POST['cpassword'];
    $address   =$_POST['address'];
    $image    =$_FILES['image']['name'];
    $tmp_name=$_FILES['image']['tmp_name'];
    $role=$_POST['role'];

    if($password==$cpassword){
        move_uploaded_file($tmp_name,"../uploads/$image");
        $insert=mysqli_query($connect,"INSERT INTO user (name,mobile,address,password,photo,role,status,votes) VALUES ('$name','$mobile','$address','$password','$image','$role',0,0)");
        if($insert){
            echo '
            <script>
                alert("Registration Successful");
                window.location="../";
            </script> 
        ';
        }
        else{
            echo '
            <script>
                alert("Some Error");
                window.location="../routes/register.html";
            </script> 
        ';
        }
    }
    else{
        echo '
            <script>
                alert("Passwords do not match!!!");
                window.location="../routes/register.html";
            </script> 
        ';
    }

?>