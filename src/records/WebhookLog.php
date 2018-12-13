<?php
/**
 * Snipcart plugin for Craft CMS 3.x
 *
 * @link      https://workingconcept.com
 * @copyright Copyright (c) 2018 Working Concept Inc.
 */

namespace workingconcept\snipcart\records;

use craft\db\ActiveRecord;

class WebhookLog extends ActiveRecord
{
    /**
     * @inheritdoc
     *
     * @return string
     *
     * @property int $id
     * @property int $siteId
     * @property string $type
     * @property string $body
     */
    public static function tableName(): string
    {
        return '{{%snipcart_webhook_log}}';
    }
}
