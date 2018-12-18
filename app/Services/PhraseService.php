<?php

namespace App\Services;

class PhraseService
{

    private $arrPhrase;

    public function analyze($phrase)
    {
        $arrResult = [];
        $this->arrPhrase = $this->phraseToArray($phrase);
        $countChars = $this->countChars();
        $count = 0;
        foreach ($countChars as $char => $qty) {
            $arrResult[$count]['char'] = $char;
            $arrResult[$count]['count'] = $qty;
            $arrResult[$count]['before_after'] = $this->getBeforeAfter($char);
            $arrResult[$count]['max_distance'] = ($qty > 1) ? $this->getDistance($char) : 0;
            $count++;
        }

        return (object)$arrResult;
    }

    public function phraseToArray($phrase)
    {
        $this->arrPhrase = [];
        for ($i = 0; $i < strlen($phrase); $i++) {
            $this->arrPhrase[] = $phrase{$i};
        }

        return $this->arrPhrase;
    }

    public function countChars()
    {
        return array_count_values($this->arrPhrase);
    }

    public function getBeforeAfter($char)
    {
        $beforeAfter = [];
        for ($i = 0; $i < sizeof($this->arrPhrase); $i++) {
            if ($char == $this->arrPhrase[$i] && isset($this->arrPhrase[$i + 1])) {
                $beforeAfter['before'][] = $this->arrPhrase[$i + 1];
            }

            if ($char == $this->arrPhrase[$i] && isset($this->arrPhrase[$i - 1])) {
                $beforeAfter['after'][] = $this->arrPhrase[$i - 1];
            }
        }

        return $beforeAfter;
    }

    public function getDistance($char)
    {
        $start = -1;
        $end = -1;
        for ($i = 0; $i < sizeof($this->arrPhrase); $i++) {
            if ($char == $this->arrPhrase[$i] && $start == -1) {
                $start = $i;
                $end = $i;
            }

            if ($char == $this->arrPhrase[$i] && $start > -1) {
                $end = $i;
            }
        }

        if ($start != -1 && $end != 1) {
            return $end - $start - 1;
        }

        return 0;
    }
}
