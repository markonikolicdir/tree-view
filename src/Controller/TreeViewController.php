<?php

namespace App\Controller;

use App\Repository\TreeEntryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class TreeViewController extends AbstractController
{
    /**
     * @Route("/tree/view", name="tree_view")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TreeEntryRepository $treeEntryRepository)
    {

        $treeEntry = $treeEntryRepository->fetchAllData();

        return $this->render('tree_view/index.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => $treeEntry
        ]);
    }
}
