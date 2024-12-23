<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Pais;

#[Route('/usuarios')]
class VistasExampleController extends AbstractController
{
    #[Route('/listado', name: 'app_vistas_example', methods:['GET','POST'])]
    public function index(ParameterBagInterface $param): Response
    {

        //dump($param);

        return $this->render('vistas_example/index.html.twig', [
            'controller_name' => 'VistasExampleController',
            'segunda_variable' => 'Variable Personalizada',
            'elementos' => ['Usuario 1','Usuario 2','Usuario 3','Usuario 4'],
            'titulo' => $param->get('var_ejemplo')
        ]);
    }

    #[Route('/ruta/{valor}', name: 'app_new_route', methods:['GET','POST'])]
    public function new_route(string $valor)
    {
        return $this->render('vistas_example/ejemplo.html.twig', [
            'controller_name' => 'VistasExampleController',
            'valor' => $valor,
            'elementos' => ['Usuario 1','Usuario 2','Usuario 3','Usuario 4']
        ]);
    }

    #[Route('/pais', name: 'app_new_route_example', methods:['GET','POST'])]
    public function connection(EntityManagerInterface $entityManager,ParameterBagInterface $param) {

        $paisesuno = $entityManager->getRepository(Pais::class)->findAll();
        $paisesdos = $entityManager->getRepository(Pais::class)->findBy(array('id'=>1));
        $paisestres = $entityManager->getRepository(Pais::class)->findBy(array('nombre'=>'Italia'));

        //dump($paisesdos);

        return $this->render('vistas_example/index.html.twig', [
            'controller_name' => 'VistasExampleController',
            'segunda_variable' => 'Variable Personalizada',
            'elementos' => ['Usuario 1','Usuario 2','Usuario 3','Usuario 4'],
            'titulo' => $param->get('var_ejemplo')
        ]);

    }
}
