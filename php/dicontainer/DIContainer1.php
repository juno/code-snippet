<?php
// DIContainer.php

class DIContainer
{
    protected $componentFactory;
    function __construct(ComponentFactory $c)
    {
        $this->componentFactory = $c;
        $c->accept($this);
    }

    function get($name)
    {
        if (!isset($this->objects[$name])) {
            $this->objects[$name] = $this->componentFactory->get($name);
        }

        return $this->objects[$name];
    }
}

abstract class ComponentFactory
{
    protected $container;
    function get($name)
    {
        return $this->{'build' . $name}();
    }

    function accept(DIContainer $c)
    {
        $this->container = $c;
    }
}
