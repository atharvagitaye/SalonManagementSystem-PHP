<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Appointment</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            session_start();

            $conn = new mysqli("localhost", "root", "", "msms");

            if (strlen($_SESSION['VerifiedAdmin'] == 0)) {
                echo "<script>window.location.href='index.php'</script>";
            }
        ?>

        <?php
            if(isset($_POST['submit'])) {
                $cid = $_GET['viewid'];
                $status = $_POST['status'];
               
                $query = mysqli_query($conn, "UPDATE appointment SET Status='$status' WHERE ID='$cid';");
                if ($query) {
                    echo '<script>alert("All remark has been updated")</script>';
                } else {
                    echo '<script>alert("Something Went Wrong. Please try again.")</script>';
                }
          }
            
        ?>

        <?php include 'includes/sidebar.php' ?>

        <div class="content">
            <h1 style="text-align: center;">View Appointment</h1>
            <div class="table-container">
                <table>
                    <?php
                        $cid = $_GET['viewid'];
                        $query = "SELECT * FROM appointment WHERE ID='$cid'";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                                echo 
                                    "<tr>
                                    <th>ID</th>
                                    <td>" . $row['ID'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>" . $row['Name'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>" . $row['Email'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>" . $row['PhnNumber'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Appointment Date</th>
                                        <td>" . $row['AptDate'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Appointment Time</th>
                                        <td>" . $row['AptTime'] . "</td>
                                    <tr>
                                    <tr>
                                        <th>Service</th>
                                        <td>" . $row['Service'] . "</td>
                                    <tr>";
                            } 
                        } else { 
                            echo "0 results"; 
                        }
                    ?>
                </table>
            </div>

            <form method="post">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="Accepted">Accept</option>
                    <option value="Rejected">Reject</option>
                </select><br>
                
                <button type="submit" id="submit" name="submit">Submit</button>
            <form>

        </div>
    </body>
</html>