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
                'attr' => ['class' => 'form-control', 'placeholder' => 'user.placeholder.firstName.label'],
                'label' => 'user.form.firstName.label',
            ])
            ->add('lastName', 'text', [
                'required' => true,
                'label' => 'user.form.lastName.label',
                'attr' => ['class' => 'form-control', 'placeholder' => 'user.placeholder.lastName.label'],
            ])
            ->add('email', 'email', [
                'required' => true,
                'label' => 'user.form.email.label',
                'attr' => ['class' => 'form-control', 'placeholder' => 'user.placeholder.email.label'],
            ])
            ->add('plainPassword', 'repeated', [
                'required' => true,
                'type' => 'password',
                'label' => 'user.form.plainPassword.label',
                'first_options' => [
                    'label' => 'user.form.password.label',
                    'attr' => ['class' => 'form-control', 'placeholder' => 'user.placeholder.password.label'],
                ],
                'second_options' => [
                    'label' => 'user.form.password_repeat.label',
                    'attr' => ['class' => 'form-control', 'placeholder' => 'user.placeholder.password_repeat.label'],
                ],
                'invalid_message' => 'user.form.password_mismatch',
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