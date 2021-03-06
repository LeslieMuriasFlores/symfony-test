<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $cedula;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pais;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Banco", inversedBy="user")
     */
    private $banco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="user")
     */
    private $empresa;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function get(): ?string
    {
        return $this->email;
    }
    
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }
    public function setCedula(string $cedula): self
    {
        $this->cedula = $cedula;

        return $this;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function setBanco(string $banco): self
    {
        $this->banco = $banco;

        return $this;
    }

    public function setEmpresa(string $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }
    public function getApellido(): ?string
    {
        return $this->apellido;
    }
    public function getCedula(): ?int
    {
        return $this->cedula;
    }
    public function getPais(): ?string
    {
        return $this->pais;
    }
    public function getBanco(): ?string
    {
        return $this->banco;
    }
    public function getEmpresa(): ?string
    {
        return $this->empresa;
    }
    
    public function __toString()
    {
        return $this->nombre;
    }
}
