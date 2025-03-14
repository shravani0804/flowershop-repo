<?php
include '../components/connect.php';

if(isset($_POST['register'])){

    $id=unique_id();
    $name=$_POST['name'];
    $name=$filter_var($name, FILTER_SANITIZE_STRING);

    $email=$_POST['email'];
    $email=$filter_var($email, FILTER_SANITIZE_STRING);

    $pass=$_POST['pass'];
    $pass=$filter_var($pass, FILTER_SANITIZE_STRING);

    
    $cpass=$_POST['cpass'];
    $cpass=$filter_var($cpass, FILTER_SANITIZE_STRING);

    $image=$_FILES['image']['name'];
    $image=$filter_var($image, FILTER_SANITIZE_STRING);
    $ext= pathinfo($image, PATHINFO_EXTENSION);
    $rename=unique_id().'.'.$ext;
    $image_size=$_FILES['image']['size'];
    $image_tmp_name=$_FILES['image']['tmp_name'];
    $image_folder='../uploaded_files'.$rename;

    $select_seller=$conn->prepare("SELECT*FROM'sellers'WHERE email=?");
    $select_seller->execute([$email]);

    if($select_seller->rowCount()>0){
        $warning_msg[] = 'email already exist';
    }
    else{
        if($pass != $cpass){
            $warning_msg[] = 'confirm passwprd does not matched';
        }else{
            $insert_seller = $conn->prepare("INSERT INTO 'sellers' (id, name, email, password,image) VALUES(?,?,?,?,?)");
            $insert_seller->execute([$id, $name, $email, $cpass, $rename]);
            move_uploaded_file($image_tmp_name, $image_folder);
            $success_msg[]='new seller registered! please login now';
        }

        }
    }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----box icon cdn link----->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href = "../css/admin_style.css?v=<?php echo time(); ?>">
    <title>Seller-registration</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="register">
            <h3>Register Now</h3>
            <div class="flex">
                <div class="col">
                <div class="input-field">
                        <p>Your name <span>*</span></p>
                        <input type="text" name="name" placeholder="Enter your name" maxlength="50" required-class="box">
                    </div>
                    <div class="input-field">
                        <p>Your email <span>*</span></p>
                        <input type="email" name="email" placeholder="Enter your email" maxlength="50" required-class="box">
                    </div>
                </div>
                <div class="col">
                <div class="input-field">
                        <p>Your password<span>*</span></p>
                        <input type="password" name="pass" placeholder="Enter your password" maxlength="50" required-class="box">
                    </div>
                    <div class="input-field">
                        <p>Confirm password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="Confirm password" maxlength="50" required-class="box">
                    </div>
                </div>
            </div>
            <div class="input-field">
                        <p>Select profile <span>*</span></p>
                        <input type="file" name="image" accept="image/*" required-class="box">
            </div>
            <p class="link">Already have an account? <a href="login.php">Login now</a></p>
            <input type="submit" name="register" class="btn" value="register now"> 
                    
        </form> 
    </div>               

    </div>