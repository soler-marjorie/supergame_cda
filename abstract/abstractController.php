<?php

abstract class AbstractController {
    private ?ViewHeader $header;
    private ?ViewFooter $footer;
    private ?InterfaceModel $model;

    public function __construct(ViewHeader $header, ViewFooter $footer, InterfaceModel $model) {
        $this->header = $header;
        $this->footer = $footer;
        $this->model = $model;
    }

    /**
     * Get the value of header
     */
    public function getHeader(): ?ViewHeader
    {
        return $this->header;
    }

    /**
     * Set the value of header
     */
    public function setHeader(?ViewHeader $header): self
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get the value of footer
     */
    public function getFooter(): ?ViewFooter
    {
        return $this->footer;
    }

    /**
     * Set the value of footer
     */
    public function setFooter(?ViewFooter $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get the value of model
     */
    public function getModel(): ?InterfaceModel
    {
        return $this->model;
    }

    /**
     * Set the value of model
     */
    public function setModel(?InterfaceModel $model): self
    {
        $this->model = $model;

        return $this;
    }

    abstract public function render();
}