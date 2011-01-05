<?php //netteCache[01]000389a:2:{s:4:"time";s:21:"0.45901300 1293745098";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:67:"/Users/simekadam/Sites/SugarBook/app/templates/Default/photos.latte";i:2;i:1293745096;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f195947 released on 2010-12-16";}}}?><?php

// source file: /Users/simekadam/Sites/SugarBook/app/templates/Default/photos.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, '05bde6689c'); unset($_extends);


//
// block statuses
//
if (!function_exists($_l->blocks['statuses'][] = '_lb7d2130700f_statuses')) { function _lb7d2130700f_statuses($_l, $_args) { extract($_args)
;foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($imgs) as $img): ?>
<img alt=""  src="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($basePath) ?>/<?php echo Nette\Templates\TemplateHelpers::escapeHtml($img) ?>" />
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ;
}}

//
// end of blocks
//

if ($_l->extends) {
	ob_start();
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Templates\LatteMacros::renderSnippets($control, $_l, get_defined_vars());
}
if (!$_l->extends) { call_user_func(reset($_l->blocks['statuses']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
