<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectDataFromEditFields
 *
 * @author egorik
 */
class SelectDataFromEditFields {
    public function selectValue($value) {
        $model = EditFields::model()->find('`key`="' . $value . '"');
        return $model->value;
    }
}

?>
