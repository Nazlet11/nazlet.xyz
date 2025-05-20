<?php

session_start();
$_SESSION["ip"] = $_SERVER['REMOTE_ADDR'];
$psdo = $_POST['psdo'] ?? '';

////$_SESSION['ip'] = "127.0.0.15";
echo $_SESSION['ip'];



// 
//  
// 

// 
// 
// 

// 10/05/2025


$servername = "sql213.infinityfree.com";
$username = "if0_38822033";
$password = "wTh6lejsbgPah";
$dbname = "if0_38822033_nazlet";

////$servername = "localhost";
////$username = "root";
////$password = "";
////$dbname = "nazlet";






try {
    $conn = new PDO("mysql:host=sql213.infinityfree.com;dbname=if0_38822033_nazlet", "if0_38822033", "wTh6lejsbgPah");
    ////$conn = new PDO("mysql:host=localhost;dbname=nazlet", "root", "");
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $resultstats = $conn->query("SELECT psdo, nombre_clics FROM CLICS ORDER BY nombre_clics DESC");
    while ($row = $resultstats->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='stats'>" . $row['psdo'] . " : " . $row['nombre_clics'] . "</div><br>";
    }
    // Affichage Stat par user


    if (isset($_POST['clicbouton'])){

        if ($stmtclic->rowCount() > 0) {
            echo "<div id=ipoupas>IP found in database.<br> Hello</div>";
        } else {
            $sqlipcreate = "INSERT INTO CLICS (nombre_clics, ip, psdo) VALUES (0, :ip , null); ";
            $stmtipcreate = $conn->prepare($sqlipcreate);
            $stmtipcreate->execute(['ip' => $_SESSION['ip']]);
        }
        // Détecte si c'est un utilisateur qu'est déjà passé sur ce site
        // Si non, stock ses info dans sa base de données


        $resultstattotal = $conn->query("SELECT SUM(nombre_clics) AS total_clicks FROM CLICS;");
        $row = $resultstattotal->fetch(PDO::FETCH_ASSOC);
        echo "<div id=stattotal>Total number of clicks : " . $row['total_clicks'] . "</div>";
        // Affichage Stats total(WIP)
    }
    
if (isset($_POST['pseudobutton'])) {
        $psdo = htmlspecialchars(trim($_POST['psdo']));

        $sqlclic = "UPDATE CLICS SET psdo = :psdo WHERE ip = :ip;";
        $stmtclic = $conn->prepare($sqlclic);
        $stmtclic->execute([
            'psdo' => $psdo, 
            'ip' => $_SESSION['ip']]);

		header("Location: clics.php");
		exit;
        // Actualise le pseudo de qui appartient a l'ip avec la valeur dans $psdo
    }

    ////echo "<br><br><br><br><br>Connected successfully";
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
<link rel="stylesheet" href="rename_style.css">
</head>
<body>
<div id="barre">zazlet </div>
<div id="flch">‣</div>
<div id="urlsite"><a href="https://nazlet.xyz">nazlet.xyz</a></div>
<div id="emoji">
    <img src="../images/emojicrane.png" alt="crying_emoji" height="20" width="20">
</div>

<div id="black-overlay"></div>




<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div id = entername>Enter your username here : </div>
		<div class="pseudo-container">
    <textarea name="psdo" rows="1" cols="15" class="pseudoarea"><?php echo htmlspecialchars($psdo ?? ''); ?></textarea>
    <input type="submit" name="pseudobutton" value="➔" class="pseudobutton">
		</div>
</form>















<!-- <img id="textewtf" src="../images/textwtf.png" alt="discussion_n'a_aucun_sens" /> -->



<hr class="separator">














</body>
</html>