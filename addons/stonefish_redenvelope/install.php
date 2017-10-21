<?php
pdo_query("CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_award` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`rid` int(11),
`fansID` int(11),
`from_user` varchar(50),
`name` varchar(50),
`description` varchar(200),
`prizetype` varchar(10),
`prize` int(11),
`award_sn` varchar(50),
`createtime` int(10),
`consumetime` int(10),
`status` tinyint(1),
`xuni` tinyint(1),
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_data` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`rid` int(10) unsigned NOT NULL,
`uniacid` int(10) unsigned NOT NULL,
`from_user` varchar(50) NOT NULL,
`fromuser` varchar(50) NOT NULL,
`avatar` varchar(512) NOT NULL,
`nickname` varchar(50) NOT NULL,
`visitorsip` varchar(15) NOT NULL,
`visitorstime` int(10) unsigned NOT NULL,
`point` decimal(10,2),
`viewnum` int(10) unsigned NOT NULL,
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_fans` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`rid` int(11),
`uniacid` int(11),
`fansID` int(11),
`from_user` varchar(50),
`avatar` varchar(255) NOT NULL,
`nickname` varchar(50) NOT NULL,
`realname` varchar(20) NOT NULL,
`mobile` varchar(20) NOT NULL,
`qq` varchar(15) NOT NULL,
`email` varchar(50) NOT NULL,
`address` varchar(255) NOT NULL,
`gender` tinyint(1) NOT NULL,
`telephone` varchar(15) NOT NULL,
`idcard` varchar(30) NOT NULL,
`company` varchar(50) NOT NULL,
`occupation` varchar(30) NOT NULL,
`position` varchar(30) NOT NULL,
`inpoint` float(10,2) unsigned NOT NULL,
`outpoint` float(10,2) unsigned NOT NULL,
`sharenum` int(10) unsigned NOT NULL,
`sharetime` int(10),
`awardingid` int(10) unsigned NOT NULL,
`last_time` int(10),
`status` tinyint(1),
`zhongjiang` tinyint(1),
`xuni` tinyint(1),
`createtime` int(10),
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_prize` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) NOT NULL,
`rid` int(10) unsigned NOT NULL,
`point` decimal(10,2),
`prizetype` varchar(50) NOT NULL,
`prizename` varchar(50) NOT NULL,
`prizepro` double,
`prizetotal` int(10) NOT NULL,
`prizedraw` int(10) NOT NULL,
`prizepic` varchar(255) NOT NULL,
`prizetxt` text NOT NULL,
`credit` int(10) NOT NULL,
`credit_type` varchar(20),
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_reply` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`rid` int(10) unsigned,
`uniacid` int(11),
`title` varchar(50),
`description` varchar(255),
`start_picurl` varchar(200),
`isshow` tinyint(1),
`envelope` tinyint(1),
`award_times` int(11),
`ticket_information` varchar(200),
`starttime` int(10),
`endtime` int(10),
`end_theme` varchar(50),
`end_instruction` varchar(200),
`end_picurl` varchar(200),
`adpic` varchar(200),
`adpicurl` varchar(200),
`total_num` int(11),
`sn_rename` varchar(20),
`copyright` varchar(20),
`show_num` tinyint(1),
`viewnum` int(11),
`awardnum` int(10) unsigned NOT NULL,
`fansnum` int(11),
`cardbg` varchar(255) NOT NULL,
`inpointstart` float(10,2) unsigned NOT NULL,
`inpointend` float(10,2) unsigned NOT NULL,
`randompointstart` float(10,2) unsigned NOT NULL,
`randompointend` float(10,2) unsigned NOT NULL,
`addp` tinyint(1),
`limittype` tinyint(1),
`totallimit` tinyint(1),
`incomelimit` float(10,2) unsigned NOT NULL,
`tixianlimit` float(10,2) unsigned NOT NULL,
`countlimit` int(5) NOT NULL,
`createtime` int(10),
`share_acid` int(10),
`sharetip` varchar(100) NOT NULL,
`fanpaitip` varchar(100) NOT NULL,
`awardtip` varchar(200) NOT NULL,
`sharebtn` varchar(10) NOT NULL,
`fsharebtn` varchar(10) NOT NULL,
`bgcolor` varchar(10),
`fontcolor` varchar(10),
`btncolor` varchar(10),
`btnfontcolor` varchar(10),
`txcolor` varchar(10),
`txfontcolor` varchar(10),
`rulebgcolor` varchar(10),
`ticketinfo` varchar(50),
`isrealname` tinyint(1) unsigned NOT NULL,
`ismobile` tinyint(1) unsigned NOT NULL,
`isqq` tinyint(1) unsigned NOT NULL,
`isemail` tinyint(1) unsigned NOT NULL,
`isaddress` tinyint(1) unsigned NOT NULL,
`isgender` tinyint(1) unsigned NOT NULL,
`istelephone` tinyint(1) unsigned NOT NULL,
`isidcard` tinyint(1) unsigned NOT NULL,
`iscompany` tinyint(1) unsigned NOT NULL,
`isoccupation` tinyint(1) unsigned NOT NULL,
`isposition` tinyint(1) unsigned NOT NULL,
`isfans` tinyint(1) unsigned NOT NULL,
`isfansname` varchar(225) NOT NULL,
`xuninum` int(10) unsigned NOT NULL,
`xuninumtime` int(10) unsigned NOT NULL,
`xuninuminitial` int(10) unsigned NOT NULL,
`xuninumending` int(10) unsigned NOT NULL,
`xuninum_time` int(10) unsigned NOT NULL,
`homepictime` int(3) unsigned NOT NULL,
`homepic` varchar(225) NOT NULL,
`opportunity` tinyint(1) unsigned NOT NULL,
`opportunity_txt` text NOT NULL,
`award_info` text NOT NULL,
`credit_times` tinyint(1),
`credit_type` varchar(20),
`showparameters` varchar(1000) NOT NULL,
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_share` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`uniacid` int(11),
`rid` int(11),
`acid` int(11),
`share_title` varchar(200),
`share_desc` varchar(300),
`share_url` varchar(255),
`share_txt` text NOT NULL,
`share_imgurl` varchar(255) NOT NULL,
`share_picurl` varchar(255) NOT NULL,
`share_pic` varchar(255) NOT NULL,
`share_confirm` varchar(200),
`share_fail` varchar(200),
`share_cancel` varchar(200),
PRIMARY KEY (`id`),
KEY `indx_rid` (`rid`),
KEY `indx_acid` (`acid`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_stonefish_redenvelope_token` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`uniacid` int(10) NOT NULL,
`access_token` varchar(1000) NOT NULL,
`expires_in` int(11),
`createtime` int(10) unsigned NOT NULL,
PRIMARY KEY (`id`),
KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

");