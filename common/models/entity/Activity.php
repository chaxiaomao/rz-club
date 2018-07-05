<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $id
 * @property string $title
 * @property integer $limit_count
 * @property string $cost_price
 * @property string $hold_date
 * @property string $cover
 * @property string $content
 * @property integer $favor
 * @property integer $forward
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Activity extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 10; // 活动进行
    const STATUS_EXPIRE = 20; // 活动过期

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'limit_count', 'cost_price', 'hold_date', 'hold_place', 'cover', 'content', 'favor', 'forward', 'status', 'created_at', 'updated_at'], 'required'],
            [['favor', 'forward', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['content', 'cost_price', 'hold_date', 'limit_count'], 'string'],
            [['title', 'cover', 'hold_place'], 'string', 'max' => 255],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_EXPIRE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'limit_count' => '报名人数',
            'cost_price' => '报名费用',
            'hold_date' => '举办时间',
            'hold_place' => '活动地点',
            'cover' => '封面',
            'content' => '内容',
            'favor' => '赞赏',
            'forward' => '转发数量',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function getLabels()
    {
        return $this->hasMany(ActivityLabelRs::className(), ['activity_id' => 'id']);
    }

    public function getRedData()
    {

    }

}
