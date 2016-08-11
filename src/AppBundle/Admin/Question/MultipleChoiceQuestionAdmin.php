<?php

namespace AppBundle\Admin\Question;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question\MultipleChoiceQuestion;
use AppBundle\Form\Type\AnswerType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class MultipleChoiceQuestionAdmin extends AbstractAdmin
{

    /**
     * @param FormMapper $form
     */
    public function configureFormFields(FormMapper $form)
    {
        $form
            ->add('rawText', null, ['label' => 'app.entity.multiple_question.rawtext.label'])
            ->add('answers', 'collection', [
                'entry_type' => AnswerType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'label' => 'Add one or more answers.',
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
            ->add('rawText', null, ['label' => 'app.entity.multiple_question.rawtext.label'])
            ->add('answers', 'collection')
            ->add('category')
            ->add('_action', 'actions', [
                'label'   => 'Actions',
                'actions' => [
                    'edit'   => [],
                    'delete' => [],
                ],
            ]);
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