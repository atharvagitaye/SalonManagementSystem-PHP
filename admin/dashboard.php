<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
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
            <h1 style="text-align: center;">Dashboard</h1>
            <div class="table-container">
                <table class="full-width-table">
                    <tr>
                        <th><h1>Accepted Appointments</h1></th>
                        <td>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM appointment WHERE status='Accepted';");
                                $AcptApt = mysqli_num_rows($query);
                                echo "<h1>" . $AcptApt . "</h1>";
                            ?>
                        </td>
                    </tr>
                </table>
                <table class="full-width-table">
                    <tr>
                        <th><h1>Pending Appointments</h1></th>
                        <td>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM appointment WHERE status='Pending';");
                                $PendApt = mysqli_num_rows($query);
                                echo "<h1>" . $PendApt . "</h1>";
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="table-container">
                <table class="full-width-table">
                    <tr>
                        <th><h1>Rejected Appointments</h1></th>
                        <td>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM appointment WHERE status='Rejected';");
                                $RejApt = mysqli_num_rows($query);
                                echo "<h1>" . $RejApt . "</h1>";
                            ?>
                        </td>
                    </tr>
                </table>
                <table class="full-width-table">
                    <tr>
                        <th><h1>Total Services</h1></th>
                        <td>
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM services;");
                                $Services = mysqli_num_rows($query);
                                echo "<h1>" . $Services . "</h1>";
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </body>
</html>