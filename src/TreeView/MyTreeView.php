<?php

/**
 * Implement your code here
 * Feel free to remove the echos :)
 */

namespace App\TreeView;

use App\Repository\TreeEntryRepository;
Use App\Service\BuildTree;

class MyTreeView extends AbstractTreeView {

    private $build;
    private $data;

    private $repo;

    public function __construct(TreeEntryRepository $treeEntryRepository, BuildTree $build)
    {
        $this->build = $build;
        $this->repo = $treeEntryRepository;
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
        $data = $this->repo->fetchLevelData($entry_id);
        $germanData = $this->build->germanTranslation($data);

        foreach ($germanData as $key => $ger){
            $count = $this->repo->countChildren($ger['entry_id']);
            if($count){
                $germanData[$key]['children'] = true;
            }else{
                $germanData[$key]['children'] = false;
            }
            unset($germanData[$key]['parent_entry_id']);
        }

        return $germanData;
    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }
}