<?php

declare(strict_types = 1);

namespace App\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use App\Domain\Trait\HasUuidTrait;
use App\Domain\Repository\MessageRepository;

#[Entity(repositoryClass: MessageRepository::class)]
#[Table(name: 'messages')]
class Message implements MessageInterface
{
    use HasUuidTrait;

    /**
     * Message reference id.
     * 
     * XML Tag: <messageref>
     *
     * @var integer
     */
    #[Column(type: 'integer')]
    private int $reference;

    /**
     * Message source MSISDN.
     * 
     * XML Tag: <sourcemsisdn> 
     *
     * @var string
     */
    #[Column(type: 'string')]
    private string $source;

    /**
     * Message destination MSISDN
     * 
     * XML Tag: <destinationmsisdn>
     *
     * @var string
     */
    #[Column(type: 'string')]
    private string $destination;

    /**
     * Message bearer type.
     * 
     * XML Tag: <bearer>
     *
     * @var string
     */
    #[Column(type: 'string')]
    private string $bearer;

    /**
     * Message content.
     * 
     * XML Tag: <message>
     *
     * @var string
     */
    #[Column(type: 'string')]
    private string $content;

    /**
     * Date and time that message was marked received by the destination.
     * 
     * XML Tag: <receivedtime>
     *
     * @var DateTime
     */
    #[Column(type: 'datetime')]
    private DateTime $received;

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference(): int
    {
        return $this->reference;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function setBearer(string $bearer): self
    {
        $this->bearer = $bearer;

        return $this;
    }

    public function getBearer(): string
    {
        return $this->bearer;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setReceived(DateTime $received): self
    {
        $this->received = $received;

        return $this;
    }

    public function getReceived(): DateTime
    {
        return $this->received;
    }
}