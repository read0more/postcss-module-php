<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use PostCssModule\PostCSSModule;

final class PostCSSModuleTest extends TestCase
{
    private $postCSSModule;

    protected function setUp(): void
    {
        $this->postCSSModule = new PostCSSModule(__DIR__ . '/css', __DIR__ . '/json');
    }

    public function testGetTransformedCssInfo(): void
    {
        $transformedCssInfo = $this->postCSSModule->getTransformedCssInfo('cssMock');
        $originalCss = file_get_contents(__DIR__ . '/css/cssMock.css');
        $styles = $transformedCssInfo->classNames;

        $this->assertEquals("<style>$originalCss</style>", $transformedCssInfo->css);
        $this->assertEquals('common2__button___QD0Xb', $styles['button']);
        $this->assertEquals('common2__p___6dle-', $styles['p']);
    }
}