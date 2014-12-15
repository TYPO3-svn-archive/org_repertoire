<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}



////////////////////////////////////////////////////////////////////////////
//
// INDEX
// Set TYPO3 version
// Configuration by the extension manager
//    Localization support
//    Store record configuration
// Enables the Include Static Templates
// Add pagetree icons
// Configure third party tables
// draft field tx_org_repertoire
//    tx_org_cal
// TCA tables
//    org_repertoire
////////////////////////////////////////////////////////////////////////////
//
// Set TYPO3 version
// Set TYPO3 version as integer (sample: 4.7.7 -> 4007007)
list( $main, $sub, $bugfix ) = explode( '.', TYPO3_version );
$version = ( ( int ) $main ) * 1000000;
$version = $version + ( ( int ) $sub ) * 1000;
$version = $version + ( ( int ) $bugfix ) * 1;
$typo3Version = $version;
// Set TYPO3 version as integer (sample: 4.7.7 -> 4007007)

if ( $typo3Version < 3000000 )
{
  $prompt = '<h1>ERROR</h1>
    <h2>Unproper TYPO3 version</h2>
    <ul>
      <li>
        TYPO3 version is smaller than 3.0.0
      </li>
      <li>
        constant TYPO3_version: ' . TYPO3_version . '
      </li>
      <li>
        integer $this->typo3Version: ' . ( int ) $this->typo3Version . '
      </li>
    </ul>
      ';
  die( $prompt );
}
// Set TYPO3 version
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// Configuration by the extension manager

$confArr = unserialize( $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'EXT' ][ 'extConf' ][ $_EXTKEY ] );

