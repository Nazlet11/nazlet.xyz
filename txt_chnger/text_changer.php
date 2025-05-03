<?php
$text = '';







function scramble_word($word) {
    // Keep short words unchanged
    if (strlen($word) <= 3) return $word;

    // Keep first and second letters
    $first = $word[0];
    $second = $word[1];

    // Get the part to shuffle
    $middle = substr($word, 2, -1);
    $last = substr($word, -1);

    // Shuffle the middle part
    $middle_array = str_split($middle);
    shuffle($middle_array);
    $shuffled_middle = implode('', $middle_array);

    return $first . $second . $shuffled_middle . $last;
}

function scramble_text($text) {
    // Split by words and preserve punctuation
    $words = preg_split('/(\W+)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

    foreach ($words as &$word) {
        if (ctype_alpha($word)) {
            $word = scramble_word($word);
        }
    }

    return implode('', $words);
}


$txt = isset($_POST['txt']) ? $_POST['txt'] : '';
$txtsortie = scramble_text($txt);

?>

<html>
<head>
<meta charset="UTF-8">
<title> Nazlet </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../images/icon.ico">
<link rel="stylesheet" href="styletext_changer.css"> <!-- Link to your CSS file -->
</head>
<body>

<div id="emoji">
    <img src="../images/emojifleurfanee.png" alt="crying_emoji" height="20" width="20">
</div>

<div id="barre">zazlet </div>
<div id="flch">‣</div>
<div id="urlsite"><a href="https://nazlet.xyz">nazlet.xyz</a></div>
<div id="main">WIP</div>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <br>
    <br>
    <br>
    <br>
    <i>Mélange les lettres du texte donné.</i>
    <br>
    <br>      <h2>                  Entrée : </h2>
    <textarea name="txt" rows="5" cols="40"><?php echo $txt;?></textarea>
    <input type="submit" name="submit" value="Submit">
</form>





    <h2><br><br>Sortie : </h2>
    <p><?php echo htmlspecialchars($txtsortie); ?></p>


<img id="zimoph" src="../images/zimoaphilosopher.png" alt="zimo_sages_paroles" />
<img id="zimoamour" src="../images/zimotextmelangé.png" alt="zimo_sages_paroles_2" />



<div id="sub"></div>
<hr class="separator">

<!-- particles.js container
<button class="button"><a href="">Texte</a></button>
-->













</body>
</html>