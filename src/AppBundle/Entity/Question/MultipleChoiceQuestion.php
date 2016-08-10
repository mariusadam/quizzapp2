<?php

namespace AppBundle\Entity\Question;

use AppBundle\Entity\Answer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MultipleChoiceQuestion
 *
 * @ORM\Table(name="multiple_choice_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\MultipleChoiceQuestionRepository")
 */
class MultipleChoiceQuestion extends AbstractQuestion
{
    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="\AppBundle\Entity\Answer", cascade={"persist"})
     * @ORM\JoinTable(name="questions_answers",
     *      joinColumns={@ORM\JoinColumn(name="question_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="answer_id", referencedColumnName="id", unique=true)}
     *      )
     * @Assert\Count(min="1", max="10")
     * @Assert\Valid()
     */
    private $answers;

    /**
     * MultipleChoiceQuestion constructor.
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * @param ArrayCollection $answer
     *
     * @return $this
     */
    public function setAnswers(ArrayCollection $answer)
    {
        $this->answers = $answer;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer)
    {
        $this->answers->add($answer);

        return $this;
    }

}

