<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

require_once( PATH_typo3conf . 'ext/org_repertoire/Configuration/TCA/Defaults/extensionmanager.php' );

return array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'dividers2tabs' => true,
    'iconfile' => '../typo3conf/ext/org_repertoire/Resources/Public/Images/repertoire.gif',
    'thumbnail' => 'icons',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,uid_parent,'
    . 'icons,icon_offset_x,icon_offset_y,'
    . 'hidden,'
  ,
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.title',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'title_lang_ol' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.title_lang_ol',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim',
      )
    ),
    'uid_parent' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_repertoiretargetgroup',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'size' => 1,
        'minitems' => 0,
        'maxitems' => 2,
        'trueMaxItems' => 1,
      ),
    ),
    'icons' => array(
      'exclude' => 1,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.icon_offset_x',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'icon_offset_y' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.icon_offset_y',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'hidden' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
  ),
  'types' => array(
    '0' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.div_targetgroup,'
      . '  title;;1;;,uid_parent,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.div_icons,'
      . '  icons,icon_offset_x,icon_offset_y,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoiretargetgroup.div_control,'
      . '  hidden'
    ,
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  )
);