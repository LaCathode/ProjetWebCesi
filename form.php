<!DOCTYPE html>
<html>
   <head>

        <link rel="stylesheet" href="style.css">

   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	


    </head>
<script>


    $().ready(function(){
        $("#verif").validate({

                rules : {

                    nom : {

                            required : true
                    },
                    prenom:{

                        required : true
                    },
                    couriel:{

                        required : true,
                        email : true
                    }
                }, 

                messages : {

                    nom : "Entrez votre nom",
                    prenom : "Entrez votre prenom",
                    couriel : "Entrez votre mail"

                }
        })
    });



</script>




<body>



    <div class="container col-md-5">



		<form method="post" id="verif" action="action.php">

                


			<div class="form-group">
 				<h1>Vous avez Réussi ! Veuillez vous inscrire</h1>
 				<label>Votre nom :</label> 
 				<input class="form-control" type="text" name="nom" id="nom" placeholder="Entrez votre Nom" />
 				
 			</div>

 			<div class="form-group">
 				
 				<label>Votre prenom :</label>
 				<input class="form-control" type="text" name="prenom" id="prenom" placeholder="Entrer votre prénom" />
 				
 			</div>

 			<div class="form-group">

 				<label> Veuillez entrer votre couriel : </label>
 				<input class="form-control" type="text" name="couriel" id="couriel" placeholder="Adresse mail" />

 			</div>

 			<div class="container col-md-3">

  		      <input class="btn btn-light" type="submit" value="Envoyer">

  		    </div>

 
		</form>
    </div>

	
</div>
</div>
</body>
</html>
