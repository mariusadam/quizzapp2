<?php

namespace AppBundle\Form\Type\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class RegistrationType.
 *
 * @package AppBundle\Form\Type\User
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class RegistrationType extends AbstractType
{

    /**
    * @param FormBuilderInterface $builder
    * @param array                $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->remove('username')
            ->add('firstName', 'text', [
                'required' => true,
                'label' => 'First name',
            ])
            ->add('lastName', 'text', [
                'required' => true,
                'label' => 'Last name',
            ])
            ->add('email', 'email', [
                'required' => true,
                'label' => 'Email',
            ])
            ->add('plainPassword', 'repeated', [
                'required' => true,
                'type' => 'password',
                'first_options' => [
                    'label' => 'Password',
                ],
                'second_options' => [
                    'label' => 'Repeat Password',
                ],
                'invalid_message' => 'Passwords do not match!',
            ]);
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

}