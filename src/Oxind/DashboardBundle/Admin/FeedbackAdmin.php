<?php

namespace Oxind\DashboardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Description of FeedbackAdmin
 *
 * @author Hardik Patel <hpatel@oxind.com>
 */
class FeedbackAdmin extends Admin
{

    protected $translationDomain = 'admin';

    /**
     * configure options
     * @param \Sonata\AdminBundle\Route\RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->clearExcept(array('list', 'edit', 'create', 'show'));
    }

    /**
     * set what to display in list.
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title', null, array('label' => 'feedback.title'));
        $list->add('feedbackType.name', 'sonata_type_collection', array('label' => 'feedback.type'));
        $list->add('content', null, array('label' => 'feedback.content'));

        $list->add(
                'feedbackType.statuses', null, array(
            'editable' => true,
            'template' => 'OxindDashboardBundle:Admin:custom_list_status.html.twig',
            'label' => 'feedback.status'
                )
        );
        $list->add('user.username', null, array('label' => 'feedback.creator'));
        //$list->add('points', 'sonata_type_collection', array('label' => 'feedback.votes'));
        $list->add(
                '_action', 'actions', array(
            'label' => 'feedback.votes',
            'actions' => array('show' => array())
        ));
    }

    /**
     * Function to show all fields
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $objFeedback = $this->getSubject();        

        $showMapper
                ->with('feedback.votes')
                ->add('votes', null, array(
                    'label' => 'feedback.votes',
                    'route' => array('name' => 'show'),
                    'template' => 'OxindDashboardBundle:Admin:custom_list_votes.html.twig',
                        )
                )
                ->end();
    }

}

