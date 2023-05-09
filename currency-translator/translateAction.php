<!DOCTYPE html>
<html>
<head>
	<title>Translate Form</title>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap');

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

		.output-line {
			margin: 30px 0;
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
	<h1>Translation Result</h1>

	<?php
	    // retrieve form input
	    $source = $_POST['source']; 
	    $target = $_POST['target']; 
	    $content = $_POST['content']; 

	    // the url
	    $url = 'https://translate.terraprint.co/translate';

	    // body 
	    $body = array(
	        'source' => $source,
	        'target' => $target,
	        'q' => $content
	    );   

	    $ch = curl_init($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS,  $body);

	    $response = curl_exec($ch);
	    curl_close($ch);

	    $data = json_decode($response, true);
	    if($data !== null) {
	        $translated_text = $data["translatedText"]; 
	        echo '<div class="output-line">Translated text: ' . $translated_text. '</div>';
	    } else {
	        echo '<div class="output-line">Translation failed</div>';
	    }
	?>

	<button onclick="window.location.href='translateForm.php'">Translate Another</button>

</body>
</html>
