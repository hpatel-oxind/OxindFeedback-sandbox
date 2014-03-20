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
        return $this->render('OxindDashboardBundle:Default:index.html.twig', array('name' => "Dashboard Page"));
    }

}