// Language for labels of static templates and page tsConfig
$llStatic = $confArr[ 'LLstatic' ];
switch ( $llStatic )
{
  case($llStatic == 'German'):
    $llStatic = 'de';
    break;
  default:
    $llStatic = 'default';
}
// Language for labels of static templates and page tsConfig
// Simplify the Organiser
$bool_exclude_none = 1;
$bool_exclude_default = 1;
switch ( $confArr[ 'TCA_simplify_organiser' ] )
{
  case('None excluded: Editor has access to all'):
    $bool_exclude_none = 0;
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
if ( strtolower( substr( $confArr[ 'TCA_simplify_time_control' ], 0, strlen( 'no' ) ) ) == 'no' )
{
  $bool_time_control = false;
}
// Simplify backend forms
// Store record configuration
$bool_wizards_wo_add_and_list = false;
$bool_full_wizardSupport_allTables = true;
$str_marker_pid = '###CURRENT_PID###';
switch ( $confArr[ 'store_records' ] )
{
  case('Multi grouped: record groups in different directories'):
    //var_dump('MULTI');
    $str_store_record_conf = 'pid IN (###PAGE_TSCONFIG_IDLIST###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Clear presented: each record group in one directory at most'):
    //var_dump('CLEAR');
    $str_store_record_conf = 'pid IN (###PAGE_TSCONFIG_ID###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Easy 2: same as easy 1 but with storage pid'):
    $str_marker_pid = '###STORAGE_PID###';
    $str_store_record_conf = 'pid=###STORAGE_PID###';
    break;
  case('Easy 1: all in the same directory'):
  default:
    //var_dump('EASY');
    $str_store_record_conf = 'pid=###CURRENT_PID###';
}
// Store record configuration
// Configuration of the extension manager
////////////////////////////////////////////////////////////////////////////
//
// Enables the Include Static Templates
// Case $llStatic
switch ( true )
{
  case($llStatic == 'de'):
    // German
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/base/', '+Org-Repertoire: Basis (immer einbinden!)' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/201/', '+Org-Repertoire: Kalender' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/201/expired', '+Org-Repertoire: +Kalender Archiv' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/211/', '+Org-Repertoire: Kalender - Rand' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/repertoire/331/', '+Org-Repertoire: Repertoire' );
    break;
  default:
    // English
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/base/', '+Org-Repertoire: Basis (obligate!)' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/201/', '+Org-Repertoire: Calendar' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/201/expired', '+Org-Repertoire: +Calendar expired' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/calendar/211/', '+Org-Repertoire: Calendar - Margin' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'static/repertoire/331/', '+Org-Repertoire: Repertoire' );
}
// Case $llStatic
// Enables the Include Static Templates
////////////////////////////////////////////////////////////////////////////
//
// Add pagetree icons
// Case $llStatic
switch ( true )
{
  case($llStatic == 'de'):
    // German
    $TCA[ 'pages' ][ 'columns' ][ 'module' ][ 'config' ][ 'items' ][] = array( 'Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'ext_icon/repertoire.gif' );
    break;
  default:
    // English
    $TCA[ 'pages' ][ 'columns' ][ 'module' ][ 'config' ][ 'items' ][] = array( 'Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'ext_icon/repertoire.gif' );
}
// Case $llStatic
//  @see #34858, 120719, uherrmann
t3lib_SpriteManager::addTcaTypeIcon( 'pages', 'contains-org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'ext_icon/repertoire.gif' );

// Add pagetree icons
/////////////////////////////////////////////////
//
// Add default page and user TSconfig

t3lib_extMgm::addPageTSConfig( '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/tsConfig/' . $llStatic . '/page.txt">' );
// Add default page and user TSconfig
////////////////////////////////////////////////////////////////////////////
//
// Configure third party tables
t3lib_div::loadTCA( 'tx_org_cal' );

// typeicons: Add type_icon
$TCA[ 'tx_org_cal' ][ 'ctrl' ][ 'typeicons' ][ 'tx_org_repertoire' ] = '../typo3conf/ext/org_repertoire/ext_icon/repertoire.gif';
// typeicons: Add type_icon
// showRecordFieldList: Add field tx_org_repertoire
$showRecordFieldList = $TCA[ 'tx_org_cal' ][ 'interface' ][ 'showRecordFieldList' ];
$showRecordFieldList = $showRecordFieldList . ',tx_org_repertoire';
$TCA[ 'tx_org_cal' ][ 'interface' ][ 'showRecordFieldList' ] = $showRecordFieldList;
// showRecordFieldList: Add field tx_org_repertoire
// columns: Add field tx_org_repertoire
$TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_repertoire' ] = array(
  'exclude' => $bool_exclude_default,
  'label' => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_cal.tx_org_repertoire',
  'config' => array(
    'type' => 'select',
    'size' => 20,
    'minitems' => 0,
    'maxitems' => 1,
    'MM' => 'tx_org_mm_all',
    "MM_match_fields" => array(
      'table_local' => 'tx_org_cal',
      'table_foreign' => 'tx_org_repertoire'
    ),
    "MM_insert_fields" => array(
      'table_local' => 'tx_org_cal',
      'table_foreign' => 'tx_org_repertoire'
    ),
    'foreign_table' => 'tx_org_repertoire',
    'foreign_table_where' => 'AND tx_org_repertoire.' . $str_store_record_conf
    . ' AND tx_org_repertoire.deleted = 0 AND tx_org_repertoire.hidden = 0'
    //. ' AND tx_org_repertoire.sys_language_uid=###REC_FIELD_sys_language_uid###'
    . ' ORDER BY tx_org_repertoire.title'
    ,
    'items' => array(
      '0' => array(
        '0' => '',
        '1' => '',
      ),
    ),
    'selectedListStyle' => 'width:500px;',
    'itemListStyle' => 'width:500px;',
  ),
);

if ( $bool_wizards_wo_add_and_list )
{
  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_repertoire' ][ 'config' ][ 'wizards' ][ 'add' ] );
  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_repertoire' ][ 'config' ][ 'wizards' ][ 'list' ] );
}
// columns: Add field tx_org_repertoire
// columns: extend type
$TCA[ 'tx_org_cal' ][ 'columns' ][ 'type' ][ 'config' ][ 'items' ][ 'tx_org_repertoire' ] = array
  (
  '0' => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_cal.type.tx_org_repertoire',
  '1' => 'tx_org_repertoire',
  '2' => 'EXT:org_repertoire/ext_icon/repertoire.gif',
);
// columns: extend type
// Insert type [repertoire] with fields to TCAtypes
$TCA[ 'tx_org_cal' ][ 'types' ][ 'tx_org_repertoire' ][ 'showitem' ] = ''
        . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal.div_calendar,'
        . '  type,'
        . '  title,subtitle,'
        . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:palette.datetime_datetimeend;datetime_datetimeend,'
        . '  tx_org_caltype,tx_org_repertoire,' .
        '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal.div_teaser,      teaser_title,teaser_subtitle,teaser_short,' .
        '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal.div_marginal,    marginal_title,marginal_subtitle,marginal_short,' .
        '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal.div_event,       tx_org_location,tx_org_calentrance,' .
        '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,' .
        ''
;

// Insert div [repertoire] with fields to TCAtypes
// tx_org_cal
// Configure third party tables
////////////////////////////////////////////////////////////////////////////
//
// TCA tables
// repertoire ///////////////////////////////////////////////////////////////////
$TCA[ 'tx_org_repertoire' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org_repertoire/locallang_db.xml:tx_org_repertoire',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'ext_icon/repertoire.gif',
    'searchFields' => 'title,subtitle,producer,length,staff,bodytext,' .
    'teaser_title,teaser_subtitle,teaser_short,' .
    'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
    'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
    'embeddedcode,print,printcaption,printseo,' .
    'tx_org_cal,' .
    'hidden,pages,fe_group,' .
    'keywords,description'
  ),
);
// repertoire ///////////////////////////////////////////////////////////////////
// TCA tables //////////////////////////////////////////////////////////////
?>
