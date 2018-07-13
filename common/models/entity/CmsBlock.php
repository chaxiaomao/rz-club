<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "cms_block".
 *
 * @property integer $id
 * @property string $name
 * @property string $label
 * @property string $icon
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
            [['created_at', 'updated_at'], 'default', 'value' => date('Y-m-d H:i:s')],
            [['created_at', 'updated_at'], 'safe'],
            [['icon', 'label', 'name'], 'string', 'max' => 255],
            [['value', ], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon' => 'Icon',
            'name' => '名字',
            'label' => '标签',
            'value' => '内容',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
