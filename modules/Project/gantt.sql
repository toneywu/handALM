

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gantt_links
-- ----------------------------
DROP TABLE IF EXISTS `gantt_links`;
CREATE TABLE `gantt_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for gantt_tasks
-- ----------------------------
DROP TABLE IF EXISTS `gantt_tasks`;
CREATE TABLE `gantt_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `progress` float NOT NULL DEFAULT '0',
  `sortorder` int(11) NOT NULL DEFAULT '0',
  `parent` int(11) NOT NULL,
  `assigned` varchar(255) NOT NULL,
  `milestone` varchar(255) NOT NULL,
  `project_id` char(36) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
