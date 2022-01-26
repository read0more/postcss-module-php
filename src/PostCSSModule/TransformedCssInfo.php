<?php

namespace PostCSSModule;

class TransformedCssInfo
{
    /**
     * @var string
     */
    public string $css;

    /**
     * @var string[]
     */
    public array $classNames;

    /**
     * @param string $css
     * @param string[] $classNames
     */
    public function __construct(string $css, array $classNames)
    {
        $this->css = $css;
        $this->classNames = $classNames;
    }
}