<?php

namespace Perkola\Quilly\Contracts;

class Parser
{
    protected $tags;

    public function __construct()
    {
        $this->tags = config('quilly.tags');
    }

    public function parse($delta)
    {
        $result = [];

        $openList = false;

        foreach ($delta->ops as $op) {
            if (isset($op->attributes)) {
                foreach ($op->attributes as $attribute => $value) {
                    if ($attribute === 'list') {
                        if ($openList) {
                            $result[count($result) - 2] = '';
                        }
                        $last = $result[count($result) - 1];
                        $atoms = explode("\n", $last);
                        $end = end($atoms);
                        if (count($atoms) > 1) {
                            $result[] = implode("\n", $atoms);
                        }
                        if (!$openList) {
                            array_splice($result, count($result) - 1, 0, '<ol>');
                            $openList = true;
                        }
                        $result[count($result) - 1] = '<li>' . $end . '</li>';
                        $result[] = '</ol>';
                    } else {
                        if (array_key_exists($attribute, $this->tags)) {
                            $result[] = '<' . $this->tags[$attribute] . '>' . $op->insert . '</' . $this->tags[$attribute] . '>';
                        }
                    }
                }
            } else {
                $atoms = explode("\n", $op->insert);
                $last = array_pop($atoms);
                echo $last . ' | ' . implode(", ", $atoms);
                $atoms = implode("<br>", $atoms);
                if (!empty($atoms)) {
                    $result[] = $atoms;
                }
                $result[] = $last;
            }
        }

        return implode(" ", $result);
    }

    public function plain($delta) {
        $result = '';

        foreach ($delta->ops as $op) {
            $result .= $op->insert;
        }

        return $result;
    }
}
