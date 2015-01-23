<?php namespace Anomaly\StreamsTheme\Toolbar;

use Anomaly\StreamsTheme\Toolbar\Command\BuildToolbar;
use Anomaly\StreamsTheme\Toolbar\Command\LoadToolbar;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class ToolbarBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar
 */
class ToolbarBuilder
{

    use DispatchesCommands;

    /**
     * The section buttons.
     *
     * @var array
     */
    protected $buttons = [];

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * The toolbar object.
     *
     * @var Toolbar
     */
    protected $toolbar;

    /**
     * Create a new ToolbarBuilder instance.
     *
     * @param Toolbar $toolbar
     */
    public function __construct(Toolbar $toolbar)
    {
        $this->toolbar = $toolbar;
    }

    /**
     * Build the toolbar.
     */
    public function build()
    {
        $this->dispatch(new BuildToolbar($this));
    }

    /**
     * Make the toolbar.
     */
    public function make()
    {
        $this->dispatch(new LoadToolbar($this->toolbar));
    }

    /**
     * Render the toolbar.
     *
     * @return View|Response
     */
    public function render()
    {
        $this->build();
        $this->make();

        $data = $this->toolbar->getData();

        return view('theme::partials/toolbar', $data);
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

    /**
     * Get the section buttons.
     *
     * @return array
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * Set the section buttons.
     *
     * @param array $buttons
     */
    public function setButtons($buttons)
    {
        $this->buttons = $buttons;
    }

    /**
     * Get the module sections.
     *
     * @return array
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param array $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }
}
