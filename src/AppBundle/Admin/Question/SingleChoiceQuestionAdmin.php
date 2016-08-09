<?php

namespace AppBundle\Admin\Question;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SingleChoiceQuestionAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('rawText')
            ->add('possibleAnswers')
            ->add('correctIndex')
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

    }

}