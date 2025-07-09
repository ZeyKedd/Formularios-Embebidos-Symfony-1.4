<?php

class ProductPhotoValidatorSchema extends sfValidatorSchema
{
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('caption', 'The caption is required');
        $this->addMessage('filename', 'filename ir required');
    }

    protected function doClean($values)
    {
        $errorSchema = new sfValidatorErrorSchema($this);

        foreach ($values as $key => $value) {
            $errorSchemaLocal = new sfValidatorErrorSchema($this);

            //Se ha rellenado el campo filename pero no el caption

            if ($value['filename'] && !$value['caption']) {
                $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'caption');
            }


            //se ha rellenado el cmapo caption pero no el filename

            if ($value['caption'] && !$value['filename']) {
                $errorSchemaLocal->addError(new sfValidatorError($this, 'required'), 'filename');
            }


            //no se ha rellenado ninguno de los dos, se borran valores vacios

            if(!$value['filename'] && !$value['caption'])
            {
                unset($values[$key]);
            }

            //Algun error para este formulario embebido

            if(count($errorSchemaLocal))
            {
                $errorSchema->addError($errorSchemaLocal, (string) $key);
            }

            //Lanza un error para formulario principal

            if(count($errorSchema))
            {
                throw new sfValidatorErrorSchema($this, $errorSchema);
            }

            return $values;
        }
    }
}
