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

if(!isset($_SESSION['tab'])){

$_SESSION['q'] = 0;
$max=20;

$_SESSION['tab'] = array();

$i = 0;
while ($i<6)

{
    $image = rand(1, $max);
     
    if (!in_array($image, $tableau)) {
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

    $user = "root";
    $pass = "root";

$c = 0;
if($_SESSION['q']>4){

    $_SESSION['q'] = 0;
}
$q = $_SESSION['q'];


try {
    $dbh = new PDO('mysql:host=localhost;dbname=projetwebcesi', $user, $pass);
    foreach($dbh->query('SELECT question  from questions where  questions.id_q="'.$_SESSION['tab'][$q].'"') as $row) {
        
        echo "<br>";
        print_r($row[$c]);
        echo "<br>";


            foreach($dbh->query('SELECT rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'"') as $row) {


                foreach($dbh->query('SELECT bool_pl FROM questions WHERE id_q ="'.$_SESSION['tab'][$q].'"')as $row2) ;


                    
foreach($dbh->query('SELECT bool_rep FROM reponses,questions WHERE reponses.id_q = questions.id_q and reponses.id_q ="'.$_SESSION['tab'][$q].'"')as $row3) {
    print_r($row3[$c]);


                    print_r($row2[$c]);
                    echo "&nbsp";
                  
          
    
}




        
        echo "<br>";
        echo "<form method='post'>";
        if($row2[$c]==1){

        echo"<input type='checkbox' name='' text=''> ";  print_r($row[$c]); 
        echo "<br>";
        }else{

        echo"<input type='radio' name='reponse' text=''> ";  print_r($row[$c]); 
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
    if(isset($_POST['valider']) )
    {
        
        echo $_SESSION['q'];echo $_SESSION['tab'][$_SESSION['q']];
        echo "<br>";
        $_SESSION['q'] = $_SESSION['q']+1;
        echo $_SESSION['q'];echo $_SESSION['tab'][$_SESSION['q']];

    }
?>
