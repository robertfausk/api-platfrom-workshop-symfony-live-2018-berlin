<?php
declare(strict_types=1);

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;
use App\Dto\FileExport;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;

class FileExportDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
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

        // following completely bypasses completely api platform
        #yield $book;
        #return new Response();
        // end bypasses - better use Subscriber and set headers or else in it

        return [$book];
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return $resourceClass === FileExport::class;
    }

    /**
     * Retrieves an item.
     *
     * @param array|int|string $id
     *
     * @throws ResourceClassNotSupportedException
     *
     * @return object|null
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        // TODO: Implement getItem() method.
    }
}
