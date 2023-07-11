<?php

use yii\db\Migration;

/**
 * Class m230711_123112_Add_author_AR
 */
class m230711_123112_Add_author_AR extends Migration
{
    private const AUTHORS_TABLE = 'authors';
    private const AUTHORS_BOOKS_TABLE = 'authors_books_rel';

    private const BOOKS_TABLE = 'books';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::AUTHORS_TABLE, [
            'id' => $this->primaryKey(11)->unsigned()->notNull(),
            'full_name' => $this->string(255)->notNull()
        ]);

        $this->createTable(self::AUTHORS_BOOKS_TABLE, [
            'book_id' => $this->integer(11)->unsigned()->notNull(),
            'author_id' => $this->integer(11)->unsigned()->notNull()
        ]);

        $this->addPrimaryKey('pk', self::AUTHORS_BOOKS_TABLE, ['book_id', 'author_id']);
        $this->createIndex('book_author_index', self::AUTHORS_BOOKS_TABLE, 'book_id');
        $this->createIndex('author_book_index', self::AUTHORS_BOOKS_TABLE, 'author_id');


        $this->addForeignKey('book_author_fk', self::BOOKS_TABLE, 'id', self::AUTHORS_BOOKS_TABLE, 'book_id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('author_book_fk', self::AUTHORS_TABLE, 'id', self::AUTHORS_BOOKS_TABLE, 'author_id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('BOOK_AUTHOR_FK', self::BOOKS_TABLE);
        $this->dropForeignKey('AUTHOR_BOOK_FK', self::AUTHORS_TABLE);

        $this->dropTable(self::AUTHORS_BOOKS_TABLE);
        $this->dropTable(self::AUTHORS_TABLE);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230711_123112_Add_author_AR cannot be reverted.\n";

        return false;
    }
    */
}
