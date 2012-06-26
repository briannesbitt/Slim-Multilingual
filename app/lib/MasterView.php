<?
class MasterView extends Slim_View {
    private $masterTemplate;

    public function __construct($masterTemplate) {
        parent::__construct();
        $this->masterTemplate = $masterTemplate;
    }

    public function render($template) {
        $this->setData('childView', $template);
        $template = $this->masterTemplate;
        return parent::render($template);
    }
}