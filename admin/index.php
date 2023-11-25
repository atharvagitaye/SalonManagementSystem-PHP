<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome Admin</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            session_start();
            
            $conn = new mysqli("localhost", "root", "", "msms");

            if (isset($_POST['login'])) {
                $AdminUser = $_POST['username'];
                $Password = md5($_POST['password']);

                $AuthAdmin = "SELECT username FROM admin WHERE username='$AdminUser' && password='$Password';";
                
                $QueryStatus = $conn->query($AuthAdmin);

                $Retrivel = mysqli_fetch_array($QueryStatus);

                if ($Retrivel>0) {
                    $_SESSION['VerifiedAdmin'] = $Retrivel['username'];
                    echo $_SESSION['VerifiedAdmin'];
                    echo "<script>window.location.href='dashboard.php'</script>";
                } else {
                    echo "<script>alert('Invalid Details');</script>";
                }
            }
        ?>

        <div class="sign-in-container">
            <h1>Admin Sign-In</h1>
            <form method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
    </body>
</html>