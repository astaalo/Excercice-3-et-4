<?php
require_once("fonction.php");
$msg='';
$phrase=0;
$error=[];
$tock=[];
//verifier si 
if(isset($_POST['valider'])){
    $phrase=$_POST['texte'];
    if(is_empty($phrase)){
        $msg="champs obligatoire";
        $phrase=0;
    }elseif(is_chaine_numeric($phrase)){
        $msg="Veillez saisir une phrase";
    }
    if(long_chaine($texte)>200){
      $error[$i][]="Le texte ne doit pas depasser 200 caracteres";
  }
  if(is_phrase_decouper($texte)){
   echo "correcte";
  }else{
    echo "incorrecte";
  }
  //var_dump($phraseRecup);
    //fonctionalite f1
    //if(is_phrase_correcte($phrase)){
    // echo "phrase correcte";
  // }else{
  //    echo "phrase incorrecte";
  // }
}
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <!--<link rel="StyleSheet" type="text/css" href="style.css"/>-->
 <style>
     .blog{ width:100%; height:110px; text-align:center;}
    #bt1{ background-color :green; color:white; }
    #bt2{ background-color :#FF0000; color:white; }
</style>
 <title> EXCERCICE 4 </title>
   </head>
     <body>
     <div class="blog">
       <form method="POST" action="">
           <label> Veillez saisir une phrase d'au moins 200 caracteres!</label><br><br>
       <textarea type="textarea" name="texte"></textarea><br/>
       <p style="color:red"><?= $msg ?></p>
      <button type="submit" name="valider" id="bt1">Valider</button>
      <button type="submit" name="annuler" id="bt2">Annuler</button><br><br>
        <?php if ($phrase>0){ ?>
        <textarea type="textarea" name="phrAfficher"></textarea><br/>
      <?php } ?>
      </form>
        </div>
        </body>
        </html>
        <!--Jai créé une fonction ki prend en argument une chaine et à linterieur jai utilisé la fonction prédefinie pregmatch ki prend deux parametre le regex k jai écri et la chaine.
La fonction return true si le regex est verifié et false dans le cas contraire.
NB: Le regex à verifié doit commencé par une lettre majuscule suivi de nimporte kel caractere et se termine par ., ! ou ?
N'OUBLIEZ PAS AUSSI POUR LA F1 C'EST UNE SEULE PHRASE QU'ON SAISIE ET QU'ON TEST
[16:39, 02/04/2020] Aly: GENRE VOUS CREER UNE FONCTION EXEMPLE : is_phrase_correcte($phrase)
[16:39, 02/04/2020] Aly: MAIS DANS LE CORPS DE LA FONCTION VOUS UTILISER LES AUTRES-->