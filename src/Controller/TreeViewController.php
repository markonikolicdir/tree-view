<?php

namespace App\Controller;

use App\Repository\TreeEntryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\TreeView\MyTreeView;


class TreeViewController extends AbstractController
{
    /**
     * @Route("/", name="tree_viewA")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TreeEntryRepository $treeEntryRepository, MyTreeView $myTreeView)
    {
        $data = $treeEntryRepository->fetchAllData();
        $treeEntry = $myTreeView->setData($data)->showCompleteTree();

        return $this->render('tree_view/index.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => json_encode($treeEntry)
        ]);
    }

    /**
     * @Route("/ajax", name="tree_viewB")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajax(TreeEntryRepository $treeEntryRepository, MyTreeView $myTreeView)
    {
        $data = $treeEntryRepository->fetchLevelData();
        $treeEntry = $myTreeView->setData($data)->showAjaxTree();

        return $this->render('tree_view/ajax.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => $treeEntry
        ]);
    }
}
