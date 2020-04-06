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
 *
 * @author Narya
 */
interface TemplateExceptionSourceInterface extends TemplateSourceInterface
{
    /**
     * Sets the exception that should help determine the template source
     * @param \Throwable $exception
     * @return $this
     */
    public function setException(\Throwable $exception): self;
}
