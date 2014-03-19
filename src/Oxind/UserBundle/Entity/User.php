<?php

namespace Oxind\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping AS ORM;
use FOS\UserBundle\Model\GroupInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="oxind_user_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $points = 10;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->groups = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add groups
     *
     * @param \FOS\UserBundle\Model\GroupInterface $groups
     * @return User
     */
    public function addGroup(GroupInterface $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \FOS\UserBundle\Model\GroupInterface $groups
     */
    public function removeGroup(GroupInterface $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Function to set points
     * @param integer $points
     * @return \Oxind\UserBundle\Entity\User
     */
    public function setPoints($points)
    {
        $this->points = $points;
        return $this;
    }

    /**
     * Function to get points
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

}
