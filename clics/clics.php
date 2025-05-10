<?php
session_start();
$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
$psdo = $_POST['psdo'] ?? '';

////$_SESSION['ip'] = "127.0.0.2";
////echo $_SESSION['ip'];

// Crée une variable $_SESSION["ip"] ou y'a l'ip de l'utilisateur dedans



// Phpstorm faut une liscence pour ça, j'utilisais l'essai gratuit de 30 jours.
// Dommage c'était pas mal ducoup je viens de switch a visual studio code mais 
// Ca a l'air vraiment pas mal ? jsp on va voir

// Oh j'ai eu un nouveau clavier, mad60 he vrm pas mal je pense c'est le meilleur clavier que j'ai eu jusque
// La et il est magnétique en plus, le seul truc que j'aimerai un peu c'est qu'il soit sans fil mais en
// Vrai peu importe

// 08/05/2025


$servername = "sql213.infinityfree.com";
$username = "if0_38822033";
$password = "wTh6lejsbgPah";
$dbname = "if0_38822033_nazlet";

///$servername = "localhost";
///$username = "root";
///$password = "";
///$dbname = "nazlet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultstats = $conn->query("SELECT psdo, nombre_clics FROM CLICS ORDER BY nombre_clics DESC");
    while ($row = $resultstats->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='stats'>" . $row['psdo'] . " : " . $row['nombre_clics'] . "</div><br>";
    }
    // Affichage Stat par user

    if (isset($_POST['clicbouton'])){
        $sqlclic = "UPDATE CLICS SET nombre_clics = nombre_clics + 1 WHERE ip = :ip;";
        $stmtclic = $conn->prepare($sqlclic);
        $stmtclic->execute(['ip' => $_SESSION['ip']]);
        // Prepared statement pour l'incrémentation du clic counter

        $resultstattotal = $conn->query("SELECT SUM(nombre_clics) AS total_clicks FROM CLICS;");
        $row = $resultstattotal->fetch(PDO::FETCH_ASSOC);
        echo "<div id=stattotal>Total number of clicks : " . $row['total_clicks'] . "</div>";
        // Affichage Stats total(WIP)


/*
        $stmtip = $conn->prepare("SELECT * FROM CLICS WHERE ip = :ip");
        $getip = $stmtip->execute(['ip' => $_SESSION['ip']]);
*/


        if ($stmtclic->rowCount() > 0) {
            echo "<div id=ipoupas>IP found in database.<br> Hello</div>";
        } else {
            $sqlipcreate = "INSERT INTO CLICS (nombre_clics, ip, psdo) VALUES (0, :ip , null); ";
            $stmtipcreate = $conn->prepare($sqlipcreate);
            $stmtipcreate->execute(['ip' => $_SESSION['ip']]);
        }
        // Détecte si c'est un utilisateur qu'est déjà passé sur ce site
        // Si non, stock ses info dans sa base de données


    }
    
if (isset($_POST['pseudobutton']) && !empty($_POST['psdo'])) {
        $psdo = htmlspecialchars(trim($_POST['psdo']));

        $sqlclic = "UPDATE CLICS SET psdo = :psdo WHERE ip = :ip;";
        $stmtclic = $conn->prepare($sqlclic);
        $stmtclic->execute([
            'psdo' => $psdo, 
            'ip' => $_SESSION['ip']]);
        // Actualise le pseudo de qui appartient a l'ip avec la valeur dans $psdo
    }

    ///echo "<br><br><br><br><br>Connected successfully";
    // Pour voir si la connection a la bdd marche bien

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



?>

<html>
<head>
<meta charset="UTF-8">
<title> Nazlet </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/andy-pro" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="../images/icon.ico">
<link rel="stylesheet" href="clics_style.css">
</head>
<body>
<div id="barre">zazlet </div>
<div id="flch">‣</div>
<div id="urlsite"><a href="https://nazlet.xyz">nazlet.xyz</a></div>
<div id="emoji">
    <img src="../images/emojifleurfanee.png" alt="crying_emoji" height="20" width="20">
</div>




<form method="post" action="clics.php">
    <center><button id="clicbouton" name="clicbouton" class="clicbouton">*clic*</button></center>
</form>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div id="entername"><i>Enter your name here</i></div>
              <h2>                  Name : </h2>
    <textarea name="psdo" rows="1" cols="15" class="pseudoarea"><?php echo htmlspecialchars($psdo ?? ''); ?></textarea>
    <input type="submit" name="pseudobutton" value="⟲" class="pseudobutton">
</form>















<!-- <img id="textewtf" src="../images/textwtf.png" alt="discussion_n'a_aucun_sens" /> -->

<div id="WIP">WIP</div>


<hr class="separator">














</body>
</html>