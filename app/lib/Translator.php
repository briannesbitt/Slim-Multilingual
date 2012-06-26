<?php

interface iTranslate {
    public function translate($lang, $key, $replacements);
}

class Translator implements iTranslate {
    private $log;
    private $path;

    public function __construct($log, $path) {
        $this->log = $log;
        $this->path = $path;
        if (substr($this->path, -1) != '/') {
            $this->path .= '/';
        }
    }
    public function translate($lang, $key, $replacements) {
        global $locale;
        include_once $this->path.'lang.common.php';
        include_once $this->path.'lang.'.$lang.'.php';

        $text = '';

        if (!array_key_exists($key, $locale)) {
            $this->log->error("Translation of $key was not found.");
            return '';
        } else {
            $text = $locale[$key];
        }

        if (is_array($replacements) && count($replacements) > 0) {
            foreach($replacements as $name => $value) {
                $text = str_replace('{{' . $name . '}}', $value, $text);
            }
        }

        return $text;
    }
}