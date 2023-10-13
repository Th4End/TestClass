<?php
class D //implements Serializable
{

 	public function __construct(private int $id=0,private string $nom='',private string $prenom='',private array $lesVaccins=array()) {
		

	}
	/*
    public function serialize()
    {
		return json_encode([
			$this->id,
			$this->nom,
			$this->prenom,
			serialize($this->lesVaccins)
		]);
        
    }

    public function unserialize($serialized)
    {
		list(
			$this->id,
			$this->nom,
			$this->prenom,
			$laListeDesObjetsDeVaccin
			) = json_decode($serialized, true);
		$this->lesVaccins=unserialize($laListeDesObjetsDeVaccin);
        
    }
	*/

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
			case 'lesVaccins' : {
				$this->lesVaccins[count($this->lesVaccins)+1] = $valeur;
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
	public function addVaccin($vaccin)
	{
		array_push($this->lesVaccins,$vaccin);
	}
	public function affiche()
	{
		$affiche= "<br>Presentation de l'objet de D N° : ".$this->id;
		$affiche.="<br> Nom : ".$this->nom;
		$affiche.="<br> Prénom : ".$this->prenom;
		echo $affiche;
		$this->afficheVaccin();
	}
	public function afficheVaccin()
	{
		$affiche= "<br>Presentation des vaccins de l'objet de D ";

		foreach ($this->lesVaccins as $vax) {
			$affiche.="<br>".$vax->affiche();

		}
		echo $affiche;
	}
	public function nbvaccins(){ 
	 return	$vretour=count($this->lesVaccins);
	}
	public function passSanitaire(){
		$fait=false;
		foreach ($this->lesVaccins as $vax){
			$vacc = $vax->nomVaccin;
			if(strcasecmp("Covid",$vacc)==0){
				$fait = true;
				break;
			}
		}
		return $fait;
	}
		public function vide(){
			$this->lesVaccins=array();
		}
}
?>