<?php
session_start();
include_once('class/ChargeClassToutSeul.php');
$monB_4=new B(4,"leNomDeb_4","lePrenomDeb4");
$monB_4->affiche();
echo('<br>----------<br>');
$monB_4->vaccin="coqueluche";
$monB_4->affiche();
echo('<br>----------<br>');
$monB_4->vaccin="covid";
$monB_4->affiche();
echo('<br>----------<br>');
array_push($monB_4->getVaccinRef(),"rubéole");
$monB_4->affiche();
echo('<br>----------<br>');
array_push($monB_4->getVaccin(),"rougeole");
$monB_4->affiche();
?>