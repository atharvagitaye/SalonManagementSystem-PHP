<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accepted Appointment</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            session_start();

            $conn = new mysqli("localhost", "root", "", "msms");

            if (strlen($_SESSION['VerifiedAdmin'] == 0)) {
                header('location:logout.php');
            } 
        ?>

        <?php include 'includes/sidebar.php' ?>

        <div class="content">
            <h1 style="text-align: center;">Accepted Appointments</h1>
            <div class="table-container">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Service</th>
                    </tr>
                    
                    <?php
                        $query = "SELECT * FROM appointment WHERE Status='Accepted';";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) { 
                            while($row = $result->fetch_assoc()) {
                                echo 
                                    '<tr>
                                        <td>' . $row['ID'] . '</td>' .
                                        '<td>' . $row['Name'] . '</td>' .
                                        '<td>' . $row['Email'] . '</td>' .
                                        '<td>' . $row['PhnNumber'] . '</td>' .
                                        '<td>' . $row['AptDate'] . '</td>' .
                                        '<td>' . $row['AptTime'] . '</td>' .
                                        '<td>' . $row['Service'] . '</td>
                                    </tr>'; 
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