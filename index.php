<?php
session_start();//vérifie si la connexion entre le client et le serveur à déjà effectuer et lance la session de connection grâce aux cookies de session 
include_once('class/ChargeClassToutSeul.php');//intégre le fichier une fois ChargeClassToutSeul.php pour pouvoir l'utiliser
$monA_1 = new A();//Appelle le constructeur de A et créer l'objet grâcce à la surcharge
$monA_2 = new A(2);//Appelle le constructeur de A et créer l'objet 2 de la class A mais ne possède pas de valeur
$monA_3 = new A(3,"leNomdeA_3");//créer l'objet 3 de la class A et possède comme valeur l'id 3, leNomDeA_3
$monA_4=new A(4,"leNomDeA_4","lePrenomDeA4");//créer l'objet A de la class A et possède comme valeur l'id 4, leNomDeA_4, lePrenomdeA4
$monA_1->affiche();//Appelle la fonction affiche de la Class ChargeClassToutSeul.php
echo('<br>----------<br>');//intègre un saut de ligne et l'apparition de ------
$monA_2->affiche();//Appelle la fonction affiche de la Class ChargeClassToutSeul.php
echo('<br>----------<br>');//intègre un saut de ligne et l'apparition de ------
$monA_3->affiche();//Appelle la fonction affiche de la Class ChargeClassToutSeul.php
echo('<br>----------<br>');//intègre un saut de ligne et l'apparition de ------
$monA_4->affiche();//Appelle la fonction affiche de la Class ChargeClassToutSeul.php
echo('<br>----------<br>');//intègre un saut de ligne et l'apparition de ------
$monA_1->nom="leNomdeA_1";//
$monA_1->id=1;
echo($monA_1->id);
echo($monA_1->nom);
echo('<br>----------<br>');
$monA_4->vaccin="coqueluche";
$monA_4->affiche();
echo('<br>----------<br>');
$monA_4->vaccin="covid";
$monA_4->affiche();
?>