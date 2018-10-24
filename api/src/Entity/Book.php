<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"Book:write"}},
 *     denormalizationContext={"groups"={"Book:read"}},
 *  collectionOperations={"get", "post"},
 *     itemOperations={
 *          "get",
 *          "put"
 *     }
 * )
 */
class Book
{
    /**
     * @var int better use Uuid
     * @ApiProperty(identifier=true) cause we are not working with Doctrine otherwise issue 'Unable to generate an IRI for the item of type
     *                               \"App\\Entity\\Book\"'
     * @Groups({"Book:read", "Book:write"})
     */
    private $id;
    /** @var string
     * @Groups({"Book:read", "Book:write"})*/
    private $title;
    /** @var string
     * @Groups({"Book:read", "Book:write"})*/
    private $description;

    /** @var Author
     * @Groups({"Book:read", "Book:write"})*/
    private $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author): void
    {
        $this->author = $author;
    }
}
