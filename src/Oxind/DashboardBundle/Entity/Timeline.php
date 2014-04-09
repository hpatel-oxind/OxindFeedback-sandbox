<?php

namespace Oxind\DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oxind\FeedbackBundle\Entity\Timeline as BaseTimeline;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="timeline")
 */
class Timeline extends BaseTimeline
{

    /**
     * @ORM\OneToMany(targetEntity="FeedbackDisplay", mappedBy="timeline")
     */
    protected $feedbackDisplays;

}
