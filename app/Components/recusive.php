<?php

namespace App\Components;

class Recusive
{
    private $data;
    private $htmlop;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function categoryrecusive($id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                $this->htmlop .=  "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                $this->categoryrecusive($value['id'], $text . '--');
            }
        }
        return $this->htmlop;
    }
}
