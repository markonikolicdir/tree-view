<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\BuildTree;

class TreeViewController extends AbstractController
{
    /**
     * @Route("/tree/view", name="tree_view")
     */
    public function index()
    {
        return $this->render('tree_view/index.html.twig', [
            'controller_name' => 'TreeViewController',
        ]);
    }
}
