<?php

namespace PHPGit\Command;

use PHPGit\Command;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Show various types of objects - `git show`
 *
 * @author Kazuyuki Hayashi
 */
class DiffCommand extends Command
{

    public function __invoke($file, array $options = array())
    {
        $options = $this->resolve($options);
        $builder = $this->git->getProcessBuilder()
            ->add('diff');

        $this->addFlags($builder, $options);


        $builder->add($file);

        return $this->git->run($builder->getProcess());
    }

    /**
     * {@inheritdoc}
     *
     * - **format**        (_string_)  Pretty-print the contents of the commit logs in a given format, where <format> can be one of oneline, short, medium, full, fuller, email, raw and format:<string>
     * - **abbrev-commit** (_boolean_) Instead of showing the full 40-byte hexadecimal commit object name, show only a partial prefix
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
		$resolver->setDefaults(array(
            'cached'    => false
        ));
    }

}