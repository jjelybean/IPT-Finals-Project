<!DOCTYPE html>
<html>
<head>
    <title>Currency Conversion Result</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            font-size: 16px;
            background-color: #F6F8E2;
            color: #3F3D56;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        .output-line.label {
            margin: 30px 0 10px 0;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .output-line {
            margin: 0 0 30px 0;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        button {
            display: block;
            margin: 30px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h1>Currency Conversion Result</h1>

    <?php
        $apiKey = '7fe477f359cca55cea31dc533c5d20fa89a47b2d';

        //get user input
        $from = $_POST['from']; 
        $to = $_POST['to']; 
        $amount = $_POST['amount']; 

        $url = "https://api.getgeoapi.com/v2/currency/convert?api_key=$apiKey&from=$from&to=$to&amount=$amount&format=json";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        $from_currency_code = "";
        $from_currency_name = "";
        $from_amount = "";
        $updated_date = "";
        $to_currency_name = "";
        $to_rate = "";
        $to_rate_for_amount = "";

        if ($data["status"] == "success") {
            $from_currency_code = $data["base_currency_code"];
            $from_currency_name = $data["base_currency_name"];
            $amount = $data["amount"];
            $updated_date = $data["updated_date"];
            $to_currency_name = $data["rates"][$to]["currency_name"];
            $to_rate = $data["rates"][$to]["rate"];
            $converted_amount = $data["rates"][$to]["rate_for_amount"];

            echo '<div class="output-line label">Converted from: ' . $from_currency_name . ' to ' . $to_currency_name . '</div>';
            echo '<div class="output-line">Amount: ' . $amount . '</div>';
            echo '<div class="output-line">Converted Amount: ' . $converted_amount . '</div>';

        } else {
            echo '<div class="output-line">Error: Failed to convert currency</div>';
        }

    ?>

    <button onclick="window.location.href='convertForm.php'">Convert Another</button>

</body>
</html>
