<!DOCTYPE html>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />


<?php


session_start();



	$user = "root";
    $pass = "";

try
{

	//Récupère les questions 
    $dbh = new PDO('mysql:host=localhost;dbname=projetwebcesi', $user, $pass);

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

 $ad_ip = $_SERVER['REMOTE_ADDR'];

$stmt = $dbh->prepare("SELECT * FROM users where ip = ?");

$stmt->execute(array($ad_ip));
$donnees = $stmt->fetchAll();

if (count($donnees) >0) {

    // header("location:fini.php"); 
 


}
else
{

$requete = $dbh->prepare('INSERT INTO users(ip) VALUES(:ip)');

// On lie les variables définie au-dessus au paramètres de la requête préparée
$requete->bindValue(':ip', $ad_ip, PDO::PARAM_STR); 

$requete->execute();

 

}

 foreach($dbh->query('SELECT id_user  from users where  ip="'.$ad_ip.'"') as $getid);

print_r($getid[0]);
    
$_SESSION['id'] = $getid[0];

?>

<?php



//Si le tableau dans la session est vide on le remplie avec 5 valeur aléatoire compris entre 1 et 20

if(!isset($_SESSION['tab'])){

$_SESSION['q'] = 0;

$max=20;

$_SESSION['tab'] = array();

$i = 0;

while ($i<6)

{
    $image = rand(1, $max);
     
    if (!in_array($image, $_SESSION['tab'])) {
        $_SESSION['tab'][] = $image;       
            $i++;
    }
 

}
 
echo '<pre>';
print_r($_SESSION['tab']);
echo '</pre>';
 
   
}else{


echo '<pre>';
print_r($_SESSION['tab']);
echo '</pre>';

};

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 
  
$c = 0;

//Si le compteur stocker dans la session est supérieur à 4 on réintialise le compteur à 0
//Car y a seulement 5 questions à afficher

if($_SESSION['q']>5){

    $_SESSION['q'] = 0;
}

$q = $_SESSION['q'];

try {

	 

    foreach($dbh->query('SELECT question  from questions where  questions.id_q="'.$_SESSION['tab'][$q].'"') as $row) {
        

        //Affiche la question 
        echo "<br>";
        print_r($row[$c]);
        echo "<br />";
        echo "<br>";

          
        	//Récupère les réponses
            foreach($dbh->query('SELECT rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'"') as $row2) {

                //Récupère 
                foreach($dbh->query('SELECT id_rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'" and rep="'.$row2[$c].'"') as $row5) ;

            	    //Récupére le booléen qui permet de savoir s'il existe plusieurs réponses juste
                    foreach($dbh->query('SELECT bool_pl FROM questions WHERE id_q ="'.$_SESSION['tab'][$q].'"')as $row3) ;

                        //Récupére le boolén bool_rep
						foreach($dbh->query('SELECT bool_rep FROM reponses,questions WHERE reponses.id_q = questions.id_q and rep= "'.$row2[$c].'" and reponses.id_q ="'.$_SESSION['tab'][$q].'"')as $row4);

 					
					//Affiche les différents booléen pour tester
					echo "<br>";
    				echo "bool_pl  ";
                    print_r($row3[$c]);
                    echo "&nbsp  ";
                    echo "  bool_rep  ";
                    print_r($row4[$c]); 
                    echo "<br>";
                    
          
        //Si le booléen bool_pl est à 1 celà veux dire qu'il y a plusieurs réponses possible donc on afficher des checkbox
      

        if($row3[$c]==1){

        print_r($row2[$c]); echo "&nbsp  "; echo"<input type='checkbox' name='reponse' value=' $row5[$c] '> ";  
        echo "<br>";

         }

         //Sinon le booléen est à 0 donc il y a qu'une seule réponse possible donc on affiche des radios button
                  else{

        print_r($row2[$c]); echo "&nbsp  "; echo"<input type='radio' name='reponse' value= '$row5[$c]'> ";
        echo "<br>";

        }
        }
       
}




    

} catch (PDOException $e) {

    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();

};

echo "<br>";

?>

 <input type="submit" name="valider" value="valider" id='valider' class="btn btn-success">

</form>

<?php


?>

<?php

	//Si l'utilisateur click sur le boutton valider on incrémente le compteur pour passer à la question suivante
   if(isset($_POST['valider']) && !empty($_POST['valider']) && isset($_POST['reponse'])) 
    {
    	

    	if($_SESSION['q']<5){

    	// On ajoute une entrée dans la table jeux_video
		$requeteu = $dbh->prepare('INSERT INTO tests(id, id_q, id_rep) VALUES(:id,:id_q,:id_rep)');

		// On lie les variables définie au-dessus au paramètres de la requête préparée
		$requeteu->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR); 
		$requeteu->bindValue(':id_q', $_SESSION['tab'][$q], PDO::PARAM_STR);
		$requeteu->bindValue(':id_rep', $_POST['reponse'], PDO::PARAM_STR);

		$requeteu->execute();


    	echo $_POST['reponse'] ."   ";

        echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

        echo "<br>";

        $_SESSION['q'] = $_SESSION['q']+1;
        echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

        }else if($_SESSION['q']==5){

        		echo $_POST['reponse'] ."   ";

        		echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

        }

       
    }

 ?>
