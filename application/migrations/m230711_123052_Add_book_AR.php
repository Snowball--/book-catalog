<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m230711_123052_Add_book_AR
 */
class m230711_123052_Add_book_AR extends Migration
{
    private const TABLE = 'books';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE, [
            'id' => $this->primaryKey(11)->unsigned()->notNull(),
            'title' => $this->string(255)->notNull(),
            'writing_year' => $this->integer(4)->unsigned()->notNull(),
            'description' => $this->text(),
            'isbn' => $this->string(255)->defaultValue('')->notNull(),
            'image' => $this->string(255)->defaultValue('')->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230711_123052_Add_book_AR cannot be reverted.\n";

        return false;
    }
    */
}
