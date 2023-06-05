<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\EntityUuidTrait;
use App\Domain\Repository\MessageRepository;

#[Entity(repositoryClass: MessageRepository::class)]
#[Table(name: 'messages')]
class MessageEntity
{
    use EntityUuidTrait;

    #[Column(type: 'boolean')]
    private bool $sw0;

    #[Column(type: 'boolean')]
    private bool $sw1;

    #[Column(type: 'boolean')]
    private bool $sw2;

    #[Column(type: 'boolean')]
    private bool $sw3;

    #[Column(type: 'integer', length: 4)]
    private int $fan;

    #[Column(type: 'integer', length: 4)]
    private int $htr;

    #[Column(type: 'integer', length: 4)]
    private int $kpd;

    #[Column(type: 'datetime', updatable: false)]
    private DateTime $recieved;

    /**
     * Get the value of sw0
     */ 
    public function getSw0(): bool
    {
        return $this->sw0;
    }

    /**
     * Set the value of sw0
     *
     * @return  self
     */ 
    public function setSw0(bool $sw0 = false): self
    {
        $this->sw0 = $sw0;

        return $this;
    }

    /**
     * Get the value of sw1
     */ 
    public function getSw1(): bool
    {
        return $this->sw1;
    }

    /**
     * Set the value of sw1
     *
     * @return  self
     */ 
    public function setSw1(bool $sw1 = false): self
    {
        $this->sw1 = $sw1;

        return $this;
    }

    /**
     * Get the value of sw2
     */ 
    public function getSw2(): bool
    {
        return $this->sw2;
    }

    /**
     * Set the value of sw2
     *
     * @return  self
     */ 
    public function setSw2(bool $sw2 = false): self
    {
        $this->sw2 = $sw2;

        return $this;
    }

    /**
     * Get the value of sw3
     */ 
    public function getSw3(): bool
    {
        return $this->sw3;
    }

    /**
     * Set the value of sw3
     *
     * @return  self
     */ 
    public function setSw3(bool $sw3 = false): self
    {
        $this->sw3 = $sw3;

        return $this;
    }

    /**
     * Get the value of fan
     */ 
    public function getFan(): int
    {
        return $this->fan;
    }

    /**
     * Set the value of fan
     *
     * @return  self
     */ 
    public function setFan(int $fan = 0): self
    {
        $this->fan = $fan;

        return $this;
    }

    /**
     * Get the value of htr
     */ 
    public function getHtr(): int
    {
        return $this->htr;
    }

    /**
     * Set the value of htr
     *
     * @return  self
     */ 
    public function setHtr(int $htr = 0): self
    {
        $this->htr = $htr;

        return $this;
    }

    /**
     * Get the value of kpd
     */ 
    public function getKpd(): int
    {
        return $this->kpd;
    }

    /**
     * Set the value of kpd
     *
     * @return  self
     */ 
    public function setKpd(int $kpd = 0): self
    {
        $this->kpd = $kpd;

        return $this;
    }

    /**
     * Get the value of recieved
     */ 
    public function getRecieved(): DateTime
    {
        return $this->recieved;
    }

    /**
     * Set the value of recieved
     *
     * @return  self
     */ 
    public function setRecieved(): self
    {
        $this->recieved = new DateTime('now');

        return $this;
    }
}