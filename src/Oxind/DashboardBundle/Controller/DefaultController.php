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
        $request = $this->get('request');
        $feedbackTypeManager = $this->get('oxind_feedback.manager.feedbacktype');
        $feedbackType = $feedbackTypeManager->findFeedbackTypeBy(array('name' => $feedbacktype_name));
        if ($feedbackType == null)
        {
            throw $this->createNotFoundException();
        }

        $feedbackTypes = $feedbackTypeManager->findAllFeedBackType(array('suggestion', 'issue'));
        return $this->render('OxindDashboardBundle:Default:index.html.twig', array('feedbacktype' => $feedbackType, 'feedbackTypes' => $feedbackTypes));
    }

}
