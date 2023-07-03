<?php

declare(strict_types = 1);

namespace App\Domain\Repository;

use DateTime;
use App\Domain\Entity\Message;
use Doctrine\ORM\EntityRepository;
use App\Domain\Repository\MessageRepositoryInterface;

class MessageRepository extends EntityRepository implements MessageRepositoryInterface
{
    /**
     * Returns a new Message object.
     *
     * @param integer $reference
     * @param string $source
     * @param string $destination
     * @param string $bearer
     * @param string $content
     * @param string $receivedtime
     * 
     * @return Message
     */
    public function getNewMessage(int $reference, string $source, string $destination, string $bearer, string $content, string $receivedtime): Message
    {
        $message = new Message();

        $message->setReference($reference);
        $message->setSource($source);
        $message->setDestination($destination);
        $message->setBearer($bearer);
        $message->setContent($content);
        $message->setReceived($this->convertReceivedToDateTime($receivedtime));

        return $message;
    }

    /**
     * Persist the given message object.
     *
     * @param Message $message
     * 
     * @return void
     */
    public function persistMessage(Message $message): void
    {
        $this->_em->persist($message);

        $this->_em->flush();
    }

    /**
     * Find a message by its database identifier.
     *
     * @param string $identifier
     * 
     * @return Message|null
     */
    public function findByIdentifier(string $identifier): ?Message
    {
        return $this->findOneBy(['identifier' => $identifier]);
    }

    /**
     * Find a message by its reference id.
     *
     * @param integer $reference
     * 
     * @return Message|null
     */
    public function findByReference(int $reference): ?Message
    {
        return $this->findOneBy(['reference' => $reference]);
    }

    public function removeMessage(Message $message): void
    {
        $this->_em->remove($message);

        $this->_em->flush();
    }

    /**
     * Convert <receivedtime> to a valid DateTime object for database storage.
     *
     * @param string $receivedtime
     * 
     * @return DateTime
     */
    private function convertReceivedToDateTime(string $receivedtime): DateTime
    {
        return DateTime::createFromFormat('d/m/Y H:i:s', $receivedtime);
    }
}