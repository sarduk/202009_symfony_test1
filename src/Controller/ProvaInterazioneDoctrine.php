<?php

// src/Controller/ProvaInterazioneDoctrine.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Gruppo;
use App\Entity\Utenti;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\Mapping;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


class ProvaInterazioneDoctrine extends AbstractController
{
    
    public function prova_doctrine()
    {

        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(Utenti::class);
        
        $utenti = $repository->findAll();

////////
//QueryBuilder        
        //$qb = $repository->createQueryBuilder('u');
        //$qb = $repository->createQueryBuilder('u')->orderBy('u.nome');
        //$qb = $repository->createQueryBuilder('u')->orderBy('u.nome', 'desc');
        //$qb = $repository->createQueryBuilder('u')->orderBy('RAND');
        //$qb = $repository->createQueryBuilder('u')->orderByRAND();
        //$utenti = $qb->getQuery()->execute();
        /*
https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/faq.html#can-i-sort-by-a-function-for-example-order-by-rand-in-dql
Can I sort by a function (for example ORDER BY RAND()) in DQL?
No, it is not supported to sort by function in DQL. If you need this functionality you should either use a native-query or come up with another solution. As a side note: Sorting with ORDER BY RAND() is painfully slow starting with 1000 rows.
        */

////////
//RAW SQL

/*
        //ERROR: Attempted to call an undefined method named "getEntityManager" of class "App\Controller\ProvaInterazioneDoctrine".
        $conn = $repository->getEntityManager()->getConnection();
        $sql = "SELECT * FROM utenti";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        // returns an array of arrays (i.e. a raw data set)
        $utenti = $stmt->fetchAll();
*/
////////
//DUMMY ARRAY
        /*$utenti = array(
            array('id'=>1,'nome'=>'mario','email'=>'','cognome'=>'','gruppo'=>'',),
            array('id'=>2,'nome'=>'giuseppe','email'=>'','cognome'=>'','gruppo'=>'',),
            array('id'=>3,'nome'=>'camillo','email'=>'','cognome'=>'','gruppo'=>'',),
        );*/
////////

        shuffle($utenti);

        return $this->render('prova_doctrine/lista-utenti.html.twig', [
            'utenti' => $utenti,
        ]);

    }


    public function crea_utenti()
    {
        
        $entityManager = $this->getDoctrine()->getManager();

        $gruppo = new Gruppo();
        $gruppo->setNome('web');

        // tell Doctrine you want to save the Gruppo (no queries yet)
        $entityManager->persist($gruppo);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        $gruppo_id = $gruppo->getId();
        
        foreach(array("A","B","C") as $u){
            $utente = new Utenti();
            $utente->setNome('nome'.$u);
            $utente->setCognome('cognome'.$u);
            $utente->setEmail('cognome'.$u.'@email.it');
            $utente->setGruppo($gruppo);
            // tell Doctrine you want to save the Utenti (no queries yet)
            $entityManager->persist($utente);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }

        return new Response(
            'OK'
        );
    }
    
    
    
    
    
}
