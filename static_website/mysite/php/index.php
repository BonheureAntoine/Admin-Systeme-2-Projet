<html>

<head>
	<title> WoodyToys B2B </title> 
	//<link rel="stylesheet" href="css/index.css">
</head>

<body>

<form method="POST" action="?"> 
	<input type="search" placeholder="nom du produit" name="nomDuProduit">
	<input type="search" placeholder="prix du produit" name="prixDuProduit">
	<button type="submit"> Enregistrer le produit </button>
</form>

<div> bonjour </div>

<?php
//These are the defined authentication environment in the db service

// The MySQL service named in the docker-compose.yml.
$host = 'database';

// Database use name
$user = 'admin';

//database user password
$pass = 'admin';

// database name
$mydatabase = 'woodytoys';

// check the MySQL connection status
//$conn = new mysqli($host, $user, $pass, $mydatabase);

$conn = new PDO('mysql:host=database;port=3306;dbname=woodytoys;charset=utf8', 'admin', 'admin');
$sql = 'SELECT * FROM Produits';

if ($result = $conn->query($sql)){
    while ($data = $result->fetch()) {
        $produits[] = $data;
    }
	echo "<table><th>Nos Produits</th>";
	foreach ($produits as $prod) {
		echo "<tr><td>";
		echo $prod[1];
		echo "</td><td>";
		echo $prod[2];
		echo "</td><tr>";
	}
	echo "</table>";
}
?>

</body>

</html>
