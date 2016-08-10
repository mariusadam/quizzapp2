<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class AnswerAdmin.
 *
 * @package AppBundle\Admin
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class AnswerAdmin extends AbstractAdmin
{

    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('rawText')
            ->add('correct')
        ;
    }

}