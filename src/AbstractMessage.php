<?php
/*
 * The software is Copyright (C)2019 by Digital Architects
 * The software includes all the files in the directory this file is located
 * This software makes use of open source software. Such software is governed
 * by their respective licenses
 * All Rights Reserved
 */
namespace Aesonus\Messages;

use Aesonus\Messages\Contracts\MessageInterface;
use Aesonus\Messages\Contracts\TemplateSourceInterface;

/**
 * Description of AbstractMessage
 *
 * @author Narya
 */
abstract class AbstractMessage implements MessageInterface
{
    /**
     *
     * @var TemplateSourceInterface
     */
    protected $source;
    
    public function setSource(TemplateSourceInterface $source): MessageInterface
    {
        $this->source = $source;
        return $this;
    }
}
