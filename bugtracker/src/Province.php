<?php
// src/Province.php

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

}
?>