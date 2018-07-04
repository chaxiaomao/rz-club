<?php

namespace common\models\entity;

use Yii;

/**
 * This is the model class for table "activity_label_rs".
 *
 * @property integer $id
 * @property integer $activity_id
 * @property integer $label_id
 * @property string $created_at
 * @property string $updated_at
 */
class ActivityLabelRs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_label_rs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'label_id', 'created_at', 'updated_at'], 'required'],
            [['activity_id', 'label_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity ID',
            'label_id' => 'Label ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getLabel() {
        return $this->hasOne(ActivityLabel::className(), ['id' => 'label_id']);
    }

    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }

    public function getLabelIds($id) {
        $arr = [];
        $model = ActivityLabelRs::find()->where(['activity_id' => $id])->all();
        foreach ($model as $m) {
            array_push($arr, $m->label_id);
        }
        return $arr;
    }

    public function getLabels($id)
    {
        $arr = [];
        $model = ActivityLabelRs::find()->where(['activity_id' => $id])->all();
        foreach ($model as $item) {
            array_push($arr, $item->label);
        }
        return $arr;
    }

}
