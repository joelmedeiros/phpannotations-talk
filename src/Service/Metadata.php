<?php declare(strict_types=1);

namespace App\Service;

class Metadata 
{
    private string $class;
    private array $metaTags;

    public function __construct(string $class)
    {
        $this->class = $class;
        $this->setMetaTags();
    }

    public function setMetaTags(): void
    {
        $ref = new \ReflectionClass($this->class);
        
        $metaTags = [];
        /** @var $method ReflectionMethod */
        foreach($ref->getMethods() as $method) {
            $metaTags[] = array_combine(["label", "tag"], $method->getAttributes()[0]->getArguments());
        }
        
        $this->metaTags = $metaTags;
    }

    public function getMetaTags(): array
    {
        return $this->metaTags;
    }

    public function process(string $input): string
    {
        $metaTags = $this->getMetaTags();
        $tags = array_map(function(array $metaTag) { return $metaTag['tag']; }, $metaTags);
        
        $output = $input;
        foreach ($tags as $tag) {
            $method = "get" . ucfirst($tag);
            $fields = new $this->class();
            if (method_exists($fields, $method)) {
                $output = str_replace("%$tag%", $fields->{$method}(), $output);
            }
        }

        return $output;
    }
}