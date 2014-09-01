<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * CLass m140526_193056_create_module_tbl
 * @package romaten1\univer\migrations
 *
 * Create module tables.
 *
 * Will be created 1 table:
 * - `{{%cafedra}}` - Cafedras table.
 * - `{{%faculty}}` - Faculties table.
 * - `{{%prepod}}` - Prepods table.
 * - `{{%job}}` - Jobs table.
 * - `{{%scienceStatus}}` - ScienceStatuses table.
 * - `{{%subject}}` - Subjects table.
 */
class m140526_193041_create_moduleuniver_tbl extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        // MySql table options
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        // Cafedras table
        $this->createTable('{{%cafedra}}', [
            'id' => Schema::TYPE_PK,
            'faculty_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'title_en' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'image_id' => Schema::TYPE_STRING . '(255) NOT NULL',
            'active' => 'tinyint(2) NOT NULL DEFAULT 0',
            'visited' => 'tinyint(5) NOT NULL DEFAULT 0',
            ], $tableOptions);

        // Faculties table
        $this->createTable('{{%faculty}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'title_en' => Schema::TYPE_STRING . '(255) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'image_id' => Schema::TYPE_STRING . '(255) NOT NULL',
            'active' => 'tinyint(2) NOT NULL DEFAULT 0',
            'visited' => 'tinyint(5) NOT NULL DEFAULT 0',
            ], $tableOptions);

        // Prepods table
        $this->createTable('{{%prepod}}', [
            'id' => Schema::TYPE_PK,
            'cafedra_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . '(100) NOT NULL',
            'second_name' => Schema::TYPE_STRING . '(100) NOT NULL',
            'surname' => Schema::TYPE_STRING . '(100) NOT NULL',
            'name_en' => Schema::TYPE_STRING . '(100) NOT NULL',
            'description' => Schema::TYPE_TEXT . ' NOT NULL',
            'image_id' => Schema::TYPE_STRING . '(255) NOT NULL',
            'job_id' => 'tinyint(4) NOT NULL DEFAULT 0',
            'job_org_id' => 'tinyint(4) NOT NULL DEFAULT 0',
            'science_status_id' => 'tinyint(3) NOT NULL DEFAULT 0',
            'active' => 'tinyint(2) NOT NULL DEFAULT 0',
            'visited' => 'tinyint(5) NOT NULL DEFAULT 0',
            ], $tableOptions);

        // Science_statuses table
        $this->createTable('{{%science_status}}', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'title_en' => Schema::TYPE_STRING . '(255) NOT NULL',
            ], $tableOptions);

        // Subject table
        $this->createTable('{{%subject}}', [
            'id' => Schema::TYPE_PK,
            'cafedra_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'title_en' => Schema::TYPE_STRING . '(255) NOT NULL',
            'active' => 'tinyint(2) NOT NULL DEFAULT 0',
            ], $tableOptions);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%cafedra}}');
        $this->dropTable('{{%faculty}}');
        $this->dropTable('{{%prepod}}');
        $this->dropTable('{{%science_status}}');
        $this->dropTable('{{%subject}}');
    }
}
