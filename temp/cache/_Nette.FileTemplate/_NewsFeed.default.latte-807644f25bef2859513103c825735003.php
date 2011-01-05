<?php //netteCache[01]000391a:2:{s:4:"time";s:21:"0.57254900 1293786627";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:69:"/Users/simekadam/Sites/SugarBook/app/templates/NewsFeed/default.latte";i:2;i:1293665932;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"f195947 released on 2010-12-16";}}}?><?php

// source file: /Users/simekadam/Sites/SugarBook/app/templates/NewsFeed/default.latte

?><?php
$_l = Nette\Templates\LatteMacros::initRuntime($template, NULL, 'b5994ee5aa'); unset($_extends);


//
// block statuses
//
if (!function_exists($_l->blocks['statuses'][] = '_lb8b57c643c3_statuses')) { function _lb8b57c643c3_statuses($_l, $_args) { extract($_args)
?><div id="<?php echo $control->getSnippetId('zkouska') ?>"><?php call_user_func(reset($_l->blocks['_zkouska']), $_l, $template->getParams()) ?></div><?php
}}


//
// block _zkouska
//
if (!function_exists($_l->blocks['_zkouska'][] = '_lb0c95be7067__zkouska')) { function _lb0c95be7067__zkouska($_l, $_args) { extract($_args); $control->validateControl('zkouska')
;foreach ($iterator = $_l->its[] = new Nette\SmartCachingIterator($newsFeedDatas['data']) as $news): ?>
<div class="post">
    <img alt=""  class="profilePicture" src="http://graph.facebook.com/<?php echo Nette\Templates\TemplateHelpers::escapeHtml($news['from']['id']) ?>/picture?type=large" />
    <div class="postSubDiv">
    <div class="post_user"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($news['from']['name']) ?></div>
    <div class="newsMessage"><?php echo Nette\Templates\TemplateHelpers::escapeHtml($news['message']) ?></div>
    <div class="bottomButtons">
    <div class="likeTag">
          
<span class="likeThis"><a class="ajax" id="clickMe" href="<?php echo Nette\Templates\TemplateHelpers::escapeHtml($control->link("like!", array(($ouser['id'].substr($news['id'],strpos($news['id'],"_")))))) ?>">Like</a></span>

    </div>
<!--    <br />-->
<!--    <div>
        <span n:ifset="$news['comments']" class="toggleComments">Show Comments</span>

               <ul class="ul_comments">
                <li class="li_comments">
        <img class="commentatorImg" src="http://graph.facebook.com//picture" rel="" alt=""/>
        <div class="commentatorsName"></div>
        <div class="commentsContent"></div>
    </li>
                </ul>
              </div>-->
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
?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['statuses']), $_l, get_defined_vars()); }  
if ($_l->extends) {
	ob_end_clean();
	Nette\Templates\LatteMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
