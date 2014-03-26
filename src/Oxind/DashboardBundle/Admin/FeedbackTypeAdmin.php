<?php

namespace Oxind\DashboardBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Admin class of FeedbackType
 *
 * @author Hardik Patel <hpatel@oxind.com>
 */
class FeedbackTypeAdmin extends Admin
{

    CONST STATUS_OPEN = 'Open';
    CONST STATUS_COMPLETED = 'Completed';
    CONST STATUS_REJECTED = 'Rejected';
    CONST STATUS_ACCEPTED = 'Accepted';

    protected $translationDomain = 'admin';

    /**
     * configure options
     * @param \Sonata\AdminBundle\Route\RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->clearExcept(array('list', 'edit', 'create'));
    }

    /**
     * set what to display in list.
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('name', null, array('label' => 'feedbacktype.name'));
        $list->add('statuses', null, array('editable' => true, 'label' => 'feedbacktype.statuses', 'template' => 'OxindDashboardBundle:Admin:custom_list_status.html.twig'));
        $list->add('votable', null, array('editable' => true, 'inline' => true, 'template' => 'OxindDashboardBundle:Admin:custom_list_votable.html.twig', 'label' => 'feedbacktype.voteable',));
        $list->add('vote_min_point', null, array('editable' => true, 'inline' => true, 'label' => 'feedbacktype.vote_min_points'));
        $list->add('vote_max_point', null, array('editable' => true, 'inline' => true, 'label' => 'feedbacktype.vote_max_points'));
    }

    /**
     * Function to render edit fields in edit page
     * @param \Oxind\AdminBundle\Admin\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->with('feedbacktype.title')
                ->add('name', null, array('label' => 'feedbacktype.name'))
                ->add('statuses', 'choice', array('multiple' => true, 'choices' => $this->getFeedbackTypeStatuses(), 'expanded' => true, 'multiple' => true))
                ->add('votable', null, array('label' => 'feedbacktype.votable'))
                ->add('vote_min_point', null, array('label' => 'feedbacktype.vote_min_point'))
                ->add('vote_max_point', null, array('label' => 'feedbacktype.vote_max_point'))
                ->end();
    }

    /**
     * Function to get status array 
     * @return array
     */
    public static function getFeedbackTypeStatuses()
    {
        return array(
            self::STATUS_OPEN => 'Open',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_ACCEPTED => 'Accepted',
        );
    }

}
