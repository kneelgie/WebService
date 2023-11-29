<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Soap Implementation</title>
</head>
<body>
    <div class="wrapper">
        <h2>Enter your Destination</h2>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="logo">
            <img src="logo.png" alt="logo">
          </div>
            <div class="input-group">
                <label for="flightDesti">Your flight destination here: </label><br><br><br>
                <input type="text" id="flightDesti" name="flightDesti" required>
                <span class="line"></span>
            </div><br><br>
            <button class="button" type="submit">Get ticket price</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $options = [
                    'location' => 'http://localhost/webService/availableFlights.php',
                    'uri' => 'http://localhost/webService',
                    'trace' => 1
                ];

                try {
                    $client = new SoapClient(null, $options);

                    // Get the flight destination from the form submission
                    $flightDesti = isset($_POST['flightDesti']) ? $_POST['flightDesti'] : '';

                    // Call the SOAP service to get the fflight price
                    $response = $client->getflightPrice($flightDesti);
                    echo "<br><br><br>";
                    echo "<span>Flight price for $flightDesti: $response </span>";
                } catch (SoapFault $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        ?>
    </div>

</body>
</html>
