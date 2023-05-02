<!DOCTYPE html>
<html>
<head>
	<title>Currency Converter</title>
</head>
<body>
	<h1>Currency Converter</h1>

	<form method="post" action="conversion.php">
		<label for="from">Convert from:</label>
        <input type="from" name="from" id="from" required>

        <br><br>
        <label for="to">Convert to:</label>
        <input type="to" name="to" id="to" required>

        <br><br>
		<label for="amount">Amount:</label>
		<input type="number" name="amount" id="amount" required>

		<button type="submit">Submit</button>
	</form>
</body>
</html>
