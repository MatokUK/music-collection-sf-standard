<?php
namespace Matok\Bundle\MusicBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Matok\Bundle\MusicBundle\Entity\Album;

class AlbumRepository extends EntityRepository implements \Countable
{
    public function getList()
    {
       return $this->findBy([], ['title' => 'ASC']);
    }

    public function save(Album $album)
    {
        $this->getEntityManager()->persist($album);
        $this->getEntityManager()->flush($album);
    }

    public function remove(int $id)
    {
        $user = $this->getEntityManager()->getReference(Album::class, $id);

        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    public function count(): int
    {
        $query = $this->getEntityManager()->createQuery('SELECT COUNT(a.albumId) FROM '.$this->getEntityName().' a');

        return $query->getSingleScalarResult();
    }
}