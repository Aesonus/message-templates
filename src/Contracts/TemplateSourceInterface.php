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
interface TemplateSourceInterface
{
    /**
     * Returns the template string. This should pull in a template from somewhere
     * like config settings and return it
     * @return string
     */
    public function getTemplate(): string;
}
