<?php

namespace App\Controller;

use App\Repository\TreeEntryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\TreeView\MyTreeView;


class TreeViewController extends AbstractController
{
    /**
     * @Route("/", name="tree_view_a")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function treeA(TreeEntryRepository $treeEntryRepository, MyTreeView $myTreeView)
    {
        $data = $treeEntryRepository->fetchAllData();
        $treeEntry = $myTreeView->setData($data)->showCompleteTree();

        return $this->render('tree_view/index.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => json_encode($treeEntry)
        ]);
    }

    /**
     * @Route("/taskb", name="tree_view_b")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function treeB(TreeEntryRepository $treeEntryRepository, MyTreeView $myTreeView)
    {
        $data = $treeEntryRepository->fetchLevelData();
        $treeEntry = $myTreeView->setData($data)->showAjaxTree();

        return $this->render('tree_view/ajax.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => $treeEntry
        ]);
    }

    /**
     * @Route("/ajax", name="ajax")
     * @param TreeEntryRepository $treeEntryRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajax(TreeEntryRepository $treeEntryRepository, MyTreeView $myTreeView, Request $request)
    {
        $id = $request->request->get('entry_id');
        $data = $treeEntryRepository->fetchLevelData($id);
        $treeEntry = $myTreeView->setData($data)->showAjaxTree();

        return $this->json($treeEntry);
    }
}
