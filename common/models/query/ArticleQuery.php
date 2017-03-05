<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\Article;
use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class ArticleQuery extends ActiveQuery
{
    public function published()
    {
        $this->andWhere(['status' => Article::STATUS_PUBLISHED]);
        $this->andWhere(['<', '{{%article}}.published_at', time()]);
        return $this;
    }

    public function newOnes($limit)
    {
        $this->addOrderBy(['published_at' => SORT_DESC])->limit($limit);
        return $this;
    }
}
