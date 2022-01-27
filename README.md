# PostCSS-module-php

Get CSS classname transformed by postCSS-module using the json file that comes out when transforming postCSS-module.
```
use PostCSSModule\Transformer;

$cssPath = '/css';
$jsonPathFromPostCSSModule = '/json';
$transformer = new Transformer($cssPath, $jsonPathFromPostCSSModule);

// css filename in $cssPath
$cssName = 'button';
$transformer->getTransformedCssInfo($cssName);

// You can get transformed class name.
// e.g. $transformedClassNames['button'] you can get transformed class name "button"
$transformedClassNames = $transformedCssInfo->classNames;
```