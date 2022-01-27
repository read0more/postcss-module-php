<?php

namespace PostCSSModule;

class Transformer
{

    /**
     * @var string
     */
    private string $transformedCssPath;
    /**
     * @var string
     */
    private string $jsonPath;

    /**
     * @param string $transformedCssPath
     * @param string $jsonPath
     */
    public function __construct(string $transformedCssPath, string $jsonPath)
    {
        $this->transformedCssPath = rtrim($transformedCssPath, '\\/ ') . DIRECTORY_SEPARATOR;
        $this->jsonPath = rtrim($jsonPath, '\\/ ') . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $jsonPath
     * @return mixed
     */
    private function getTransformedClasses(string $jsonPath = '')
    {
        $json = @file_get_contents($jsonPath);
        return json_decode($json, true);
    }

    /**
     * @param string $css
     * @param string[] $variables
     * @return TransformedCssInfo
     */
    public function getTransformedCssInfo(string $css, array $variables = []): TransformedCssInfo
    {
        $fileExt = pathinfo($css, PATHINFO_EXTENSION);
        $css = empty($fileExt) ? $css . '.css' : $css;
        $json = "$css.json";
        $cssPath = $this->transformedCssPath . $css;
        $jsonPath = $this->jsonPath . $json;

        $css = (function ($fullPath, $variables): string {
            extract($variables);
            ob_start();
            include $fullPath;
            return ob_get_clean() ?: '';
        })($cssPath, $variables);

        return new TransformedCssInfo("<style>$css</style>", self::getTransformedClasses($jsonPath));
    }
}