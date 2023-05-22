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
//database.woodytoys.internal

$user = getenv('MYSQL_USER2');

//database user password
$pass = getenv('MYSQL_PASSWORD2');

// database name
$mydatabase = getenv('MYSQL_DATABASE');

echo "$user // $pass  // $mydatabase";
// Database use name
//get_env('MYSQL_USER');
//$user = $_ENV['MYSQL_USER'];

//database user password
//$pass = $_ENV['MYSQL_PASSWORD'];

// database name
//$mydatabase = $_ENV['MYSQL_DATABASE'];

// check the MySQL connection status
//$conn = new mysqli($host, $user, $pass, $mydatabase);


$conn = new PDO("mysql:host=database.woodytoys.internal;port=3306;dbname=$mydatabase;charset=utf8", $user , $pass);
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
