<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;
use App\Controller\RentBook;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"Book:write"}},
 *     denormalizationContext={"groups"={"Book:read"}},
 *     collectionOperations={"get", "post"},
 *     itemOperations={
 *          "rent"={"method"="GET", "path"="/book/rent/{id}", "controller"=RentBook::class},
 *          "get"={"path"="/myBooks/{id}"},
 *          "put"
 *     },
 *     attributes={
 *         "access_control"="is_granted('ROLE_USER')"
 *     }
 * )
 * @ORM\Entity
 * @ApiFilter(
 *     SearchFilter::class, properties={"title"="partial"}
 * )
 * @ApiFilter(
 *     PropertyFilter::class
 * )
 * with GraphQL it queries everthing you want
 */
class Book
{
    /**
     * @var int better use Uuid
     * @ApiProperty(identifier=true) cause we are not working with Doctrine otherwise issue 'Unable to generate an IRI for the item of type
     *                               \"App\\Entity\\Book\"'
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO") encourage to use Uuid but postgres not yet configured for this
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @var string
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Column
     */
    private $title;
    /**
     * @var string
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Column
     */
    private $description;

    /**
     * @var Author
     * @Groups({"Book:read", "Book:write"})
     * @ORM\OneToOne(targetEntity=Author::class)
     */
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
