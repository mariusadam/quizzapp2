<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractQuestion.
 *
 * @package AppBundle\Entity\Question
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class AbstractQuestion
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $rawText;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id =  (int) $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getRawText()
    {
        return $this->rawText;
    }

    /**
     * @param string $rawText
     *
     * @return $this
     */
    public function setRawText($rawText)
    {
        $this->rawText = $rawText;

        return $this;
    }
}