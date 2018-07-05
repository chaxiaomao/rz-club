<?php
/**
 * Created by PhpStorm.
 * User: jsen
 * Date: 2018/6/3
 * Time: 10:44
 */

namespace backend\models\form;

use common\models\entity\Activity;
use common\models\entity\ActivityLabel;
use common\models\entity\ActivityLabelRs;
use Yii;
use yii\web\UploadedFile;

class ActivityForm extends \yii\base\Model
{
    /**
     * @var UploadedFile
     */
    public $file;
    public $cover;
    public $id;
    public $label_id;
    public $title;
    public $limit_count;
    public $cost_price;
    public $hold_date;
    public $hold_place;
    public $content;
    public $favor;
    public $forward;
    public $status;

    public function rules()
    {
        return [
            [['label_id', 'title', 'limit_count', 'cost_price', 'hold_date', 'hold_place','content', 'favor', 'forward', 'status'], 'required'],
            [['limit_count', 'favor', 'forward', 'status'], 'integer'],
            [['cost_price'], 'number'],
            [['content', 'cover', 'hold_place'], 'string'],
            [['title'], 'string', 'max' => 255],
//            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, gif, png'],
//            [['file'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label_id' => '标签',
            'title' => '标题',
            'limit_count' => '报名人数',
            'cost_price' => '报名费用',
            'hold_date' => '举办时间',
            'hold_place' => '活动地点',
            'cover' => '封面',
            'file' => '封面',
            'content' => '内容',
            'favor' => '赞赏',
            'forward' => '转发数量',
            'status' => '状态',
        ];
    }

    /**
     * 上传图片方法
     */
    public function upload()
    {
        $this->file = UploadedFile::getInstance($this, 'file'); // 上传图片
        $filePath = date("Y/m/", time());
        $imageName = 'gh_' . time() . rand(1000, 9999);
        $uploadPath = $this->getUploadPath($filePath);
        if ($uploadPath) {
            $this->file->saveAs($uploadPath . $imageName . '.' . $this->file->extension);
            return IMG_HOST . '/upload/images/' . $filePath . $imageName . '.' . $this->file->extension;
        } else {
            Yii::info($uploadPath . "创建文件失败");
            return false;
        }
    }

    public function save()
    {
        $transaction = Yii::$app->db->beginTransaction(); // 开启事物
        $data = Yii::$app->request->post("ActivityForm"); // 获取表单数据
        $this->setAttributes($data); // 存入属性
        $this->cover = $this->upload(); // 上传文件，返回cover路径
        if ($this->validate()) {
            $model = new Activity();
            $model->setAttributes([
                'title' => $this->title,
                'limit_count' => $this->limit_count,
                'cost_price' => $this->cost_price,
                'hold_date' => $this->hold_date,
                'hold_place' => $this->hold_place,
                'cover' => $this->cover,
                'content' => $this->content,
                'favor' => $this->favor,
                'forward' => $this->forward,
                'status' => $this->status,
                'created_at' => date("Y-m-d H:i:s", time()),
                'updated_at' => date("Y-m-d H:i:s", time()),
            ]);
            if ($model->save()) {
                foreach ($data['label_id'] as $datum) {
                    $alRs = new ActivityLabelRs();
                    $alRs->setAttributes([
                        'activity_id' => $model->id,
                        'label_id' => $datum,
                        'created_at' => date("Y-m-d H:i:s", time()),
                        'updated_at' => date("Y-m-d H:i:s", time()),
                    ]);
                    if (!$alRs->save()) {
                        $transaction->rollBack();
                        return false;
                    }
                }
                $transaction->commit();
                return true;
            } else {
                $transaction->rollBack();
            }
        } else {
            Yii::info("表单校验无效");
            $transaction->rollBack();
            return false;
        }
    }

    public function update($mode)
    {
        $transaction = Yii::$app->db->beginTransaction(); // 开启事物
        $data = Yii::$app->request->post("ActivityForm"); // 获取表单数据
        $file = $file = $_FILES['ActivityForm']['name']['file'];
        $this->setAttributes($data); // 存入属性
        if ($file != "") {
            $this->cover = $this->upload(); // 上传文件，返回cover路径
        }
        if ($this->validate()) {
            $mode->setAttributes([
                'title' => $this->title,
                'limit_count' => $this->limit_count,
                'cost_price' => $this->cost_price,
                'hold_date' => $this->hold_date,
                'hold_place' => $this->hold_place,
                'cover' => $this->cover,
                'content' => $this->content,
                'favor' => $this->favor,
                'forward' => $this->forward,
                'status' => $this->status,
                'created_at' => date("Y-m-d H:i:s", time()),
                'updated_at' => date("Y-m-d H:i:s", time()),
            ]);
            if ($mode->save()) {
                $delModel = ActivityLabelRs::find()->where(['activity_id' => $mode->id])->all();
                foreach ($delModel as $alR) {
                    if (!$alR->delete()) {
                        $transaction->rollBack();
                        return false;
                    }
                }
                foreach ($data['label_id'] as $datum) {
                    $alRs = new ActivityLabelRs();
                    $alRs->setAttributes([
                        'activity_id' => $mode->id,
                        'label_id' => $datum,
                        'created_at' => date("Y-m-d H:i:s", time()),
                        'updated_at' => date("Y-m-d H:i:s", time()),
                    ]);
                    if (!$alRs->save()) {
                        $transaction->rollBack();
                        return false;
                    }
                }
                $transaction->commit();
                return true;
            } else {
                $transaction->rollBack();
            }
        } else {
            Yii::info("表单校验无效");
            $transaction->rollBack();
            return false;
        }
    }

    public function getUploadPath($filePath)
    {
        $uploadPath = Yii::$app->basePath . '/web/upload/images/' . $filePath;
        if (!file_exists($uploadPath)) {
            if (mkdir($uploadPath, '0777', true)) {
                return $uploadPath;
            } else {
                return false;
            }
        } else {
            return $uploadPath;
        }
    }

}