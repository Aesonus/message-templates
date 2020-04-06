<?php
/*
 * The software is Copyright (C)2019 by Digital Architects
 * The software includes all the files in the directory this file is located
 * This software makes use of open source software. Such software is governed
 * by their respective licenses
 * All Rights Reserved
 */
namespace Aesonus\Messages\Contracts;

/**
 * Renders the message from the given source
 * @author Narya
 */
interface RenderMessageInterface
{
    /**
     * Renders the message from source
     * @param mixed $data Data to pass along to the rendering
     * @return string
     */
    public function render($data = null): string;
    
    /**
     * Sets the source of the template
     * @param TemplateSourceInterface $source
     * @return $this
     */
    public function setSource(TemplateSourceInterface $source): self;
}
