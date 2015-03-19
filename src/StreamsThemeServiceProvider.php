<?php namespace Anomaly\StreamsTheme;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class StreamsThemeServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme
 */
class StreamsThemeServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\StreamsTheme\StreamsThemePlugin'
    ];

}
 