<?php
session_start();
include_once('class/ChargeClassToutSeul.php');
$monD_1 = new D(id:1,prenom:"lePrenomDeD_1",nom:"leNomDeD_1");
$monVax1 = new Vaccin(nomVaccin:"Coqueluche");
$date=DateTime::createFromFormat('d/m/Y', '31/03/2021');
$monVax2 = new Vaccin(nomVaccin:"Covid",laDate:$date->format('d/m/Y'));
$date=DateTime::createFromFormat('d/m/Y', '09/08/2021');
$monVax3 = new Vaccin(nomVaccin:"Covid",laDate:$date->format('d/m/Y'));
$monVax4 = new Vaccin(nomVaccin:"Tétanos");
$arrayVax=array();
array_push($arrayVax,$monVax1);
array_push($arrayVax,$monVax2);
$monD_2 = new D(id:2,prenom:"lePrenomDeD_2",nom:"leNomDeD_2",lesVaccins:$arrayVax);
$monD_2->affiche();
echo('<br>----------<br>');
$monD_2->lesVaccins=$monVax3;
$monD_2->affiche();
echo('<br>----------<br>');
$monD_2->addVaccin($monVax4);
$monD_2->affiche();
echo('<br>----------<br>');
$_SESSION['objetClasseDSauvegarde']=serialize($monD_2);
echo ("<br><br>Objet de la classe D sérializé et sauvegardé en variable de session : <br><br>").$_SESSION['objetClasseDSauvegarde'];
$D3=unserialize($_SESSION['objetClasseDSauvegarde']);
echo ("<br><br>Objet de la classe D désérializé à partir de la variable de session : <br><br>");
$D3->affiche();
echo '<br>';
echo'N° de vaccin : <br>';
echo $monD_2->nbvaccins()." "."vaccins <br>";
echo"Vaccin fait ? ";
//var_dump($monD_2->passSanitaire());
if( $monD_2->passSanitaire())
{
    echo "true";
}
else
{
    echo "false";
}
?>