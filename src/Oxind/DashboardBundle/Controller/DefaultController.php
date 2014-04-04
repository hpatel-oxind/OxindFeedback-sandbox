<?php

namespace Oxind\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * @Route("/")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="oxind_dashboard")
     * @Template()
     */
    public function indexAction()
    {
        $feedbackTypeManager = $this->get('oxind_feedback.manager.feedbacktype');
        $feedbackType = $feedbackTypeManager->findFeedbackTypeBy(array( 'name' => 'suggestion' ));
        return $this->render('OxindDashboardBundle:Default:index.html.twig', array('feedbacktype' => $feedbackType));
    }

}
