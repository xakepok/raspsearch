<?php
use Joomla\CMS\Helper\ModuleHelper;
defined('_JEXEC') or die;
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$show = (bool) htmlspecialchars($params->get('show'));
require ModuleHelper::getLayoutPath('mod_raspsearch', $params->get('layout', 'default'));