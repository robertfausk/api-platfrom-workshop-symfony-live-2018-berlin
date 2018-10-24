<?php
declare(strict_types=1);


use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"User:write"}},
 *     denormalizationContext={"groups"={"User:read"}}
 * )
 * @ORM\Entity
 */
class User extends BaseUser
{

    /**
     * @var int
     * @ApiProperty(identifier=true)
     * @Groups({"User:read", "User:write"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO") encourage to use Uuid but postgres not yet configured for this
     * @ORM\Column(type="integer")
     */
    protected $id;


    /**
     * @var string
     * @ORM\Column(type="integer")
     * @Groups({"User:read", "User:write"})
     */
    protected $plainPassword;

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
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

}
