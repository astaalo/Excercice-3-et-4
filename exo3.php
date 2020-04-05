<?php
require_once("fonction.php");
//$tabMots  PERMET DE SAUVEGARDER TOUS LES MOTS QU'ON VA SAISIR
//$errors POUR SAUVEGARDER LES ERREURS DE CHAQUE CHAMP
//
    
    $msg='';
    $nbrchamps=0;
    //verifier si 
    if(isset($_POST['valider'])){
        //var_dump($_POST['nbre']);
        //Récuperation du Nombre
        $nbrchamps=$_POST['nbre'];
            if(!is_chaine_numeric($nbrchamps)){
            $msg="Veillez saisir un entier";
            $nbrChamps = 0;
            }elseif(is_empty($nbrchamps)){
            $msg="Champs obligatoire";
            }
    }

    $tabMots = [];
    $errors = [];
    $motsAvecM = [];

    if(isset($_POST['resultat'])){
        $nbrchamps=$_POST['nbre'];
        var_dump($_POST);
        for($i=0;$i<$nbrchamps;$i++){
            $mot=$_POST['mot_'.$i];
            $tabMots[]=$mot;
            if(long_chaine($mot)>20){
                $errors[$i][]="Le mot ne doit pas depasser 20 caracteres";
            }
            if(!is_chaine_alpha($mot)){
                $errors[$i][]="Lettres uniquement";
            }
            if(is_car_present_in_chaine(delete_spc_before_after($mot), '')){
                $errors[$i][]="un seul mot svp";
            }
            if (isset($errors[$i]) && empty($errors[$i])){
                unset($errors[$i]);
            } 
            if(is_empty($mot)){
                $errors[$i][]="Champ vide" ;
            }
        if(mot_cont_M($mot)){
            foreach($tabMots as $m){
                if(is_car_present_in_chaine('M', $m)){
                    $motsAvecM[]=$m;
                }
            }
        }
    }

}
       /* if(mot_cont_M($mot)){
            $motsAvecM[]=$m;
        }*/
    
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Excercice 3</title>
            <style>
                .blog{ width:100%; height:110px; text-align:center;}
                #bt1{ background-color :green; color:white; }
                #bt2{ background-color :#FF0000; color:white; }
                #bt3{ background-color :orange; color:white; }
            </style>
	</head>
<body>
    <div class="blog">
	<form method="POST" action="">
        <label>entre le nombre de champs:</label><br><br>
		<input type="text" name="nbre"/>
        <p style="color:red"><?= $msg ?></p>
        <button type="submit" name="valider" id="bt1">Valider</button>
        <button type="submit" name="annuler" id="bt2">Annuler</button><br><br>
        <?php for ($i=0;$i<$nbrchamps;$i++){ ?>
        <label>Mot N°  :<?= $i+1 ?></label>
        <input type="text" autocomplete="off" name="mot_<?= $i?>"/><br><br>
            <?php } ?>
        <?php if($nbrchamps>0){ ?>
            <button type="submit" name="resultat" id="bt3">Resultats</button>
            <?php } ?>
	</form>
  
    </div>
</body>
</html>
