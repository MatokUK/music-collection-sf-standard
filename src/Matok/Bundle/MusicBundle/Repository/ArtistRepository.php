<?php
namespace Matok\Bundle\MusicBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Matok\Bundle\MusicBundle\Entity\Artist;

class ArtistRepository extends EntityRepository implements \Countable
{
    public function save(Artist $artist)
    {
        $this->getEntityManager()->persist($artist);
        $this->getEntityManager()->flush($artist);
    }

    public function remove(int $id)
    {
        $user = $this->getEntityManager()->getReference(Artist::class, $id);

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    public function count(): int
    {
        $query = $this->getEntityManager()->createQuery('SELECT COUNT(a.albumId) FROM '.$this->getEntityName().' a');

        return $query->getSingleScalarResult();
    }
}