<?php
// src/City.php

/**
 * @Entity @Table(name="cities")
 **/
class City
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="integer") **/
    protected $postalCode;
    
    /** @Column(type="integer") **/
    protected $population;
    
    /**
     * @ManyToOne(targetEntity="Province", inversedBy="cities")
     * @JoinColumn(name="province_id", referencedColumnName="id")
     **/
    protected $province;
        
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
    
    public function setPostalCode($pc)
    {
        $this->postalCode = $pc;
    }
    
    public function getPopulation() {
        return $this->population;
    }

    public function setPopulation($population) {
        $this->population = $population;
    }
    
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    
    public function belongsTo(Province $province) {
        return ($this->province === $province);
    }
    
    public function setProvince(Province $province){
        $this->province = $province;
    }
}
?>

