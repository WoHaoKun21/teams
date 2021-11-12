/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.5-10.1.38-MariaDB : Database - leave_message69_lz
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `leave_message69_lz`;

USE `leave_message69_lz`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `adminslz` */

DROP TABLE IF EXISTS `adminslz`;

CREATE TABLE `adminslz` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `adminslz` */

insert  into `adminslz`(`userId`,`userName`,`pwd`) values (1,'tom','202cb962ac59075b964b07152d234b70'),(2,'jarry','202cb962ac59075b964b07152d234b70'),(3,'susan','202cb962ac59075b964b07152d234b70');

/*Table structure for table `messagelz` */

DROP TABLE IF EXISTS `messagelz`;

CREATE TABLE `messagelz` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `face` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1.gif',
  `sh` smallint(6) NOT NULL DEFAULT '0',
  `reply` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zan` int(8) NOT NULL DEFAULT '0',
  `addTime` datetime NOT NULL,
  PRIMARY KEY (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `messagelz` */

insert  into `messagelz`(`messageId`,`author`,`title`,`content`,`face`,`sh`,`reply`,`zan`,`addTime`) values (1,'秋天的雨','今年雨挺多','雨水多，空气好','1.gif',1,'哈哈哈哈是啊',255,'2021-10-08 00:00:00'),(2,'冬天的雪','好好学习，天天向上','没有无缘无故的成功，也没有无缘无故的失败','3.gif',1,NULL,188,'2021-10-07 00:00:00'),(3,'奋斗','少壮不努力老大徒伤悲','知识改变命运','6.gif',1,'说得好啊',224,'2021-10-08 13:36:21'),(4,'小111','八点了','该学习了','15.gif',1,'快去学习吧',66,'2021-10-12 09:44:30'),(5,'啊哈哈哈','测试','哈哈哈哈哈哈','1.gif',1,NULL,177,'2021-10-12 10:01:13'),(7,'蛋蛋','蛋蛋哒哒哒','嗷嗷嗷','35.gif',1,NULL,66,'2021-10-12 10:02:27'),(8,'aaa','bbbb','bbbbb','19.gif',1,NULL,223,'2021-10-12 10:02:40'),(9,'11111','1111','1111111','40.gif',1,NULL,251,'2021-10-12 10:02:49'),(10,'1楼','披荆斩棘','弱者只有千难万难，而勇者则能披荆斩棘；愚者只有声声哀叹，智者却有千路万路。','7.gif',1,NULL,222,'2021-10-13 09:18:29'),(11,'2楼','要努力啊','努力最大的意义：在于谋求更多的选择权，储蓄更多的安全感，让内心不失控，生活不失序。','1.gif',1,NULL,79,'2021-10-13 09:18:44'),(12,'3楼','知足常乐','在生活上我们要学会知足常乐，对事业我们永不满足。不满足现状而去进取是好事，不急不躁，脚踏实地，一步一个脚印，稳步前进。','1.gif',1,NULL,177,'2021-10-13 09:19:01'),(13,'4楼','要快乐啊','人只要生活在这个世界上，就会有很多烦恼。但是，痛苦和快乐取决于你的内心。再重的担子，笑着也是挑，哭着也是挑。再不顺的生活，微笑着撑过去了，就是胜利。','5.gif',1,NULL,153,'2021-10-13 09:19:17'),(14,'5楼','坚持坚持','任何的收获不是巧合，而是每天的努力与坚持得来的。人生因有梦想，而充满动力。 不怕你每天迈一小步，只怕你停滞不前；不怕你每天做一点事，只怕你无所事事。 坚持，是生命的一种毅力！执行，是努力的一种坚持','1.gif',1,NULL,190,'2021-10-13 09:19:32'),(15,'6楼','别放弃','如果放弃太早，你永远都不知道自己会错过什么。活着不是靠泪水搏取同情，而是靠汗水获得掌声。自卑是剪了双翼的飞鸟，难上青天，这两者都是成才的大忌。','8.gif',1,NULL,156,'2021-10-13 09:19:48'),(16,'7楼','格局大点','麻雀永远也飞不到青云之上，因为它只盯着地面的稻谷，雄鹰之所以能自由自在地在峰顶翱翔，因为它的眼里装满了山河天地。金钱物质确实是生活的必须，可是一个心中只装得下饭碗的人也不会有什么出息。人生格局看不见摸不着，却又能真正制约着一个人能走多长的路','33.gif',1,'对啊',0,'2021-10-13 09:20:19'),(17,'8号','快起床啦','起床不是为了应付今天的时间；而是必须做到今天要比昨天活得更精彩!','22.gif',1,NULL,0,'2021-10-13 09:23:02'),(18,'威尔逊','梦想','我们因梦想而伟大，所有的成功者都是大梦想家：在冬夜的火堆旁，在阴天的雨雾中，梦想着未来。有些人让梦想悄然绝灭，有些人则细心培育维护，直到它安然度过困境，迎来光明和希望，而光明和希望总是降临在那些真心相信梦想一定会成真的人身上。','1.gif',1,NULL,98,'2021-10-13 11:45:40'),(19,'柳岩','加油','拥有梦想的人是值得尊敬的，也让人羡慕。当大多数人碌碌而为为现实奔忙的时候，坚持下去，不用害怕与众不同，你该有怎么样的人生，是该你亲自去撰写的。加油！让我们一起捍卫最初的梦想。','17.gif',1,NULL,288,'2021-10-13 11:46:47'),(20,'苏霍姆林斯基','志向','志向是天才的幼苗，经过热爱劳动的双手培育，在肥田沃土里将成长为粗壮的大树。不热爱劳动，不进行自我教育，志向这棵幼苗也会连根枯死。确定个人志向，选好专业，这是幸福的源泉','11.gif',1,NULL,256,'2021-10-13 11:47:08'),(21,'诺曼·文森特·皮尔','勇气','上帝为我们每一个人都拟订了一个伟大的计划，而我们每个人都有能力去完成这个伟大的计划，这股力量就蕴藏在我们的身体之中，蕴藏在我们的才能、勇气、坚韧、决心和品格当中。我们无须到外界去寻找力量，请记住，当你抬头仰望天空中的星星时，绝不要忘记在屋子里燃烧的蜡烛。','36.gif',1,NULL,156,'2021-10-13 11:47:33'),(22,'莫泊桑','羊脂球','生活不可能像你想象的那么好，但也不会像你想象的那么糟。人的脆弱和坚强都超乎自己的想象。','1.gif',1,NULL,188,'2021-10-13 11:48:15'),(23,'威尔逊','光明和希望','我们因梦想而伟大，所有的成功者都是大梦想家：在冬夜的火堆旁，在阴天的雨雾中，梦想着未来。有些人让梦想悄然绝灭，有些人则细心培育维护，直到它安然度过困境，迎来光明和希望，而光明和希望总是降临在那些真心相信梦想一定会成真的人身上。','14.gif',1,NULL,111,'2021-10-14 21:42:41'),(24,'俞敏洪','勇气和行动','一个人要实现自己的梦想，最重要的是要具备以下两个条件：勇气和行动。','23.gif',1,NULL,167,'2021-10-14 21:43:36'),(25,'苏霍姆林斯基','有志向','志向是天才的幼苗，经过热爱劳动的双手培育，在肥田沃土里将成长为粗壮的大树。不热爱劳动，不进行自我教育，志向这棵幼苗也会连根枯死。确定个人志向，选好专业，这是幸福的源泉。','38.gif',1,NULL,125,'2021-10-14 21:44:00'),(26,'贝多芬','不积跬步无以至千里','涓滴之水终可磨损大石，不是由于它力量大，而是由于昼夜不舍的滴坠。只有勤奋不懈的努力才能够获得那些技巧，因此，我们可以确切地说：说：不积跬步，无以致千里。','1.gif',1,NULL,147,'2021-10-14 21:44:49'),(27,'浇花人','九月落叶','若说一月浅阳是你樱唇边的笑，我愿做一位抒情人，写你暖春丽影。若说三月烟雨是你眸眼中的泪，我愿做一位撑伞人，为你留住晴天。若说五月牡丹是你发髻上的花，我愿做一位浇花人，守你最美年华。若说七月流星是你闭目许的愿，我愿做一位追梦人，替你实现宿愿。若说九月落叶是你素指弹的音，我愿做一位通禅人，听你深浅心意。','35.gif',1,NULL,179,'2021-10-14 21:46:28'),(28,'安怡','风月揽入怀','风月揽入怀，无梦话千年，用一种恒长的念，留住心上一份繁华雪情的爱恋。一记回眸，风雪又起，那个天涯畔的孤影，一袭雪凉染白衣。执手梅雪盛景的情意，许你，一世安暖皈依。卸下一肩霜雪，阔别壮丽江山的光阴里，那清眉涓婉的女子，盈盈笑靥，开出一朵凡花的安怡。','28.gif',1,NULL,268,'2021-10-14 21:46:50'),(29,'十里桃花','终究不见','你说十里桃花，愿许为嫁。后来浪迹天涯，戎马天下。你说春秋几度，与卿相守。后来坐拥天下，美眷如画。你说似水年华，染指朱砂。后来满城金甲，无处问它。你说相思十诫，不忍相别。后来雪飘西楼，空望月钩。你说若水三千，独饮一瓢。后来她人相伴，遗忘誓言。你说青梅煮酒，相濡以沫后来不见竹马，泪如雨下。你说潇湘暮雨，墨染锦年。后来陌上花开，杏吹满头。','1.gif',1,NULL,190,'2021-10-14 21:47:33'),(30,'笙箫','暖城','倘若我找到一道微光，那里便是我的暖城；倘若我找到一片阴暗，那里便是我的奈落。那些从指间流失的时光和韶华，在现实的笼罩下蒸发掉最后一丝温热。如若可以，请允许我来世身若琉璃，苍笙踏歌，驾雾而来。歌不尽乱世春秋，舞不尽绿萝烟火。','37.gif',1,NULL,113,'2021-10-14 21:49:03'),(31,'垂钓者','悠闲','堆绿春草，蝶舞莺飞戏桥。落日尚早，卧牛吹箫。溪水老翁垂钓，鱼儿偷听牧谣。','32.gif',1,NULL,37,'2021-10-14 21:50:02');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;