<?php namespace Anomaly\StreamsTheme\Toolbar;

use Illuminate\Support\Collection;

/**
 * Class Toolbar
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar
 */
class Toolbar
{

    /**
     * The section buttons.
     *
     * @var Collection
     */
    protected $buttons;

    /**
     * The module sections.
     *
     * @var Collection
     */
    protected $sections;

    /**
     * Create a new Toolbar instance.
     *
     * @param Collection $buttons
     * @param Collection $sections
     */
    function __construct(Collection $buttons, Collection $sections)
    {
        $this->buttons  = $buttons;
        $this->sections = $sections;
    }

    /**
     * Get the section buttons.
     *
     * @return Collection
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * Get the module sections.
     *
     * @return Collection
     */
    public function getSections()
    {
        return $this->sections;
    }
}
