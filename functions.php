<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

//function themeConfig($form)
//{
////    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
////    $form->addInput($logoUrl);
////
////    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
////        array('ShowRecentPosts' => _t('显示最新文章'),
////            'ShowRecentComments' => _t('显示最近回复'),
////            'ShowCategory' => _t('显示分类'),
////            'ShowArchive' => _t('显示归档'),
////            'ShowOther' => _t('显示其它杂项')),
////        array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
////
////    $form->addInput($sidebarBlock->multiMode());
//}

function themeFields($layout)
{
    $images = new Typecho_Widget_Helper_Form_Element_Text('images', NULL, NULL, _t('图片链接'), _t('多个链接使用英文逗号隔开'));
    $layout->addItem($images);
}

function formatImages($images)
{
    return explode(',', $images);
}