<?php

namespace AppBundle\Entity\Question;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class SingleChoiceQuestion.
 *
 * @package AppBundle\Entity\Question
 * @author  Marius Adam  <marius.adam@evozon.com>
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question\SingleChoiceQuestionRepository")
 * @ORM\Table(name="single_choice_questions")
 */
class SingleChoiceQuestion extends AbstractQuestion
{

}