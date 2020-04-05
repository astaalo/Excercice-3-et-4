<?php
require_once"const.php";
//renvoi la longueur du tableau
Function long_chaine($chaine){
    if (isset($chaine)){
		$i=0;
		for($j=0; isset($chaine[$i]); $j++){
			$i++;
		}
	return $i;
    }
}
    //meme solution avec while
    function taille_chaine($chaine){
        $i=0;
        while(isset($chaine[$i])){
            $i++;
        }
        return $i;
    }
    //PERMET DE TESTER SI LA CARACTERE PASSE EN PARAMETRE EST UN CHIFFRE
    function is_car_numeric ($c){
        if ($c > '0' &&  $c <= '9'){
            return true;
        }
        return false;
    }
    //is_car_alpha test si un caracter est alphabetique
    function is_car_alpha($car){
        if( long_chaine($car)==1 && ($car >='a' && $car <='z') ||
         ($car>='A' && $car<='Z')){
            return true;
        }
        return false;
    }
    //permet de tester si tous les caracteres d'une chaine sont alphabetique :
    function is_chaine_alpha($chaine){
        for($i=0;$i<long_chaine($chaine);$i++){
         if (!is_car_alpha($chaine[$i])){
        
        return false;}
        }
        return True ;
        }
     //permet de tester si tous les caracteres d'une chainesont numerique :
     function is_chaine_numeric($chaine){
        for($i=0;$i<long_chaine($chaine);$i++){
            if (!is_car_numeric($chaine[$i])){
            return false;
        }
    }
        return True ;
    }
    //permet de recherche si $car est présent dans $chaine :
    function is_car_present_in_chaine($car, $chaine){
        for ($i=0;$i<long_chaine($chaine);$i++){
            if ($chaine[$i]== $car){
                return true;
            }
        }
        return false;
    }
    //fonction qui permet d'inverser la casse d'une lettre :a en A, A en a
    function invers_car_case($car){ 
        $min = 'a';
        $maj = 'A';
          if(long_chaine($car)==1){
            for($i=0; $i < 26; $i++){
              if($car==$min){                
                return $maj;                                   
              }elseif ($car==$maj){
                return $min; 
                    }                       
                $min++;                            
                $maj++;
                    }                                                                                                    
                } 
                return $car;
                }
    //fonction qui permet de tester si une chaine est vide ou pas :
    function is_empty($chaine){
        $vide=0;
        if(long_chaine($chaine)==$vide){
            return true;
        }
        return false;
    }
    //permet de supprimer les espacede devant ou de derriere d'une chaine et
//retourne la chaine après avoir supprimer les espaces.les espace interne ne sont pas supprimer
    function delete_spc_before_after($chaine){
        $debut=0;
        $fin=long_chaine($chaine)-1;
        $newChaine = '';
        if($chaine==''){ return $chaine; }
        while ($chaine[$debut]==' '){
            $debut++; 
        if(!isset($chaine[$debut])){
            return '';
        } 
    }
        while ($chaine[$fin]==' '){ $fin--; }

        for ($i=$debut; $i <=$fin ; $i++) { 
            $newChaine.=$chaine[$i];
        }
        
        return $newChaine;
    }
    
// F1 verification si une phrase est correcte
//c a d commence par un lettre majuscule et se termine par un point
function is_phrase_correcte($chaine){
    if(preg_match('#^[A-Z].+[\.\?\!]$#', $chaine)){
        return true;
    } else{
        return false;
    }
}
//emlever espace unitule
function enleve_spc_unitule($texte){
    $texte=preg_replace('#\s+#', ' ', $texte);
   return $texte;
}
/*
function enleve_spc_unitule($texte){
    $texte = "Toto et     tata.";
    $pattern = '#\s+#';
    $replacement = ' ';
    $texte=preg_replace($pattern, $replacement, $texte);
    return $texte;
}*/
//decouper  un texte en phrases
/*function is_phrase_decouper($texte){
    $texte=preg_split('#[.!?]#', $texte);
            for($i=0; $i<=$texte; $i++){
               return $texte;
                }  
    }*/
//}

function is_phrase_decouper($texte){
    $phraseRecup=[];
    $phraseValid='';
    $phraseCorrecte;
    $phraseIncorrecte;
$resultat=preg_split('#([.!?]){1}#', $texte, -1, PREG_SPLIT_DELIM_CAPTURE);
        for($i=0; isset($resultat[$i]); $i++){
            if(!is_empty($resultat[$i])){
                if($resultat[$i]!='.' && $resultat[$i]!='!' && $resultat[$i] !='?'){
                    if(isset($resultat[$i+1])){
                        $phraseRecup[]=$resultat[$i].$resultat[$i+1];
                    }else{
                        $phraseRecup[]=$resultat[$i];
                    }
                } 
            }
        }
           return $phraseRecup;
           if(is_phrase_correcte($phraseRecup)){
               $phraseCorrecte[]=$phraseRecup;
           }else{
                $phraseInCorrecte[]=$phraseRecup;
           }
           return $phraseCorrecte;
           return $phraseIncorrecte;
     }  

//mot contenant la lettre
function mot_cont_M($mot){
   if(preg_match('#[M]#i',$mot)){
    return true;
   }else{
       return false;
   }
}