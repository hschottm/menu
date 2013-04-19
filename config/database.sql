-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the Contao    *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_menus`
-- 

CREATE TABLE `tl_menus` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `sortOrder` varchar(32) NOT NULL default '',
  `alias` varbinary(128) NOT NULL default '',
  `description` text NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_menu`
-- 

CREATE TABLE `tl_menu` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `tstamp` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_menu_week`
-- 

CREATE TABLE `tl_menu_week` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `alias` varbinary(128) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `monday` int(10) unsigned NOT NULL default '0',
  `mo_suffix` varchar(80) NOT NULL default '',
  `mo_has_alternate_text` char(1) NOT NULL default '',
  `mo_alternate_text` blob NULL,
  `mo_has_additional_text` char(1) NOT NULL default '',
  `mo_additional_text` blob NULL,
  `mo_add_new_menu` varchar(255) NOT NULL default '',
  `mo_new_menu` varchar(255) NOT NULL default '',
  `mo_menu` int(10) unsigned NOT NULL default '0',
  `mo_price` double unsigned NOT NULL default '0',
  `tu_suffix` varchar(80) NOT NULL default '',
  `tu_has_alternate_text` char(1) NOT NULL default '',
  `tu_alternate_text` blob NULL,
  `tu_has_additional_text` char(1) NOT NULL default '',
  `tu_additional_text` blob NULL,
  `tu_add_new_menu` varchar(255) NOT NULL default '',
  `tu_new_menu` varchar(255) NOT NULL default '',
  `tu_menu` int(10) unsigned NOT NULL default '0',
  `tu_price` double unsigned NOT NULL default '0',
  `we_suffix` varchar(80) NOT NULL default '',
  `we_has_alternate_text` char(1) NOT NULL default '',
  `we_alternate_text` blob NULL,
  `we_add_new_menu` varchar(255) NOT NULL default '',
  `we_has_additional_text` char(1) NOT NULL default '',
  `we_additional_text` blob NULL,
  `we_new_menu` varchar(255) NOT NULL default '',
  `we_menu` int(10) unsigned NOT NULL default '0',
  `we_price` double unsigned NOT NULL default '0',
  `th_suffix` varchar(80) NOT NULL default '',
  `th_has_alternate_text` char(1) NOT NULL default '',
  `th_alternate_text` blob NULL,
  `th_has_additional_text` char(1) NOT NULL default '',
  `th_additional_text` blob NULL,
  `th_add_new_menu` varchar(255) NOT NULL default '',
  `th_new_menu` varchar(255) NOT NULL default '',
  `th_menu` int(10) unsigned NOT NULL default '0',
  `th_price` double unsigned NOT NULL default '0',
  `fr_suffix` varchar(80) NOT NULL default '',
  `fr_has_alternate_text` char(1) NOT NULL default '',
  `fr_alternate_text` blob NULL,
  `fr_has_additional_text` char(1) NOT NULL default '',
  `fr_additional_text` blob NULL,
  `fr_add_new_menu` varchar(255) NOT NULL default '',
  `fr_new_menu` varchar(255) NOT NULL default '',
  `fr_menu` int(10) unsigned NOT NULL default '0',
  `fr_price` double unsigned NOT NULL default '0',
  `sa_suffix` varchar(80) NOT NULL default '',
  `sa_has_alternate_text` char(1) NOT NULL default '',
  `sa_alternate_text` blob NULL,
  `sa_has_additional_text` char(1) NOT NULL default '',
  `sa_additional_text` blob NULL,
  `sa_add_new_menu` varchar(255) NOT NULL default '',
  `sa_new_menu` varchar(255) NOT NULL default '',
  `sa_menu` int(10) unsigned NOT NULL default '0',
  `sa_price` double unsigned NOT NULL default '0',
  `su_has_alternate_text` char(1) NOT NULL default '',
  `su_suffix` varchar(80) NOT NULL default '',
  `su_alternate_text` blob NULL,
  `su_has_additional_text` char(1) NOT NULL default '',
  `su_additional_text` blob NULL,
  `su_add_new_menu` varchar(255) NOT NULL default '',
  `su_new_menu` varchar(255) NOT NULL default '',
  `su_menu` int(10) unsigned NOT NULL default '0',
  `su_price` double unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `alias` (`alias`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `menu_template` varchar(32) NOT NULL default '',
  `menu_collection` int(10) unsigned NOT NULL default '0',
  `next_weeks` int(10) unsigned NOT NULL default '3',
  `prev_weeks` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
