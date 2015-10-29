<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

require_once( PATH_typo3conf . 'ext/org_repertoire/Configuration/TCA/Defaults/extensionmanager.php' );

return array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire',
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
    'thumbnail' => 'image',
    'iconfile' => '../typo3conf/ext/org_repertoire/Resources/Public/Images/repertoire.gif',
    'searchFields' => ''
    . 'title,subtitle,producer,length,staff,bodytext,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'tx_org_cal,'
    . 'tx_org_staff,'
    . 'hidden,pages,fe_group,'
    . 'seo_keywords,seo_description'
    ,
    // #69250, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,subtitle,producer,length,staff,bodytext,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'tx_org_cal,'
    . 'tx_org_staff,'
    . 'hidden,pages,fe_group,'
    . 'seo_keywords,seo_description'
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'subtitle' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.subtitle',
      'config' => $conf_input_30_trim,
    ),
    'producer' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.producer',
      'config' => $conf_input_30_trim,
    ),
    'length' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.length',
      'config' => $conf_input_30_trim,
    ),
    'staff' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.staff',
      'config' => $conf_text_rte,
    // #69250, 150821, dwildt, 1+
    ),
    'bodytext' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.bodytext',
      'l10n_mode' => 'prefixLangTitle',
      'config' => $conf_text_rte,
    ),
    'teaser_title' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.teaser_title',
      'config' => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.teaser_subtitle',
      'config' => $conf_input_30_trim,
    ),
    'teaser_short' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.teaser_short',
      'config' => $conf_text_50_10,
    ),
    'marginal_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.marginal_title',
      'config' => $conf_input_30_trim,
    ),
    'marginal_subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.marginal_subtitle',
      'config' => $conf_input_30_trim,
    ),
    'marginal_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.marginal_short',
      'config' => $conf_text_50_10,
    ),
    'documents_from_path' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.code',
      'config' => array(
        'type' => 'input',
        'size' => '50',
        'max' => '80',
        'eval' => 'trim',
      ),
    ),
    'documents' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config' => $conf_file_document,
    ),
    'documentscaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config' => $conf_text_30_05,
    ),
    'documentslayout' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config' => array(
        'type' => 'select',
        'size' => 1,
        'maxitems' => 1,
        'items' => array(
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.0', 0 ),
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.1', 1 ),
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.2', 2 ),
        ),
      )
    ),
    'documentssize' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array(
        'type' => 'check',
        'items' => array(
          '1' => array(
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'image' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config' => $conf_file_image,
    ),
    'imagecaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config' => $conf_text_30_05,
    ),
    'imagecaption_position' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( '', '' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left' )
        ),
        'default' => ''
      )
    ),
    'imageseo' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config' => $conf_text_30_05,
    ),
    'imagewidth' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => '160c'
      )
    ),
    'imageheight' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => '120c'
      )
    ),
    'imageorient' => array(
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif' )
        ),
        'selicon_cols' => 6,
        'default' => '0',
        'iconsInOptionTags' => 1,
      )
    ),
    'imageborder' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array(
        'type' => 'check'
      )
    ),
    'image_noRows' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config' => array(
        'type' => 'check'
      )
    ),
    'image_link' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config' => array(
        'type' => 'text',
        'cols' => '30',
        'rows' => '3',
        'wizards' => array(
          '_PADDING' => 2,
          'link' => array(
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          )
        ),
        'softref' => 'typolink[linkList]'
      )
    ),
    'image_zoom' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config' => array(
        'type' => 'check'
      )
    ),
    'image_effects' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26 )
        )
      )
    ),
    'image_frames' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8 )
        )
      )
    ),
    'image_compression' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:lang/locallang_general.php:LGL.default_value', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1 ),
          array( 'GIF/256', 10 ),
          array( 'GIF/128', 11 ),
          array( 'GIF/64', 12 ),
          array( 'GIF/32', 13 ),
          array( 'GIF/16', 14 ),
          array( 'GIF/8', 15 ),
          array( 'PNG', 39 ),
          array( 'PNG/256', 30 ),
          array( 'PNG/128', 31 ),
          array( 'PNG/64', 32 ),
          array( 'PNG/32', 33 ),
          array( 'PNG/16', 34 ),
          array( 'PNG/8', 35 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28 )
        )
      )
    ),
    'imagecols' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( '1', 1 ),
          array( '2', 2 ),
          array( '3', 3 ),
          array( '4', 4 ),
          array( '5', 5 ),
          array( '6', 6 ),
          array( '7', 7 ),
          array( '8', 8 )
        ),
        'default' => 1
      )
    ),
    'tx_org_cal' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.tx_org_cal',
      'config' => array(
        'type' => 'select',
        'size' => 20,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_repertoire',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_repertoire'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_repertoire'
        ),
        'foreign_table' => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf
        . ' AND tx_org_cal.deleted = 0'
        . ' AND tx_org_cal.hidden = 0'
        . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid###'
        . ' ORDER BY datetime DESC, title'
        ,
        'selectedListStyle' => 'width:500px;',
        'itemListStyle' => 'width:500px;',
      ),
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_repertoire',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_repertoire'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_repertoire'
        ),
        'foreign_table' => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf
        . ' AND tx_org_cal.deleted = 0'
        . ' AND tx_org_cal.hidden = 0'
        . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid###'
        . ' ORDER BY datetime DESC, title'
        ,
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_staff' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.tx_org_staff',
      'config' => array(
        'type' => 'select',
        'size' => 20,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_repertoire',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_repertoire'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_repertoire'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => ''
        . 'AND tx_org_staff.' . $str_store_record_conf . ' '
        . 'AND tx_org_staff.deleted = 0 '
        . 'AND tx_org_staff.hidden = 0 '
        . 'AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### '
        . 'ORDER BY tx_org_staff.name_last'
        ,
        'selectedListStyle' => 'width:500px;',
        'itemListStyle' => 'width:500px;',
      ),
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_repertoire',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_repertoire'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_repertoire'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => ''
        . 'AND tx_org_staff.' . $str_store_record_conf . ' '
        . 'AND tx_org_staff.deleted = 0 '
        . 'AND tx_org_staff.hidden = 0 '
        . 'AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### '
        . 'ORDER BY tx_org_staff.name_last'
        ,
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'hidden' => $conf_hidden,
    'pages' => $conf_pages,
    'fe_group' => $conf_fegroup,
    'seo_keywords' => array(
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_keywords',
      'l10n_mode' => 'prefixLangTitle',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_80_trim,
    ),
    'seo_description' => array(
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_description',
      'l10n_mode' => 'prefixLangTitle',
      'exclude' => $bool_exclude_default,
      'config' => $conf_text_50_10,
    ),
  ),
  'types' => array(
    '0' => array( 'showitem' =>
      '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_repertoire, '
      . '  title;;;;1-1-1,subtitle,producer,length,staff;;;richtext[]:rte_transform[mode=ts];,bodytext;;;richtext[]:rte_transform[mode=ts];,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_teaser,'
      . '  teaser_title,teaser_subtitle,teaser_short,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_marginal,'
      . '  marginal_title;;;;6-6-6, marginal_subtitle, marginal_short,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,'
      . '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_calendar,    tx_org_cal,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_staff,       tx_org_staff,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_control,     hidden,pages,fe_group,'
      . '--div--;LLL:EXT:org_repertoire/Resources/Private/Language/locallang_db.xml:tx_org_repertoire.div_seo,         seo_keywords,seo_description'
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'starttime,endtime,' ),
    'documents_appearance' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
      'canNotCollapse' => 1,
    ),
    'documents_upload' => array(
      'showitem' => 'documents_from_path;LLL:EXT:org/locallang_db.xml:tca_phrase.documents_from_path, --linebreak--,' .
      'documents;LLL:EXT:cms/locallang_ttc.xml:media.ALT.uploads_formlabel, documentscaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption.ALT.uploads_formlabel;;nowrap, --linebreak--,',
      'canNotCollapse' => 1,
    ),
    'image_accessibility' => array(
      'showitem' => 'imageseo;LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo,',
      'canNotCollapse' => 1,
    ),
    'imageblock' => array(
      'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel, imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel, --linebreak--,' .
      'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel, imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse' => 1,
    ),
    'imagefiles' => array(
      'showitem' => 'image;LLL:EXT:cms/locallang_ttc.xml:image_formlabel, imagecaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption_formlabel,',
      'canNotCollapse' => 1,
    ),
    'imagelinks' => array(
      'showitem' => 'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel, image_link;LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
      'canNotCollapse' => 1,
    ),
    'image_settings' => array(
      'showitem' => 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel, imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel, imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel, --linebreak--,' .
      'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel, image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel, image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
  )
);
