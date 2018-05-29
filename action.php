
 <?php


//Recupération de

$n = $_POST['nom'];
$p = $_POST['prenom'];
$e = $_POST['couriel'];


echo  $n;echo "<br />";

echo  $p;echo "<br />";

echo  $e;echo "<br />";





	$user = "root";
    $pass = "";

try
{

	$bdd = new PDO('mysql:host=localhost;dbname=projetwebcesi', $user, $pass);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// On ajoute une entrée dans la table jeux_video
$requete = $bdd->prepare('INSERT INTO users(nom, prenom, email) VALUES(:nom,:prenom,:email)');

// On lie les variables définie au-dessus au paramètres de la requête préparée
$requete->bindValue(':nom', $n, PDO::PARAM_STR); 
$requete->bindValue(':prenom', $p, PDO::PARAM_STR);
$requete->bindValue(':email', $e, PDO::PARAM_STR);

// On exécute la requête
$requete->execute();

?>












