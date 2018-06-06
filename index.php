<!DOCTYPE html>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
        <meta http-equiv="Refresh" content="30; url=index.php">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <link rel="stylesheet" href="style.css" />


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>



        <div class="wrapper">
        <div class="pie spinner"></div>
        <div class="pie filler"></div>
        <div class="mask"></div>
        </div>





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

    //print_r($getid[0]);
    
    $_SESSION['id'] = $getid[0];

?>

<?php



//Si le tableau dans la session est vide on le remplie avec 5 valeur aléatoire compris entre 1 et 20

    if(!isset($_SESSION['tab'])){

    $_SESSION['q'] = 0;

    $max=20;

    $_SESSION['tab'] = array();

    $i = 0;

    while ($i<5)

{
    $image = rand(1, $max);
     
    if (!in_array($image, $_SESSION['tab'])) {
        $_SESSION['tab'][] = $image;       
            $i++;
    }
 

}
 
//echo '<pre>';
//print_r($_SESSION['tab']);
//echo '</pre>';
 
}else{

//echo '<pre>';
//print_r($_SESSION['tab']);
//echo '</pre>';

};

?>
   
    <div class="container col-lg-5">

    <form method="post" class="" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <span class="rounded-top">
<?php 
  
    $c = 0;

//Si le compteur stocker dans la session est supérieur à 4 on réintialise le compteur à 0
//Car y a seulement 5 questions à afficher

    if($_SESSION['q']>=5){

    $_SESSION['q'] = 0;
}

    $q = $_SESSION['q'];

try {



    foreach($dbh->query('SELECT question  from questions where  questions.id_q="'.$_SESSION['tab'][$q].'"') as $row) {
        
?>

<?php
        //Affiche la question 
        echo "<br /><b>";
        print_r($row[$c]);
        echo "<br /></b>";
       

          
            //Récupère les réponses
            foreach($dbh->query('SELECT rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'"') as $row2) {

                //Récupère 
                foreach($dbh->query('SELECT id_rep  from questions,reponses where questions.id_q = reponses.id_q and questions.id_q="'.$_SESSION['tab'][$q].'" and rep="'.$row2[$c].'"') as $row5) ;

                    //Récupére le booléen qui permet de savoir s'il existe plusieurs réponses juste
                    foreach($dbh->query('SELECT bool_pl FROM questions WHERE id_q ="'.$_SESSION['tab'][$q].'"')as $row3) ;

                        //Récupére le boolén bool_rep
                        foreach($dbh->query('SELECT bool_rep FROM reponses,questions WHERE reponses.id_q = questions.id_q and rep= "'.$row2[$c].'" and reponses.id_q ="'.$_SESSION['tab'][$q].'"')as $row4);




                    
                    //Affiche les différents booléen pour tester
                               // echo "bool_pl  ";
                   // print_r($row3[$c]);
                   // echo "&nbsp  ";
                   // echo "  bool_rep  ";
        
                   
                    
          
        //Si le booléen bool_pl est à 1 celà veux dire qu'il y a plusieurs réponses possible donc on afficher des checkbox


        


        if($row3[$c]==1){

        echo "<br />";
        echo"<input  name='reponse' type='checkbox' value=' $row5[$c] '> ";
        print_r($row2[$c]); 
        echo "&nbsp  ";
        
         }



        
       
      

    //Sinon le booléen est à 0 donc il y a qu'une seule réponse possible donc on affiche des radios button
        else{

         echo "<br />";
         echo"<input type='radio' name='reponse' value= '$row5[$c]'> ";
         echo "&nbsp";
         print_r($row2[$c]); 
         echo "&nbsp  ";
        
         

        }
                    print_r($row4[$c]); 
        }
       
}

    

} catch (PDOException $e) {

    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();

};

echo "<br>";

?>

<div class="row">

  <div class="col"></div>

  <div class="col-center">
    <input type="submit" name="valider" value="valider" id='valider' class="btn btn-success">
  </div>

  <div class="col"> <body>
       <form action="" method="post">
            <p>
                <input type="submit" name="time" id="time" value="Cliquez ci-dessous" disabled="disabled" />
            </p>
        </form>
    </body></div> 
 </span>
</div>
</span>
</form>
</div>


<?php

    //Si l'utilisateur click sur le boutton valider on incrémente le compteur pour passer à la question suivante
   if(isset($_POST['valider']) && !empty($_POST['valider']) && isset($_POST['reponse'])) 
    {
        

        if($_SESSION['q']>5){

        // On ajoute une entrée dans la table jeux_video
        $requeteu = $dbh->prepare('INSERT INTO tests(id_user, id_q, id_rep) VALUES(:id,:id_q,:id_rep)');

        // On lie les variables définie au-dessus au paramètres de la requête préparée
        $requeteu->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR); 
        $requeteu->bindValue(':id_q', $_SESSION['tab'][$q], PDO::PARAM_STR);
        $requeteu->bindValue(':id_rep', $_POST['reponse'], PDO::PARAM_STR);

        $requeteu->execute();

        //echo $_POST['reponse'] ."   ";

        //echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

        //echo "<br>";
       
        //echo $_SESSION['q'];echo "   ";echo $_SESSION['tab'][$_SESSION['q']];

        }else if($_SESSION['q']==4){

             // On ajoute une entrée dans la table jeux_video
        $requeteu = $dbh->prepare('INSERT INTO tests(id_user, id_q, id_rep) VALUES(:id,:id_q,:id_rep)');

        // On lie les variables définie au-dessus au paramètres de la requête préparée
        $requeteu->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR); 
        $requeteu->bindValue(':id_q', $_SESSION['tab'][$q], PDO::PARAM_STR);
        $requeteu->bindValue(':id_rep', $_POST['reponse'], PDO::PARAM_STR);

        $requeteu->execute();


                foreach($dbh->query('SELECT count(*)  from tests,reponses where tests.id_rep = reponses.id_rep and bool_rep = 1 and tests.id_user="'.$_SESSION['id'].'" ') as $fin) ;

              

               if($fin[$c]>=3){

             header("location:form.php"); 
 
        }else
        {

            header("location:perdu.php");
        }    
    }

    $_SESSION['q'] = $_SESSION['q']+1;
}
 ?>
</div>


<!-- Code pour le minuteur -->

        <script type="text/javascript">//<Partie [
            function str_pad(n){
                var s='';
                if(n<10)s+='0';
                s+=n.toString();
                return s;
            }
            function CountDown(){
                this.n=(typeof this.n=='undefined')?10:this.n-1;
                var elt=document.getElementById('time');
                if(!elt)return false;
                elt.value=str_pad(this.n);
                if(this.n>0){
                    setTimeout(CountDown,1000);
                }
                else{
                    elt.value='Go !';
                    elt.disabled=false;
                }
            }
            window.onload=function(){CountDown();};
        //]]>
        </script>
    </head>
   

