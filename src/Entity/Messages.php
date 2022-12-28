<?php

namespace App\Entity;

use App\Entity\Trait\CreatedAtTrait;
use App\Repository\MessagesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessagesRepository::class)]
class Messages
{

    use CreatedAtTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $messages = null;

    #[ORM\Column]
    // private ?bool $is_read = null;
    private  $is_read = 0;

    #[ORM\ManyToOne(inversedBy: 'sent')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $sender = null;

    #[ORM\ManyToOne(inversedBy: 'received')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $recipient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessages(): ?string
    {
        return $this->messages;
    }

    public function setMessages(string $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    public function isIsRead(): ?bool
    {
        return $this->is_read;
    }

    public function setIsRead(bool $is_read): self
    {
        $this->is_read = $is_read;

        return $this;
    }

    public function getSender(): ?users
    {
        return $this->sender;
    }

    public function setSender(?users $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function getRecipient(): ?users
    {
        return $this->recipient;
    }

    public function setRecipient(?users $recipient): self
    {
        $this->recipient = $recipient;

        return $this;
    }
}
