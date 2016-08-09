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
                'attr' => ['class' => 'uk-width-1-1', 'placeholder' => 'user.placeholder.firstName.label'],
                'label' => 'user.form.firstName.label',
            ])
            ->add('lastName', 'text', [
                'required' => true,
                'attr' => ['class' => 'uk-width-1-1', 'placeholder' => 'user.placeholder.lastName.label'],
                'label' => 'user.form.lastName.label',
            ])
            ->add('email', 'email', [
                'required' => true,
                'attr' => ['class' => 'uk-width-1-1', 'placeholder' => 'user.placeholder.email.label'],
                'label' => 'user.form.email.label',
            ])
            ->add('plainPassword', 'repeated', [
                'required' => true,
                'type' => 'password',
                'first_options' => [
                    'label' => 'Password',
                    'attr' => ['class' => 'uk-width-1-1', 'placeholder' => 'user.placeholder.password.label'],
                ],
                'second_options' => [
                    'label' => 'Repeat Password',
                    'attr' => ['class' => 'uk-width-1-1', 'placeholder' => 'user.placeholder.repeat_password.label']
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