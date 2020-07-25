<?php

/**
 * Implement your code here
 * Feel free to remove the echos :)
 */

namespace App\TreeView;

Use App\Service\BuildTree;

class MyTreeView extends AbstractTreeView {

    private $build;

    public function __construct(BuildTree $build)
    {
        $this->build = $build;
    }

    public function showCompleteTree(): ?array
    {

    }

    public function showAjaxTree(): ?array
    {

    }

    public function fetchAjaxTreeNode($entry_id): ?array
    {

    }
}