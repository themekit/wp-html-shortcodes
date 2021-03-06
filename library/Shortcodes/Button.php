<?php namespace Mosaicpro\WP\Plugins\HGShortcodes;

use Mosaicpro\HtmlGenerators\Button\Button;
use Mosaicpro\WpCore\Shortcode;

/**
 * Class Button_Shortcode
 * @package Mosaicpro\WP\Plugins\HGShortcodes
 */
class Button_Shortcode extends Shortcode
{
    /**
     * Holds a Button_Shortcode instance
     * @var
     */
    protected static $instance;

    /**
     * Add the Shortcode to WP
     */
    public function addShortcode()
    {
        add_shortcode('button', function($atts)
        {
            $atts = shortcode_atts( ['style' => 'default', 'size' => 'default', 'label' => 'Button'], $atts );
            $attributes = [];

            // style
            $attributes['class'] = 'btn-' . $atts['style'];

            // size
            if ($atts['size'] !== false && $atts['size'] !== 'default')
                $attributes['class'] .= ' btn-' . $atts['size'];

            // create button
            return Button::make($atts['label'])->addAttributes($attributes);
        });
    }
}