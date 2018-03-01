<?php
defined('_JEXEC') or die;

// Access to module parameters
$domain = $params->get('domain', 'https://www.joomla.org');
$doc = JFactory::getDocument();
$doc->addScript($domain);
$doc->addStyleSheet('/modules/mod_raspsearch/css/search.css');
if (JFactory::getUser()->authorise('core.manage', 'mod_raspsearch'))
{
    $action = JRoute::_('index.php?option=com_railway2&view=search&Itemid=291');
    $input = JFactory::getApplication()->input;
    $from = $input->getString('from', '');
    $to = $input->getString('to', '');
    $fromID = $input->getInt('fromID', 0);
    $toID = $input->getInt('toID', 0);
    $dat = $input->getString('dat', date("Y-m-d"));
    ?>
    <div class="search-div">
        <form name="raspSearch" id="raspSearch" action="<?php echo $action;?>" method="get" onsubmit="return checkSearch()">
            <table class="searchTable" border="0">
                <tr>
                    <td class="searchTd">
                        <?php echo JText::_('MOD_RASPSEARCH_FORM_FROM');?>
                    </td>
                    <td class="searchTd">
                        <div>
                            <input class="searchFrom" onkeyup="searchStation(this);" type="text" id="searchFrom" name="from" value="<?php echo $from;?>">
                            <input type="hidden" name="fromID" id="fromID" value="<?php echo $fromID;?>">
                        </div>
                        <div id="divFrom" class="searchHint"></div>
                    </td>
                </tr>
                <tr>
                    <td class="searchTd">
                        <?php echo JText::_('MOD_RASPSEARCH_FORM_TO');?>
                    </td>
                    <td class="searchTd">
                        <input class="searchTo" onkeyup="searchStation(this);" type="text" id="searchTo" name="to" value="<?php echo $to;?>">
                        <input type="hidden" name="toID" id="toID" value="<?php echo $toID;?>">
                        <div id="divTo" class="searchHint"></div>
                    </td>
                </tr>
                <tr>
                    <td class="searchTd">
                        <?php echo JText::_('MOD_RASPSEARCH_FORM_WHEN');?>
                    </td class="searchTd">
                    <td>
                        <input class="searchWhen" type="date" id="date" name="date" value="<?php echo $dat;?>" min="<?php echo date('Y-m-d');?>">
                    </td>
                </tr>
                <tr>
                    <td class="searchTdSubmit" colspan="2">
                        <input type="submit" class="btnRasp" value="<?php echo JText::_('MOD_RASPSEARCH_FORM_GO'); ?>"><br>
                        <div id="errorSearch"></div>
                    </td>
                </tr>
            </table>
            <?php echo JHtml::_('form.token');?>
        </form>
    </div>
    <?php
}
?>
