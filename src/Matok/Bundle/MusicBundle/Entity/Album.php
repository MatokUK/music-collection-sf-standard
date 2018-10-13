<?php

namespace Matok\Bundle\MusicBundle\Entity;

class Album
{
    /** @var int */
    private $albumId;

    /** @var Artist */
    private $artist;

    /** @var string */
    private $title;

    /** @var string */
    private $genre;

    /** @var int */
    private $year;

    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    public function getArtist(): Artist
    {
        return $this->artist;
    }

    public function setArtist(Artist $artist): Album
    {
        $this->artist = $artist;

        return $this;
    }

    public function getTitle(): string
    {
        return (string) $this->title;
    }

    public function setTitle(string $title): Album
    {
        $this->title = $title;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): Album
    {
        $this->genre = $genre;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): Album
    {
        $this->year = $year;

        return $this;
    }
}