<?php

function get_base_class_name($object)
{
    return (new \ReflectionClass($object))->getShortName();
}

function camelcase_to_snake_case($string)
{
    return strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $string));
}

function format_f($float, $precision = 2)
{
    return \Yii::$app->formatter->asDecimal($float, $precision);
}

function decimals($float)
{
    $float = 100 * ($float - round($float, 0, PHP_ROUND_HALF_DOWN));
    return sprintf("%02d", format_f($float, 0));
}

function format_d($timestamp, $format = 'short')
{
    switch ($format) {
        case 'long':
            return \Yii::$app->formatter->asDate($timestamp, 'dd MMMM yyyy');
        default:
            return \Yii::$app->formatter->asDate($timestamp, 'dd.MM');
    }
}

function currency()
{
    return \Yii::$app->params['currency'];
}

function quantity($quantity)
{
    return \Yii::t('common/site', '{quantity} items', [
        'quantity' => $quantity
    ]);
}
