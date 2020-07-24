<?php

/**
 * Implement your code here
 * Feel free to remove the echos :)
 */

namespace TreeView;

use Service\TreeViewStorageInterface;
Use Service\BuildTree;

class MyTreeView extends AbstractTreeView {

    private $db;
    private $build;

    /**
     * MyTreeView constructor.
     * @param TreeViewStorageInterface $db
     * @param BuildTree $build
     */
    public function __construct(TreeViewStorageInterface $db, BuildTree $build)
    {
        $this->db = $db;
        $this->build = $build;
    }

    public function showCompleteTree(): ?array
    {
        $data = $this->db->fetchAllData();
        $germanData = $this->build->germanTranslation($data);
        return $this->build->tree($germanData);
    }

    public function showAjaxTree(): ?array
    {
        $data = $this->db->fetchLevelData();
        $germanData = $this->build->germanTranslation($data);
        return $this->build->tree($germanData);
    }

    public function fetchAjaxTreeNode($entry_id): ?array
    {
        $data = $this->db->fetchLevelData($entry_id);
        $germanData = $this->build->germanTranslation($data);

        foreach ($germanData as $key => $ger){
            $count = $this->db->countChildren($ger['entry_id']);
            if($count){
                $germanData[$key]['children'] = true;
            }else{
                $germanData[$key]['children'] = false;
            }
            unset($germanData[$key]['parent_entry_id']);
        }

        return $germanData;
    }
}