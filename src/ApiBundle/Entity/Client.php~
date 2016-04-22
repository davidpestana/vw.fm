<?php

namespace ApiBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;
/**
 * Client
 *
 * @ORM\Table("oauth2_clients")
 * @ORM\Entity(repositoryClass="ApiBundle\Entity\ClientRepository")
 */
class Client extends BaseClient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
