<?php

/**
 * Implement your code here
 * Feel free to remove the echos :)
 */

namespace App\TreeView;

Use App\Service\BuildTree;

class MyTreeView extends AbstractTreeView {

    private $build;
    private $data;

    public function __construct(BuildTree $build)
    {
        $this->build = $build;
    }

    public function showCompleteTree(): ?array
    {
        $germanData = $this->build->germanTranslation($this->data);
        return $this->build->tree($germanData);
    }

    public function showAjaxTree(): ?array
    {
        $germanData = $this->build->germanTranslation($this->data);
        return $this->build->tree($germanData);
    }

    public function fetchAjaxTreeNode($entry_id): ?array
    {

    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }
}