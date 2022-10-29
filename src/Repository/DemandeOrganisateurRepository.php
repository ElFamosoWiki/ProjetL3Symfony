<?php

namespace App\Repository;

use App\Entity\DemandeOrganisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DemandeOrganisateur>
 *
 * @method DemandeOrganisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemandeOrganisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemandeOrganisateur[]    findAll()
 * @method DemandeOrganisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemandeOrganisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DemandeOrganisateur::class);
    }

    public function save(DemandeOrganisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DemandeOrganisateur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DemandeOrganisateur[] Returns an array of DemandeOrganisateur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DemandeOrganisateur
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
