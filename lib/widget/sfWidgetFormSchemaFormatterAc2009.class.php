<?php

class sfWidgetFormSchemaFormatterAc2009 extends sfWidgetFormSchemaFormatter
{
    protected
        $rowFormat      = "<div class='form_row%row_class%'>
                            %label% \n %error% <br/> %field%
                            %help% %hidden_fields%\n</div>\n",

        $errorRowFormat = "<div>%error%</div>",
        $helpFormat     = "<div class='form_help'>%help%</div>",
        $decoratorFormat = "<div>\n %content%</div>";



    public function formatRow($label, $fields, $errors = array(), $help = '', $hiddenFields = null)
    {
        $row = parent::formatRow(
            $label,
            $fields,
            $errors,
            $help,
            $hiddenFields
        );


        return strtr($row, array(
            '%row_class%' => (count($errors) > 0) ? 'form_row_error' : '',
        ));
    }
}
