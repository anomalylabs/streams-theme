<?php namespace Anomaly\StreamsTheme\Toolbar;

use Anomaly\StreamsTheme\Toolbar\Component\Section\SectionCollection;
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
     * The toolbar content.
     *
     * @var null|string
     */
    protected $content = null;

    /**
     * The view data.
     *
     * @var Collection
     */
    protected $data;

    /**
     * The section buttons.
     *
     * @var Collection
     */
    protected $buttons;

    /**
     * The module sections.
     *
     * @var SectionCollection
     */
    protected $sections;

    /**
     * Create a new Toolbar instance.
     *
     * @param Collection        $data
     * @param Collection        $buttons
     * @param SectionCollection $sections
     */
    function __construct(Collection $data, Collection $buttons, SectionCollection $sections)
    {
        $this->data     = $data;
        $this->buttons  = $buttons;
        $this->sections = $sections;
    }

    /**
     * Get the view data.
     *
     * @return Collection
     */
    public function getData()
    {
        return $this->data;
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
     * @return SectionCollection
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Set the toolbar content.
     *
     * @param null|string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
