<?php

namespace Oxind\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="oxind_dashboard")
     * @Method({"GET"})
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('OxindDashboardBundle:Default:index.html.twig', array('name' => "Dashboard Page"));
    }

}
