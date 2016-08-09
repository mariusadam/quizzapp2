<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SingleChoiceQuestion
 *
 * @ORM\Table(name="single_choice_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\SingleChoiceQuestionRepository")
 */
class SingleChoiceQuestion extends AbstractQuestion
{
    /**
     * @var array
     *
     * @ORM\Column(name="possibleAnswers", type="array")
     */
    private $possibleAnswers;

    /**
     * @var int
     *
     * @ORM\Column(name="correctIndex", type="integer")
     */
    private $correctIndex;

    /**
     * Set possibleAnswers
     *
     * @param array $possibleAnswers
     *
     * @return SingleChoiceQuestion
     */
    public function setPossibleAnswers($possibleAnswers)
    {
        $this->possibleAnswers = $possibleAnswers;

        return $this;
    }

    /**
     * Get possibleAnswers
     *
     * @return array
     */
    public function getPossibleAnswers()
    {
        return $this->possibleAnswers;
    }

    /**
     * Set correctIndex
     *
     * @param integer $correctIndex
     *
     * @return SingleChoiceQuestion
     */
    public function setCorrectIndex($correctIndex)
    {
        $this->correctIndex = $correctIndex;

        return $this;
    }

    /**
     * Get correctIndex
     *
     * @return int
     */
    public function getCorrectIndex()
    {
        return $this->correctIndex;
    }
}

