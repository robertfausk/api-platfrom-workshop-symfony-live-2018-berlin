<?php
declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Entity\Book;

# for collection use , CollectionDataProviderInterface
class BookDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
#class BookDataProvider implements ItemDataProviderInterface
{

    /**
     * Retrieves a collection.
     *
     * @throws ResourceClassNotSupportedException
     *
     * @return array|\Traversable
     */
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        $book = new Book();
        $book->setId(1);
        $book->setTitle('Le petit prince');
        $book->setDescription('pour les enfants');

        //yield $book; // no totalItems
        return [$book, $book]; // allows pagination; allows getting totalItems; for countable things
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === Book::class;
    }
}
