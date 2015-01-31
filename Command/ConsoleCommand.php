<?php

namespace Zayass\BorisBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Boris\Boris;

/**
 * Integrates REPL into symfony console
 */
class ConsoleCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('shell')
            ->setAliases(array('console'))
            ->setDescription('Open boris REPL in application context');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $app = $this->getApplication();
        $kernel = $app->getKernel();
        $container = $kernel->getContainer();

        $app->setCatchExceptions(false);

        $boris = new Boris();
        $boris->setPrompt($this->getPrompt());
        $boris->setLocal(array(
                'app' => $app,
                'kernel' => $kernel,
                'container' => $container,
            ) + $this->getServices());

        $boris->start();
    }

    /**
     * @return string
     */
    private function getPrompt()
    {
        return $this->getAppName() . '> ';
    }

    /**
     * Name is application-name + application-version
     *
     * @return string
     */
    private function getAppName()
    {
        $app = $this->getApplication();

        return $app->getName() . '-' . $app->getVersion();
    }
}