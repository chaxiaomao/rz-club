<?php

namespace common\rest\statics;

use Yii;

/**
 * Description of ResponseDatum
 *    data format type
 *
 * @author ben
 */
class ResponseDatum {

    public static function getSuccMeta($meta = [], $data = null, $html = false) {
        $default = [
            'code' => OperationResult::SUCCESS,
            'msg' => isset($meta['code']) ? OperationResult::getLabel($meta['code']) : 'Operation completed',
            'time' => date('Y-m-d H:i:s'),
            'extraData' => null,
        ];

        if (isset($meta['msg']) && is_array($meta['msg'])) {
            $meta['msg'] = self::formatMsg($meta['msg']);
        }

        if ($html) {
            $meta['msg'] = '<div class=\'alert-box done\'><i class=\'fa-check-circle\'></i> ' . $meta['msg'] . '</div>';
        }

        return array_merge($default, $meta);
    }

    public static function getErrMeta($meta = [], $data = null, $html = false) {
        $default = [
            'code' => OperationResult::ERROR_INTERNAL,
            'msg' => isset($meta['code']) ? OperationResult::getLabel($meta['code']) : "Operation completed.",
            'time' => date('Y-m-d H:i:s'),
            'extraData' => null,
        ];

        if (isset($meta['msg']) && is_array($meta['msg'])) {
            $meta['msg'] = self::formatMsg($meta['msg']);
        }

        if ($html) {
            $meta['msg'] = '<div class=\'alert-box done\'><i class=\'fa-check-circle\'></i> ' . $meta['msg'] . '</div>';
        }

        return array_merge($default, $meta);
    }

    /**
     * standardize the datum format
     * @param array $data - return data fields
     * @param array $metaData - meta data
     * @return ['data'=>[], 'meta'=[]]
     */
    public static function getSuccessDatum($meta = [], $data = null, $html = false, $isLog = false) {

        if ($isLog) {
            DeviceLogHelper::log($data);
        }

        return [
            'data' => $data, 'meta' => self::getSuccMeta($meta, $data, $html),
        ];
    }

    /**
     * standardize the datum format
     * @param array $data - return data fields
     * @param array $metaData - meta data
     */
    public static function getErrorDatum($meta = [], $data = null, $html = false, $isLog = false) {
        if ($isLog) {
            DeviceLogHelper::log($data);
        }

        return [
            'data' => $data, 'meta' => self::getErrMeta($meta, $data, $html),
        ];
    }

    public static function formatMsg($msgs) {
        $str = "";
        foreach ($msgs as $msg) {
            $str .= "- " . $msg . "<br/>\n";
        }
        return $str;
    }

}
