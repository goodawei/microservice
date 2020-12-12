<?php
/**
 * Created by PhpStorm.
 * User: lihongwei
 * Date: 2020-12-07
 * Time: 11:51
 */

namespace App\Facade;
use Goods\Rpc\Tag\TagServiceIf;

class Tag implements TagServiceIf
{
    public function name($name)
    {
        return json_encode([
            'tag is test'. $name
        ]);
    }

    public function save($tag)
    {
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'data' => $tag
        ]);
    }

    public function get($tag)
    {
        return json_encode([
            'code' => 200,
            'msg' => 'success',
            'data' => $tag
        ]);
    }
}