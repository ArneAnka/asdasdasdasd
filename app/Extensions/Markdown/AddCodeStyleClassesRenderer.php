<?php

namespace App\Extensions\Markdown;

use League\CommonMark\EnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Inline\Element\Code;

class AddCodeStyleClassesRenderer
{

    /**
     * @param DocumentParsedEvent $e
     *
     * @return void
     */
    public function __invoke(DocumentParsedEvent $e)
    {
        $walker = $e->getDocument()->walker();

        while ($event = $walker->next()) {
            $node = $event->getNode();
            if ($node instanceof Code) {
                $node->data['attributes'] = array('class' => '');
            }
        }
    }
}
