<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Answer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AnswerType.
 *
 * @package AppBundle\Form\Type
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class AnswerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rawText', null, ['label' => 'Answer text'])
            ->add('correct', 'choice', [
                'label'    => 'Is this answer correct',
                'required' => true,
                'multiple' => false,
                'expanded' => true,
                'choices'  => [
                    'Yes' => 1,
                    'No' => 0,
                ]
            ]);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('data_class', Answer::class);
    }

}