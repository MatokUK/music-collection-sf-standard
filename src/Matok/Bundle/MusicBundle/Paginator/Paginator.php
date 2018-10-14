<?php
namespace Matok\Bundle\MusicBundle\Paginator;

class Paginator
{
    /** @var int */
    private $totalPages;

    /** @var int */
    private $itemsPerPage;

    /** @var int */
    private $currentPage;

    public function __construct(int $totalPages, int $itemsPerPage)
    {
        $this->totalPages = $totalPages;
        $this->itemsPerPage = $itemsPerPage;
    }

    public function setPage(int $page): int
    {
        if ($page < 1) {
            $page = 1;
        }

        if ($page > $this->getPages()) {
            $page = $this->getPages();
        }

        $this->currentPage = $page;

        return $this->currentPage;
    }

    public function getPages(): int
    {
        return max(ceil($this->totalPages/$this->itemsPerPage), 1);
    }

    public function getPage(): int
    {
        return $this->currentPage;
    }

    public function getLimit(): int
    {
        return $this->itemsPerPage;
    }

    public function getOffset(): int
    {
        return ($this->currentPage-1) * $this->itemsPerPage;
    }
}