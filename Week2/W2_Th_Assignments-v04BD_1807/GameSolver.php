<?php
require_once "GameGenerator.php";

class GameSolver
{

    function permutation($items, $perms = [],&$ret = []) {
        if (empty($items)) {
            $ret[] = $perms;
        } else {
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $new_items = $items;
                $new_permutations = $perms;
                list($foo) = array_splice($new_items, $i, 1);
                array_unshift($new_permutations, $foo);
                permutation($new_items, $new_permutations,$ret);
            }
        }
        return $ret;
    }

}