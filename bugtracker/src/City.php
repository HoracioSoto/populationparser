<?php
// src/City.php

/**
 * @Entity @Table(name="cities")
 **/
class City
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    
    /** @Column(type="string") **/
    public $name;
    
    /** @Column(type="integer") **/
    public $pc;
    
    /**
     * @ManyToOne(targetEntity="Province", inversedBy="cities")
     * @JoinColumn(name="province_id", referencedColumnName="id")
     **/
    public $province;
        
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
    
    public function setPc($pc)
    {
        $this->pc = $pc;
    }
    
    public function getPc()
    {
        return $this->pc;
    }
    
}
?>

