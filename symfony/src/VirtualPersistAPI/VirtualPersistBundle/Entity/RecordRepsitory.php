<?php

namespace VirtualPersistAPI\VirtualPersistBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * RecordRepsitory
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RecordRepsitory extends EntityRepository
{
  public function findOneByUUIDCategoryKey($uuid, $category, $key) {
    $query = $this->getEntityManager()
      ->createQuery('
          SELECT r FROM VirtualPersistBundle:Record r
          WHERE r.owner_uuid = :uuid AND r.category = :category AND r.key = :key'
      )
      ->setParameter('uuid', $uuid)
      ->setParameter('category', $category)
      ->setParameter('key', $key);

    try {
      return $query->getSingleResult();
    } catch (\Exception $e) {
      // The show must go on.
      return null;
    }
  }

}

