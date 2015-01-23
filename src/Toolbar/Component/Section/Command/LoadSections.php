<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section\Command;

use Anomaly\StreamsTheme\Toolbar\Toolbar;

/**
 * Class LoadSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section\Command
 */
class LoadSections
{

    /**
     * The toolbar object.
     *
     * @var Toolbar
     */
    protected $toolbar;

    /**
     * Create a new LoadSections instance.
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
