<?php 
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

class ShowFooterLogos extends AbstractHelper
{
    public function __invoke($file = null, $videoName = '') 
    {
        $view = $this->getView();
        $footerLogos = [];
        $html = '';
        for ($count = 1; $count < 7; $count++) {
            $f = new \NumberFormatter('en', \NumberFormatter::SPELLOUT);
            $formattedNumber = $f->format($count);
            $footerImage = $view->themeSettingAssetUrl('footer_logo_' . $formattedNumber);
            $footerLink = $view->themeSetting('footer_logo_link_' . $formattedNumber);
            $footerTitle = $view->themeSetting('footer_logo_title_' . $formattedNumber);
            $element = ($footerLink) ? 'a' : 'span';
            $href = ($footerLink) ? 'href="' . $footerLink . '"' : '';
            $content = ($footerImage) ? '<img src="' . $footerImage . '" title="' . $footerTitle . '">' : $footerTitle; 
            $html .= '<' . $element . ' class="footer-logo" ' . $href . '>' . $content . '</' . $element . '>';
        }
        return $html;
    }
}
?>