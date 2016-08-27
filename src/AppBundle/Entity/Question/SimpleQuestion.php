<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * SimpleQuestion
 *
 * @ORM\Table(name="simple_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\SimpleQuestionRepository")
 */
class SimpleQuestion extends AbstractQuestion
{
    /**
     * @var string
     *
     * @ORM\Column(name="correctAnswer", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Your answer must be at least {{ limit }} characters long",
     *      maxMessage = "Your answer cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank()
     */
    private $correctAnswer;

    /**
     * Set correctAnswer
     *
     * @param string $correctAnswer
     *
     * @return SimpleQuestion
     */
    public function setCorrectAnswer($correctAnswer)
    {
        $this->correctAnswer = $correctAnswer;

        return $this;
    }

    /**
     * Get correctAnswer
     *
     * @return string
     */
    public function getCorrectAnswer()
    {
        return $this->correctAnswer;
    }
}

