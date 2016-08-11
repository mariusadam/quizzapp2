<?php

namespace AppBundle\Validator\Constraints;


use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Class QuestionAnswersValidator.
 *
 * @package AppBundle\Validator\Constraints
 * @author    Marius Adam  <marius.adam@evozon.com>
 */
class QuestionAnswersValidator extends ConstraintValidator
{

    /**
     * @param ArrayCollection $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if(empty($value)) {
            return;
        }
        $nrOfCorrectAnswers = 0;
        /** @var Answer $answer */
        foreach ($value as $answer) {
            if($answer->getCorrect() === true) {
                $nrOfCorrectAnswers++;
            }
        }
        if ($nrOfCorrectAnswers == 0) {
            $this->context->addViolation($constraint->message);
        }
    }

}