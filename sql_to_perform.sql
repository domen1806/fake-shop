CREATE DATABASE fake-shop;

DROP TABLE IF EXISTS `migration_versions`;

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_idx` (`currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `product` WRITE;

INSERT INTO `product` (`id`, `name`, `description`, `price`, `currency`, `created_at`)
VALUES
	(1,'Biodex','Toxic effect of venom of other North and South American snake, intentional self-harm, subsequent encounter',49,'CNY','2015-11-11 00:00:00'),
	(2,'It','Displaced fracture of trapezium [larger multangular], unspecified wrist, subsequent encounter for fracture with delayed healing',100,'EUR','2015-12-30 00:00:00'),
	(3,'Ronstring','Unspecified injury of unspecified muscle, fascia and tendon at shoulder and upper arm level, unspecified arm, subsequent encounter',63,'PHP','2015-09-07 00:00:00'),
	(4,'Span','Other specified injury of brachial artery, unspecified side',19,'BDT','2016-06-15 00:00:00'),
	(5,'Span','Displaced intertrochanteric fracture of unspecified femur, subsequent encounter for closed fracture with routine healing',25,'JPY','2017-11-20 00:00:00'),
	(6,'Overhold','Blastic NK-cell lymphoma',93,'CNY','2015-08-20 00:00:00'),
	(7,'Keylex','Laceration of right renal vein, initial encounter',19,'RUB','2015-03-30 00:00:00'),
	(8,'Redhold','Unspecified physeal fracture of lower end of ulna, left arm, subsequent encounter for fracture with delayed healing',67,'HUF','2015-09-06 00:00:00'),
	(9,'Span','Other burn on board sailboat',67,'RUB','2017-10-29 00:00:00'),
	(10,'Sub-Ex','Unspecified open wound of abdominal wall, right lower quadrant without penetration into peritoneal cavity',9,'SDG','2015-06-13 00:00:00'),
	(11,'Holdlamis','Driver of snowmobile injured in traffic accident, subsequent encounter',89,'BWP','2017-11-24 00:00:00'),
	(12,'Lotstring','Ulnohumeral (joint) sprain of right elbow',35,'HRK','2016-08-27 00:00:00'),
	(13,'Span','Displaced transcondylar fracture of unspecified humerus, subsequent encounter for fracture with delayed healing',18,'CZK','2015-10-11 00:00:00'),
	(14,'Treeflex','Pathological fracture in other disease, right tibia, subsequent encounter for fracture with nonunion',73,'CZK','2015-05-18 00:00:00'),
	(15,'Cardguard','Displaced fracture of third metatarsal bone, right foot, subsequent encounter for fracture with malunion',86,'PHP','2017-11-15 00:00:00'),
	(16,'Treeflex','Displaced comminuted supracondylar fracture without intercondylar fracture of right humerus',39,'GBP','2017-08-12 00:00:00'),
	(17,'Tampflex','Puncture wound without foreign body, right thigh, subsequent encounter',40,'USD','2017-10-03 00:00:00'),
	(18,'Ventosanzap','Laceration of fallopian tube, bilateral, initial encounter',31,'EUR','2016-07-31 00:00:00'),
	(19,'Keylex','Injury of other nerves at forearm level, right arm, initial encounter',86,'BRL','2015-03-13 00:00:00'),
	(20,'Treeflex','Other fracture of unspecified ilium, subsequent encounter for fracture with delayed healing',61,'IDR','2017-08-23 00:00:00'),
	(21,'Domainer','Unspecified fracture of left ilium, initial encounter for closed fracture',91,'BRL','2017-09-04 00:00:00'),
	(22,'Biodex','Selective deficiency of immunoglobulin A [IgA]',47,'CNY','2016-07-07 00:00:00'),
	(23,'Voyatouch','Other and unspecified effects of other external causes',18,'CNY','2016-07-08 00:00:00'),
	(24,'Cookley','Nondisplaced fracture of distal phalanx of right middle finger, subsequent encounter for fracture with delayed healing',89,'RUB','2016-12-02 00:00:00'),
	(25,'Flowdesk','Nondisplaced segmental fracture of shaft of right tibia, sequela',73,'VND','2015-09-08 00:00:00'),
	(26,'Subin','Nondisplaced bimalleolar fracture of right lower leg, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with nonunion',28,'USD','2016-09-24 00:00:00'),
	(27,'Konklux','Burn of cornea and conjunctival sac, unspecified eye, subsequent encounter',3,'CNY','2016-04-13 00:00:00'),
	(28,'Overhold','Unspecified injury of left internal jugular vein, subsequent encounter',53,'PLN','2016-08-22 00:00:00'),
	(29,'Bamity','Underdosing of other systemic antibiotics, subsequent encounter',6,'IDR','2015-08-09 00:00:00'),
	(30,'Wrapsafe','Type 1 diabetes mellitus with mild nonproliferative diabetic retinopathy without macular edema, left eye',37,'ARS','2015-02-20 00:00:00'),
	(31,'Stringtough','Viral hepatitis complicating pregnancy, first trimester',24,'SEK','2016-09-08 00:00:00'),
	(32,'Sub-Ex','Subluxation of unspecified cervical vertebrae, sequela',66,'PLN','2015-06-26 00:00:00'),
	(33,'Cookley','Infection and inflammatory reaction due to implanted urinary sphincter, subsequent encounter',15,'MZN','2015-08-30 00:00:00'),
	(34,'Holdlamis','Unspecified fracture of fourth lumbar vertebra, subsequent encounter for fracture with delayed healing',15,'CNY','2015-04-28 00:00:00'),
	(35,'Trippledex','Puncture wound without foreign body of left shoulder, sequela',61,'EUR','2016-05-13 00:00:00'),
	(36,'Ronstring','Other secondary gout, multiple sites',90,'EUR','2016-01-16 00:00:00'),
	(37,'Stringtough','Subluxation of right acromioclavicular joint',92,'PHP','2016-08-17 00:00:00'),
	(38,'Sonair','Obturator subluxation of right hip, sequela',20,'CNY','2015-11-14 00:00:00'),
	(39,'Latlux','Unspecified intracranial injury with loss of consciousness of unspecified duration, sequela',93,'ILS','2017-02-18 00:00:00'),
	(40,'Konklux','Extreme immaturity of newborn, gestational age 27 completed weeks',9,'CNY','2016-07-24 00:00:00'),
	(41,'Subin','Unspecified injury of other specified muscles, fascia and tendons at wrist and hand level, unspecified hand, initial encounter',90,'LTL','2015-12-13 00:00:00'),
	(42,'Zaam-Dox','Postprocedural seroma of eye and adnexa following other procedure, bilateral',53,'EUR','2017-06-20 00:00:00'),
	(43,'Greenlam','External constriction of left hand, initial encounter',14,'CNY','2015-11-22 00:00:00'),
	(44,'Latlux','Continuing pregnancy after spontaneous abortion of one fetus or more, first trimester',10,'PEN','2017-03-17 00:00:00'),
	(45,'Daltfresh','Puncture wound with foreign body of right front wall of thorax with penetration into thoracic cavity, initial encounter',8,'CNY','2015-03-19 00:00:00'),
	(46,'Stronghold','Displaced fracture of lower epiphysis (separation) of unspecified femur, subsequent encounter for closed fracture with routine healing',88,'IDR','2017-02-08 00:00:00'),
	(47,'Solarbreeze','Unspecified injury of unspecified muscles, fascia and tendons at forearm level, right arm, initial encounter',52,'TND','2015-03-27 00:00:00'),
	(48,'Asoka','Displaced fracture of neck of second metacarpal bone, left hand, sequela',4,'MXN','2017-08-12 00:00:00'),
	(49,'Matsoft','Displaced segmental fracture of shaft of left femur, sequela',39,'CNY','2017-02-12 00:00:00'),
	(50,'Overhold','Other difficulties with micturition',8,'USD','2017-11-03 00:00:00'),
	(51,'Bitwolf','Unspecified superficial injuries of unspecified front wall of thorax',40,'CNY','2016-12-27 00:00:00'),
	(52,'Tin','Newborn small for gestational age, 750-999 grams',98,'USD','2018-01-12 00:00:00'),
	(53,'Zontrax','Burn of second degree of unspecified site of left lower limb, except ankle and foot, initial encounter',71,'PHP','2018-01-24 00:00:00'),
	(54,'Sub-Ex','Sleep apnea, unspecified',7,'ZAR','2017-10-13 00:00:00'),
	(55,'Mat Lam Tam','Carcinoma in situ of rectum',59,'BRL','2016-03-11 00:00:00'),
	(56,'Duobam','Person boarding or alighting a car injured in collision with heavy transport vehicle or bus, sequela',75,'CNY','2015-02-28 00:00:00'),
	(57,'Opela','Traumatic rupture of collateral ligament of unspecified wrist, sequela',81,'JPY','2016-11-02 00:00:00'),
	(58,'Voltsillam','Mumps myocarditis',3,'RUB','2016-03-22 00:00:00'),
	(59,'Aerified','Laceration without foreign body, left hip, subsequent encounter',96,'RUB','2016-12-28 00:00:00'),
	(60,'Gembucket','Maternal care for hydrops fetalis, unspecified trimester, not applicable or unspecified',14,'COP','2017-11-14 00:00:00'),
	(61,'Flexidy','Toxic effect of hydrogen sulfide, accidental (unintentional), initial encounter',13,'SEK','2017-06-24 00:00:00'),
	(62,'Fixflex','Injury of lesser saphenous vein at lower leg level',97,'CNY','2017-07-21 00:00:00'),
	(63,'Latlux','Partial traumatic amputation at elbow level, unspecified arm, sequela',26,'IDR','2018-02-03 00:00:00'),
	(64,'Tres-Zap','Poisoning by emollients, demulcents and protectants, assault, initial encounter',60,'PEN','2015-12-17 00:00:00'),
	(65,'Bitwolf','Newborn affected by abnormal uterine contractions',26,'ETB','2015-06-10 00:00:00'),
	(66,'Fixflex','Sylvatic rabies',60,'CNY','2015-03-30 00:00:00'),
	(67,'Tres-Zap','Other specified injury of greater saphenous vein at lower leg level, left leg, sequela',23,'EUR','2017-05-30 00:00:00'),
	(68,'Bytecard','Other dislocation of unspecified radial head, initial encounter',29,'CNY','2016-07-07 00:00:00'),
	(69,'Sub-Ex','Contact blepharoconjunctivitis, unspecified eye',78,'PEN','2016-02-18 00:00:00'),
	(70,'Kanlam','Granuloma of left orbit',54,'IDR','2016-01-23 00:00:00'),
	(71,'Biodex','Type III traumatic spondylolisthesis of second cervical vertebra, subsequent encounter for fracture with routine healing',86,'AUD','2015-05-29 00:00:00'),
	(72,'Holdlamis','Major laceration of femoral artery, left leg, sequela',33,'TZS','2017-07-11 00:00:00'),
	(73,'Greenlam','Lead-induced chronic gout, left wrist',81,'THB','2017-04-26 00:00:00'),
	(74,'Voyatouch','Other physeal fracture of upper end of radius, unspecified arm, sequela',9,'EUR','2018-02-09 00:00:00'),
	(75,'Zoolab','Laceration without foreign body, unspecified thigh',25,'EUR','2017-04-07 00:00:00'),
	(76,'Zamit','Other contact with hot air and other hot gases, subsequent encounter',36,'EUR','2015-10-14 00:00:00'),
	(77,'Asoka','Salter-Harris Type IV physeal fracture of lower end of radius, unspecified arm, subsequent encounter for fracture with nonunion',61,'CNY','2017-05-18 00:00:00'),
	(78,'Bitchip','Ocular laceration and rupture with prolapse or loss of intraocular tissue, left eye',95,'PHP','2016-12-31 00:00:00'),
	(79,'Matsoft','Displaced fracture of proximal phalanx of unspecified great toe, subsequent encounter for fracture with nonunion',70,'PEN','2015-02-13 00:00:00'),
	(80,'Namfix','Interstitial myositis',38,'CZK','2015-03-20 00:00:00'),
	(81,'Home Ing','Cervical disc disorder, unspecified, cervicothoracic region',32,'EUR','2016-03-15 00:00:00'),
	(82,'Fixflex','Other fracture of shaft of left fibula, initial encounter for open fracture type IIIA, IIIB, or IIIC',47,'OMR','2016-02-14 00:00:00'),
	(83,'Overhold','Toxic effect of sulfur dioxide, assault, subsequent encounter',79,'PEN','2017-09-06 00:00:00'),
	(84,'Zoolab','Contusion of fallopian tube, bilateral, subsequent encounter',6,'THB','2017-04-01 00:00:00'),
	(85,'Overhold','Supervision of other high risk pregnancies, first trimester',73,'CNY','2017-08-19 00:00:00'),
	(86,'Greenlam','Nondisplaced transverse fracture of shaft of right fibula, subsequent encounter for open fracture type IIIA, IIIB, or IIIC with nonunion',67,'ARS','2015-09-18 00:00:00'),
	(87,'Keylex','Other specified injury of dorsal vein of right foot, subsequent encounter',95,'EUR','2015-03-01 00:00:00'),
	(88,'Lotstring','Insect bite (nonvenomous), right hip, sequela',39,'USD','2016-02-28 00:00:00'),
	(89,'Lotlux','Chronic nephritic syndrome with focal and segmental glomerular lesions',6,'KZT','2016-05-11 00:00:00'),
	(90,'Fintone','Malignant neoplasm of conjunctiva',91,'CNY','2016-04-25 00:00:00'),
	(91,'Y-Solowarm','Shigellosis, unspecified',7,'CNY','2017-01-11 00:00:00'),
	(92,'Biodex','Pressure ulcer of left elbow, stage 1',47,'EUR','2018-01-17 00:00:00'),
	(93,'Veribet','War operations involving flamethrower, civilian, initial encounter',17,'ZMW','2017-01-27 00:00:00'),
	(94,'Quo Lux','Unspecified injury of unspecified eye and orbit, sequela',19,'CNY','2015-08-23 00:00:00'),
	(95,'Flexidy','Other superficial bite of unspecified thigh',26,'THB','2016-10-27 00:00:00'),
	(96,'Otcom','Partial traumatic amputation of unspecified foot, level unspecified, subsequent encounter',54,'SYP','2016-05-05 00:00:00'),
	(97,'Tresom','Burn of first degree of unspecified axilla, initial encounter',1,'AUD','2017-04-04 00:00:00'),
	(98,'Daltfresh','Bariatric surgery status complicating pregnancy, second trimester',43,'SEK','2017-01-06 00:00:00'),
	(99,'Temp','Military operations involving destruction of aircraft due to accidental detonation of onboard munitions and explosives, military personnel',9,'PLN','2017-06-25 00:00:00'),
	(100,'Aerified','Corrosion of first degree of unspecified wrist, sequela',44,'PLN','2018-01-27 00:00:00'),
	(101,'Watch','Tak samo istotne jest to, że zmiana istniejących kryteriów pomaga w restrukturyzacji przedsiębiorstwa. Jak już mówiłem jasne jest to, iż rozszerzenie naszej działalności organizacyjnej zabezpiecza udział szerokiej grupie w kształtowaniu postaw uczestników wobec zadań programowych spełnia istotną rolę w przyszłościowe rozwiązania spełnia istotną rolę w większym stopniu tworzenie nowych propozycji. Będzie lepiej. Sytuacja która miała miejsce szkolenia kadry odpowiadającego potrzebom.',13,'PLN','2018-02-10 14:27:50');

UNLOCK TABLES;
