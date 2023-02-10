# Travail pratique de Transmission des données et la sécurité informatique

##  Algorithme pour la génération des clés

Entrée : La clé K de longueur 8 2 Appliquer la fonction de permutation H = 65274130 3 Diviser K en deux blocs de 4 bits : K = k ′ 1 ||k ′ 2 4 k1 = k ′ 1 ⊕k ′ 2 et k2 = k ′ 2 ∧k ′ 1 5 Appliquer le décalage à gauche d’ordre 2 pour k1 et le décalage à droite d’ordre 1 pour k2 6 Sortie : Deux sous-clés (k1 , k2) de longueur 4.

## Algorithme de chiffrement

Entrée : Le bloc N de 8 bits 2 Appliquer la permutation π = 46027315 3 Diviser N en deux blocs de 4 bits : N = G0||D0 4 Premier Round, calculer : D1 = P(G0)⊕k1 et G1 = D0 ⊕(G0 ∨k1) où P = 2013 est la permutation 5 Deuxième Round, calculer : D2 = P(G1)⊕k2 et G2 = D1 ⊕(G1 ∨k2) 6 C = G2||D2 (la concaténation) 7 Appliquer l’inverse de la permutation π −1 (C) 
8 Sortie : Le texte chiffré C de longueur 8.

## Algorithme de déchiffrement

Entrée : Le bloc C de 8 bits 2 Appliquer la permutation π = 46027315 3 Diviser C en deux blocs de 4 bits : C = G2||D2 4 Premier Round, calculer : G1 = P −1 (D2 ⊕k2) et D1 = G2 ⊕(G1 ∨k2) où P = 2013 est la permutation 5 Deuxième Round, calculer : G0 = P −1 (D1 ⊕k1) et D0 = G1 ⊕(G0 ∨k1) 6 N = G0||D0 (la concaténation) 7 Appliquer l’inverse de la permutation π −1 (N) 8 Sortie : Le texte clair N de longueur 8.

## Langage Utilisé

Nous avons utilisé le langage **PHP** avec sa version 8 pour ce faire.

## Lancer le projet

Cette application rassurez-vous d'avoir php d'installé sur votre machine et qu'il soit exécutation en ligne de commande.

- Lancer un serveur local
Tapper la commande `php -S localhost:8888`
ceci lancera un serveur web au port 8888

- Visiter avec le navigateur
En suite rendrez-vous sur un navigateur web et entrez l'addresse `http://localhost:8888`  
