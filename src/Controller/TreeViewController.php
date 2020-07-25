<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\TreeView\MyTreeView;


class TreeViewController extends AbstractController
{

    private $myTreeView;

    public function __construct(MyTreeView $myTreeView)
    {
        $this->myTreeView = $myTreeView;
    }

    /**
     * @Route("/", name="tree_view_a")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function treeA()
    {
        $treeEntry = $this->myTreeView->showCompleteTree();

        return $this->render('tree_view/index.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => json_encode($treeEntry)
        ]);
    }

    /**
     * @Route("/taskb", name="tree_view_b")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function treeB()
    {
        $treeEntry = $this->myTreeView->showAjaxTree();

        return $this->render('tree_view/ajax.html.twig', [
            'controller_name' => 'TreeViewController',
            'treeEntry' => $treeEntry
        ]);
    }

    /**
     * @Route("/ajax", name="ajax")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajax(Request $request)
    {
        $id = $request->request->get('entry_id');
        $treeEntry = $this->myTreeView->fetchAjaxTreeNode($id);

        return $this->json($treeEntry);
    }
}
