# INDEX
# -----
# tx_org_repertoire
# tx_org_tx_org_cal



#
# Table structure for table 'tx_org_repertoire'
#
CREATE TABLE tx_org_repertoire (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  bodytext mediumtext NOT NULL,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  fe_group int(11) DEFAULT '0' NOT NULL,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  length tinytext,
  pages tinytext,
  producer tinytext,
  seo_description text,
  seo_keywords text,
  staff mediumtext,
  subtitle tinytext,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short mediumtext,
  tx_org_cal tinytext,
  tx_org_staff tinytext,

  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_cal'
#
CREATE TABLE tx_org_cal (
  tx_org_repertoire tinytext
);

#
# Table structure for table 'tx_org_cal'
#
CREATE TABLE tx_org_cal (
  tx_org_staff tinytext
);