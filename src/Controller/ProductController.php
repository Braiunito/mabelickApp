<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", methods={"POST"}, name="product")
     */
    public function show($id): Response
    {
        $materials = [
            [
                'id' => 1,
                'name' => 'Madera',
                'price' => 20.50,
                'id_mercaderia' => 1,
                'provider' => 'Holz',
                'unidad' => 3.5
            ],
            [
                'id' => 1,
                'name' => 'Hierro',
                'price' => 50.30,
                'id_mercaderia' => 1,
                'provider' => 'Holz',
                'unidad' => 2.7
            ]
        ];

        $product = [
            [
                'id' => 1,
                'name' => 'Estante de oficina',
                'code' => 'PH055',
                'alto' => 2.50,
                'ancho' => 1.10,
                'profundo' => 0.50,
                'materials' => $materials
            ],[
                'id' => 3,
                'name' => 'Estante de hogar',
                'code' => 'PH015',
                'alto' => 1.50,
                'ancho' => 2.10,
                'profundo' => 0.30,
                'materials' => $materials
            ],
        ];

        return $this->json($product);
    }
}
