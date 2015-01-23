<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Button;

use Anomaly\Streams\Platform\Support\Resolver;
use Anomaly\Streams\Platform\Ui\Button\ButtonNormalizer;
use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;
use Illuminate\Support\Collection;

/**
 * Class ButtonInput
 *
 * @link          http://anomaly.is/streams-Platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Button
 */
class ButtonInput
{

    /**
     * The button guesser.
     *
     * @var ButtonGuesser
     */
    protected $guesser;

    /**
     * The resolver utility.
     *
     * @var Resolver
     */
    protected $resolver;

    /**
     * The button normalizer.
     *
     * @var ButtonNormalizer
     */
    protected $normalizer;

    /**
     * Create a new ButtonInput instance.
     *
     * @param Resolver         $resolver
     * @param ButtonGuesser    $guesser
     * @param ButtonNormalizer $normalizer
     */
    public function __construct(Resolver $resolver, ButtonGuesser $guesser, ButtonNormalizer $normalizer)
    {
        $this->guesser    = $guesser;
        $this->resolver   = $resolver;
        $this->normalizer = $normalizer;
    }

    /**
     * Read builder button input.
     *
     * @param ToolbarBuilder $builder
     * @return array
     */
    public function read(ToolbarBuilder $builder)
    {
        $this->setInput($builder);
        $this->resolveInput($builder);
        $this->normalizeInput($builder);
        $this->guessInput($builder);
    }

    /**
     * Set the actual input from the active section.
     *
     * @param ToolbarBuilder $builder
     */
    protected function setInput(ToolbarBuilder $builder)
    {
        $toolbar  = $builder->getToolbar();
        $sections = $toolbar->getSections();
        $section  = $sections->active();

        $builder->setButtons($section->getButtons());
    }

    /**
     * Resolve the button input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function resolveInput(ToolbarBuilder $builder)
    {
        $builder->setButtons($this->resolver->resolve($builder->getButtons()));
    }

    /**
     * Normalize the button input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function normalizeInput(ToolbarBuilder $builder)
    {
        $builder->setButtons($this->normalizer->normalize($builder->getButtons()));
    }

    /**
     * Guess the button input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function guessInput(ToolbarBuilder $builder)
    {
        $builder->setButtons($this->guesser->guess($builder->getButtons()));
    }
}
