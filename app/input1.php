<?php
/**
 * Created by PhpStorm.
 * User: Humberto
 * Date: 24/04/2015
 * Time: 14:18
 */
Autoloader::namespaces(array(
    'Models' => path('app').'models',
));

Form::macro('myField', function()
{
    return '<input type="awesome">';
});
Form::macro('datetime', function($name, $value = null, $options = array())
{
    $input =  '<input type="datetime" name="' . $name . '" value="' . $value . '"';

    foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
    }

    $input .= '>';

    return $input;
});