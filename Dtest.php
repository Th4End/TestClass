<?php
use PHPUnit\Framework\TestCase;

use function PHPSTORM_META\type;

include_once('class/Class_D.php');
include_once('class/Class_Vaccin.php');
class DTest extends TestCase
{
    private D $monD1;
    private Vaccin $monVax1;
    private Vaccin $monVax2;
    private Vaccin $monVax3;
    private Vaccin $monVax4;


     /**
     * @before
     */
    public function initTestEnvironment()
    {
        $this->monD1 = new D(id:1,nom:'parr',prenom:'Louis');
        $this->monVax1 = new Vaccin(nomVaccin:'Tétanos');
        $this->monVax2 = new Vaccin(nomVaccin: 'CoVid');
        $this->monVax3 = new Vaccin(nomVaccin:'Coqueluche');
        $this->monVax4 = new Vaccin(nomVaccin:'Covid');

        //echo "le test va commencer";
    }
    public function testNbvaccin(){
        $this->assertEquals(1,1,"error");
        $this->assertEquals($this->monD1->nbvaccins(),0,"erreur");
        $this->monD1->addVaccin($this->monVax1);
        $this->assertEquals($this->monD1->nbvaccins(),1,"erreur");
        $this->monD1->addVaccin($this->monVax2);
        $this->assertEquals($this->monD1->nbvaccins(),2,"erreur");

    }

    public function testpassSanitaire(): void
    {
        $this->assertFalse($this->monD1->passSanitaire(),false,"erreur");
        $this->monD1->addVaccin($this->monVax2);
        $this->assertTrue($this->monD1->passSanitaire(),"error");
        $this->monD1->vide();
        $this->monD1->addVaccin($this->monVax1);
        $this->assertFalse($this->monD1->passSanitaire(),false,"erreur");
        $this->monD1->addVaccin($this->monVax2);
        $this->assertTrue($this->monD1->passSanitaire(),"error");
        $this->monD1->addVaccin($this->monVax3);
        $this->assertTrue($this->monD1->passSanitaire(),"error");
        $this->monD1->vide();
        $this->monD1->addVaccin($this->monVax2);
        $this->assertTrue($this->monD1->passSanitaire(),"error");
        $this->monD1->addVaccin($this->monVax4);
        $this->assertTrue($this->monD1->passSanitaire(),"error");
        $this->monD1->addVaccin($this->monVax3);
        $this->assertTrue($this->monD1->passSanitaire(),"error");

    }
}