<?php
if (!defined ('TYPO3_MODE')) 
{
  die ('Access denied.');
}



  ////////////////////////////////////////////////////////////////////////////
  // 
  // INDEX
  
  // Configuration by the extension manager
  //    Localization support
  //    Store record configuration
  // Enables the Include Static Templates
  // Add pagetree icons
  // Configure third party tables
  // draft field tx_org_repertoire
  //    fe_users
  //    tx_org_cal
  //    tx_org_headquarters
  // TCA tables
  //    org_repertoire



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Configuration by the extension manager
  
$confArr  = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][$_EXTKEY]);

  // Language for labels of static templates and page tsConfig
$llStatic = $confArr['LLstatic'];
switch($llStatic) {
  case($llStatic == 'German'):
    $llStatic = 'de';
    break;
  default:
    $llStatic = 'default';
}
  // Language for labels of static templates and page tsConfig

  // Simplify the Organiser
$bool_exclude_none    = 1;
$bool_exclude_default = 1;
switch ($confArr['TCA_simplify_organiser'])
{
  case('None excluded: Editor has access to all'):
    $bool_exclude_none    = 0;
    $bool_exclude_default = 0;
    break;
  case('All excluded: Administrator configures it'):
      // All will be left true.
    break;
  case('Default (recommended)'):
    $bool_exclude_default = 0;
  default:
}
  // Simplify the Organiser

  // Simplify backend forms
$bool_time_control = true;
if (strtolower(substr($confArr['TCA_simplify_time_control'], 0, strlen('no'))) == 'no')
{
  $bool_time_control = false;
}
  // Simplify backend forms

  // Store record configuration
$bool_wizards_wo_add_and_list       = false;
$bool_full_wizardSupport_allTables  = true;
$str_marker_pid                     = '###CURRENT_PID###';
switch($confArr['store_records']) 
{
  case('Multi grouped: record groups in different directories'):
    //var_dump('MULTI');
    $str_store_record_conf        = 'pid IN (###PAGE_TSCONFIG_IDLIST###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Clear presented: each record group in one directory at most'):
    //var_dump('CLEAR');
    $str_store_record_conf        = 'pid IN (###PAGE_TSCONFIG_ID###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Easy 2: same as easy 1 but with storage pid'):
    $str_marker_pid         = '###STORAGE_PID###';
    $str_store_record_conf  = 'pid=###STORAGE_PID###';
    break;
  case('Easy 1: all in the same directory'):
  default:
    //var_dump('EASY');
    $str_store_record_conf        = 'pid=###CURRENT_PID###';
}
  // Store record configuration
  // Configuration of the extension manager



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Enables the Include Static Templates

  // Case $llStatic
switch(true) {
  case($llStatic == 'de'):
      // German
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                '+Org-Repertoire: Basis (immer einbinden!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201',         '+Org-Repertoire: Kalender');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired', '+Org-Repertoire: +Kalender Archiv');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211',         '+Org-Repertoire: Kalender - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/repertoire/331',       '+Org-Repertoire: Repertoire');
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                '+Org-Repertoire: Basis (obligate!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201',         '+Org-Repertoire: Calendar');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired', '+Org-Repertoire: +Calendar expired');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211',         '+Org-Repertoire: Calendar - Margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/repertoire/331',       '+Org-Repertoire: Repertoire');
}
  // Case $llStatic
  // Enables the Include Static Templates



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Add pagetree icons

  // Case $llStatic
switch(true) {
  case($llStatic == 'de'):
      // German
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/repertoire.gif');
    break;
  default:
      // English
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/repertoire.gif');
}
  // Case $llStatic

  //  @see #34858, 120719, uherrmann
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_reptr',
         t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/repertoire.gif');

  // Add pagetree icons



  /////////////////////////////////////////////////
  //
  // Add default page and user TSconfig

t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/tsConfig/' . $llStatic . '/page.txt">');
  // Add default page and user TSconfig



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Configure third party tables
  
  // draft field tx_org_repertoire
  // fe_users
  // tx_org_cal
  // tx_org_headquarters
  // tx_org_news

  // draft field tx_org_repertoire
