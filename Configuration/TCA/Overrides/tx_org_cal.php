<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

$temporaryColumns = array(
  'tx_org_repertoire' => array(
    'exclude' => $bool_exclude_default,
    'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_cal.tx_org_repertoire',
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
  )
);

$relativeToField = '';
$relativePosition = '';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tx_org_cal', 'type', array(
  '0' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_cal.type.tx_org_repertoire',
  '1' => 'tx_org_repertoire',
  '2' => 'EXT:org_repertoire/Resources/Public/Images/repertoire.gif',
        ), $relativeToField, $relativePosition
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'tx_org_cal', $temporaryColumns, 1
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
        'tx_org_cal', '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_cal.div_tx_org_repertoire,tx_org_repertoire', 'tx_org_repertoire', 'after:tx_org_headquarters'
);