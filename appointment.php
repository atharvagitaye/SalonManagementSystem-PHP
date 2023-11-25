<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Make an appointment | Nexus Mens Salon</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
            session_start();

            $conn = new mysqli("localhost", "root", "", "msms");

            if(isset($_POST['submit'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $servicesnum = $_POST['services'];

                $ServiceQuery = "SELECT * FROM services where ID='$servicesnum';";
                $ResultService = $conn->query($ServiceQuery);

                while($row = $ResultService->fetch_assoc()) {
                    $FinalService = $row["ServiceName"];
                } 
                
                $adate = $_POST['appointment-date'];
                $atime = $_POST['appointment-time'];

                $InsertQuery = "INSERT INTO `appointment` (`ID`, `Name`, `Email`, `PhnNumber`, `AptDate`, `AptTime`, `Service`, `Status`) VALUES (NULL, '$name', '$email', '$phone', '$adate', '$atime', '$FinalService', 'Pending');";

                $QueryStatus = $conn->query($InsertQuery);

                if ($QueryStatus) {
                    $Ret = "SELECT * FROM appointment WHERE PhnNumber='$phone' AND Email='$email' ORDER BY ID DESC LIMIT 1;";
                    $RetStatus = $conn->query($Ret);
                    $AptNumber = mysqli_fetch_array($RetStatus);
                    $_SESSION['AptNo'] = $AptNumber['ID'];
                    echo "<script>window.location.href='thank-you.php'</script>";
                } else {
                    echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
                }

          }
        ?>

        <?php include 'includes/navbar.php' ?>

        <div class="other-page-title">
            <h1>Make an appointment</h1>
        </div>

        <div class="breadcrumb">
            <p style="margin-top: 0px; font-size: 14px;">Home / Appointment</p>
        </div>

        <h2 style="text-align: center;">Appointment Form</h2>
        <p style="text-align: center; font-size: 18px">Book your appointment to save your slot</p>
    
        <form method="post" style="margin-bottom: 50px">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-input" required>
            
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" class="form-input" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-input" required>
            
            <label for="services">Services:</label>
            <select id="services" name="services" class="form-input">
            <?php
                $conn = new mysqli("localhost", "root", "", "msms");

                if ($conn->connect_error) {
                    die("Connection faild" . $conn->connect_error);
                }
    
                $sql = "SELECT * FROM services";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=". $row["ID"] . ">" . $row["ServiceName"] ."</option>";
                    } 
                } else { 
                    echo "0 results"; 
                }
    
                $conn->close(); 
            ?>
            </select>
            
            <label for="appointment-date">Appointment Date (dd-mm-yyyy):</label>
            <input type="date" id="appointment-date" name="appointment-date" class="form-input" required>
            
            <label for="appointment-time">Appointment Time (HH:MM):</label>
            <input type="time" id="appointment-time" name="appointment-time" class="form-input" required>
            
            <button type="submit" id="submit" name="submit" class="submit-button">Book</button>
        </form>

        <?php include 'includes/footer.php' ?>
    </body>
</html>