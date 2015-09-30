<?php

namespace AppBundle\Form\Transformer;

/**
 * Class HtmlTransformer
 */
class HtmlTransformer implements \Symfony\Component\Form\DataTransformerInterface
{

    public function transform($value)
    {
        return htmlspecialchars_decode($value);
    }

    public function reverseTransform($value)
    {
        return htmlspecialchars($value);
    }
}
