<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Soap Implementation</title>
</head>
<body>
    <div class="wrapper">
        <h2>Flight Price</h2>
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

                // Call the SOAP service to get the price
                $response = $client->getflightPrice($flightDesti);

                echo "Price for $flightDesti: $response";
            } catch (SoapFault $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>
    </div>
</body>
</html>