$arr_tx_org_repertoire = array (
  'exclude' => $bool_exclude_default,
  'label'   => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_repertoire',
  'config'  => array (
    'type'     => 'select', 
    'size'     =>  30, 
    'minitems' =>   0,
    'maxitems' =>   1,
    'MM'                  => '%MM%',
    'MM_opposite_field'   => '%MM_opposite_field%',
    'foreign_table'       => 'tx_org_repertoire',
    'foreign_table_where' => 'AND tx_org_repertoire.' . $str_store_record_conf . ' ORDER BY tx_org_repertoire.title',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org_repertoire/locallang_db.xml:wizard.tx_org_repertoire.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'tx_org_repertoire',
          'pid'      => $str_marker_pid,
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org_repertoire/locallang_db.xml:wizard.tx_org_repertoire.list',
        'icon'   => 'list.gif',
        'params' => array(
          'table'   => 'tx_org_repertoire',
          'pid'     => $str_marker_pid,
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type'                      => 'popup',
        'title'                     => 'LLL:EXT:org_repertoire/locallang_db.xml:wizard.tx_org_repertoire.edit',
        'script'                    => 'wizard_edit.php',
        'popup_onlyOpenIfSelected'  => 1,
        'icon'                      => 'edit2.gif',
        'JSopenParams'              => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);
  // draft field tx_org_repertoire

  // fe_users
t3lib_div::loadTCA('fe_users');

  // Add field tx_org_repertoire
$showRecordFieldList = $TCA['fe_users']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_repertoire';
$TCA['fe_users']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // Add field tx_org_repertoire

  // Add field tx_org_repertoire
$TCA['fe_users']['columns']['tx_org_repertoire']                  = $arr_tx_org_repertoire;
$TCA['fe_users']['columns']['tx_org_repertoire']['label']         =
  'LLL:EXT:org_repertoire/locallang_db.xml:fe_users.tx_org_repertoire';
$TCA['fe_users']['columns']['tx_org_repertoire']['config']['MM']  = 'tx_org_repertoire_mm_fe_users';
  // Add field tx_org_repertoire

  // Insert div [repertoire] at position $int_div_position
$str_showitem     = $TCA['fe_users']['types']['0']['showitem'];
$arr_showitem     = explode('--div--;', $str_showitem);
$int_div_position = 2;
foreach($arr_showitem as $key => $value)
{
  switch(true)
  {
    case($key < $int_div_position):
        // Don't move divs, which are placed before the new tab
      $arr_new_showitem[$key] = $value;
      break;
    case($key == $int_div_position):
        // Insert the new tab
      $arr_new_showitem[$key]     = 'LLL:EXT:org_repertoire/locallang_db.xml:fe_users.div_tx_org_repertoire, tx_org_repertoire,';
        // Move former tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
    case($key > $int_div_position):
        // Move divs, which are placed after the new tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
  }
}
$str_showitem                 = implode('--div--;', $arr_new_showitem);
$TCA['fe_users']['types']['0']['showitem']   = $str_showitem;
  // Insert div [repertoire] at position $int_div_position
  
if($bool_wizards_wo_add_and_list)
{
  unset($TCA['fe_users']['columns']['tx_org_repertoire']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_repertoire']['config']['wizards']['list']);
}
  // fe_users

  // tx_org_cal
t3lib_div::loadTCA('tx_org_cal');

  // typeicons: Add type_icon
$TCA['tx_org_cal']['ctrl']['typeicons']['tx_org_repertoire'] = 
  '../typo3conf/ext/org_repertoire/ext_icon/repertoire.gif';
  // typeicons: Add type_icon

  // showRecordFieldList: Add field tx_org_repertoire
$showRecordFieldList = $TCA['tx_org_cal']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_repertoire';
$TCA['tx_org_cal']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // showRecordFieldList: Add field tx_org_repertoire

  // columns: Add field tx_org_repertoire
$TCA['tx_org_cal']['columns']['tx_org_repertoire']                                =
  $arr_tx_org_repertoire;
$TCA['tx_org_cal']['columns']['tx_org_repertoire']['label']                       =
  'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_cal.tx_org_repertoire';
$TCA['tx_org_cal']['columns']['tx_org_repertoire']['config']['MM']                =
  'tx_org_repertoire_mm_tx_org_cal';
$TCA['tx_org_cal']['columns']['tx_org_repertoire']['config']['MM_opposite_field'] =
  'tx_org_cal';

if($bool_wizards_wo_add_and_list)
{
  unset($TCA['tx_org_cal']['columns']['tx_org_repertoire']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_repertoire']['config']['wizards']['list']);
}
  // columns: Add field tx_org_repertoire

  // columns: extend type
$TCA['tx_org_cal']['columns']['type']['config']['items']['tx_org_repertoire'] = array
(
  '0' => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_cal.type.tx_org_repertoire',
  '1' => 'tx_org_repertoire',
  '2' => 'EXT:org_repertoire/ext_icon/repertoire.gif',
);
  // columns: extend type

  // Insert type [repertoire] with fields to TCAtypes
$TCA['tx_org_cal']['types']['tx_org_repertoire']['showitem'] = 
  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    type,title,datetime,tx_org_caltype,tx_org_repertoire,'.
  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_event,       tx_org_location,tx_org_calentrance,'.
  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_department,  tx_org_department,'.
  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,fe_group'.
  ''
;

  // Insert div [repertoire] with fields to TCAtypes
  // tx_org_cal



  // tx_org_headquarters
  // Load the TCA
t3lib_div::loadTCA('tx_org_headquarters');

  // Add fields to TCAshowReacordFieldList
$showRecordFieldList = $TCA['tx_org_headquarters']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_repertoire';
$TCA['tx_org_headquarters']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // Add fields to TCAshowReacordFieldList

  // Add fields to TCAcolumns: repertoire
$TCA['tx_org_headquarters']['columns']['tx_org_repertoire']                                =
  $arr_tx_org_repertoire;
$TCA['tx_org_headquarters']['columns']['tx_org_repertoire']['label']                       =
  'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_headquarters.tx_org_repertoire';
$TCA['tx_org_headquarters']['columns']['tx_org_repertoire']['config']['MM']                =
  'tx_org_repertoire_mm_tx_org_headquarters';
$TCA['tx_org_headquarters']['columns']['tx_org_repertoire']['config']['MM_opposite_field'] =
  'tx_org_headquarters';
  // Add fields to TCAcolumns: repertoire

  // Insert div [repertoire] with fields to TCAtypes
$str_showitem     = $TCA['tx_org_headquarters']['types']['0']['showitem'];
$arr_showitem     = explode('--div--;', $str_showitem);
$int_div_position = 3;
foreach($arr_showitem as $key => $value)
{
  switch(true)
  {
    case($key < $int_div_position):
        // Don't move divs, which are placed before the new tab
      $arr_new_showitem[$key] = $value;
      break;
    case($key == $int_div_position):
        // Insert the new tab
      $arr_new_showitem[$key]     = 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_headquarters.div_tx_org_repertoire, tx_org_repertoire,';
        // Move former tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
    case($key > $int_div_position):
        // Move divs, which are placed after the new tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
  }
}
$str_showitem                                           = implode('--div--;', $arr_new_showitem);
$TCA['tx_org_headquarters']['types']['0']['showitem']   = $str_showitem;
  // Insert div [repertoire] with fields to TCAtypes
  // tx_org_headquarters

  // tx_org_news
t3lib_div::loadTCA('tx_org_news');

  // Add field tx_org_repertoire
$showRecordFieldList = $TCA['tx_org_news']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_repertoire';
$TCA['tx_org_news']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // Add field tx_org_repertoire

  // Add field tx_org_repertoire
$TCA['tx_org_news']['columns']['tx_org_repertoire']                                =
  $arr_tx_org_repertoire;
$TCA['tx_org_news']['columns']['tx_org_repertoire']['label']                       =
  'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_news.tx_org_repertoire';
$TCA['tx_org_news']['columns']['tx_org_repertoire']['config']['MM']                =
  'tx_org_repertoire_mm_tx_org_news';
$TCA['tx_org_news']['columns']['tx_org_repertoire']['config']['MM_opposite_field'] =
  'tx_org_news';
  // Add field tx_org_repertoire

  // Insert div [repertoire] at position $int_div_position
$str_showitem     = $TCA['tx_org_news']['types']['0']['showitem'];
$arr_showitem     = explode('--div--;', $str_showitem);
$int_div_position = 2;
foreach($arr_showitem as $key => $value)
{
  switch(true)
  {
    case($key < $int_div_position):
        // Don't move divs, which are placed before the new tab
      $arr_new_showitem[$key] = $value;
      break;
    case($key == $int_div_position):
        // Insert the new tab
      $arr_new_showitem[$key]     = 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_news.div_tx_org_repertoire, tx_org_repertoire,';
        // Move former tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
    case($key > $int_div_position):
        // Move divs, which are placed after the new tab one position behind
      $arr_new_showitem[$key + 1] = $value;
      break;
  }
}
$str_showitem                                 = implode('--div--;', $arr_new_showitem);
$TCA['tx_org_news']['types']['0']['showitem']  = $str_showitem;
  // Insert div [repertoire] at position $int_div_position
  // tx_org_news

  // Configure third party tables



  ////////////////////////////////////////////////////////////////////////////
  // 
  // TCA tables

  // repertoire ///////////////////////////////////////////////////////////////////
$TCA['tx_org_repertoire'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_repertoire',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/repertoire.gif',
  ),
);
  // repertoire ///////////////////////////////////////////////////////////////////

  // TCA tables //////////////////////////////////////////////////////////////

?>
