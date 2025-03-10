<?php
include '../components/connect.php';
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
        <form action="" method="posy" accept="multipart/form-data" class="register">
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
            <input type="submit" name="register" class="btn" value="register now"> 
                    
        </form> 
    </div>               

    </div>