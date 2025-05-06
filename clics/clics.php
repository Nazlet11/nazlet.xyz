<?php
session_start();
$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
echo $_SESSION['ip'];


error_reporting(E_ALL);
ini_set('display_errors', 1);
// Affiche les erreurs

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nazlet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=nazlet", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultstats = $conn->query("SELECT user_id, nombre_clics FROM clics ORDER BY nombre_clics DESC");
    while ($row = $resultstats->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='stats'>User " . $row['user_id'] . " : " . $row['nombre_clics'] . "</div><br>";
    }
    // Affichage Stat par user

    if (isset($_POST['clicbouton'])){
        $sqlclic = "UPDATE clics SET nombre_clics = nombre_clics + 1 WHERE user_id = 1;";
        $stmtclic = $conn->prepare($sqlclic);
        $stmtclic->execute();
        // Incrémentation

        $resultstattotal = $conn->query("SELECT nombre_clics FROM clics WHERE user_id = 1;");
        $row = $resultstattotal->fetch(PDO::FETCH_ASSOC);
        echo "<div id =stattotal>Total number of clicks : " . $row['nombre_clics'] . "</div>>";
        // Affichage Stat total



        $stmtip = $conn->prepare("SELECT * FROM CLICS WHERE ip = :ip");
        $getip = $stmtip->execute(['ip' => $_SESSION['ip']]);


        if ($stmtclic->rowCount() > 0) {
            echo "IP found in database.<br> Hello User";
        } else {
            $sqlipcreate = "INSERT INTO CLICS (nombre_clics, ip) VALUES (0, '?'); ";
            $stmtipcreate = $conn->prepare($sqlipcreate);
            $stmtip->execute(['ip' => $_SESSION['ip']]);
        }


        $resultstattotal = $conn->query("SELECT nombre_clics FROM clics WHERE user_id = 1;");
        $row = $resultstattotal->fetch(PDO::FETCH_ASSOC);
        echo "<div id =stattotal>Total number of clicks : " . $row['nombre_clics'] . "</div>>";
        // Affichage pseudo


        if ($stmtclic->rowCount() > 0) {
            echo "IP found in database.<br> Hello User";
        } else {
            $sqlipcreate = "INSERT INTO CLICS (nombre_clics, ip) VALUES (0, '?'); ";
            $stmtipcreate = $conn->prepare($sqlipcreate);
            $stmtip->execute(['ip' => $_SESSION['ip']]);
        }
    }

    //$conn->exec($sql);
    echo "<br><br><br><br><br>Connected successfully";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//
//
//

?>

<html>
<head>
<meta charset="UTF-8">
<title> Nazlet </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/andy-pro" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../images/icon.ico">
<link rel="stylesheet" href="clics_changer.css">
</head>
<body>


<div id="emoji">
    <img src="../images/emojifleurfanee.png" alt="crying_emoji" height="20" width="20">
</div>





<form method="post" action="clics.php">
    <center><button id="clicbouton" name="clicbouton" class="clicbouton">Bouton</button></center>
</form>




<div id="barre">zazlet </div>
<div id="flch">‣</div>
<div id="urlsite"><a href="https://nazlet.xyz">nazlet.xyz</a></div>













<img id="textewtf" src="../images/textwtf.png" alt="discussion_n'a_aucun_sens" />

<div id="WIP">WIP</div>


<hr class="separator">

<!-- particles.js container
<button class="button"><a href="">Texte</a></button>
-->













</body>
</html>