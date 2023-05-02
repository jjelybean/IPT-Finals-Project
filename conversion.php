<?php
    $apiKey = '50f116948f69be7067c643bda0d1f275626d0a97';

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

        echo "Converted from {$from_currency_name} to {$to_currency_name}\nAmount: {$amount}\nConverted Amount: {$converted_amount}";
    } else {
        echo "Error: Failed to convert currency";
    }
?>