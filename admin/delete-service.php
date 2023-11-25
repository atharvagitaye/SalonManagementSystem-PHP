<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Service</title>
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
                $Service = $_POST['deleteservice'];
                
                $query = "DELETE FROM services WHERE ID='$Service';";

                $result = $conn->query($query);

                if ($result) {
                    echo '<script>alert("Service Deleted")</script>';
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again.")</script>';
                }
            }
        ?>

        <?php include 'includes/sidebar.php' ?>

        <div class="content">
            <h1 style="text-align: center;">Delete Service</h1>
            <form method="post">
                <label for="deleteservice">Select Service to delete:</label>
                <select id="deleteservice" name="deleteservice" required>
                    <?php
                        $query = "SELECT * FROM services";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                                echo "<option value=". $row["ID"] . ">" . $row["ServiceName"] ."</option>";
                            } 
                        } else { 
                            echo "0 results"; 
                        }
                    ?>
                </select><br>

                <button type="submit" id="submit" name="submit">Delete</button>
            <form>
        </div>
    </body>
</html>