<?php

namespace App\Services;

/**
 * At the moment this class is used as reference
 */
final class TreeService
{
    public static function buildTree($nodes): array
    {
        $tree = [];

        $traverse = function ($nodes) use (&$traverse) {
            $branch = [];

            foreach ($nodes as $node) {
                $name = $node->name;
                $branch[$name] = [];

                $branch[$name] = $traverse($node->children);
            }

            return $branch;
        };

        return $traverse($nodes);
    }
}
