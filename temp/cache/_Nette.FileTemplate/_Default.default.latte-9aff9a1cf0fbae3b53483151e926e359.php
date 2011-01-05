<?php //netteCache[01]000390a:2:{s:4:"time";s:21:"0.28345000 1293744681";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:68:"/Users/simekadam/Sites/SugarBook/app/templates/Default/default.latte";i:2;i:1293657625;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f195947 released on 2010-12-16";}}}?><?php

// source file: /Users/simekadam/Sites/SugarBook/app/templates/Default/default.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'f760dba29d'); unset($_extends);


//
// block statuses
//
if (!function_exists($_l->blocks['statuses'][] = '_lb454e8646ad_statuses')) { function _lb454e8646ad_statuses($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('zkouska') ?>"><?php call_user_func(reset($_l->blocks['_zkouska']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _zkouska
//
if (!function_exists($_l->blocks['_zkouska'][] = '_lb989fd99ba6__zkouska')) { function _lb989fd99ba6__zkouska($_l, $_args) { extract($_args); $control->validateControl('zkouska')
;foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($statuses['data']) as $status): ?>
<div class="post">
    <img alt=""  class="profilePicture" src="http://graph.facebook.com/<?php echo Nette\Templates\TemplateHelpers::escapeHtml($status['from']['id']) ?>/picture?type=large" />
    <div class="postSubDiv">
    <div class="post_user"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($status['from']['name']) ?></div>
    <div class="statusMessage"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($status['message']) ?></div>
    <div class="bottomButtons">
    <div class="likeTag">
<?php if (isset($status['likes'])): if (count($status['likes']['data'])>0): ?>
            <?php echo Nette\Templates\TemplateHelpers::escapeHtml($status['likes']['data'][0]['name']) ;if (count($status['likes']['data'])>1): ?> and <?php  echo(count($status['likes']['data'])-1) ?> others<?php endif ?> like this.
<?php endif ;endif ?>
<span class="likeThis"><a class="ajax" id="clickMe" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("like!", array($ouser['id']."_".$status['id']))) ?>">Like</a></span>

    </div>
<!--    <br />-->
    <div><?php if (isset($status['comments'])): ?>
        <span class="toggleComments">Show Comments</span>
<?php endif ?>

<?php if (isset($status['comments'])): ?>
    <ul class="ul_comments">
<?php foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($status['comments']['data']) as $datas): ?>

    <li class="li_comments">
        <img class="commentatorImg" src="http://graph.facebook.com/<?php echo Nette\Templates\TemplateHelpers::escapeHtml($datas['from']['id']) ?>/picture" rel="" alt="" />
        <div class="commentatorsName"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($datas['from']['name']) ?></div>
        <div class="commentsContent"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($datas['message']) ?></div>
    </li>
<?php endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
    </ul>
<?php endif ?>
    </div>
    </div>
    </div>
</div>
<!--<div class="postSpacer"></div>-->
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
