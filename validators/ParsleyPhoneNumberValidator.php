<?php
/**
 * ParsleyPhoneNumberValidator class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @author Christoffer Lindqvist <christoffer.lindqvist@nordsoftware.com>
 * @copyright Copyright &copy; Nord Software 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package nordsoftware.yii-parsley.validators
 */

/**
 * Validates that a value is a valid phone number.
 */
class ParsleyPhoneNumberValidator extends CValidator implements ParsleyValidator
{
    /**
     * Validates a single attribute.
     * This method should be overridden by child classes.
     * @param CModel $object the data object being validated.
     * @param string $attribute the name of the attribute to be validated.
     */
    protected function validateAttribute($object, $attribute)
    {
        // todo: implement server-side validation.
    }

    /**
     * Registers the parsley html attributes.
     * @param CModel $object the data object being validated.
     * @param string $attribute the name of the attribute to be validated.
     * @param array $htmlOptions the HTML attributes.
     */
    public function registerClientValidation($object, $attribute, &$htmlOptions)
    {
        $htmlOptions['data-type'] = 'phone';
        $htmlOptions['data-type-phone-message'] = $this->getErrorMessage($object, $attribute);
    }

    /**
     * Returns the validation error message.
     * @param CModel $object the data object being validated.
     * @param string $attribute the name of the attribute to be validated.
     * @return string the message.
     */
    public function getErrorMessage($object, $attribute)
    {
        if (isset($this->message)) {
            $message = $this->message;
        } else {
            $message = Yii::t('validator', 'This is not a valid phone number.');
        }
        return strtr(
            $message,
            array(
                '{attribute}' => $object->getAttributeLabel($attribute),
            )
        );
    }
}