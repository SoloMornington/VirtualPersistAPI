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
class RecordRepsitory extends EntityRepository {

  public function findOneByUUIDCategoryKey($uuid, $category, $key) {
    $query = $this->getEntityManager()
            ->createQuery('
              SELECT r FROM VirtualPersistBundle:Record r
              WHERE r.owner_uuid = :uuid AND r.category = :category AND r.aKey = :key'
            )
            ->setParameter('uuid', $uuid)
            ->setParameter('category', $category)
            ->setParameter('key', $key);
    try {
      $result = $query->getSingleResult();
      return $result;
    } catch (\Exception $e) {
      // The show must go on.
      return null;
    }
  }

  public function findAllByUUIDCategoryKey($uuid, $category, $key) {
    $query = $this->getEntityManager()
            ->createQuery('
              SELECT r FROM VirtualPersistBundle:Record r
              WHERE r.owner_uuid = :uuid AND r.category = :category AND r.aKey = :key'
            )
            ->setParameter('uuid', $uuid)
            ->setParameter('category', $category)
            ->setParameter('key', $key);

    try {
      return $query->getResult();
    } catch (\Exception $e) {
      // The show must go on.
      return null;
    }
  }

  public function categoriesForUUID($uuid) {
    $query = $this->getEntityManager()
            ->createQuery('
        SELECT DISTINCT r.category FROM VirtualPersistBundle:Record r
        WHERE r.owner_uuid = :uuid'
            )
            ->setParameter('uuid', $uuid);
    try {
      return $query->getResult();
    } catch (\Exception $e) {
      return null;
    }
  }

  public function keysForUUIDCategory($uuid, $category) {
    $query = $this->getEntityManager()
            ->createQuery('
        SELECT DISTINCT r.aKey FROM VirtualPersistBundle:Record r
        WHERE r.owner_uuid = :uuid AND r.category = :category'
            )
            ->setParameter('uuid', $uuid)
            ->setParameter('category', $category);
    try {
      return $query->getResult();
    } catch (\Exception $e) {
      return null;
    }
  }
  
  public function uniqueCategories() {
    $query = $this->getEntityManager()
      ->createQuery('
        SELECT DISTINCT r.category FROM VirtualPersistBundle:Record r
      ');
    try {
      return $query->getResult();
    } catch (\Exception $e) {
      return null;
    }
  }

  /*  public function deleteUUIDCategoryKey($uuid, $category, $key) {
    $query = $this->getEntityManager()
    ->createQuery('
    DELETE VirtualPersistBundle:Record r
    WHERE r.owner_uuid = :uuid AND r.category = :category AND r.aKey = :key'
    )
    ->setParameter('uuid', $uuid)
    ->setParameter('category', $category)
    ->setParameter('key', $key)
    ->execute();
    } */
}

