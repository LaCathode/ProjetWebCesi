<!DOCTYPE html>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php
/*
$adresse_ip = $_SERVER['REMOTE_ADDR'];

function get_ip() {
    // IP si internet partagé
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // IP derrière un proxy
    elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Sinon : IP normale
    else {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}


// Afficher l'adresse IP
echo 'Adresse IP du visiteur : '.get_ip();
*/

?>

<?php

session_start();

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

<?php 
  
$c = 0;

//Si le compteur stocker dans la session est supérieur à 4 on réintialise le compteur à 0
//Car y a seulement 5 questions à afficher

if($_SESSION['q']>4){

    $_SESSION['q'] = 0;
}

$q = $_SESSION['q'];

try {

	$user = "root";
    $pass = "";


	//Récupère les questions 
    $dbh = new PDO('mysql:host=localhost;dbname=projetwebcesi', $user, $pass);
    foreach($dbh->query('SELECT question  from questions where  questions.id_q="'.$_SESSION['tab'][$q].'"') as $row) {
        

        //Affiche la question 
        echo "<br>";
        print_r($row[$c]);
        echo "<br>";

        	//Récupère les réponses
            foreach($dbh->query('SELECT rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'"') as $row2) {


            	//Récupére le booléen qui permet de savoir s'il existe plusieurs réponses juste
                foreach($dbh->query('SELECT bool_pl FROM questions WHERE id_q ="'.$_SESSION['tab'][$q].'"')as $row3) ;


                    		//Récupére le boolén bool_rep
							foreach($dbh->query('SELECT bool_rep FROM reponses,questions WHERE reponses.id_q = questions.id_q and rep= "'.$row2[$c].'" and reponses.id_q ="'.$_SESSION['tab'][$q].'"')as $row4);

 
					//Affiche les différents booléen pour tester
    				echo "bool_pl  ";
                    print_r($row3[$c]);
                    echo "&nbsp  ";
                    echo "  bool_rep  ";
                    print_r($row4[$c]); 
                    
          
        //Si le booléen bool_pl est à 1 celà veux dire qu'il y a plusieurs réponses possible donc on afficher des checkbox
        echo "<br>";
        echo "<form method='post'>";

        if($row3[$c]==1){

        echo"<input type='checkbox' name='' text=''> ";  print_r($row2[$c]); 
        echo "<br>";

         }

         //Sinon le booléen est à 0 donc il y a qu'une seule réponse possible donc on affiche des radios button
                  else{

        echo"<input type='radio' name='reponse' text=''> ";  print_r($row2[$c]); 
        echo "<br>";

        }
        }
       
}




    $dbh = null;

} catch (PDOException $e) {

    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();

};

?>

<button name='valider'>Valider</button>

</form>

<?php


?>

<?php

	//Si l'utilisateur click sur le boutton valider on incrémente le compteur pour passer à la question suivante
    if(isset($_POST['valider']) )
    {
        
        echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];
        echo "<br>";
        $_SESSION['q'] = $_SESSION['q']+1;
       // echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

    }

 ?>
