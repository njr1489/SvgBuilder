SvgBuilder
==========

SVG Builder is a simple SVG renderer for PHP 5.3. To create an SVG out of these classes, all you need to do is instantiate an \SvgBuilder\Svg object by optionally passing instances \SvgBuilder\Svg\Options, \SvgBuilder\Svg\Attribute\Collection, and \Svg\Element\Collection respectively. These classes are immutable so that is prevents the elements from being changed, aside from indentation. The created SVG object has a render function which will return the SVG as a string. Here is an example of it in action:

```php
    $attributeArray = array(
        new \SvgBuilder\Element\Attribute('width', 150),
        new \SvgBuilder\Element\Attribute('height', 100)
    );
    
    $elementAttributeArray = array(
        new \SvgBuilder\Element\Attribute('style', 'fill:rgb(50, 50, 50)'),
        new \SvgBuilder\Element\Attribute('width', 150),
        new \SvgBuilder\Element\Attribute('height', 100)
    );
    $elementArray = array(
        new \SvgBuilder\Element('rect', new \SvgBuilder\Element\Attribute\Collection($elementAttributeArray))
    );

    // SVG options
    $options = new \SvgBuilder\Svg\Options(
        '<?xml version="1.0" encoding="UTF-8" standalone="no" ?>',
        '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'
    );
    
    // SVG attributes
    $attributes = new \SvgBuilder\Element\Attribute\Collection($attributeArray);
    
    // SVG elements
    $elements = new \SvgBuilder\Element\Collection($elementArray);

    // End result
    $svg = new \SvgBuilder\Svg($options, $attributes, $elements);
    echo($svg); // This uses __toString so it is the same as calling $svg->render();
```
