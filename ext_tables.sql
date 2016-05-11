
CREATE TABLE tx_njblog_domain_model_source (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	fe_cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
  	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL, 
	
	author varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	status_quo int(11) unsigned DEFAULT '0' NOT NULL,
	type tinyint(4) unsigned DEFAULT '0' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_njblog_domain_model_blog'
#

CREATE TABLE tx_njblog_domain_model_blog (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	
	entries_limit int(11) NOT NULL DEFAULT '5',
	use_ajax tinyint(1) NOT NULL DEFAULT '0',
	use_readmore tinyint(1) NOT NULL DEFAULT '1',
	show_author tinyint(1) NOT NULL DEFAULT '1',
	show_authorlink tinyint(1) NOT NULL DEFAULT '0',
	permit_comments tinyint(1) NOT NULL DEFAULT '1',
	comments_limit int(11) NOT NULL DEFAULT '5',
	comments_permit_guest tinyint(1) NOT NULL DEFAULT '0',
	comments_show_email tinyint(1) NOT NULL DEFAULT '0',
	comments_show_url tinyint(1) NOT NULL DEFAULT '0',
	activate_print tinyint(1) NOT NULL DEFAULT '0',
	activate_pdf tinyint(1) NOT NULL DEFAULT '0',
	activate_titlepic tinyint(1) NOT NULL DEFAULT '1',
	activate_double_layout tinyint(1) NOT NULL DEFAULT '0',
	titlepic_width int(11) NOT NULL DEFAULT '0',
	titlepic_height int(11) NOT NULL DEFAULT '0',

	posts varchar(255) DEFAULT '' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);


CREATE TABLE tx_njblog_blog_post_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_njblog_domain_model_post'
#
CREATE TABLE tx_njblog_domain_model_post (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
  	endtime int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	ce varchar(255) DEFAULT '' NOT NULL,
	
	title varchar(255) DEFAULT '' NOT NULL,
	category int(11) unsigned DEFAULT '0' NOT NULL,
	
	intro varchar(255) DEFAULT '' NOT NULL,
	content varchar(255) DEFAULT '' NOT NULL,
	
	inhome tinyint(1) NOT NULL DEFAULT '1',
	highlight tinyint(1) NOT NULL DEFAULT '1',
	
	poster int(11) unsigned DEFAULT '0' NOT NULL,
	editor int(11) unsigned DEFAULT '0' NOT NULL,
	lastupdate int(11) unsigned DEFAULT '0' NOT NULL,
	
	tags varchar(255) DEFAULT '' NOT NULL,
	sources varchar(255) DEFAULT '' NOT NULL,
	rel_links varchar(255) DEFAULT '' NOT NULL,
	rel_posts varchar(255) DEFAULT '' NOT NULL,
	
	permit_comments tinyint(1) NOT NULL DEFAULT '1',
	comments_permit_guest tinyint(1) NOT NULL DEFAULT '1',
	comments_permit_smileys tinyint(1) NOT NULL DEFAULT '1',
	
	hits int(50) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);



#
# Table structure for table 'tx_njblog_domain_model_tag'
#
CREATE TABLE tx_njblog_domain_model_tag (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	title varchar(255) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	
	KEY parent (pid)
);

#
# Table structure for table 'tx_njblog_domain_model_link'
#
CREATE TABLE tx_njblog_domain_model_link (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	
	title tinytext,
	description text,
	url varchar(255) DEFAULT '' NOT NULL,
	
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l18n_parent int(11) DEFAULT '0' NOT NULL,
	l18n_diffsource mediumblob NOT NULL,
	
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_njblog_domain_model_comment'
#
CREATE TABLE tx_njblog_domain_model_comment (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	post int(11) DEFAULT '0' NOT NULL,
	
	author varchar(255) DEFAULT '' NOT NULL,
	email varchar(255) DEFAULT '' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	content text NOT NULL,
	
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  	crdate int(11) unsigned DEFAULT '0' NOT NULL,
  	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);