<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NumberFormatterController extends Controller
{
    /**
     * @Route("/number/formatter", name="number_formatter")
     */
    public function index()
    {
        return $this->render('number_formatter/index.html.twig', [
            'controller_name' => 'NumberFormatterController',
        ]);
    }
}
