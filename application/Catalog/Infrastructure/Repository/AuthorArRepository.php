<?php

declare(strict_types=1);

namespace app\Catalog\Infrastructure\Repository;

use app\Catalog\Domain\Dto\CreateAuthorDtoInterface;
use app\Catalog\Domain\Dto\SearchAuthorsDtoInterface;
use app\Catalog\Domain\Entity\Author;
use app\Catalog\Domain\Repository\AuthorRepositoryInterface;
use app\Catalog\Infrastructure\Factory\AuthorFactory;
use app\Catalog\Infrastructure\Form\SearchAuthorsForm;
use app\Utility\PageableInterface;
use app\Utility\SortableInterface;
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
        $dto = new SearchAuthorsForm();
        return $this->search($dto);
    }

    public function createAuthor(CreateAuthorDtoInterface $dto): Author
    {
        $author = new self();
        $author->full_name = $dto->getFullName();

        $author->save();

        $factory = Yii::$container->get('app\Catalog\Infrastructure\Factory\AuthorFactory');
        return $factory->factory($author);
    }

    public function search(SearchAuthorsDtoInterface $dto): array
    {
        $query = self::find()->where($dto->getSearchConditions());

        if ($dto instanceof SortableInterface) {
            $query->orderBy($dto->getSort());
        }

        if ($dto instanceof PageableInterface) {
            $query->limit($dto->getLimit())
                ->offset($dto->getOffset());
        }

        $authors = [];
        $factory = Yii::$container->get('app\Catalog\Infrastructure\Factory\AuthorFactory');
        foreach ($query->all() as $author) {
            $authors[] = $factory->factory($author);
        }

        return $authors;
    }
}
