<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/geometry/calculator', name: 'app_geometry_calculator.')]
class GeometryCalculatorController extends AbstractController
{
    #[Route('/', name: 'app_geometry_calculator')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller! For Geometry Calculation',
            'path' => 'src/Controller/GeometryCalculatorController.php',
        ]);
    }

    #[Route('/triangle/{a}/{b}/{c}', methods: ['GET'], name: 'triangle')]            
    /**
     * triangle
     *
     * @param  mixed $a
     * @param  mixed $b
     * @param  mixed $c
     * @return JsonResponse
     */
    public function triangle($a, $b, $c): JsonResponse
    {
        $surface = $a * $b * $b;
        $circumference = $a + $b + $b;

        return $this->json([
            'type' => "triangle",
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'surface' => $surface,
            'circumference' => $circumference,
        ]);
    }

    #[Route('/circle/{radius}', methods: ['GET'], name: 'circle')]        
    /**
     * radius
     *
     * @param  mixed $radius
     * @return JsonResponse
     */
    public function circle($radius): JsonResponse
    {
        $pi = 22/7;
        $surface = $pi * $radius^2;
        $circumference = 2 * $pi * $radius;

        return $this->json([
            "type"  => "circle",
            'radius' => $radius,
            'surface' => $surface,
            'circumference' => $circumference,
        ]);
    }
}
