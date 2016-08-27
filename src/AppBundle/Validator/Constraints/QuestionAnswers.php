<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class QuestionAnswers.
 *
 * @package AppBundle\Validator\Constraints
 * @author    Marius Adam  <marius.adam@evozon.com>
 *
 * @Annotation
 */
class QuestionAnswers extends Constraint
{
    /**
     * @var string
     */
    public $message = 'app.entity.multiple_question.noanswers.error';
}