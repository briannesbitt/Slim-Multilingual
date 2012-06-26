<?
class MultilingualView extends MasterView {
    private $app;
    private $chars;
    private $translator;

    public function __construct(Slim $app, iTranslate $translator, $masterTemplate = null) {
        parent::__construct($masterTemplate);
        $this->app = $app;
        $this->translator = $translator;

        $chars = get_html_translation_table(HTML_ENTITIES);
        $remove = get_html_translation_table(HTML_SPECIALCHARS);
        unset($remove['&']);

        $this->chars = array_diff($chars, $remove);
    }

    public function getLang() {
        return $this->getData('lang');
    }
    public function setLang($lang) {
        $this->setData('lang', $lang);
    }
    public function setAvailableLangs($availableLangs) {
        $this->setData('availableLangs', $availableLangs);
    }
    public function setPathInfo($pathInfo) {
        $this->setData('pathInfo', $pathInfo);
    }

    public function urlFor($name, $params = array()) {
        return $this->app->urlFor($name, $params);
    }
    public function url($url, $lang = null) {
        return sprintf('/%s%s', ($lang != null) ? $lang : $this->getLang(), $url);
    }
    public function tr($key, $replacements = array()) {
       return $this->htmlEntitiesButTags($this->translator->translate($this->getLang(), $key, $replacements));
    }
    private function htmlEntitiesButTags($txt) {
        return strtr($txt, $this->chars);
    }
}