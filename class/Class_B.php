 <?php
class B
{
    private int $id;
    private string $nom;
    private string $prenom;
    private array $vaccin;
 	public function __construct(int $vid,string $vnom,string $vprenom) {
		$this->id=$vid;
        $this->nom=$vnom;
        $this->prenom=$vprenom;
        $this->vaccin=array();
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
			default:
			{
				$trace = debug_backtrace();
				trigger_error(
            'Propriété non-accessible via __set() : ' . $propriete .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);

				break;
			}

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
				
		}
	}
	public function &getVaccinRef()//& ==> utilise directement les cases mémoires 
	{
		return $this->vaccin;
	}
	public function &getVaccin()
	{
		return $this->vaccin;
	}
	public function affiche()
	{
		$affiche= "<br>Presentation de l'objet de B N° : ".$this->id;
		$affiche.="<br> Nom : ".$this->nom;
		$affiche.="<br> Prénom : ".$this->prenom;
		echo $affiche;
		$this->afficheVaccin();
	}
	public function afficheVaccin()
	{
		$affiche= "<br>Presentation des vaccins de l'objet de B ";
		$i=0;
		foreach ($this->vaccin as $vax) {
			$affiche.="<br>Vaccin N° : ".$i." ->".$vax;
			$i++;
		}
		echo $affiche;
	}
}
?>