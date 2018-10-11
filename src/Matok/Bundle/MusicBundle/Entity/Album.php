<?php

namespace Matok\Bundle\MusicBundle\Entity;

class Album
{
    /** @var int */
    private $albumId;

    /** @var string */
    private $title;

    /** @var int */
    private $year;

    public function getAlbumId(): int
    {
        return $this->albumId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Album
    {
        $this->title = $title;
        return $this;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): Album
    {
        $this->year = $year;
        return $this;
    }
}