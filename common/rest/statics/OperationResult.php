<?php

namespace common\rest\statics;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * OperationResult
 * 'REST: Success' => '接口调用成功',
  'REST: ERROR_INTERNAL' => '服务器内部错误',
  'REST: ERROR_300' => '缺少key参数',
  'REST: ERROR_400' => '域名错误',
  'REST: ERROR_401' => '未经授权',
  'REST: ERROR_402' => '该域名已禁用',
  'REST: ERROR_403' => '禁止访问',
  'REST: ERROR_404' => '资源不存在',
  'REST: ERROR_405' => '错误的请求类型',
  'REST: ERROR_501' => '数据库错误',
  'REST: ERROR_502' => '并发异常，请重试',
  'REST: ERROR_600' => '缺少参数',
  'REST: ERROR_601' => '无权操作:缺少 token',
  'REST: ERROR_602' => '签名错误',
  'REST: ERROR_700' => '暂无数据',
  'REST: ERROR_701' => '该功能暂未开通',
  'REST: ERROR_702' => '资源余额不足',
  'REST: ERROR_901' => 'token错误',
 */
class OperationResult extends AbstractStaticClass {

    const SUCCESS = "000";
    const ERROR_INTERNAL = "-1";
    const ERROR_403 = "403";
    const ERROR_404 = "404";
    const ERROR_405 = "405";
    const ERROR_501 = "501";
    const ERROR_502 = "502";
    const ERROR_600 = "600";
    const ERROR_601 = "601";
    const ERROR_602 = "602";
    const ERROR_700 = "700";
    const ERROR_701 = "701";
    const ERROR_702 = "702";
    const ERROR_901 = "901";
    const ERROR_902 = "902";
    const ERROR_300 = "300";
    const ERROR_400 = "400";
    const ERROR_401 = "401";
    const ERROR_402 = "402";

    protected static $_data;

    /**
     * 
     * @param type $id
     * @param type $attr
     * @return string|array
     */
    public static function getData($id = '', $attr = '') {
        if (is_null(static::$_data)) {
            static::$_data = [
                static::SUCCESS => ['id' => static::SUCCESS, 'label' => "REST: Success"],
                static::ERROR_INTERNAL => ['id' => static::ERROR_INTERNAL, 'label' => Yii::t('app.rest', 'REST: ERROR_INTERNAL')],
                static::ERROR_403 => ['id' => static::ERROR_403, 'label' => Yii::t('app.rest', 'REST: ERROR_403')],
                static::ERROR_404 => ['id' => static::ERROR_404, 'label' => Yii::t('app.rest', 'REST: ERROR_404')],
                static::ERROR_405 => ['id' => static::ERROR_405, 'label' => Yii::t('app.rest', 'REST: ERROR_405')],
                static::ERROR_501 => ['id' => static::ERROR_501, 'label' => Yii::t('app.rest', 'REST: ERROR_501')],
                static::ERROR_502 => ['id' => static::ERROR_502, 'label' => Yii::t('app.rest', 'REST: ERROR_502')],
                static::ERROR_600 => ['id' => static::ERROR_600, 'label' => Yii::t('app.rest', 'REST: ERROR_600')],
                static::ERROR_601 => ['id' => static::ERROR_601, 'label' => Yii::t('app.rest', 'REST: ERROR_601')],
                static::ERROR_602 => ['id' => static::ERROR_602, 'label' => Yii::t('app.rest', 'REST: ERROR_602')],
                static::ERROR_700 => ['id' => static::ERROR_700, 'label' => Yii::t('app.rest', 'REST: ERROR_700')],
                static::ERROR_701 => ['id' => static::ERROR_701, 'label' => Yii::t('app.rest', 'REST: ERROR_701')],
                static::ERROR_702 => ['id' => static::ERROR_702, 'label' => Yii::t('app.rest', 'REST: ERROR_702')],
                static::ERROR_901 => ['id' => static::ERROR_901, 'label' => Yii::t('app.rest', 'REST: ERROR_901')],
                static::ERROR_902 => ['id' => static::ERROR_901, 'label' => Yii::t('app.rest', 'REST: ERROR_902')],
                static::ERROR_300 => ['id' => static::ERROR_300, 'label' => Yii::t('app.rest', 'REST: ERROR_300')],
                static::ERROR_400 => ['id' => static::ERROR_400, 'label' => Yii::t('app.rest', 'REST: ERROR_400')],
                static::ERROR_401 => ['id' => static::ERROR_401, 'label' => Yii::t('app.rest', 'REST: ERROR_401')],
                static::ERROR_402 => ['id' => static::ERROR_402, 'label' => Yii::t('app.rest', 'REST: ERROR_402')],
            ];
        }
        if (!empty($id) && !empty($attr)) {
            return static::$_data[$id][$attr];
        }
        if (!empty($id) && empty($attr)) {
            return static::$_data[$id];
        }
        return static::$_data;
    }

    public static function getLabel($id) {
        return static::getData($id, 'label');
    }

    public static function getHashMap($keyField, $valField) {
        $data = ArrayHelper::map(static::getData(), $keyField, $valField);
        return $data;
    }

}
