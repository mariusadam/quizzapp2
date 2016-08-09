<?php

namespace AppBundle\Admin\Question;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class SimpleQuestionAdmin.
 *
 * @package AppBundle\Admin
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class SimpleQuestionAdmin extends AbstractAdmin
{

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('rawText')
            ->add('correctAnswer')
            ->add('category')
        ;
    }

    /**
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list)
    {
        // disable mosaic view
        $this->setListMode('list');
        unset($this->listModes['mosaic']);

        $list
            ->add('id')
            ->add('rawText')
            ->add('correctAnswer')
            ->add('category')
            ->add('_action', 'actions', [
                'label'   => 'Actions',
                'actions' => [
                    'edit'   => [],
                    'delete' => [],
                ],
            ]);
    }

}