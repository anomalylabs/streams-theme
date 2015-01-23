<?php namespace Anomaly\StreamsTheme\Toolbar\Component\Section;

use Anomaly\Streams\Platform\Addon\Module\ModuleCollection;
use Anomaly\Streams\Platform\Support\Resolver;
use Anomaly\StreamsTheme\Toolbar\ToolbarBuilder;

/**
 * Class SectionInput
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\StreamsTheme\Toolbar\Component\Section
 */
class SectionInput
{

    /**
     * The module collection.
     *
     * @var ModuleCollection
     */
    protected $modules;

    /**
     * The section guesser.
     *
     * @var SectionGuesser
     */
    protected $guesser;

    /**
     * The resolver utility.
     *
     * @var Resolver
     */
    protected $resolver;

    /**
     * The section normalizer.
     *
     * @var SectionNormalizer
     */
    protected $normalizer;

    /**
     * Create a new SectionInput instance.
     *
     * @param Resolver          $resolver
     * @param SectionGuesser    $guesser
     * @param ModuleCollection  $modules
     * @param SectionNormalizer $normalizer
     */
    function __construct(
        Resolver $resolver,
        SectionGuesser $guesser,
        ModuleCollection $modules,
        SectionNormalizer $normalizer
    ) {
        $this->guesser    = $guesser;
        $this->modules    = $modules;
        $this->resolver   = $resolver;
        $this->normalizer = $normalizer;
    }

    /**
     * Read the section input and process it
     * before building the objects.
     *
     * @param ToolbarBuilder $builder
     */
    public function read(ToolbarBuilder $builder)
    {
        $this->setInput($builder);
        $this->resolveInput($builder);
        $this->normalizeInput($builder);
        $this->guessInput($builder);
    }

    /**
     * Set the section input from the active module.
     *
     * @param ToolbarBuilder $builder
     */
    protected function setInput(ToolbarBuilder $builder)
    {
        $module = $this->modules->active();

        $builder->setSections($module->getSections());
    }

    /**
     * Resolve the section input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function resolveInput(ToolbarBuilder $builder)
    {
        $builder->setSections($this->resolver->resolve($builder->getSections()));
    }

    /**
     * Normalize the section input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function normalizeInput(ToolbarBuilder $builder)
    {
        $builder->setSections($this->normalizer->normalize($builder->getSections()));
    }

    /**
     * Guess the section input.
     *
     * @param ToolbarBuilder $builder
     */
    protected function guessInput(ToolbarBuilder $builder)
    {
        $builder->setSections($this->guesser->guess($builder->getSections()));
    }
}
