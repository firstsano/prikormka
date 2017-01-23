<?php

function get_base_class_name($object)
{
    return (new \ReflectionClass($object))->getShortName();
}

function camelcase_to_snake_case($string)
{
    return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $string));
}