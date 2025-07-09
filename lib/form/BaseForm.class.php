<?php

/**
 * Base project form.
 * 
 * @package    advanced_form
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
     static public function listenToValidationError($event)
     {
        foreach($event['error'] as $key => $error)
        {
            self::getEventDispatcher()->notify(new sfevent(
                $event->getSubject(),
                'application.log',
                array(
                    'priority' => sfLogger::NOTICE,
                    sprintf('Validation Error: %s: %s', $key, (string) $error)
                )
                ));
        }
     }
}
