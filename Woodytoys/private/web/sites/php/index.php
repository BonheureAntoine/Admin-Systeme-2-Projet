<html>

<head>
	<title>Intranet WoodyToys</title> 
	<link rel="stylesheet" href="css/index.css">
</head>

<body>

<form method="POST" action="ajout"> 
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
$reponse = $conn->query("SELECT * FROM Produits");

if (isset($_POST["nomDuProduit"])) {
	$requete_insertion = $conn -> prepare('INSERT INTO Produits(nomProduit, prodPrix) VALUES (:nomProduit_param, :prodPrix_param)');

	$requete_insertion->execute(array(
		'nomProduit_param' => $_POST["nomDuProduit"],
		'prodPrix_param' => $_POST["prixDuProduit"]
	));
}
function del($id){
	$delete = "DELETE FROM Produits WHERE prodId=". $id ;
	$conn->exec($delete);
}

if ($result = $conn->query($sql)){
    while ($data = $result->fetch()) {
        $produits[] = $data;
    }
	echo "<table><th>Nos Produits</th>";
	foreach ($produits as $prod) {
		echo "<tr><td>$prod[1]</td><td>$prod[2]";
		#echo "</td><td>";

		#echo "<button id='$prod[0]' onclick='del($prod[0])'>DELETE</button>";
		echo "</td><tr>";
	}
	echo "</table>";
	
}	


	/*// sql to delete a record
	$sql = "DELETE FROM Produits WHERE prodId=1" ;
  
	// use exec() because no results are returned
	$conn->exec($sql);*/
	
?>
<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>


</body>

</html>
