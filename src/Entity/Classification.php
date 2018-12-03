<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classification
 *
 * @ORM\Table(name="classification", indexes={@ORM\Index(name="classification", columns={"classification"})})
 * @ORM\Entity
 */
class Classification
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="classification", type="string", length=100, nullable=false)
     */
    private $classification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }


}
