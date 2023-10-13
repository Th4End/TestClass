<?php
session_start();
include_once('class/ChargeClassToutSeul.php');
$monC_1 = new C();
$monC_2 = new C(id:2);
$monC_3 = new C(id:3,nom:"leNomdeC_3");
$monC_4=new C(id:4,prenom:"lePrenomDeC4",nom:"leNomDeC_4");
$monC_5=new C(id:5,nom:"leNomDeC_5",prenom:"lePrenomDeC5",vaccin:array("vax1","vax2"));
$monC_6=new C(vaccin:array("vax1","vax2"),nom:"leNomDeC_6");
$monC_1->affiche();
echo('<br>----------<br>');
$monC_2->affiche();
echo('<br>----------<br>');
$monC_3->affiche();
echo('<br>----------<br>');
$monC_4->affiche();
echo('<br>----------<br>');
$monC_5->affiche();
echo('<br>----------<br>');
$monC_6->affiche();
echo('<br>----------<br>');
$monC_5->vaccin="coqueluche";
$monC_5->affiche();
echo('<br>----------<br>');
$monC_5->vaccin="covid";
$monC_5->affiche();
?>