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


/*
 * Store static language
 */
switch ( true )
{
  case($llStatic == 'de'):
    // German
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Base/', 'Org +Repertoire [1.1] Basis (immer einbinden!)' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Repertoire/331/', 'Org +Repertoire [1.2] Repertoire' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Repertoire/331/listincolumns/', 'Org +Repertoire [1.2.1] +List View mit Spalten' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Org/Calendar/201/', 'Org [4.1.99] +Kalender Repertoire' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Org/Staff/101/', 'Org [6.1.99] +Personen Repertoire' );
    break;
  default:
    // English
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Base/', 'Org +Repertoire [1.1] Basis (obligate!)' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Repertoire/331/', 'Org +Repertoire [1.2] Repertoire' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Repertoire/331/listincolumns/', 'Org +Repertoire [1.2.1] +list wiew with columns' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Org/Calendar/201/', 'Org [2.1.99] +Calendar Repertoire' );
    t3lib_extMgm::addStaticFile( $_EXTKEY, 'Configuration/TypoScript/Org/Staff/101/', 'Org [9.1.99] +People Repertoire' );
}


/*
 * Add pagetree icons
 */
switch ( true )
{
  case($llStatic == 'de'):
    // German
    $TCA[ 'pages' ][ 'columns' ][ 'module' ][ 'config' ][ 'items' ][] = array( 'Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/repertoire.gif' );
    break;
  default:
    // English
    $TCA[ 'pages' ][ 'columns' ][ 'module' ][ 'config' ][ 'items' ][] = array( 'Org: Repertoire', 'org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/repertoire.gif' );
}
t3lib_SpriteManager::addTcaTypeIcon( 'pages', 'contains-org_reptr', t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/repertoire.gif' );


/*
 * Add default page and user TSconfig
 */
t3lib_extMgm::addPageTSConfig( '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TsConfig/Page/TxLinkhandler/' . $llStatic . '/page.txt">' );


/*
 * Add the types item tx_org_repertoire to tx_org_cal
 */
$TCA[ 'tx_org_cal' ][ 'types' ][ 'tx_org_repertoire' ][ 'showitem' ] = ''
        . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
        . '  type,title,subtitle,'
        . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.datetime_datetimeend;datetime_datetimeend,'
        . '  tx_org_caltype,'
        . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_cal.div_repertoire,'
        . '  tx_org_repertoire,'
        . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_staff,'
        . '  tx_org_staff,'
        . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
        . '  tx_org_location,tx_org_calentrance,'
        . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,'
        . '  hidden;;1;;,pages,fe_group,'
;
$TCA[ 'tx_org_cal' ][ 'ctrl' ][ 'typeicons' ][ 'tx_org_repertoire' ] = '../typo3conf/ext/org_repertoire/Resources/Public/Images/repertoire.gif';