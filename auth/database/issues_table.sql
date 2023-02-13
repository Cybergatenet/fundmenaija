CREATE TABLE IF NOT EXISTS `_issues` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` varchar(255) NOT NULL,
    `user_username` varchar(255) NOT NULL,
    `avatar` text NOT NULL,
    `issue_title` varchar(255) NOT NULL,
    `issue_body` text NOT NULL,
    `issue_time` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;