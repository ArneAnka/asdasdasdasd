<?php

namespace App\Extensions\Markdown;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

class AddListStyleClassesExtension implements ExtensionInterface
{
    public function register(ConfigurableEnvironmentInterface $environment): void
    {
        $environment
            ->addEventListener(DocumentParsedEvent::class, new AddListStyleClassesRenderer());
    }
}
