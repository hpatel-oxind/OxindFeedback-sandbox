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
 * @ORM\Table(name="feedback")
 */
class Feedback extends BaseFeedback
{

    /**
     * @ORM\OneToMany(targetEntity="FeedbackDisplay", mappedBy="feedback", cascade={"persist"}, orphanRemoval=TRUE)
     */
    protected $feedbackDisplays;

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="feedback")
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
