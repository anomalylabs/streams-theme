<?php namespace Anomaly\StreamsTheme\Toolbar;

use Anomaly\StreamsTheme\Toolbar\Command\BuildToolbar;
use Illuminate\Foundation\Bus\DispatchesCommands;

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
     * Build the table.
     */
    public function build()
    {
        $this->dispatch(new BuildToolbar($this));
    }

    /**
     * Make the table response.
     */
    public function make()
    {
        $this->build();

        $this->table->setContent(
            view($options->get('table_view', 'streams::ui/table/index'), $data)
        );
    }

    /**
     * Render the table.
     *
     * @return View|Response
     */
    public function render()
    {
        $this->make();

        if ($this->table->getResponse() === null) {

            $options = $this->table->getOptions();
            $content = $this->table->getContent();

            return view($options->get('wrapper_view', 'streams::blank'), compact('content'));
        }

        return $this->table->getResponse();
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
