-- --------------------------------------------------------

--
-- 表的结构 `ik_tag_site_index`
--
DROP TABLE IF EXISTS `ik_tag_site_index`;
CREATE TABLE `ik_tag_site_index` (
  `siteid` int(11) NOT NULL DEFAULT '0' COMMENT '小站ID',
  `tagid` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `siteid_2` (`siteid`,`tagid`),
  KEY `siteid` (`siteid`),
  KEY `tagid` (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- 表的结构 `ik_site`
--
DROP TABLE IF EXISTS `ik_site`;
CREATE TABLE `ik_site` (
  `siteid` int(11) NOT NULL AUTO_INCREMENT COMMENT '小站ID',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `sitename` char(64) NOT NULL DEFAULT '' COMMENT '小站名称',
  `sitedesc` text NOT NULL COMMENT '小站描述',
  `siteicon` char(255) NOT NULL DEFAULT '' COMMENT '小站图标',  
  `count_view` int(11) NOT NULL DEFAULT '0' COMMENT '展示数',
  `isaudit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否审核',
  `isaction` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否允许互动 1默认不允许',  
  `istheme` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有自定义风格',
  `issetting` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否第一次访问',
  `isfollow` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否关注小站的广播更新 0默认关注 1不关注',      
  `isrecommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 推荐 0 不推荐',       
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '新建时间',
  PRIMARY KEY (`siteid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- 表的结构 `ik_site_room`
--
DROP TABLE IF EXISTS `ik_site_room`;
CREATE TABLE `ik_site_room` (
  `roomid` int(11) NOT NULL AUTO_INCREMENT COMMENT '房间ID',
  `siteid` int(11) NOT NULL DEFAULT '0' COMMENT '小站ID',
  `userid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `count_widget` int(11) NOT NULL DEFAULT '0' COMMENT '组件数量',  
  `name` char(64) NOT NULL DEFAULT '未命名房间' COMMENT '房间名称',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
  PRIMARY KEY (`roomid`),
  KEY `userid` (`userid`),
  KEY `siteid` (`siteid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;