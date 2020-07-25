<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 22.7.20.
 * Time: 10.01
 */

namespace App\Service;

class BuildTree
{

    /**
     * @param array $elements
     * @param int $parentId
     * @return array
     */
    public function tree(array $elements, $parentId = null):array
    {
        $tree = array();
        foreach ($elements as $element) {
            if ($element['parent_entry_id'] == $parentId) {
                unset($element['parent_entry_id']);
                $children = self::tree($elements, $element['entry_id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $tree[] = $element;
            }
        }
        return $tree;
    }

    /**
     * @param array $elements
     * @return array
     */
    public function germanTranslation(array $elements):array
    {
        $unset = [];
        for ($i = 0; $i < count($elements); $i++) {
            for ($j = 0; $j < count($elements); $j++) {
                if(isset($elements[$i]) && isset($elements[$j])){
                    if($elements[$i]['entry_id'] == $elements[$j]['entry_id']
                        && $elements[$i]['parent_entry_id'] == $elements[$j]['parent_entry_id']
                        && $elements[$i]['lang'] !== $elements[$j]['lang']){
                        if(isset($elements[$i]['lang']) && $elements[$i]['lang'] == 'eng'){
                            if(!in_array($i, $unset)){
                                $unset[]=$i;
                            }
                        }
                    }
                }
            }
        }

        foreach ($unset as $key => $val){
            unset($elements[$val]);
        }

        return array_values($elements);
    }

}