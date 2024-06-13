<?php
# exemple de jeu du pendu
echo "Jeu du pendu : retrouvez le mot mystère !\n" ;
$mot_a_trouver = "PROGRAMMATION" ;
$mot_a_completer = "_____________" ;
$essais_restants = 12 ; # le nombre d’erreurs autorisées
# la commande while permet d’exécuter en boucle tout le code compris entre accolades,
# tant que les expressions booléennes entre parenthèses sont évaluées à True
while($mot_a_trouver ?????? $mot_a_completer ?????? $essais_restants ?????? 0){
    echo "Mot à compléter : {$mot_a_completer}\n" ;
    echo "Nombre d'essais restants : {$essais_restants}\n" ;
    # la commande readline permet à l’utilisateur de saisir une information au clavier
    # l’information saisie est mémorisée dans la variable $lettre
    $lettre = readline("Indiquez votre lettre en majuscule, et validez avec la touche Entrée : ") ;
    $lettre_absente = true ;
    # cette variable booléenne nous servira pour savoir si la lettre saisie est absente du mot mystère
    # elle est initialisée à true pour signifier “la lettre saisie est absente du mot mystère”
    #  la commande for permet de répéter l’exécution du code entre accolades
    # un certain nombre de fois, dans ce cas précis 13 fois, car le mot mystère contient 13 lettres
    for($i=0;$i<13;$i+=1){
        if($mot_a_trouver[$i]==$lettre){
            # dans le cas où la i-ème lettre du mot mystère correspond à la lettre saisie
            # on complète le mot, à la i-ème position, par la lettre saisie
            $mot_a_completer[$i]=$lettre ;
            # on indique que la lettre saisie n’est pas absente du mot mystère
            $lettre_absente = false ;
        }
    } # fin de la boucle for
    # chaque lettre du mot mystère a été comparée à la lettre saisie
    # à ce moment, si la lettre saisie est toujours absente du mot mystère
    # c’est qu’il s’agit d’une lettre en erreur et il convient de décompter le nombre d’essais restants
    if($lettre_absente){
        $essais_restants ?????? 1 ;
    }
} # fin de la boucle while
# l’expression booléenne du while est évaluée à False
# si l’utilisateur a trouvé le mot, c’est qu’il avait encore un droit à l’erreur
# si l’utilisateur a utilisé toute les erreurs autorisées, il n’a pas trouvé le mot
if($essais_restants ?????? 0){
    echo "Bravo ! Vous avez trouvé le mot mystère : {$mot_a_trouver}\n" ;
}
else{
    echo "Pendu ! Le mot mystère était {$mot_a_trouver}\n" ;
}
/*
# correction
# exemple de jeu du pendu
echo "Jeu du pendu : retrouvez le mot mystère !\n" ;
$mot_a_trouver = "PROGRAMMATION" ;
$mot_a_completer = "_____________" ;
$essais_restants = 12 ; # le nombre d’erreurs autorisées
while($mot_a_trouver!=$mot_a_completer && $essais_restants>0){
    echo "Mot à compléter : {$mot_a_completer}\n" ;
    echo "Nombre d'essais restants : {$essais_restants}\n" ;
    $lettre = readline("Indiquez votre lettre en majuscule, et validez avec la touche Entrée : ") ;
    $lettre_absente = true ;
    for($i=0;$i<13;$i+=1){
        if($mot_a_trouver[$i]==$lettre){
            $mot_a_completer[$i]=$lettre ;
            $lettre_absente = false ;
        }
    }
    if($lettre_absente){
        $essais_restants -= 1 ;
    }
}
if($essais_restants>0){
    echo "Bravo ! Vous avez trouvé le mot mystère : {$mot_a_trouver}\n" ;
}
else{
    echo "Pendu ! Le mot mystère était {$mot_a_trouver}\n" ;
}
 */

?>

