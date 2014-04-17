<?php

namespace Oxind\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/feedback")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/{feedbacktype_name}", name="oxind_dashboard", defaults={"feedbacktype_name" ="suggestion"} )
     * @Template()
     */
    public function indexAction($feedbacktype_name)
    {
        $request = $this->get('request');
        $feedbackTypeManager = $this->get('oxind_feedback.manager.feedbacktype');
        $feedbackType = $feedbackTypeManager->findFeedbackTypeBy(array('name' => $feedbacktype_name));        
        
        if(!$feedbackType)
        {
            throw $this->createNotFoundException('Feedback type doesn\'t exist');
        }
        
        $feedbackTypes = $feedbackTypeManager->findAllFeedBackType(array('suggestion', 'issue'));
        return $this->render('OxindDashboardBundle:Default:index.html.twig', array('feedbacktype' => $feedbackType, 'feedbackTypes' => $feedbackTypes));
    }
}
