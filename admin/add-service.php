<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Service</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            session_start();

            $conn = new mysqli("localhost", "root", "", "msms");

            if (strlen($_SESSION['VerifiedAdmin'] == 0)) {
                echo "<script>window.location.href='index.php'</script>";
            } 

            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $desc = $_POST['description'];
                $price = $_POST['price'];

                $query = "INSERT INTO `services` (`ID`, `ServiceName`, `Description`, `Price`) VALUES (NULL, '$name', '$desc', '$price');";

                $result = $conn->query($query);

                if ($result) {
                    echo '<script>alert("Service Added")</script>';
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again.")</script>';
                }
            }
        ?>

        <?php include 'includes/sidebar.php' ?>

        <div class="content">
            <h1 style="text-align: center;">Add Service</h1>
            <form method="post">
                <label for="name">Service Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="name">Description:</label>
                <input type="text" id="description" name="description" required>

                <label for="name">Price:</label>
                <input type="number" id="price" name="price" required><br>

                <button type="submit" id="submit" name="submit">Add</button>
            </form>
        </div>
    </body>
</html>