<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <?php include 'includes/navbar.php' ?>

    <div class="other-page-title">
            <h1>Thank You!!</h1>
    </div>

    <div class="breadcrumb">
            <p style="margin-top: 0px; font-size: 14px;">Home / Thank You</p>
    </div>

    <p style="font-size: 28px">Thank you for applying. Your Appointment number is <strong><?php session_start(); echo $_SESSION['AptNo'];?></strong></p>

    <?php include 'includes/footer.php' ?>
    </body>
</html>