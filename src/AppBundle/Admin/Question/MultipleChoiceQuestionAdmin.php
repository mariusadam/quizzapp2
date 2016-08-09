<?php

namespace AppBundle\Admin\Question;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question\MultipleChoiceQuestion;
use AppBundle\Form\Type\AnswerType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MultipleChoiceQuestionAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('rawText')
            ->add('answers', 'collection', [
                'entry_type' => AnswerType::class,
                'allow_add' => true,
                'allow_delete' => true,
            ])
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
            ->add('rawText')
            ->add('answers', 'collection')
            ->add('category')
        ;
    }

//    /**
//     * @param MultipleChoiceQuestion $question
//     */
//    public function prePersist($question)
//    {
//        foreach ($question->getAnswers() as $answer) {
//            /* @var Answer $answer */
//            if (is_null($answer->getCorrect())) {
//                $answer->setCorrect(false);
//            }
//        }
//    }

}