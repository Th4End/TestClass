<?php
class Vaccin //implements Serializable
{
    private function today()
    {
        $x=new DateTime();
        return $x->format('d/m/Y');
    } 

    public function __construct(private string $laDate='',private string $nomVaccin='') {
		if ($this->laDate=='')
        {
            $this->laDate=$this->today();
        }

	}

	/*
    public function serialize()
    {
        return json_encode([
            $this->nomVaccin,
            $this->laDate
        ]);
    }
    public function unserialize($serialized)
    {
        list(
            $this->nomVaccin,
            $this->laDate
            ) = json_decode($serialized, true);
    }
*/
	public function __set($propriete, $valeur) {
		switch ($propriete) {

			case 'nomVaccin' : {
				$this->nomVaccin = $valeur;
				break;
			}
            case 'laDate' : {
				$this->laDate = $valeur;
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
			case 'nomVaccin' :
				{
					return $this->nomVaccin;
					break;
				}
			case 'laDate' :
				{
					return $this->laDate;
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
	public function affiche()
	{
		$affiche= "Vaccin : ".$this->nomVaccin." à la date du ".$this->laDate;
		return $affiche;
	}
	
}
?>