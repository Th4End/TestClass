<?php
class A
{
    private $id;
    private $nom;
    private $prenom;
    private $vaccin=array();
 	public function __construct() {
		$numargs = func_num_args();
		$arg_list = func_get_args();
        if ($numargs == 1) {
			$this->id=$arg_list[0];
		}
        if ($numargs == 2) {
			$this->id=$arg_list[0];
            $this->nom=$arg_list[1];
		}
        if ($numargs == 3) {
			$this->id=$arg_list[0];
            $this->nom=$arg_list[1];
            $this->prenom=$arg_list[2];
		}
	}

	public function __set($propriete, $valeur) {
		switch ($propriete) {

			case 'nom' : {
				$this->nom = $valeur;
				break;
			}
            case 'prenom' : {
				$this->prenom = $valeur;
				break;
			}
			case 'vaccin' : {
				$this->vaccin[count($this->vaccin)+1] = $valeur;
				break;
			}
			case 'id': {
				$this->id = $valeur;
				break;
			}/*
			default:
			{
				$trace = debug_backtrace();
				trigger_error(
            'Propriété non-accessible via __set() : ' . $propriete .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);

				break;
			}*/

		}
	}
	public function __get($propriete) {
		switch ($propriete) {
			case 'nom' :
				{
					return $this->nom;
					break;
				}
			case 'prenom' :
				{
					return $this->prenom;
					break;
				}
				/*
			default:
				{
					$trace = debug_backtrace();
        			trigger_error(
            			'Propriété non-accessible via __get() : ' . $propriete .
            			' dans ' . $trace[0]['file'] .
            			' à la ligne ' . $trace[0]['line'],
            			E_USER_NOTICE);
					break;
				}
				*/
				
		}
	}
	public function affiche()
	{
		$affiche= "<br>Presentation de l'objet de A N° : ".$this->id;
		$affiche.="<br> Nom : ".$this->nom;
		$affiche.="<br> Prénom : ".$this->prenom;
		echo $affiche;
		$this->afficheVaccin();
	}
	public function afficheVaccin()
	{
		$affiche= "<br>Presentation des vaccins de l'objet de A ";
		$i=0;
		foreach ($this->vaccin as $vax) {
			$affiche.="<br>Vaccin N° : ".$i." ->".$vax;
			$i++;
		}
		echo $affiche;
	}
}
?>