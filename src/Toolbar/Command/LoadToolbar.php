<?php namespace Anomaly\StreamsTheme\Toolbar\Command;

use Anomaly\StreamsTheme\Toolbar\Toolbar;

/**
 * Class LoadToolbar
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Command
 */
class LoadToolbar
{

    /**
     * The toolbar object.
     *
     * @var Toolbar
     */
    protected $toolbar;

    /**
     * Create a new LoadToolbar instance.
     *
     * @param Toolbar $toolbar
     */
    public function __construct(Toolbar $toolbar)
    {
        $this->toolbar = $toolbar;
    }

    /**
     * Get the toolbar.
     *
     * @return Toolbar
     */
    public function getToolbar()
    {
        return $this->toolbar;
    }
}
