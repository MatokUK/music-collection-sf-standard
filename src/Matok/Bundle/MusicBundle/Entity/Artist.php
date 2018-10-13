<?php

namespace Matok\Bundle\MusicBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


class Artist
{
    /** @var int */
    private $artistId;

    /** @var string */
    private $title;

    /** @var string */
    private $webPage;

    /** @var \DateTime */
    private $createdAt;

    /** @var Collection */
    private $albums;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->albums = new ArrayCollection();
    }

    public function getArtistId(): int
    {
        return $this->artistId;
    }

    public function getTitle(): string
    {
        return (string) $this->title;
    }

    public function setTitle(string $title): Artist
    {
        $this->title = $title;

        return $this;
    }

    public function getWebPage(): ?string
    {
        return $this->webPage;
    }

    public function setWebPage(string $webPage): Artist
    {
        $this->webPage = $webPage;

        return $this;
    }

    public function getAlbums(): ?Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): Artist
    {
        $this->albums->add($album);

        return $this;
    }

    public function removeAlbum(Album $album): Artist
    {
        $this->albums->removeElement($album);

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): Artist
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}