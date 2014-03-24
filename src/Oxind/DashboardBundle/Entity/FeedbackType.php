<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Oxind\DashboardBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

use Oxind\FeedbackBundle\Entity\FeedbackType as BaseFeedbackType;
/**
 * Description of FeedbackType
 *
 * @author Bhavin Jagad <bjagd@oxind.com>
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="feedback_type", uniqueConstraints={@ORM\UniqueConstraint(name="name_UNIQUE", columns={"name"})})
 */
class FeedbackType extends BaseFeedbackType
{
    /**
     * @ORM\OneToMany(targetEntity="Feedback", mappedBy="feedbackType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=false)
     */
    protected $feedbacks;
}
