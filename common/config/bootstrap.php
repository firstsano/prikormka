<?php
/**
 * Require core files
 */
require_once(__DIR__ . '/../helpers.php');

/**
 * Setting path aliases
 */
Yii::setAlias('@base', realpath(__DIR__.'/../../'));
Yii::setAlias('@common', realpath(__DIR__.'/../../common'));
Yii::setAlias('@frontend', realpath(__DIR__.'/../../frontend'));
Yii::setAlias('@backend', realpath(__DIR__.'/../../backend'));
Yii::setAlias('@console', realpath(__DIR__.'/../../console'));
Yii::setAlias('@storage', realpath(__DIR__.'/../../storage'));
Yii::setAlias('@tests', realpath(__DIR__.'/../../tests'));

/**
 * Setting images aliases
 */
Yii::setAlias('@web', '/');
Yii::setAlias('@img', '@web/img');
Yii::setAlias('@icons', '@img/icons');
Yii::setAlias('@product-img', '@img/models/products');

/**
 * Setting url aliases
 */
Yii::setAlias('@frontendUrl', env('FRONTEND_URL'));
Yii::setAlias('@backendUrl', env('BACKEND_URL'));
Yii::setAlias('@storageUrl', env('STORAGE_URL'));



