<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Corben:bold" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="newstylephp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>Currency Converter</title>
</head>
<body>
<h1 id="welcome">Welcome to Currency Converter!</h1>
<form method="post">
    <label for="startingcurr">I want to convert:</label><br>
    <input type="number" id="startingcurr" name="amount" required><br>

    <input type="radio" id="from_currency" name="from_currency" value="CAD" required>
    <label for="CAD">
        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
        CAD</label><br>
    <input type="radio" id="from_currency" name="from_currency" value="USD" required>
    <label for="USD">
        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
        USD</label><br>
    <input type="radio" id="from_currency" name="from_currency" value="EUR" required>
    <label for="EUR">
        <i class="flag-icon flag-icon-eu flag-icon-squared"></i>
        EUR</label><br>
    <input type="radio" id="from_currency" name="from_currency" value="GBP" required>
    <label for="GBP">
        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
        GBP</label><br>
    <input type="radio" id="from_currency" name="from_currency" value="CHY" required>
    <label for="CHY">
        <i class="flag-icon flag-icon-cn flag-icon-squared"></i>
        CHY</label><br>

    <br>
    <br>

    <label for="to_currency">To:</label><br>
    <br>
    <input type="radio" id="to_currency" name="to_currency" value="CAD" required>
    <label for="CAD">
        <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
        CAD</label><br>
    <input type="radio" id="to_currency" name="to_currency" value="USD" required>
    <label for="USD">
        <i class="flag-icon flag-icon-us flag-icon-squared"></i>
        USD</label><br>
    <input type="radio" id="to_currency" name="to_currency" value="EUR" required>
    <label for="EUR">
        <i class="flag-icon flag-icon-eu flag-icon-squared"></i>
        EUR</label><br>
    <input type="radio" id="to_currency" name="to_currency" value="GBP" required>
    <label for="GBP">
        <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
        GBP</label><br>
    <input type="radio" id="to_currency" name="to_currency" value="CHY" required>
    <label for="CHY">
        <i class="flag-icon flag-icon-cn flag-icon-squared"></i>
        CHY</label><br>
    <br>
    <input type="submit" value="Convert">
</form>
<h3>Note: Currencies may not be updated daily!</h3>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST["amount"];
    $from_currency = $_POST["from_currency"];
    $to_currency = $_POST["to_currency"];

    $conversion_rates = [
        "CAD" => [
            "USD" => 0.733764,
            "EUR" => 0.684290,
            "GBP" => 0.584115,
            "CHY" => 5.341781,
        ],
        "USD" => [
            "CAD" => 1.363020,
            "EUR" => 0.933478,
            "GBP" => 0.796243,
            "CHY" => 7.295782,
        ],
        "EUR" => [
            "CAD" => 1.460329,
            "USD" => 1.071314,
            "GBP" => 0.853049,
            "CHY" => 7.821510,
        ],
        "GBP" => [
            "CAD" => 1.711560,
            "USD" => 1.255664,
            "EUR" => 1.172116,
            "CHY" => 9.171724,
        ],
        "CHY" => [
            "CAD" => 0.187178,
            "USD" => 0.137374,
            "EUR" => 0.128230,
            "GBP" => 0.109391,
        ],
    ];
    $from_flag = "";
    $to_flag = "";
    if ($from_currency == "CAD") $from_flag = "ca";
    if ($from_currency == "USD") $from_flag = "us";
    if ($from_currency == "EUR") $from_flag = "eu";
    if ($from_currency == "GBP") $from_flag = "gb";
    if ($from_currency == "CHY") $from_flag = "cn";

    if ($to_currency == "CAD") $to_flag = "ca";
    if ($to_currency == "USD") $to_flag = "us";
    if ($to_currency == "EUR") $to_flag = "eu";
    if ($to_currency == "GBP") $to_flag = "gb";
    if ($to_currency == "CHY") $to_flag = "cn";

    $converted_amount = $amount * $conversion_rates[$from_currency][$to_currency];
    echo "Conversion: " ."<p>
        <i class='flag-icon flag-icon-{$from_flag} flag-icon-squared'></i> 
        $from_currency $amount = 
        <i class='flag-icon flag-icon-{$to_flag} flag-icon-squared'></i> 
        $to_currency $converted_amount
        </p>";
}
?>
</body>
</html>