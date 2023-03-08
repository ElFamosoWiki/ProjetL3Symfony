<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Event>
 *
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function save(Event $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Event $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function ckIfInscritExist(int $idUser,int $idEvent): bool
    {
        $query = $this->createQueryBuilder('e')
        ->select('count(e.id)')
        ->innerJoin('e.users', 'u', 'WITH', 'u.id = :idUser')
        ->setParameter('idUser', $idUser)
        ->andWhere('e.id = :idEvent')
        ->setParameter('idEvent', $idEvent)
        ->getQuery()
        ->getSingleScalarResult();




        $ifInscritExist = false;
        if($query !== 0){
            $ifInscritExist = true;
        }

        return $ifInscritExist;

    }
    public function findEventDemande(): array
    {
        return $this->createQueryBuilder('e')
        ->where('e.accept = 0')
        ->getQuery()
        ->getResult();

    }
    public function findEventDemandeMontrer($id): event
    {
        return $this->createQueryBuilder('e')
        ->where('e.accept = 0')
        ->andWhere('e.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();

    }
    public function findEventAcc(): array
    {
        return $this->createQueryBuilder('e')
        ->where('e.accept = 1')
        ->getQuery()
        ->getResult();

    }
    public function findEvent(int $idEvent): event
    {
        $query = $this->createQueryBuilder('e')
        ->where('e.id = :idEvent')
        ->setParameter('idEvent', $idEvent)
        ->getQuery()
        ->getArrayResult();

 

        return $query;

    }
    

    public function findAllWithFilters($filters): array
  {
    $qb = $this->createQueryBuilder('e');

    if (array_key_exists('search', $filters)
      && $filters['search'] !== ''){
      $qb->andWhere('e.nomEvent LIKE :searchv OR e.description LIKE :searchv')
        ->setParameter('searchv', '%'.$filters['search'].'%');
    }
    if (array_key_exists('sort', $filters)
      && $filters['sort'] !== ''){
    if ($filters['sort'] == 'popularity'){
        $qb->orderBy('e.nbInscrit', 'DESC');
    }
    else{
        $qb->orderBy('e.datedebut', $filters['sort']);
    }
    }
    else{
        $qb->orderBy('e.nbInscrit', 'DESC');
    }
    

    return $qb->getQuery()->getResult();
}
public function eventPop(): array
{
  $qb = $this->createQueryBuilder('e');
      $qb->orderBy('e.nbInscrit', 'DESC');
      $qb->setMaxResults(6);



  return $qb->getQuery()->getResult();
}
public function eventProche(): array
{
  $qb = $this->createQueryBuilder('e');
  $qb->orderBy('e.datedebut', 'DESC');
  $qb->setMaxResults(6);


  return $qb->getQuery()->getResult();
}

//    /**
//     * @return Event[] Returns an array of Event objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Event
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
