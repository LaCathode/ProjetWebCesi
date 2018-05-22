<?php
$adresse_ip = $_SERVER['REMOTE_ADDR'];
?>
<?php 


	echo "test <br>";
	$user = "root";
	$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=projetwebcesi', $user, $pass);
    foreach($dbh->query('SELECT * from questions') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
};

?>

<?php

$max=20;
 
$i=1;
$tableau = array();
while ($i<6)
{
    $image = rand(1, $max);
     
    if (!in_array($image, $tableau)) {
        $tableau[] = $image;       
            $i++;
    }
}
 
echo '<pre>';
print_r($tableau);
echo '</pre>';
 
?>
