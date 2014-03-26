<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oxind\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oxind\FeedbackBundle\Entity\Feedback as BaseFeedback;

/**
 * Description of Feedback
 *
 * @ORM\Entity
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="type_id", columns={"type_id"}), @ORM\Index(name="creator_id", columns={"creator_id"}), @ORM\Index(name="type_id_2", columns={"type_id"}), @ORM\Index(name="creator_id_2", columns={"creator_id"})})
 */
class Feedback extends BaseFeedback
{

/**
     * @ORM\OneToMany(targetEntity="FeedbackDisplay", mappedBy="feedback")
     * @ORM\JoinColumn(name="feedback_id", referencedColumnName="id", nullable=false)
     */
    protected $feedbackDisplays;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="feedback")
     * @ORM\JoinColumn(name="feedback_id", referencedColumnName="id", nullable=false)
     */
    protected $votes;

    /**
     * @ORM\ManyToOne(targetEntity="FeedbackType", inversedBy="feedbacks")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    protected $feedbackType;

    /**
     * @ORM\ManyToOne(targetEntity="Oxind\UserBundle\Entity\User", inversedBy="feedbacks")
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=false)
     */
    protected $user;
    
    public function getAuthorName()
    {
        return $this->user->getFullname();
    }

}
