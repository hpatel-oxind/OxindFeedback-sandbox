<?php

namespace Oxind\DashboardBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Oxind\FeedbackBundle\Entity\Vote as BaseVote;
/**
 *
 * @ORM\Entity
 * @ORM\Table(name="vote", indexes={@ORM\Index(name="feedback_id", columns={"feedback_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 */
class Vote extends BaseVote
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Oxind\UserBundle\Entity\User", inversedBy="votes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;
    
    

}