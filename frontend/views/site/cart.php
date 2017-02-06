<?php

/* @var $this \yii\web\View */
/* @var $products \frontend\models\Product[] */

?>

<?php foreach ($products as $product): ?>
    <?= $product->name ?>
    <?= $product->quantity ?>
    <br />
<?php endforeach; ?>
