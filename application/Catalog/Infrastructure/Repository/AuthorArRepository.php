<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Repository;

use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use app\Catalog\Domain\Entity\Author;
use app\Catalog\Domain\Repository\AuthorRepositoryInterface;
use app\Catalog\Infrastructure\Factory\AuthorFactory;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $full_name
 */
class AuthorArRepository extends ActiveRecord implements AuthorRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
        ];
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getBooks(): ActiveQuery
    {
        return $this->hasMany(BookArRepository::class, ['book_id' => 'id'])
            ->viaTable('authors_books_rel', ['author_id' => 'id']);
    }

    public function getAllAuthors(): array
    {
        // TODO: Implement getAllAuthors() method.
    }

    public function createAuthor(CreateAuthorDtoInterface $dto): Author
    {
        $author = new self();
        $author->full_name = $dto->getFullName();

        $author->save();

        $factory = Yii::$container->get('app\Catalog\Infrastructure\Factory\AuthorFactory');
        return $factory->factory($author);
    }
}
