<?php
/**
 * @link https://sprout.barrelstrengthdesign.com
 * @copyright Copyright (c) Barrel Strength Design LLC
 * @license https://craftcms.github.io/license
 */

namespace barrelstrength\sproutreports\migrations;

use barrelstrength\sproutbasereports\migrations\m200314_000000_add_reports_sortOrder_sortColumn_columns;
use craft\db\Migration;
use yii\base\NotSupportedException;

class m200314_000000_add_reports_sortOrder_sortColumn_columns_sproutreports extends Migration
{
    /**
     * @inheritdoc
     *
     * @throws NotSupportedException
     */
    public function safeUp(): bool
    {
        $migration = new m200314_000000_add_reports_sortOrder_sortColumn_columns();

        ob_start();
        $migration->safeUp();
        ob_end_clean();

        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): bool
    {
        echo "m200314_000000_add_reports_sortOrder_sortColumn_columns_sproutreports cannot be reverted.\n";

        return false;
    }
}
