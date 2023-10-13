<?php
function chargerClasse($nom_classe) {
   require_once ('class/Class_').$nom_classe.'.php';
 }
 spl_autoload_register('chargerClasse');
 ?>