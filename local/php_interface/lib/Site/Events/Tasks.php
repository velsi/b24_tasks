<?php

namespace Site\Events;


class Tasks
{

    /** Изменение статуса с "Завершена" на "На оценке"
     * @param $ID
     * @param $arFields
     * @param $arTaskCopy
     * @return bool
     */
    public static function setEvaluationStatus($ID, &$arFields, &$arTaskCopy)
    {
        $status = (int)$arFields['STATUS'];
        $currentStatus = (int)$arTaskCopy['REAL_STATUS'];
        if (($status == \CTasks::STATE_COMPLETED) && ($currentStatus !== \CTasks::STATE_EVALUATION)){
            $arFields['STATUS'] = \CTasks::STATE_EVALUATION;
        }
            return true;
    }
}