<?php

namespace Oxind\DashboardBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Oxind\FeedbackBundle\Entity\FeedbackDisplay as BaseFeedbackDisplay;

/**
 * Entity\FeedbackDisplay
 *
 * @ORM\Entity
 * @ORM\Table(name="feedback_display", indexes={@ORM\Index(name="feedback_id", columns={"feedback_id"}), @ORM\Index(name="timeline_id", columns={"timeline_id"})})
 */
class FeedbackDisplay extends BaseFeedbackDisplay
{

}