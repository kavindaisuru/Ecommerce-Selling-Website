<?php 
/*
if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['pon']) && isset($_POST['password']) && isset($_POST['cpassword'])) {
   
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pon = $_POST['pon'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $submit = $_POST['submit'];
}

$con = mysqli_connect('localhost','root','','zone_user');
if(!$con){
    echo'Erro occured';}

// else{
//    $query = "INSERT INTO user VALUES (DEFAULT,'$uname','$email','$pon','$password','$cpassword')";
  
//    }
//    if(mysqli_query($con,$query)){
//        echo '<script language="javascript">';
//       echo 'alert("Successfully sent")'; 
//       echo'</script>';
//    }else{
//        echo "error";
//    }





// $uname = $_POST['uname'];
// $email = $_POST['email'];
// $pon = $_POST['pon'];
// $password = $_POST['password'];
// $cpassword = $_POST['cpassword'];



if(isset($_POST['submit'])){
function validate($data){
    $data = trim($data);            //spece out
    $data = stripcslashes($data);    //clear
    $data = htmlspecialchars($data);   //convert to html
    return $data;
}
    $uname = validate($_POST['uname']);
    $emaile = validate($_POST['email']);
    $pon = validate($_POST['pon']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);


if(empty($uname)&& empty($email)&& empty($pon)&& empty($password)&& empty($cpassword)){
    header("Location: register.php?error=Insert Data");
    exit;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: register.php?error=Insert Valid Email");
        exit;

// if(isset($_POST['submit'])){
    }elseif(empty($uname)){
        header("Location: register.php?error=Name is Required");
        exit;
    }elseif(empty($email)){
        header("Location: register.php?error=Email is Required");
        exit;
    }elseif(empty($pon)){
        header("Location: register.php?error=Phone Number is Required");
        exit;
    }elseif(empty($password)){
        header("Location: register.php?error=Password is Required");
        exit;
    }elseif(empty($cpassword)){
        header("Location: register.php?error=Confriom Password is Required");
        exit;
    }
    
    if($password!==$cpassword){
        header("Location: register.php?error=Passwords Do not Match");
        exit;
    }else{
   $query = "INSERT INTO user VALUES (DEFAULT,'$uname','$email','$pon','$password','$cpassword')";
  
   }
   if(mysqli_query($con,$query)){
    header("Location: register.php?success=Your Account has been Created Succesfull...!");
    exit;
    
}

   
    } */
?>