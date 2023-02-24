<?php
namespace EnterV\RSW;

final class StopWords
{
    /**
     * @var  string[]
     */
    public readonly array $data;

    /**
     * @param string[] $data
     */
    public function __construct(
        array $data
    ) {
        foreach ($data as &$word) {
            $word = '/\b' . preg_quote($word, '/') . '\b/iu';
        }
        $this->data = $data;
    }
}