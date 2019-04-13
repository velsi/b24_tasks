<?php

namespace Site\Entity;

use \Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;

/** ORM для таблицы задач
 * Class TaskTable
 * @package Site\Entity
 */
class TaskTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
{
    return 'b_tasks';
}

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
{
    return array(
        'ID' => array(
            'data_type' => 'integer',
            'primary' => true,
            'autocomplete' => true,
            'title' => Loc::getMessage('TASKS_ENTITY_ID_FIELD'),
        ),
        'TITLE' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateTitle'),
            'title' => Loc::getMessage('TASKS_ENTITY_TITLE_FIELD'),
        ),
        'DESCRIPTION' => array(
            'data_type' => 'text',
            'title' => Loc::getMessage('TASKS_ENTITY_DESCRIPTION_FIELD'),
        ),
        'DESCRIPTION_IN_BBCODE' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_DESCRIPTION_IN_BBCODE_FIELD'),
        ),
        'PRIORITY' => array(
            'data_type' => 'string',
            'required' => true,
            'validation' => array(__CLASS__, 'validatePriority'),
            'title' => Loc::getMessage('TASKS_ENTITY_PRIORITY_FIELD'),
        ),
        'STATUS' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateStatus'),
            'title' => Loc::getMessage('TASKS_ENTITY_STATUS_FIELD'),
        ),
        'RESPONSIBLE_ID' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_RESPONSIBLE_ID_FIELD'),
        ),
        'DATE_START' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_DATE_START_FIELD'),
        ),
        'DURATION_PLAN' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_DURATION_PLAN_FIELD'),
        ),
        'DURATION_FACT' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_DURATION_FACT_FIELD'),
        ),
        'DURATION_TYPE' => array(
            'data_type' => 'string',
            'required' => true,
            'validation' => array(__CLASS__, 'validateDurationType'),
            'title' => Loc::getMessage('TASKS_ENTITY_DURATION_TYPE_FIELD'),
        ),
        'TIME_ESTIMATE' => array(
            'data_type' => 'integer',
            'required' => true,
            'title' => Loc::getMessage('TASKS_ENTITY_TIME_ESTIMATE_FIELD'),
        ),
        'REPLICATE' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_REPLICATE_FIELD'),
        ),
        'DEADLINE' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_DEADLINE_FIELD'),
        ),
        'START_DATE_PLAN' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_START_DATE_PLAN_FIELD'),
        ),
        'END_DATE_PLAN' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_END_DATE_PLAN_FIELD'),
        ),
        'CREATED_BY' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_CREATED_BY_FIELD'),
        ),
        'CREATED_DATE' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_CREATED_DATE_FIELD'),
        ),
        'CHANGED_BY' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_CHANGED_BY_FIELD'),
        ),
        'CHANGED_DATE' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_CHANGED_DATE_FIELD'),
        ),
        'STATUS_CHANGED_BY' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_STATUS_CHANGED_BY_FIELD'),
        ),
        'STATUS_CHANGED_DATE' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_STATUS_CHANGED_DATE_FIELD'),
        ),
        'CLOSED_BY' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_CLOSED_BY_FIELD'),
        ),
        'CLOSED_DATE' => array(
            'data_type' => 'datetime',
            'title' => Loc::getMessage('TASKS_ENTITY_CLOSED_DATE_FIELD'),
        ),
        'GUID' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateGuid'),
            'title' => Loc::getMessage('TASKS_ENTITY_GUID_FIELD'),
        ),
        'XML_ID' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateXmlId'),
            'title' => Loc::getMessage('TASKS_ENTITY_XML_ID_FIELD'),
        ),
        'EXCHANGE_ID' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateExchangeId'),
            'title' => Loc::getMessage('TASKS_ENTITY_EXCHANGE_ID_FIELD'),
        ),
        'EXCHANGE_MODIFIED' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateExchangeModified'),
            'title' => Loc::getMessage('TASKS_ENTITY_EXCHANGE_MODIFIED_FIELD'),
        ),
        'OUTLOOK_VERSION' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_OUTLOOK_VERSION_FIELD'),
        ),
        'MARK' => array(
            'data_type' => 'string',
            'validation' => array(__CLASS__, 'validateMark'),
            'title' => Loc::getMessage('TASKS_ENTITY_MARK_FIELD'),
        ),
        'ALLOW_CHANGE_DEADLINE' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_ALLOW_CHANGE_DEADLINE_FIELD'),
        ),
        'ALLOW_TIME_TRACKING' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_ALLOW_TIME_TRACKING_FIELD'),
        ),
        'MATCH_WORK_TIME' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_MATCH_WORK_TIME_FIELD'),
        ),
        'TASK_CONTROL' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_TASK_CONTROL_FIELD'),
        ),
        'ADD_IN_REPORT' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_ADD_IN_REPORT_FIELD'),
        ),
        'GROUP_ID' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_GROUP_ID_FIELD'),
        ),
        'PARENT_ID' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_PARENT_ID_FIELD'),
        ),
        'FORUM_TOPIC_ID' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_FORUM_TOPIC_ID_FIELD'),
        ),
        'MULTITASK' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_MULTITASK_FIELD'),
        ),
        'SITE_ID' => array(
            'data_type' => 'string',
            'required' => true,
            'validation' => array(__CLASS__, 'validateSiteId'),
            'title' => Loc::getMessage('TASKS_ENTITY_SITE_ID_FIELD'),
        ),
        'DECLINE_REASON' => array(
            'data_type' => 'text',
            'title' => Loc::getMessage('TASKS_ENTITY_DECLINE_REASON_FIELD'),
        ),
        'FORKED_BY_TEMPLATE_ID' => array(
            'data_type' => 'integer',
            'title' => Loc::getMessage('TASKS_ENTITY_FORKED_BY_TEMPLATE_ID_FIELD'),
        ),
        'ZOMBIE' => array(
            'data_type' => 'boolean',
            'values' => array('N', 'Y'),
            'title' => Loc::getMessage('TASKS_ENTITY_ZOMBIE_FIELD'),
        ),
        'DEADLINE_COUNTED' => array(
            'data_type' => 'integer',
            'required' => true,
            'title' => Loc::getMessage('TASKS_ENTITY_DEADLINE_COUNTED_FIELD'),
        ),
        'STAGE_ID' => array(
            'data_type' => 'integer',
            'required' => true,
            'title' => Loc::getMessage('TASKS_ENTITY_STAGE_ID_FIELD'),
        ),
        'SEARCH_INDEX' => array(
            'data_type' => 'text',
            'title' => Loc::getMessage('TASKS_ENTITY_SEARCH_INDEX_FIELD'),
        ),
    );
}
    /**
     * Returns validators for TITLE field.
     *
     * @return array
     */
    public static function validateTitle()
{
    return array(
        new Main\Entity\Validator\Length(null, 255),
    );
}
    /**
     * Returns validators for PRIORITY field.
     *
     * @return array
     */
    public static function validatePriority()
{
    return array(
        new Main\Entity\Validator\Length(null, 1),
    );
}
    /**
     * Returns validators for STATUS field.
     *
     * @return array
     */
    public static function validateStatus()
{
    return array(
        new Main\Entity\Validator\Length(null, 1),
    );
}
    /**
     * Returns validators for DURATION_TYPE field.
     *
     * @return array
     */
    public static function validateDurationType()
{
    return array(
        new Main\Entity\Validator\Length(null, 5),
    );
}
    /**
     * Returns validators for GUID field.
     *
     * @return array
     */
    public static function validateGuid()
{
    return array(
        new Main\Entity\Validator\Length(null, 50),
    );
}
    /**
     * Returns validators for XML_ID field.
     *
     * @return array
     */
    public static function validateXmlId()
{
    return array(
        new Main\Entity\Validator\Length(null, 50),
    );
}
    /**
     * Returns validators for EXCHANGE_ID field.
     *
     * @return array
     */
    public static function validateExchangeId()
{
    return array(
        new Main\Entity\Validator\Length(null, 196),
    );
}
    /**
     * Returns validators for EXCHANGE_MODIFIED field.
     *
     * @return array
     */
    public static function validateExchangeModified()
{
    return array(
        new Main\Entity\Validator\Length(null, 196),
    );
}
    /**
     * Returns validators for MARK field.
     *
     * @return array
     */
    public static function validateMark()
{
    return array(
        new Main\Entity\Validator\Length(null, 1),
    );
}
    /**
     * Returns validators for SITE_ID field.
     *
     * @return array
     */
    public static function validateSiteId()
{
    return array(
        new Main\Entity\Validator\Length(null, 2),
    );
}
}