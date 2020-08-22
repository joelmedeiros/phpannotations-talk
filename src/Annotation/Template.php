<?php declare(strict_types=1);

namespace App\Annotation;

class Template
{
    public $label;
    public $tag;

    public function __construct($label, $tag)
    {
        $this->label = $label;
        $this->tag = $tag;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getTag()
    {
        return $this->tag;
    }
}