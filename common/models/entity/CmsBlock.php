<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "cms_block".
 *
 * @property integer $id
 * @property string $code
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 */
class CmsBlock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cms_block';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'value', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['code', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'value' => 'Value',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
