<?php
$text = '';


// Je suis si nul en php, être bon en php serait si cool car tu peux faire plein de choses avec mais
// Apprendre ce language donne vraiment le cancer.
// 18:20  03/05/2025

function scramble_word($mot) {
    // Fonction pour mélanger les mots

    if (strlen($mot) <= 2) return $mot;
    // Retourne le mot si car pas mélangable


    $first = $mot[0];
    $last = $mot[-1];
    // Garde la première et dernière lettre

    $middle = substr($mot, 1, -1);
    //


    $middle_array = str_split($middle);
    shuffle($middle_array);
    $shuffled_middle = implode('', $middle_array);
    // Mélange

    return $first . $shuffled_middle . $last;
    // Réassemblage
}


function scramble_text($text) {
    // Fonction pour diviser mot par mots

    $mots = preg_split('/(\W+)/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    //

    foreach ($mots as &$mot) {
        if (ctype_alpha($mot)) {
            $mot = scramble_word($mot);
        }
    }

    return implode('', $mots);
    // Implode veut dire imploser en anglais ??
    // Alors ourquoi ca aurait comme fonction d'assembler les éléments d'un tableau ????
}


$txt = isset($_POST['txt']) ? $_POST['txt'] : '';
// Si txt n'est pas inséré --> mettre txt a ''
$txtsortie = scramble_text($txt);
// Fait passer le texte dans la fonction scramble_text qui va divisier les mots un par un et
// Et rentre l'output dans la variable txtsortie
?>

<html>
<head>
<meta charset="UTF-8">
<title> Nazlet </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/andy-pro" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../images/icon.ico">
<link rel="stylesheet" href="styletext_changer.css">
</head>
<body>


<div id="emoji">
    <img src="../images/emojifleurfanee.png" alt="crying_emoji" height="20" width="20">
</div>










<div id="barre">zazlet </div>
<div id="flch">‣</div>
<div id="urlsite"><a href="https://nazlet.xyz">nazlet.xyz</a></div>


<div class="wrapper">
    <div class="neon-wrapper">

        <span class="txt" >nazlet.xyz</span>
        <span class="gradient"></span>
        <span class="dodge"></span>
    </div>
</div>


<div id="main">WIP</div>



<div id="text">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <i>‎ ‎Mélange les lettres du texte donné.</i>
    <br>      <h2>                  Entrée : </h2>
    <textarea name="txt" rows="5" cols="40" class="txtarea"><?php echo $txt;?></textarea>
    <input type="submit" name="submit" value="⥃" class="submitbutton">
</form>





    <h2><br><br>Sortie : </h2>
    <p><?php echo htmlspecialchars($txtsortie); ?></p>
</div>

<img id="zimoamour" src="../images/zimotextmelangé.png" alt="zimo_sages_paroles_2" />




<hr class="separator">

<!-- particles.js container
<button class="button"><a href="">Texte</a></button>
-->













</body>
</html>