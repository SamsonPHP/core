<?php
namespace samsonphp\core;

/**
 * SamsonPHP Module
 *
 * @author Vitaly Iegorov <egorov@samsonos.com>
 */
abstract class Module implements ModuleInterface
{
    /**
     * Module configuration stage
     * @param ContainerInterface $container
     */
    abstract public function configure(ContainerInterface $container);

    /**
     * Module preparation stage
     */
    public function prepare()
    {

    }

    /**
     * Module initialization stage
     */
    public function init()
    {

    }
}
