<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerRepository")
 */
class Answer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="rawText", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $rawText;

    /**
     * @var bool
     *
     * @ORM\Column(name="correct", type="boolean")
     */
    private $correct;

    /**
     * Answer constructor.
     */
    public function __construct()
    {
        $this->correct = false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rawText
     *
     * @param string $rawText
     *
     * @return Answer
     */
    public function setRawText($rawText)
    {
        $this->rawText = (string)$rawText;

        return $this;
    }

    /**
     * Get rawText
     *
     * @return string
     */
    public function getRawText()
    {
        return (string )$this->rawText;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     *
     * @return Answer
     */
    public function setCorrect($correct)
    {
        $this->correct = (bool)$correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return bool
     */
    public function getCorrect()
    {
        return (bool)$this->correct;
    }

    public function __toString()
    {
        return (string) $this->getRawText();
    }
}

