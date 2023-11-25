<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Services | Nexus Mens Salon</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php include 'includes/navbar.php' ?>

        <div class="other-page-title">
            <h1>Salon Services</h1>
        </div>

        <div class="breadcrumb">
            <p style="margin-top: 0px; font-size: 14px;">Home / Services</p>
        </div>

        <table>
            <tr>
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>

        <?php
            $conn = new mysqli("localhost", "root", "", "msms");

            if ($conn->connect_error) {
                die("Connection faild" . $conn->connect_error);
            }

            $sql = "SELECT * FROM services";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) { 
                while($row = $result->fetch_assoc()) {
                    echo 
                        "<tr>
                            <td>" . $row["ServiceName"] . "</td>" .
                            "<td>" . $row["Description"] . "</td>" .
                            "<td> ₹" . $row["Price"] . "</td>
                        </tr>";
                } 
            } else { 
                echo "0 results"; 
            }
  
            $conn->close(); 
        ?>

        </table>

        <?php include 'includes/footer.php' ?>
    </body>
</html>