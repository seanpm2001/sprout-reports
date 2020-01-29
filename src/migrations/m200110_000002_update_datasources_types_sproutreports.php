<?php

namespace barrelstrength\sproutreports\migrations;

use barrelstrength\sproutbasereports\migrations\m200110_000002_update_datasources_types;
use craft\db\Migration;

class m200110_000002_update_datasources_types_sproutreports extends Migration
{
    /**
     * @return bool
     */
    public function safeUp(): bool
    {
        $migration = new m200110_000002_update_datasources_types();

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
        echo "m200110_000002_update_datasources_types_sproutreports cannot be reverted.\n";

        return false;
    }
}
