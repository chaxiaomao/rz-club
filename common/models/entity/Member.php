<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $name
 * @property string $avatar
 * @property string $openid
 * @property string $mobile
 * @property integer $sex
 * @property string $job
 * @property integer $age
 * @property string $area
 * @property integer $status
 * @property string $created_at
 * @property string $update_at
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex', 'age', 'status'], 'integer'],
            [['status'], 'required'],
            [['created_at', 'update_at'], 'safe'],
            [['name', 'avatar', 'openid', 'mobile', 'job', 'area'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'avatar' => 'Avatar',
            'openid' => 'Openid',
            'mobile' => 'Mobile',
            'sex' => 'Sex',
            'job' => 'Job',
            'age' => 'Age',
            'area' => 'Area',
            'status' => 'Status',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
