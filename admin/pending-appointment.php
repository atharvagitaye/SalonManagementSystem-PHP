<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pending Appointment</title>
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

        <?php include 'includes/sidebar.php' ?>

        <div class="content">
            <h1 style="text-align: center;">Pending Appointments</h1>
            <div class="table-container">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Service</th>
                        <th>Action</th>
                    </tr>
                    
                    <?php
                        $query = "SELECT * FROM appointment WHERE Status='Pending';";
                        $url = "view-appointment.php?viewid=";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                                echo 
                                    '<tr>
                                        <td>' . $row['ID'] . '</td>' .
                                        '<td>' . $row['Name'] . '</td>' .
                                        '<td>' . $row['AptDate'] . '</td>' .
                                        '<td>' . $row['AptTime'] . '</td>' .
                                        '<td>' . $row['Service'] . '</td>' .
                                        '<td><a href=' . $url . $row['ID'] . ">View</a></td>
                                    </tr>"; 
                            } 
                        } else { 
                            echo "0 results"; 
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>