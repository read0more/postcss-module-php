<?php declare(strict_types=1);

namespace PostCSSModule\Test;
use PHPUnit\Framework\TestCase;
use PostCSSModule\Transformer;

final class PostCSSModuleTest extends TestCase
{
    private $transformer;

    protected function setUp(): void
    {
        $this->transformer = new Transformer(__DIR__ . '/css', __DIR__ . '/json');
    }

    public function testGetTransformedCssInfo(): void
    {
        $transformedCssInfo = $this->transformer->getTransformedCssInfo('cssMock');
        $originalCss = file_get_contents(__DIR__ . '/css/cssMock.css');
        $styles = $transformedCssInfo->classNames;

        $this->assertEquals("<style>$originalCss</style>", $transformedCssInfo->css);
        $this->assertEquals('common2__button___QD0Xb', $styles['button']);
        $this->assertEquals('common2__p___6dle-', $styles['p']);
    }
}