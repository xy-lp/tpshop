# Host: localhost  (Version: 5.5.27-log)
# Date: 2016-01-02 22:49:03
# Generator: MySQL-Front 5.3  (Build 4.89)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tp_address"
#

CREATE TABLE `tp_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `meb_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录用户的id',
  `consignee` varchar(32) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '收货人地址',
  `mobile` bigint(1) unsigned NOT NULL DEFAULT '0' COMMENT '收货人电话',
  `post` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '邮编',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='收货人信息表';

#
# Data for table "tp_address"
#

INSERT INTO `tp_address` VALUES (2,2,'aa','中国湖南长沙开福区',12345678901,11111),(3,2,'bb','中国湖南长沙bb',12332112332,123321);

#
# Structure for table "tp_admin_user"
#

CREATE TABLE `tp_admin_user` (
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `salt` char(32) NOT NULL DEFAULT '' COMMENT '密码的密钥',
  `add_time` int(11) NOT NULL DEFAULT '0',
  `last_login` int(11) NOT NULL DEFAULT '0',
  `last_ip` varchar(15) NOT NULL DEFAULT '0',
  `identifier` char(32) DEFAULT '',
  `token` char(32) DEFAULT NULL COMMENT '保存的cookie',
  `last_setcookie` int(11) DEFAULT NULL COMMENT '保存cookie的时间',
  `role_id` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "tp_admin_user"
#

INSERT INTO `tp_admin_user` VALUES (4,'aa','aa@qq.com','774c8fbdae23becac71085f58bedc729','ed7679780ca4028cdeb9625cfd11d9fe',0,1448614889,'127.0.0.1','','',0,8),(5,'admin','admin@qq.com','a3a21351db26fea38cc237f661fcad40','122602f8e2e1756d55f47bae7846e3f9',0,1449416653,'127.0.0.1','d41d8cd98f00b204e9800998ecf8427e','59460e5a5993feb092c9aab3c99e706a',1450021453,-1);

#
# Structure for table "tp_attribute"
#

CREATE TABLE `tp_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `att_name` varchar(32) NOT NULL DEFAULT '' COMMENT '属性名',
  `type_id` int(11) unsigned NOT NULL DEFAULT '0',
  `att_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性',
  `att_input_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '录入的方式',
  `att_input_val` varchar(255) DEFAULT '' COMMENT '录入的值',
  `sorts` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "tp_attribute"
#

INSERT INTO `tp_attribute` VALUES (1,'作者',2,0,0,'',0),(2,'图书装订',2,0,1,'平装\r\n黑白',0),(5,'尺码',4,1,1,'M\r\nL\r\nXL\r\nXXL\r\nXXXL',0),(6,'颜色',4,1,0,'',0),(7,'领型',4,1,1,'平领\r\n立领',0),(8,'音乐名',3,0,0,'',0),(11,'出版社',2,1,0,'',0),(12,'出版日期',2,0,0,'',0),(13,'测试',2,1,1,'测1\r\n测2',0),(14,'测试',4,0,0,'',0);

#
# Structure for table "tp_brand"
#

CREATE TABLE `tp_brand` (
  `brand_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(60) NOT NULL DEFAULT '' COMMENT '品牌名',
  `brand_img` varchar(80) NOT NULL DEFAULT '' COMMENT '品牌图',
  `brand_logo` varchar(80) NOT NULL DEFAULT '' COMMENT '缩略图',
  `brand_desc` text NOT NULL COMMENT '品牌描述',
  `site_url` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌网址',
  `sort_order` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`brand_id`),
  KEY `is_show` (`is_show`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "tp_brand"
#

INSERT INTO `tp_brand` VALUES (2,'鸿星尔克','2015-11-20/564e7cc02e9bb.jpg','2015-11-20/small_564e7cc02e9bb.jpg','','www.hxek.com',50,1),(3,'艾迪达斯','Brand/2015-11-26/5655f20197f73.jpg','Brand/2015-11-26/thumb_05655f20197f73.jpg','艾迪达斯艾迪达斯1','www.adds.com',50,1),(4,'诺基亚','','2015-11-20/small_564e7d2c9f34e.jpg','公司网站：http://www.nokia.com.cn/ 客服电话：...','http://www.nokia.com.cn/',50,1),(5,'摩托罗拉','','2015-11-20/small_564e7d5a0fcc4.jpg','官方咨询电话：4008105050售后网点：http://www.mo...','http://www.motorola.com.cn',50,1),(6,'多普达','','2015-11-20/small_564e7d7945f1e.jpg','官方咨询电话：4008201668售后网点：http://www.do...','http://www.dopod.com',50,1),(7,'飞利浦','','2015-11-20/small_564e7d97a41e8.jpg','官方咨询电话：4008800008售后网点：http://www.ph...','http://www.philips.com.cn',50,1),(9,'外星人','2015-11-26/5655deddd89a2.jpg','2015-11-26/small_5655deddd89a2.jpg','游戏笔记本，顶级配置','http://www.wxr.com',50,1),(10,'未来人类','Brand/2015-11-26/5655e23feb883.jpg','Brand/2015-11-26/thumb_05655e23feb883.jpg','高端游戏笔记本','http://www.wlrl.com',50,1),(11,'小洛奇','Brand/2015-11-26/5655e3926d27b.jpg','Brand/2015-11-26/thumb_05655e3926d27b.jpg','小洛奇小洛奇','http://www.luoqi.com',50,1);

#
# Structure for table "tp_cart"
#

CREATE TABLE `tp_cart` (
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `goods_attr_id` varchar(32) NOT NULL DEFAULT '' COMMENT '商品属性id',
  `goods_nums` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  `meb_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录用户的id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tp_cart"
#

INSERT INTO `tp_cart` VALUES (32,'80,82,85',3,2);

#
# Structure for table "tp_category"
#

CREATE TABLE `tp_category` (
  `cat_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(90) NOT NULL DEFAULT '' COMMENT '类别名称',
  `measure_unit` varchar(10) NOT NULL DEFAULT '' COMMENT '数量单位',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `cat_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '类别描述',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父类id',
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '50' COMMENT '类别排序',
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0',
  `is_show` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `grade` tinyint(3) NOT NULL DEFAULT '0' COMMENT '等级',
  `filter_attr` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "tp_category"
#

INSERT INTO `tp_category` VALUES (14,'男女服装','件','','服装分类',0,50,0,1,0,'0'),(15,'男装','件','','这是男装',14,50,0,1,1,'0'),(16,'女装','件','','这是女装',14,50,0,1,1,'0'),(17,'鞋包配饰','无','','鞋包配饰',0,50,0,1,0,'0'),(18,'日用百货','无','','日用百货',0,50,0,1,0,'0'),(19,'手机数码','无','','手机数码',0,50,0,1,0,'0'),(20,'运动户外','无','','运动户外',0,50,0,1,0,'0'),(21,'家电办公','无','','家电办公',0,50,0,1,0,'0'),(22,'美食茶酒','无','','美食茶酒',0,50,0,1,0,'0'),(23,'护肤彩妆','无','','护肤彩妆',0,50,0,1,0,'0'),(24,'妈咪宝贝','无','','妈咪宝贝',0,50,0,1,2,'0'),(25,'风衣','件','','风衣',16,50,0,1,2,'0'),(26,'上衣','件','','上衣',15,50,0,1,2,'0'),(27,'风衣','件','','风衣',15,50,0,1,2,'0'),(28,'牛仔裤','条','','牛仔裤',15,50,0,1,2,'0'),(29,'短袖','件','','短袖',15,50,0,1,2,'0'),(30,'情侣装','件','','情侣装',16,50,0,1,2,'0'),(31,'连衣裙','条','','连衣裙',16,50,0,1,2,'0'),(32,'女鞋','双','','鞋子',17,50,0,1,1,'0'),(33,'包包','个','','包包',17,50,0,1,1,'0'),(34,'男鞋','双','','男鞋',17,50,0,1,1,'0'),(35,'高跟鞋','双','','高跟鞋',32,50,0,1,2,'0'),(36,'皮鞋','双','','皮鞋',34,50,0,1,2,'0'),(37,'小包','个','','小包',33,50,0,1,2,'0'),(38,'中包','个','','中包',33,50,0,1,2,'0'),(39,'大包','个','','大包',33,50,0,1,2,'0'),(43,'韩版','件','','韩版',16,50,0,1,2,'0'),(44,'卫衣','件','','卫衣',16,50,0,1,2,'0'),(46,'羽绒','','','',16,50,0,1,2,'0'),(48,'棉衣','件','','棉衣',16,50,0,1,2,'0'),(49,'套装','件','','套装',16,50,0,1,2,'0'),(50,'潮搭','件','','潮搭',15,50,0,1,2,'0'),(51,'设计款','件','','设计款',15,50,0,1,2,'0'),(52,'夹克','件','','夹克',15,50,0,1,2,'0'),(53,'卫衣','件','','卫衣',15,50,0,1,2,'0'),(54,'衬衫','件','','衬衫',15,50,0,1,2,'0'),(55,'羽绒服','件','','羽绒服',15,50,0,1,2,'0');

#
# Structure for table "tp_favorite"
#

CREATE TABLE `tp_favorite` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收藏的商品';

#
# Data for table "tp_favorite"
#


#
# Structure for table "tp_goods"
#

CREATE TABLE `tp_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(80) NOT NULL DEFAULT '' COMMENT '商品名称',
  `goods_sn` varchar(10) NOT NULL DEFAULT '' COMMENT '商品的货号',
  `cat_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `brand_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '属性id',
  `shop_price` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '本店价格',
  `user_price` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员价格',
  `market_price` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '市场价格',
  `goods_desc` text COMMENT '商品描述',
  `goods_number` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存量',
  `warn_number` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '库存警告数量',
  `is_best` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否精品',
  `is_on_sale` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否上架',
  `is_alone_sale` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否作为普通商品出售（否则只能作为赠品）',
  `is_shipping` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否免运费',
  `goods_brief` text COMMENT '商品简单描述',
  `seller_note` text COMMENT '商家留言',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品',
  `image_medium` varchar(255) DEFAULT NULL COMMENT '中等缩略图',
  `image_thumb` varchar(255) DEFAULT NULL COMMENT '图片缩略图',
  `image_path` varchar(255) DEFAULT NULL COMMENT '图片源图',
  `is_del` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '回收状态，1表示已被回收',
  `Browse_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '访问量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='商品表';

#
# Data for table "tp_goods"
#

INSERT INTO `tp_goods` VALUES (15,'小洛奇','111',3,3,2500,2200,2800,'&lt;p&gt;&amp;nbsp;小洛奇 &amp;nbsp;这是一件服装&lt;/p&gt;',81,10,1,1,1,1,'简单描述：小洛奇  这是一件服装','商家备注：小洛奇  这是一件服装',1,1,'Goods/2015-11-23/thumb_156529e4e0095e.jpg','Goods/2015-11-23/thumb_056529e4e0095e.jpg','Goods/2015-11-23/56529e4e0095e.jpg',1,0),(16,'洛奇1','00001',50,11,300,250,350,'&lt;p&gt;&amp;nbsp;11111111111111111111111111&lt;/p&gt;',81,10,1,1,1,1,'衣服','',1,1,'Goods/2015-11-27/thumb_1565851e790282.jpg','Goods/2015-11-27/thumb_0565851e790282.jpg','Goods/2015-11-27/565851e790282.jpg',0,0),(17,'洛奇2','00002',50,3,500,400,600,'&lt;p&gt;22222222222&lt;/p&gt;',81,12,1,1,1,0,'11111','',0,0,'Goods/2015-11-27/thumb_156585264d48e8.jpg','Goods/2015-11-27/thumb_056585264d48e8.jpg','Goods/2015-11-27/56585264d48e8.jpg',0,0),(18,'洛奇3','00003',50,11,11,1,11,'&lt;p&gt;&amp;nbsp;33333&lt;/p&gt;',81,10,1,1,1,0,'','',1,0,'Goods/2015-11-27/thumb_1565852b13cca8.jpg','Goods/2015-11-27/thumb_0565852b13cca8.jpg','Goods/2015-11-27/565852b13cca8.jpg',0,0),(19,'洛奇4','00005',50,0,345,24,345,'&lt;p&gt;&amp;nbsp;453453&lt;/p&gt;',81,1,1,1,1,0,'','',1,1,'Goods/2015-11-27/thumb_1565853436d76a.jpg','Goods/2015-11-27/thumb_0565853436d76a.jpg','Goods/2015-11-27/565853436d76a.jpg',0,0),(20,'洛奇5','00005',50,2,4546,353,3535,'&lt;p&gt;&amp;nbsp;345345&lt;/p&gt;',81,35,1,1,1,0,'345','3453',1,1,'Goods/2015-11-27/thumb_15658539a77395.jpg','Goods/2015-11-27/thumb_05658539a77395.jpg','Goods/2015-11-27/5658539a77395.jpg',0,0),(21,'洛奇6','111',50,11,228,200,250,'&lt;p&gt;&amp;nbsp;12312312&lt;/p&gt;',81,1,1,1,1,0,'123','',1,1,'Goods/2015-11-27/thumb_156585ad4c54ed.jpg','Goods/2015-11-27/thumb_056585ad4c54ed.jpg','Goods/2015-11-27/56585ad4c54ed.jpg',0,0),(22,'洛奇','00005',50,11,225,240,300,'&lt;p&gt;&amp;nbsp;1231&lt;/p&gt;',81,1,1,1,1,0,'','',1,1,'Goods/2015-11-27/thumb_156585b4d094a2.jpg','Goods/2015-11-27/thumb_056585b4d094a2.jpg','Goods/2015-11-27/56585b4d094a2.jpg',0,0),(23,'洛奇7','00007',50,3,520,500,550,'&lt;p&gt;&amp;nbsp;fsdfsdf&lt;/p&gt;',81,10,1,1,1,0,'dgdfg','sf',1,0,'Goods/2015-11-27/thumb_156585c39ab0aa.jpg','Goods/2015-11-27/thumb_056585c39ab0aa.jpg','Goods/2015-11-27/56585c39ab0aa.jpg',0,0),(24,'洛奇8','00008',50,0,480,450,520,'&lt;p&gt;&amp;nbsp;fgdfg&lt;/p&gt;',81,12,0,1,1,0,'','',1,1,'Goods/2015-11-27/thumb_156585cadef8f5.jpg','Goods/2015-11-27/thumb_056585cadef8f5.jpg','Goods/2015-11-27/56585cadef8f5.jpg',0,0),(25,'洛奇9','00009',50,11,320,300,350,'&lt;p&gt;&amp;nbsp;dfsdfs&lt;/p&gt;',81,12,1,1,1,0,'zzzz','zzz',1,1,'Goods/2015-11-29/thumb_15659d6a042964.jpg','Goods/2015-11-29/thumb_05659d6a042964.jpg','Goods/2015-11-29/5659d6a042964.jpg',0,0),(26,'洛奇9','00009',50,11,320,300,350,'&lt;p&gt;&amp;nbsp;zzzz&lt;/p&gt;',81,12,1,1,1,1,'zzz','zzz',1,1,'Goods/2015-11-29/thumb_15659d708e9167.jpg','Goods/2015-11-29/thumb_05659d708e9167.jpg','Goods/2015-11-29/5659d708e9167.jpg',0,0),(27,'小洛奇','00009',50,11,320,300,350,'&lt;p&gt;&amp;nbsp;zzzz&lt;/p&gt;',81,12,1,1,1,0,'zzzz','',1,1,'Goods/2015-11-29/thumb_15659d7668b6ca.jpg','Goods/2015-11-29/thumb_05659d7668b6ca.jpg','Goods/2015-11-29/5659d7668b6ca.jpg',0,0),(28,'小洛奇','00009',50,11,320,300,350,'&lt;p&gt;&amp;nbsp;zzzz&lt;/p&gt;',81,12,1,1,1,0,'zzzz','',1,1,'Goods/2015-11-29/thumb_15659d7e1e1dd1.jpg','Goods/2015-11-29/thumb_05659d7e1e1dd1.jpg','Goods/2015-11-29/5659d7e1e1dd1.jpg',0,0),(29,'aasd','1213',50,11,1231,1231,1231,'&lt;p&gt;&amp;nbsp;123&lt;/p&gt;',81,12,1,1,1,0,'','',1,1,'Goods/2015-11-29/thumb_15659d9770f366.jpg','Goods/2015-11-29/thumb_05659d9770f366.jpg','Goods/2015-11-29/5659d9770f366.jpg',0,0),(30,'小小洛奇','000010',50,11,280,260,300,'&lt;p&gt;&amp;nbsp;zzzz&lt;/p&gt;',81,0,1,1,1,0,'','',1,1,'Goods/2015-11-29/thumb_15659dac900a4f.jpg','Goods/2015-11-29/thumb_05659dac900a4f.jpg','Goods/2015-11-29/5659dac900a4f.jpg',0,0),(31,'小小洛奇','000011',50,11,400,350,450,'&lt;p&gt;&amp;nbsp;zzzzz&lt;/p&gt;',81,12,1,1,1,1,'zzzz','',1,1,'Goods/2015-11-29/thumb_15659dbc43a5a1.jpg','Goods/2015-11-29/thumb_05659dbc43a5a1.jpg','Goods/2015-11-29/5659dbc43a5a1.jpg',0,0),(32,'小小小','11231',50,2,200,150,250,'&lt;p&gt;&amp;nbsp;hghgghg&lt;/p&gt;',50,12,1,1,1,0,'llllllll','',1,1,'Goods/2015-12-05/thumb_15662d59849df1.jpg','Goods/2015-12-05/thumb_05662d59849df1.jpg','Goods/2015-12-05/5662d59849df1.jpg',0,0);

#
# Structure for table "tp_goods_album"
#

CREATE TABLE `tp_goods_album` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `album_path` varchar(255) NOT NULL DEFAULT '0' COMMENT '源图',
  `album_thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '相册缩略图',
  `album_desc` varchar(255) DEFAULT NULL COMMENT '相册描述',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='商品相册';

#
# Data for table "tp_goods_album"
#

INSERT INTO `tp_goods_album` VALUES (5,15,'Album/2015-11-23/56529e4e871d5.jpg','Album/2015-11-23/thumb_056529e4e871d5.jpg',NULL),(6,15,'Album/2015-11-23/56529e4e8c3df.jpg','Album/2015-11-23/thumb_156529e4e8c3df.jpg',NULL),(7,16,'Album/2015-11-27/565851e8e0fc6.jpg','Album/2015-11-27/thumb_0565851e8e0fc6.jpg',NULL),(8,16,'Album/2015-11-27/565851e8e2b1e.jpg','Album/2015-11-27/thumb_2565851e8e2b1e.jpg',NULL),(9,16,'Album/2015-11-27/565851e8e699f.jpg','Album/2015-11-27/thumb_3565851e8e699f.jpg',NULL),(10,17,'Album/2015-11-27/565852655bb6c.jpg','Album/2015-11-27/thumb_0565852655bb6c.jpg',NULL),(11,17,'Album/2015-11-27/565852655cb0d.jpg','Album/2015-11-27/thumb_1565852655cb0d.jpg',NULL),(12,17,'Album/2015-11-27/565852655daad.jpg','Album/2015-11-27/thumb_2565852655daad.jpg',NULL),(13,17,'Album/2015-11-27/565852655f21d.jpg','Album/2015-11-27/thumb_3565852655f21d.jpg',NULL),(14,18,'Album/2015-11-27/565852b20b3de.jpg','Album/2015-11-27/thumb_0565852b20b3de.jpg',NULL),(15,18,'Album/2015-11-27/565852b20c37e.jpg','Album/2015-11-27/thumb_1565852b20c37e.jpg',NULL),(16,18,'Album/2015-11-27/565852b20d31e.jpg','Album/2015-11-27/thumb_2565852b20d31e.jpg',NULL),(17,18,'Album/2015-11-27/565852b20e6a6.jpg','Album/2015-11-27/thumb_3565852b20e6a6.jpg',NULL),(18,19,'Album/2015-11-27/56585343ef5a9.jpg','Album/2015-11-27/thumb_056585343ef5a9.jpg',NULL),(19,19,'Album/2015-11-27/56585343f0931.jpg','Album/2015-11-27/thumb_156585343f0931.jpg',NULL),(20,19,'Album/2015-11-27/56585343f1cb9.jpg','Album/2015-11-27/thumb_256585343f1cb9.jpg',NULL),(21,19,'Album/2015-11-27/565853440095a.jpg','Album/2015-11-27/thumb_3565853440095a.jpg',NULL),(22,20,'Album/2015-11-27/5658539b4cc14.jpg','Album/2015-11-27/thumb_05658539b4cc14.jpg',NULL),(23,20,'Album/2015-11-27/5658539b529d5.jpg','Album/2015-11-27/thumb_15658539b529d5.jpg',NULL),(24,20,'Album/2015-11-27/5658539b5358d.jpg','Album/2015-11-27/thumb_25658539b5358d.jpg',NULL),(25,20,'Album/2015-11-27/5658539b5452e.jpg','Album/2015-11-27/thumb_35658539b5452e.jpg',NULL),(26,22,'Album/2015-11-27/56585b4dacdf8.jpg','Album/2015-11-27/thumb_056585b4dacdf8.jpg',NULL),(27,22,'Album/2015-11-27/56585b4db23e9.jpg','Album/2015-11-27/thumb_056585b4db23e9.jpg',NULL),(28,22,'Album/2015-11-27/56585b4db3389.jpg','Album/2015-11-27/thumb_056585b4db3389.jpg',NULL),(29,22,'Album/2015-11-27/56585b4db432a.jpg','Album/2015-11-27/thumb_056585b4db432a.jpg',NULL),(30,23,'Album/2015-11-27/56585c3a2c956.jpg','Album/2015-11-27/thumb_056585c3a2c956.jpg',NULL),(31,23,'Album/2015-11-27/56585c3a2e896.jpg','Album/2015-11-27/thumb_056585c3a2e896.jpg',NULL),(32,23,'Album/2015-11-27/56585c3a34a3f.jpg','Album/2015-11-27/thumb_056585c3a34a3f.jpg',NULL),(33,23,'Album/2015-11-27/56585c3a35dc8.jpg','Album/2015-11-27/thumb_056585c3a35dc8.jpg',NULL),(34,24,'Album/2015-11-27/56585cb2804b9.jpg','Album/2015-11-27/thumb_056585cb2804b9.jpg',NULL),(35,24,'Album/2015-11-27/56585cb282fb1.jpg','Album/2015-11-27/thumb_056585cb282fb1.jpg',NULL),(36,24,'Album/2015-11-27/56585cb28433a.jpg','Album/2015-11-27/thumb_056585cb28433a.jpg',NULL),(37,24,'Album/2015-11-27/56585cb287602.jpg','Album/2015-11-27/thumb_056585cb287602.jpg',NULL),(38,28,'Album/2015-11-29/5659d7e292488.jpg','Album/2015-11-29/thumb_05659d7e292488.jpg',NULL),(39,28,'Album/2015-11-29/5659d7e293bf8.jpg','Album/2015-11-29/thumb_05659d7e293bf8.jpg',NULL),(40,28,'Album/2015-11-29/5659d7e294f81.jpg','Album/2015-11-29/thumb_05659d7e294f81.jpg',NULL),(41,31,'Album/2015-11-29/5659dbc568c15.jpg','Album/2015-11-29/thumb_05659dbc568c15.jpg',NULL),(42,31,'Album/2015-11-29/5659dbc56c2c6.jpg','Album/2015-11-29/thumb_05659dbc56c2c6.jpg',NULL),(43,31,'Album/2015-11-29/5659dbc56d64e.jpg','Album/2015-11-29/thumb_05659dbc56d64e.jpg',NULL),(44,31,'Album/2015-11-29/5659dbc56e9d6.jpg','Album/2015-11-29/thumb_05659dbc56e9d6.jpg',NULL),(45,32,'Album/2015-12-05/5662d5998bcea.jpg','Album/2015-12-05/thumb_05662d5998bcea.jpg',NULL),(46,32,'Album/2015-12-05/5662d5998f783.jpg','Album/2015-12-05/thumb_05662d5998f783.jpg',NULL),(47,32,'Album/2015-12-05/5662d59992e33.jpeg','Album/2015-12-05/thumb_05662d59992e33.jpeg',NULL),(48,32,'Album/2015-12-05/5662d59994d74.jpg','Album/2015-12-05/thumb_05662d59994d74.jpg',NULL);

#
# Structure for table "tp_goods_attr"
#

CREATE TABLE `tp_goods_attr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `attr_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '属性id',
  `attr_value` varchar(255) NOT NULL DEFAULT '' COMMENT '属性值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='商品和属性关系表';

#
# Data for table "tp_goods_attr"
#

INSERT INTO `tp_goods_attr` VALUES (26,15,1,'洛奇'),(27,15,2,'平装\r\n'),(28,15,11,'小洛奇出版社'),(29,15,12,'2015-11-23'),(30,15,13,'测2'),(31,16,5,'XL\r\n'),(32,16,6,'黑色'),(33,16,7,'立领'),(34,17,5,'L\r\n'),(35,17,6,'白色'),(36,17,7,'平领\r\n'),(37,18,5,'M\r\n'),(38,18,6,'红色'),(39,18,7,'平领\r\n'),(40,19,5,'XXL\r\n'),(41,19,6,'灰色'),(42,19,7,'立领'),(43,20,5,'XL\r\n'),(44,20,6,'黑色'),(45,20,7,'立领'),(46,21,5,'XXL\r\n'),(47,21,6,'白色'),(48,21,7,'平领\r\n'),(49,22,5,'XL\r\n'),(50,22,6,'白色'),(51,22,7,'平领\r\n'),(52,23,5,'XL\r\n'),(53,23,6,'灰色'),(54,23,7,'平领\r\n'),(55,24,5,'M\r\n'),(56,24,6,'白色'),(57,24,7,'平领\r\n'),(58,25,5,'XXL\r\n'),(59,25,6,'白色'),(60,25,7,'平领\r\n'),(61,26,5,'XXL\r\n'),(62,26,6,'灰色'),(63,26,7,'立领'),(64,27,5,'XXL\r\n'),(65,27,6,'灰色'),(66,27,7,'立领'),(67,28,5,'XXL\r\n'),(68,28,6,'灰色'),(69,28,7,'立领'),(70,31,5,'M\r\n'),(71,31,5,'L\r\n'),(72,31,5,'XL\r\n'),(73,31,5,'XXL\r\n'),(74,31,6,'白色'),(75,31,6,'黑色'),(76,31,6,'灰色'),(77,31,7,'平领\r\n'),(78,31,7,'立领'),(79,32,5,'M\r\n'),(80,32,5,'M\r\n'),(81,32,5,'XL\r\n'),(82,32,6,'白色'),(83,32,6,'黑色'),(84,32,7,'立领'),(85,32,7,'平领\r\n'),(86,32,14,'测试');

#
# Structure for table "tp_goodstype"
#

CREATE TABLE `tp_goodstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(32) NOT NULL DEFAULT '' COMMENT '商品类别名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品类别表';

#
# Data for table "tp_goodstype"
#

INSERT INTO `tp_goodstype` VALUES (2,'书',1),(3,'音乐',1),(4,'服装服饰',1),(5,'手机',1),(6,'笔记本电脑',1),(7,'化妆品',1);

#
# Structure for table "tp_grade"
#

CREATE TABLE `tp_grade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gd_name` varchar(32) NOT NULL DEFAULT '' COMMENT '等级名称',
  `min_integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分下限',
  `max_integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '积分上线',
  `discount` tinyint(3) NOT NULL DEFAULT '100' COMMENT '初始折扣率',
  `is_price` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否显示商品价格',
  `special` tinyint(3) NOT NULL DEFAULT '0' COMMENT '特殊会员组',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='会员等级表';

#
# Data for table "tp_grade"
#

INSERT INTO `tp_grade` VALUES (1,'普通用户',0,1000,100,1,0),(2,'白金用户',1000,20000,90,1,0),(3,'黄金用户',20000,100000,80,1,0),(4,'钻石用户',100000,500000,70,1,0);

#
# Structure for table "tp_meb_browse"
#

CREATE TABLE `tp_meb_browse` (
  `meb_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览的商品',
  `browse_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '浏览的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户浏览的商品表';

#
# Data for table "tp_meb_browse"
#

INSERT INTO `tp_meb_browse` VALUES (2,31,1449469217),(2,29,1449484485),(2,30,1449165268),(2,17,1449134378),(2,23,1449307864),(2,32,1449552129);

#
# Structure for table "tp_meb_reg"
#

CREATE TABLE `tp_meb_reg` (
  `meb_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `reg_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册项信息',
  `reg_val` varchar(255) NOT NULL DEFAULT '' COMMENT '注册项值',
  KEY `meb_id` (`meb_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员注册信息';

#
# Data for table "tp_meb_reg"
#


#
# Structure for table "tp_member"
#

CREATE TABLE `tp_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `meb_name` varchar(32) NOT NULL DEFAULT '' COMMENT '会员名称',
  `password` char(32) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `is_verify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否验证',
  `usable_fund` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '可用资金',
  `block_fund` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '冻结资金',
  `gd_integral` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '等级积分',
  `cs_integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '消费积分',
  `add_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员';

#
# Data for table "tp_member"
#

INSERT INTO `tp_member` VALUES (2,'luoqi','c3aea3a2263b16ce9780ce78dd3d0b71','luoq',0,0,0,0,0,0);

#
# Structure for table "tp_nav"
#

CREATE TABLE `tp_nav` (
  `nav_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(80) NOT NULL DEFAULT '' COMMENT '栏目名',
  `nav_pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `nav_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `open_new` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否新窗口',
  `location` varchar(10) NOT NULL DEFAULT '' COMMENT '位置',
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='导航栏';

#
# Data for table "tp_nav"
#

INSERT INTO `tp_nav` VALUES (5,'团购',0,'javascript:',0,1,0,'middle'),(6,'品牌',0,'javascript:',1,1,0,'middle'),(7,'优惠券',0,'javascript:',2,1,0,'middle'),(8,'积分中心',0,'javascript:',3,1,0,'middle'),(9,'运动专场',0,'javascript:',4,1,0,'middle'),(10,'微商城',0,'javascript:',5,1,0,'middle'),(11,'我的商城',0,'javascript:',0,1,0,'top'),(12,'卖家中心',0,'javascript:',1,1,0,'top'),(13,'我的收藏',0,'javascript:',2,1,0,'top'),(14,'站内消息',0,'javascript:',3,1,0,'top'),(15,'已买到商品',11,'javascript:',5,1,0,'top'),(16,'个人主页',11,'javascript:',6,1,0,'top'),(17,'我的好友',11,'javascript:',7,1,0,'top'),(18,'已售出的商品',12,'javascript:',0,1,0,'top'),(19,'销售中的商品',12,'javascript:',1,1,0,'top'),(20,'收藏的商品',13,'javascript:',0,1,0,'top'),(21,'收藏的店铺',13,'javascript:',1,1,0,'top');

#
# Structure for table "tp_order"
#

CREATE TABLE `tp_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(32) NOT NULL DEFAULT '' COMMENT '订单的编号',
  `goods_amount` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '订单的金额',
  `pay_status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态，0未支付，1已支付',
  `meb_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录用户的id',
  `address_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '收货人',
  `payment` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '支付方式',
  `shipping` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配送方式',
  `addtime` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  `order_desc` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='订单信息表';

#
# Data for table "tp_order"
#

INSERT INTO `tp_order` VALUES (13,'sn_5665252b9f6f0',1800,0,2,3,1,1,1449469227,NULL),(14,'sn_566560f7deefc',3693,0,2,3,1,1,1449484535,NULL);

#
# Structure for table "tp_order_goods"
#

CREATE TABLE `tp_order_goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '订单id',
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品的id',
  `goods_name` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的名称',
  `goods_attr_id` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的属性',
  `shop_price` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品的本店价',
  `goods_nums` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '购买数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='订单和商品的关系表';

#
# Data for table "tp_order_goods"
#

INSERT INTO `tp_order_goods` VALUES (14,13,32,'小小小','79,82,85',200,3),(15,13,31,'小小洛奇','70,75,77',400,3),(16,14,29,'aasd','',1231,3);

#
# Structure for table "tp_privilege"
#

CREATE TABLE `tp_privilege` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `priv_name` varchar(20) NOT NULL COMMENT '权限名称',
  `parent_pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父id',
  `module_name` varchar(32) NOT NULL DEFAULT '' COMMENT '模块',
  `controller_name` varchar(32) NOT NULL DEFAULT '' COMMENT '控制器',
  `action_name` varchar(32) NOT NULL DEFAULT '' COMMENT '操作方法',
  `priv_level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '权限级别',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='权限表';

#
# Data for table "tp_privilege"
#

INSERT INTO `tp_privilege` VALUES (1,'商品管理',0,'','','',0),(2,'订单管理',0,'','','',0),(3,'权限管理',0,'','','',0),(4,'商品列表',1,'Admin','Goods','getlist',1),(5,'添加新商品',1,'Admin','Goods','add',1),(6,'商品品牌',1,'Admin','Brand','getlist',1),(7,'订单列表',2,'Admin','Order','getlist',1),(8,'添加订单',2,'Admin','Order','add',1),(9,'发货单列表',2,'Admin','Order','printorder',1),(10,'管理员列表',3,'Admin','User','getlist',1),(11,'角色列表',3,'Admin','Role','getlist',1),(14,'系统设置',0,'','','',0),(15,'商品分类',1,'admin','Category','getlist',1),(16,'商品类型',1,'admin','Goodstype','getlist',1),(17,'栏目列表',14,'admin','Privilege','getlist',1),(19,'商品回收站',1,'admin','trash','getlist',1),(20,'会员管理',0,'','','',0),(22,'添加会员',20,'admin','member','add',1),(23,'会员等级',20,'admin','grade','getlist',1),(24,'会员注册项设置',14,'admin','register','getlist',1),(27,'会员列表',20,'admin','member','getlist',1),(28,'自定义导航栏',14,'admin','nav','getlist',1);

#
# Structure for table "tp_product"
#

CREATE TABLE `tp_product` (
  `goods_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `goods_attr_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品属性',
  `goods_nums` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '库存量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='货品库存表';

#
# Data for table "tp_product"
#

INSERT INTO `tp_product` VALUES (31,'71,74,77',11),(31,'71,74,78',12),(31,'71,75,77',13),(31,'71,75,78',14),(31,'71,76,77',15),(31,'71,76,78',16);

#
# Structure for table "tp_register"
#

CREATE TABLE `tp_register` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `reg_order` tinyint(3) NOT NULL DEFAULT '50' COMMENT '排序',
  `reg_display` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `reg_need` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `reg_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '判断输入类型',
  `reg_input_type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '录入方式',
  `reg_input_val` varchar(255) DEFAULT NULL COMMENT '列表可选值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='会员注册项';

#
# Data for table "tp_register"
#

INSERT INTO `tp_register` VALUES (1,'姓名',50,1,1,0,0,NULL),(2,'电话号码',50,1,1,0,0,NULL),(4,'性别',50,1,1,1,1,'男\r\n女');

#
# Structure for table "tp_role"
#

CREATE TABLE `tp_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(80) NOT NULL DEFAULT '' COMMENT '角色的名字',
  `role_desc` varchar(255) DEFAULT '' COMMENT '角色描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='角色表';

#
# Data for table "tp_role"
#

INSERT INTO `tp_role` VALUES (8,'总经理','总经理拥有除了系统设置之外的所有权限'),(9,'总管','总管拥有商品和订单管理的权限。');

#
# Structure for table "tp_role_priv"
#

CREATE TABLE `tp_role_priv` (
  `role_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '角色的id',
  `priv_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '权限的id',
  KEY `priv_id` (`priv_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色和权限关系表';

#
# Data for table "tp_role_priv"
#

INSERT INTO `tp_role_priv` VALUES (9,1),(9,4),(9,5),(9,6),(9,16),(8,1),(8,4),(8,5),(8,6),(8,15),(8,16),(8,19),(8,2),(8,7),(8,8),(8,9),(8,3),(8,10),(8,11),(8,14),(8,17),(8,20);
