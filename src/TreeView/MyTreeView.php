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
        $germanData = $this->build->germanTranslation($this->data);

//        foreach ($germanData as $key => $ger){
//            $count = $this->db->countChildren($ger['entry_id']);
//            if($count){
//                $germanData[$key]['children'] = true;
//            }else{
//                $germanData[$key]['children'] = false;
//            }
//            unset($germanData[$key]['parent_entry_id']);
//        }

        return $germanData;
    }

    public function setData($data){
        $this->data = $data;
        return $this;
    }
}