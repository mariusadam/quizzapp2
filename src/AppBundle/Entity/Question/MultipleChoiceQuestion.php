<?php

namespace AppBundle\Entity\Question;

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
     * @var array
     *
     * @ORM\Column(name="possibleAnswers", type="array")
     */
    private $possibleAnswers;

    /**
     * @var array
     *
     * @ORM\Column(name="correctIndexes", type="array")
     */
    private $correctIndexes;

    /**
     * Set possibleAnswers
     *
     * @param array $possibleAnswers
     *
     * @return MultipleChoiceQuestion
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
     * Set correctIndexes
     *
     * @param array $correctIndexes
     *
     * @return MultipleChoiceQuestion
     */
    public function setCorrectIndexes($correctIndexes)
    {
        $this->correctIndexes = $correctIndexes;

        return $this;
    }

    /**
     * Get correctIndexes
     *
     * @return array
     */
    public function getCorrectIndexes()
    {
        return $this->correctIndexes;
    }
}

