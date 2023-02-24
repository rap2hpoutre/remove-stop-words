<?php
namespace EnterV\RSW;

final class RemoveStopWords
{
    private StopWords $stopWords;
    public function __construct(
        private string|array $words,
        private Langs $lang = Langs::EN
    ) {
        $path = __DIR__ . "/data/locale/{$this->lang->value}.json";
        $stopWords = json_decode(file_get_contents($path));
        $this->stopWords = new StopWords($stopWords->data);
    }

    public function remove(): array|string|null
    {
        return preg_replace($this->stopWords->data, '', $this->words);
    }
}