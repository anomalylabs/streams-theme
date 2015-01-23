<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Button;

use Anomaly\Streams\Platform\Ui\Button\ButtonFactory;
use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class ButtonBuilder
 *
 * @link    http://anomaly.is/streams-Platform
 * @author  AnomalyLabs, Inc. <hello@anomaly.is>
 * @author  Ryan Thompson <ryan@anomaly.is>
 * @package Anomaly\StreamsTheme\Toolbar\Component\Button
 */
class ButtonBuilder
{

    /**
     * The input reader.
     *
     * @var ButtonInput
     */
    protected $input;

    /**
     * The button factory.
     *
     * @var ButtonFactory
     */
    protected $factory;

    /**
     * Create a new ButtonBuilder instance.
     *
     * @param ButtonInput   $input
     * @param ButtonFactory $factory
     */
    public function __construct(ButtonInput $input, ButtonFactory $factory)
    {
        $this->input   = $input;
        $this->factory = $factory;
    }

    /**
     * Build the buttons.
     *
     * @param ToolbarBuilder $builder
     */
    public function build(ToolbarBuilder $builder)
    {
        $toolbar  = $builder->gettoolbar();
        $buttons  = $toolbar->getButtons();

        $this->input->read($builder);

        foreach ($builder->getButtons() as $button) {
            if (array_get($button, 'enabled', true)) {
                $buttons->push($this->factory->make($button));
            }
        }
    }
}
