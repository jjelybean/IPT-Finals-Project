<!DOCTYPE html>
<html>
<head>
	<title>Translate</title>
</head>
<body>
	<h1>Translator</h1>

	<form method="post" action="translateAction.php">
		<label for="source">Source Language:</label>
        <input type="text" name="source" id="source" required>

        <br><br>
        <label for="target">Target Language:</label>
        <input type="text" name="target" id="target" required>

        <br><br>
        <label for="content">Text:</label>
        <input type="text" name="content" id="content" required>

		<button type="submit">Submit</button>
	</form>
</body>
</html>
