<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07/08/2016
 * Time: 20:13
 */

namespace Api\BracketBundle\Twig;


class HtmldecodeExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter(
                'htmlEntityDecode',
                array($this, 'htmlEntityDecode'), array('is_safe' => array('html')))
        );
    }

    public function htmlEntityDecode($html)
    {
        $html = html_entity_decode($html);
        return $html;
    }

    public function getName()
    {
        return 'HtmldecodeExtension_extension';
    }
}