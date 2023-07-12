<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Repository;

use app\Catalog\Domain\Dto\SearchBooksDtoInterface;
use app\Catalog\Domain\Repository\BookRepositoryInterface;
use app\Utility\PageableInterface;
use app\Utility\SortableInterface;
use Traversable;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property int $writing_year
 * @property string|null $description
 * @property string $isbn
 * @property string $image
 */
class BookArRepository extends \yii\db\ActiveRecord implements BookRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'writing_year'], 'required'],
            [['writing_year'], 'integer'],
            [['description'], 'string'],
            [['title', 'isbn', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'writing_year' => 'Writing Year',
            'description' => 'Description',
            'isbn' => 'Isbn',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getAuthors(): ActiveQuery
    {
        return $this->hasMany(BookArRepository::class, ['book_id' => 'id'])
            ->viaTable('authors_books_rel', ['author_id' => 'id']);
    }

    public function getBookList(SearchBooksDtoInterface $dto): array
    {
         $query = self::find()
            ->where($dto->getSearchConditions());

         if ($dto instanceof SortableInterface) {
             $query->orderBy($dto->getSort());
         }

         if ($dto instanceof PageableInterface) {
             $query->limit($dto->getLimit())
                 ->offset($dto->getOffset());
         }

         return $query->all();
    }
}
