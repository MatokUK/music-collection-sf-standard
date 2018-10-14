<?php
namespace Matok\Bundle\MusicBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Matok\Bundle\MusicBundle\Entity\Artist;

class ArtistRepository extends EntityRepository implements \Countable
{
    public function getList(int $limit, int $offset)
    {
        return $this->findBy([], ['title' => 'ASC'], $limit, $offset);
    }

    public function save(Artist $artist)
    {
        $this->getEntityManager()->persist($artist);
        foreach ($artist->getAlbums() as $album) {
            $this->getEntityManager()->persist($album);
        }

        $this->getEntityManager()->flush();
    }

    public function remove(int $id)
    {
        $user = $this->getEntityManager()->getReference(Artist::class, $id);

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    public function count(): int
    {
        $query = $this->getEntityManager()->createQuery('SELECT COUNT(a.artistId) FROM '.$this->getEntityName().' a');

        return $query->getSingleScalarResult();
    }
}