<?php

declare(strict_types=1);

namespace Codenames\Dictionary;

class Dictionary
{
    /** @var array */
    private $words = [
        'art',
        'article',
        'bathroom',
        'client',
        'county',
        'diamond',
        'drawing',
        'elevator',
        'history',
        'inspection',
        'internet',
        'news',
        'organization',
        'payment',
        'phone',
        'player',
        'poem',
        'poet',
        'presentation',
        'refrigerator',
        'revolution',
        'salad',
        'trainer',
        'video',
        'writer',
    ];

    /**
     * Get the words of the dictionary.
     *
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }
}
