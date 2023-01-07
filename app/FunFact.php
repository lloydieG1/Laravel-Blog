<?php

namespace App;

class FunFact
{
    private $apiKey;
    public $facts = array(
        'Did you know that the shortest war in history was between Britain and Zanzibar on 27 August 1896? The conflict lasted only 38 minutes.',
        'Did you know that kangaroos cant walk backwards?',
        'Did you know that avocados are fruit?',
        'Did you know that the worlds oldest cat lived to be 38 years old?',
        'Did you know that a group of flamingos is called a "flamboyance"?',
        'Did you know that the longest word in the English language is pneumonoultramicroscopicsilicovolcanoconiosis?',
        'Did you know that honey never spoils?',
        'Did you know that the worlds largest snowflake on record was 15 inches wide and 8 inches thick?',
        'Did you know that the worlds oldest tree is over 5,000 years old?',
        'Did you know that the Great Barrier Reef is the worlds largest living structure, visible from space?'
    );

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getFact() {
        $fact = $this->facts[array_rand($this->facts)];

        return $fact;
    }
}
