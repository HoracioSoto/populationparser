<?php
// src/Province.php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity @Table(name="provinces")
 **/
class Province
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    
    /** @Column(type="string") **/
    public $name;
    
    /**
     * @OneToMany(targetEntity="City", mappedBy="province")
     **/
    public $cities;
    
    /**
     * @OneToOne(targetEntity="City")
     * @JoinColumn(name="capital_id", referencedColumnName="id")
     **/
    public $capital;
    
    public function __construct() {
        $this->cities = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getPopulation() {
        $population = 0;
        foreach ($this->citiesList as $city) {
            $population += $city->getPopulation();
        }
        return $population;
    }
    
    public function has(City $city) {
        foreach ($this->cities as $key => $aCity) {
            if ($aCity === $city) {
                return true;
            }
        }
        return false;
    }
    
    public function setCapital(City $capital) {
        $this->capital = $capital;
        (!$this->has($capital)) ? $this->addCity($capital) : null;
    }

    public function getCities() {
        return $this->cities;
    }
    
    public function addCity(City $city) {
        $this->cities->add($city);
        $city->setProvince($this);
    }    
}
?>