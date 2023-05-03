<!DOCTYPE html>
<html>
<head>
	<title>Translate Form</title>
    <link rel = "stylesheet" href="style.css">
</head>
<body>
	<h1>Translator</h1>

	<form method="post" action="translateAction.php">
		<label for="source">Source Language:</label>
        <select name="source" id="source" required>
            <option value="az">Azerbaijani</option>
            <option value="zh">Chinese</option>
            <option value="cs">Czech</option>
            <option value="nl">Dutch</option>
            <option value="en">English</option>
            <option value="eo">Esperanto</option>
            <option value="fi">Finnish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="el">Greek</option>
            <option value="hi">Hindi</option>
            <option value="hu">Hungarian</option>
            <option value="id">Indonesian</option>
            <option value="ga">Irish</option>
            <option value="it">Italian</option>
            <option value="ja">Japanese</option>
            <option value="ko">Korean</option>
            <option value="fa">Persian</option>
            <option value="pl">Polish</option>
            <option value="pt">Portuguese</option>
            <option value="ru">Russian</option>
            <option value="sk">Slovak</option>
            <option value="es">Spanish</option>
            <option value="sv">Swedish</option>
            <option value="tr">Turkish</option>
            <option value="uk">Ukrainian</option>
            <option value="vi">Vietnamese</option>
        </select>

        <br><br>
        <label for="target">Target Language:</label>
        <select name="target" id="target" required>
            <option value="az">Azerbaijani</option>
            <option value="zh">Chinese</option>
            <option value="cs">Czech</option>
            <option value="nl">Dutch</option>
            <option value="en">English</option>
            <option value="eo">Esperanto</option>
            <option value="fi">Finnish</option>
            <option value="fr">French</option>
            <option value="de">German</option>
            <option value="el">Greek</option>
            <option value="hi">Hindi</option>
            <option value="hu">Hungarian</option>
            <option value="id">Indonesian</option>
            <option value="ga">Irish</option>
            <option value="it">Italian</option>
            <option value="ja">Japanese</option>
            <option value="ko">Korean</option>
            <option value="fa">Persian</option>
            <option value="pl">Polish</option>
            <option value="pt">Portuguese</option>
            <option value="ru">Russian</option>
            <option value="sk">Slovak</option>
            <option value="es">Spanish</option>
            <option value="sv">Swedish</option>
            <option value="tr">Turkish</option>
            <option value="uk">Ukrainian</option>
            <option value="vi">Vietnamese</option>
        </select>

        <br><br>
        <label for="content">Text:</label>
        <textarea name="content" id="content" rows="4" cols="50" required></textarea>

        <br>
		<button type="submit">Submit</button>
	</form>
</body>
</html>
