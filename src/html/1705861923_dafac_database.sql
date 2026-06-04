

CREATE TABLE `accounts` (
  `Account_ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Priviledge` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unapproved',
  PRIMARY KEY (`Account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO accounts VALUES("1","Admin","Admin@gov.ph","1234","Admin");
INSERT INTO accounts VALUES("7","Princess Dimapilis","maydimapilis@gmail.com","Walakaya123","Admin");
INSERT INTO accounts VALUES("8","FEAILEEN","salazaraileen1013@gmail.com","BUTCHTORRES21","User");
INSERT INTO accounts VALUES("9","BEVERLYN","beverlynrivera4@gmail.com","bausas13","User");
INSERT INTO accounts VALUES("10","DENISE KAY ANTENOR","denisekayantenor@gmail.com","kay101991","Admin");
INSERT INTO accounts VALUES("11","GRACE RINT","mswdlian4216@gmail.com","1234","Admin");
INSERT INTO accounts VALUES("12","ERNESTO T. CABALI","cabaliernesto@gmail.com","ernesto66","User");
INSERT INTO accounts VALUES("13","MAILA T. BARAL","mailactocabaral@gmail.com","qwertyuiop","Admin");
INSERT INTO accounts VALUES("18","Charles","charlessebastiengualvez123@gmail.com","LEGIONSXXX_0104000","Unapproved");
INSERT INTO accounts VALUES("20","Patrick Julongbayan","patrick@gmail.com","jordan","Admin");
INSERT INTO accounts VALUES("21","Lheo","lheo.adona@yahoo.com","baleyot","Unapproved");
INSERT INTO accounts VALUES("22","Paolo D. Julongbayan","paolo.julongbayan27559@gmail.com","jordan","Admin");



CREATE TABLE `barangay` (
  `Barangay_ID` int NOT NULL AUTO_INCREMENT,
  `Barangay_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Barangay_Chairman` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Contact_Number` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Barangay_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO barangay VALUES("1","Poblacion 1","Romel N. Masipagtest","09175434507");
INSERT INTO barangay VALUES("2","Poblacion 2","Denison P. Magahis","0917-543-4507");
INSERT INTO barangay VALUES("3","Poblacion 3","Cliford L. Jonson","0917-623-6434");
INSERT INTO barangay VALUES("4","Poblacion 4","Romeo Jonson","0968-854-0442");
INSERT INTO barangay VALUES("5","Poblacion 5","Dionisio U. Dela Cruz","0915-753-4548");
INSERT INTO barangay VALUES("6","Bagong Pook","Guillermo Manalo","0916-599-2468");
INSERT INTO barangay VALUES("7","Balibago","Victor M. Eleponga","0967-558-0432");
INSERT INTO barangay VALUES("8","Binubusan","Crecensio A. Dalanon","0906-767-6291");
INSERT INTO barangay VALUES("9","Bungahan","Danilo H. Dimayuga","0997-749-0433");
INSERT INTO barangay VALUES("10","Cumba","Manuel B. Lopez","0917-134-7284");
INSERT INTO barangay VALUES("11","Humayingan","Lopito M. Castillo","0955-662-2213");
INSERT INTO barangay VALUES("12","Kapito","Monico H. Pelagio Jr.","0955-549-7421");
INSERT INTO barangay VALUES("13","Lumaniag","Edgar J. Jonson","0995-501-0947");
INSERT INTO barangay VALUES("14","Luyahan","Carmen Baroja","0917-867-8245");
INSERT INTO barangay VALUES("15","Matabungkay","Ireneo Cabahog","0956-048-1767");
INSERT INTO barangay VALUES("16","Malaruhatan","Peter V. Tolentino","0945-419-3624");
INSERT INTO barangay VALUES("17","Putingkahoy","Luisito Buisan","0905-901-7537");
INSERT INTO barangay VALUES("18","Prenza","Reynaldo Magbago Jr.","0906-622-8112");
INSERT INTO barangay VALUES("19","San Diego","Benjamin De los Reyes","0955-380-5963");



CREATE TABLE `damages` (
  `damage_ID` int NOT NULL AUTO_INCREMENT,
  `Serial_No.` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Disaster_ID` int DEFAULT NULL,
  `Evac_Cent_ID` int DEFAULT NULL,
  `Date` date NOT NULL,
  `Assistance During:` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Housing_Condition` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Provided` varchar(3) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`damage_ID`),
  KEY `Serial_No.` (`Serial_No.`),
  KEY `Evac_Cent_ID` (`Evac_Cent_ID`),
  KEY `Disaster_ID` (`Disaster_ID`),
  CONSTRAINT `damages_ibfk_1` FOREIGN KEY (`Serial_No.`) REFERENCES `family` (`Serial_No.`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `damages_ibfk_2` FOREIGN KEY (`Evac_Cent_ID`) REFERENCES `evac_center` (`Evac_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `damages_ibfk_3` FOREIGN KEY (`Disaster_ID`) REFERENCES `disaster` (`Disaster_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO damages VALUES("8","23536663","3","2","2023-09-26","Pre-Oral","Totally Damaged","No");
INSERT INTO damages VALUES("10","20737476","3","1","2023-09-29","Pre-Oral","No Damage","No");
INSERT INTO damages VALUES("11","20737474","3","4","2023-10-08","Final-Def","Totally Damaged","No");
INSERT INTO damages VALUES("16","207373","3","1","2023-10-09","Pre-Oral","Partially Damaged","No");
INSERT INTO damages VALUES("17","20737479","3","3","2023-10-09","Volcanic Smog","Totally Damaged","No");
INSERT INTO damages VALUES("20","20737478","3","1","2022-11-17","Before Final","Totally Damaged","No");
INSERT INTO damages VALUES("21","202304003","2","1","2023-11-22","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("22","202304005","2","1","2023-11-22","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("23","202304006","2","1","2023-11-22","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("24","202304008","2","1","2023-11-23","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("25","202304009","4","6","2023-11-23","BAGYONG ERNESTO","Partially Damaged","No");
INSERT INTO damages VALUES("26","202304010","2","5","2023-11-23","Typhoon Doksuri (Egay)","No Damage","No");
INSERT INTO damages VALUES("28","202304011","5","1","2023-12-03","Tropical Storm Leo","Partially Damaged","No");
INSERT INTO damages VALUES("29","202304015","1","1","2023-12-03","Volcanic Smog","Totally Damaged","No");
INSERT INTO damages VALUES("30","202304012","2","2","2023-12-03","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("31","202304001","2","5","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("32","202304002","2","1","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("34","202304013","2","7","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("35","202304014","2","3","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("36","202304044","2","1","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("38","202304034","2","2","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("39","202304062","2","3","2023-12-03","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("40","202304062","3","3","2023-12-03","Typhoon Carding","Partially Damaged","No");
INSERT INTO damages VALUES("41","202304011","2","5","2023-12-03","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("42","202304041","2","6","2023-12-04","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("43","202304038","2","3","2023-12-04","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("45","202304065","3","6","2023-12-04","Typhoon Carding","Totally Damaged","No");
INSERT INTO damages VALUES("46","202304066","2","4","2023-12-04","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("47","202304049","2","3","2023-12-04","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("48","202304067","2","1","2023-12-04","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("49","202304068","2","5","2023-12-04","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("50","202304069","2","2","2023-12-04","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("51","202304070","2","5","2023-12-04","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("52","202304071","3","7","2023-12-04","Typhoon Carding","Totally Damaged","No");
INSERT INTO damages VALUES("53","202304047","7","5","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("54","202304051","7","1","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("55","202304045","7","3","2022-12-04","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("56","202304043","7","5","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("57","23536663","7","2","2022-12-04","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("58","202304071","7","7","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("59","202304072","7","4","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("60","202304050","3","1","2023-12-04","Typhoon Carding","Partially Damaged","No");
INSERT INTO damages VALUES("61","202304026","7","1","2022-12-04","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("62","202304018","7","1","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("63","20737476","7","1","2022-12-04","Typhoon Agaton","Partially Damaged","No");
INSERT INTO damages VALUES("64","202304029","7","7","2023-12-05","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("65","20737478","2","1","2023-12-05","Typhoon Doksuri (Egay)","Partially Damaged","No");
INSERT INTO damages VALUES("66","23536663","2","2","2023-12-05","Typhoon Doksuri (Egay)","Totally Damaged","No");
INSERT INTO damages VALUES("67","202304003","7","3","2023-12-05","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("68","202304068","7","5","2023-12-06","Typhoon Agaton","Totally Damaged","No");
INSERT INTO damages VALUES("69","202304070","10","5","2024-01-17","10","Partially Damaged","No");



CREATE TABLE `disaster` (
  `Disaster_ID` int NOT NULL AUTO_INCREMENT,
  `Disaster` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Occurred` date NOT NULL,
  PRIMARY KEY (`Disaster_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO disaster VALUES("1","Volcanic Smog","2023-09-22");
INSERT INTO disaster VALUES("2","Typhoon Doksuri (Egay)","2023-07-19");
INSERT INTO disaster VALUES("3","Typhoon Cardo","2023-11-21");
INSERT INTO disaster VALUES("4","Bagyong Ernesto","2023-11-23");
INSERT INTO disaster VALUES("5","Tropical Storm","2023-11-23");
INSERT INTO disaster VALUES("6","Low Pressure Area 1","2023-11-24");
INSERT INTO disaster VALUES("7","Typhoon Agaton","2022-12-13");
INSERT INTO disaster VALUES("9","Magnitude 5.5","2023-12-12");
INSERT INTO disaster VALUES("10","Typhoon Defense","2024-01-17");



CREATE TABLE `evac_center` (
  `Evac_ID` int NOT NULL AUTO_INCREMENT,
  `Evac_Center_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Evacuees` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Evac_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO evac_center VALUES("1","Lian Central School","Poblacion 1, Lian, Batangas","0");
INSERT INTO evac_center VALUES("2","Lian Covered Court","Poblacion 1, Lian Batangas","0");
INSERT INTO evac_center VALUES("3","Multi-Purpose Hall (Pob 1)","Poblacion 1, Lian Batangas","0");
INSERT INTO evac_center VALUES("4","Multi-Purpose Hall (Pob 2)","Poblacion 2, Lian Batangas","0");
INSERT INTO evac_center VALUES("5","Multi-Purpose Hall (Pob 3)","Poblacion 3, Lian Batangas","0");
INSERT INTO evac_center VALUES("6","Balibago Multi-purpose Hall","Brgy. Balibago","0");
INSERT INTO evac_center VALUES("7","Multi-Purpose Hall (Pob 4)","Poblacion 4, Lian Batangas","0");
INSERT INTO evac_center VALUES("8","Multi-Purpose Hall (Pob 5)","Poblacion 5, Lian, Batangas","0");



CREATE TABLE `family` (
  `Serial_No.` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Barangay_ID` int DEFAULT NULL,
  `Evac_Cent_ID` int DEFAULT NULL,
  `Barangay_Name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Family_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Head_firstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Head_midName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Head_lastName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Occupation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'IV-A CALABARZON',
  `Monthly_Net_Income` double NOT NULL,
  `Civil Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `4Ps Beneficiary` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `Type of Ethnicity` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Religion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Region` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Province/District` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Evacuation_Center` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `City/Municipality` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `House_Ownership` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Contact_No.` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Date_Registered` datetime DEFAULT CURRENT_TIMESTAMP,
  `Damage_Rec` varchar(3) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'No',
  PRIMARY KEY (`Serial_No.`),
  KEY `Barangay_ID` (`Barangay_ID`),
  KEY `Evac_Cent_ID` (`Evac_Cent_ID`),
  CONSTRAINT `family_ibfk_2` FOREIGN KEY (`Barangay_ID`) REFERENCES `barangay` (`Barangay_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `family_ibfk_3` FOREIGN KEY (`Evac_Cent_ID`) REFERENCES `evac_center` (`Evac_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO family VALUES("202304001","4","5","Poblacion 4","Montealegre","JaJa","Grock","Montealegre","Teacher / Nurse","24000","Widow","Yes","","Saksi ni Jehova","Male","2023-11-20","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09654567893","2023-11-20 00:00:00","Yes");
INSERT INTO family VALUES("202304002","1","1","Poblacion 1","ESGUERRA","FE AILEEN","SALAZAR","ESGUERRA","MUN. EMPLOYEE","1300","Married","No","","Roman Catholic","Female","1971-08-02","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09360489940","2023-11-22 00:00:00","No");
INSERT INTO family VALUES("202304003","15","3","Matabungkay","RIVERA","BEVERLYN","BAUSAS","RIVERA ","MUN. EMPLOYEE","5000","Married","No","N/A","Roman Catholic","Female","1992-03-16","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09679040360","2023-11-22 00:00:00","Yes");
INSERT INTO family VALUES("202304005","16","1","Malaruhatan","ANTENOR","DENISE KAY","DELAS ALAS","ANTENOR","MUN. EMPLOYEE","10000","Married","No","","Born Again","Female","1991-09-10","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09177506279","2023-11-22 00:00:00","Yes");
INSERT INTO family VALUES("202304006","15","1","Matabungkay","RINT","GRACE","BARREDO","RINT","MUN. EMPLOYEE","10000","Married","No","","","Female","1980-10-07","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09155915275","2023-11-23 02:08:18","Yes");
INSERT INTO family VALUES("202304008","8","1","Binubusan","Cabali","Ernesto","Tolentino","Cabali","Mun. Empl;oyee","10000","Married","No","","Roman Catholic","Male","1966-02-06","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09453913857","2023-11-23 02:11:08","Yes");
INSERT INTO family VALUES("202304009","7","6","Balibago","Baral","Maila","Toca","Baral","Social Worker","20000","Married","No","N/A","Roman Catholic","Female","1994-06-15","IV-A CALABARZON","Batangas","Balibago Multi-purpose Hall","Lian","House & lot owner","09171326564","2023-11-23 02:26:25","Yes");
INSERT INTO family VALUES("202304010","3","5","Poblacion 3","De Layola","Leo","Remotigue","De Layola","Self-Employed","10000","Single","No","","Roman Catholic","Male","2023-02-24","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09756783452","2023-11-23 14:16:55","Yes");
INSERT INTO family VALUES("202304011","1","5","Poblacion 1","Julongbayan","Pablo","Cudiamat","Julongbayan","Driver","5000","Married","No","","Roman Catholic","Male","1975-02-06","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09650833296","2023-12-03 05:16:52","Yes");
INSERT INTO family VALUES("202304012","4","2","Poblacion 4","Maralit","Nicole","Julongbayan","Maralit","Student","2000","Single","No","","Roman Catholic","Female","2002-12-01","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House & lot owner","09568568568","2023-12-03 05:20:14","Yes");
INSERT INTO family VALUES("202304013","2","7","Poblacion 2","Jusayan","Antonio","Del mundo","Jusayan","Farmer","10000","Married","Yes","","Roman Catholic","Male","1981-02-18","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 4)","Lian","House & lot owner","09423432424","2023-12-03 05:27:02","Yes");
INSERT INTO family VALUES("202304014","15","3","Matabungkay","Gualvez","Garry","Ablero","Gualvez","Housewife","0","Married","No","Batangueño","Roman Catholic","Male","1974-09-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932249","2023-12-03 05:30:55","Yes");
INSERT INTO family VALUES("202304015","15","1","Matabungkay","Gualvez","Ma. Crisel","Ablero","Gualvez","Teacher","3000","Married","No","Batangueño","Roman Catholic","Male","1975-03-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932249","2023-12-03 05:33:02","Yes");
INSERT INTO family VALUES("202304016","15","","Matabungkay","Gualvez","Geraldo","Evasco","Gualvez","Housewife","0","Married","No","Batangueño","Roman Catholic","Male","1946-02-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932242","2023-12-03 05:35:36","No");
INSERT INTO family VALUES("202304017","15","","Matabungkay","Javier","Ehrra","Lundag","Javier","Teacher","3000","Married","No","Batangueño","Roman Catholic","Female","1983-03-04","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932245","2023-12-03 05:37:58","No");
INSERT INTO family VALUES("202304018","15","1","Matabungkay","Javier","John michael","Ablero","Javier","Teacher","3000","Single","No","Batangueño","Roman Catholic","Male","1999-01-03","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932248","2023-12-03 05:39:48","Yes");
INSERT INTO family VALUES("202304019","15","","Matabungkay","Javier","Mik","Jerry","Javier","Housewife","1000","Married","No","Batangueño","Roman Catholic","Male","1984-06-03","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932241","2023-12-03 05:43:55","No");
INSERT INTO family VALUES("202304020","6","","Bagong Pook","Laygo","William","Deses","Laygo","Offiice worker","10000","Married","No","","Roman Catholic","Male","1989-10-02","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","House & lot owner","09636366565","2023-12-03 05:47:09","No");
INSERT INTO family VALUES("202304021","5","","Poblacion 5","Javier","Daniel","Dejesus","Javier","Farmer","5000","Married","No","","Roman Catholic","Male","1985-03-23","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","Rented house & lot","09586586786","2023-12-03 06:03:32","No");
INSERT INTO family VALUES("202304022","2","","Poblacion 2","Ramos","Darren","Capapli","Ramos","Farmer","8000","Single","Yes","","Born Again","Male","0000-00-00","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","House owner,rent-free lot with owner's consent","09808078078","2023-12-03 06:06:59","No");
INSERT INTO family VALUES("202304023","4","","Poblacion 4","Capili","Irish","Asinso","Capili","Student","20000","Married","No","","Islam","Female","1999-03-29","IV-A CALABARZON","Batangas","Balibago Multi-purpose Hall","Lian","House & lot owner","09353253424","2023-12-03 06:09:24","No");
INSERT INTO family VALUES("202304024","15","","Matabungkay","Ablero","Maria","Panaligan","Ablero","single","1000","Single","No","Batagueno","Roman Catholic","Female","2002-03-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09058923341","2023-12-03 06:18:00","No");
INSERT INTO family VALUES("202304025","1","","Poblacion 1","Katigbac","Kristel","Mahayahay","Katigbak","Farmer","10000","Single","No","","","Female","1996-08-12","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","Rent-free house & lot with owner's consent","09141242424","2023-12-03 06:18:23","No");
INSERT INTO family VALUES("202304026","15","1","Matabungkay","Ablero","Maria","Panaligan","Ablero","single","1000","Single","No","Batagueno","Roman Catholic","Female","2002-03-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09058923341","2023-12-03 06:19:08","Yes");
INSERT INTO family VALUES("202304027","3","","Poblacion 3","Dayandayan","Marie","Gualvez","Dayandayan","Teacher","20000","Single","No","","","Female","1988-08-08","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","House owner,rent-free lot with owner's consent","09363475768","2023-12-03 06:20:27","No");
INSERT INTO family VALUES("202304028","15","","Matabungkay","Javier","Jamaica ","Alipusan","Javier","Teacher","1000","Single","No","Batangueno","","Female","1994-02-06","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055932265","2023-12-03 06:22:48","No");
INSERT INTO family VALUES("202304029","19","7","San Diego","Obrador","Pamela","Descalllar","Obrador","Teacher","20000","Single","No","","","Female","1986-02-05","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 4)","Lian","Rented house & lot","09788666656","2023-12-03 06:24:26","Yes");
INSERT INTO family VALUES("202304030","15","","Matabungkay","Corpus","Bea dalyn","Marquez","Corpus","Housewife","0","Married","No","Batangueno","","Female","1982-04-06","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09813275089","2023-12-03 06:26:13","No");
INSERT INTO family VALUES("202304031","11","","Humayingan","De Castro","Anne","Delayola","De Castro","Engineer","30000","Single","No","","","Female","1996-07-22","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","Rent-free house & lot with owner's consent","09123456789","2023-12-03 06:27:10","No");
INSERT INTO family VALUES("202304032","9","","Bungahan","Delas Alas","Angelo","Asinso","Delas Alas","Teacher","20000","Single","No","","Islam","Male","1991-09-16","IV-A CALABARZON","Batangas","Balibago Multi-purpose Hall","Lian","Rent-free house & lot with owner's consent","09987654342","2023-12-03 06:29:20","No");
INSERT INTO family VALUES("202304033","17","","Putingkahoy","Bagui","Effren ","Rodriguez","Bagui","Student","0","Single","No","Batangueno","","Male","2002-08-07","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09813324899","2023-12-03 06:31:28","No");
INSERT INTO family VALUES("202304034","7","2","Balibago","Perado","Jerome","Masusi","Perado","Construction","12000","Married","No","","","Male","1992-06-19","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House owner,rent-free lot w/o owner's consent","09865443676","2023-12-03 06:33:36","Yes");
INSERT INTO family VALUES("202304035","12","","Kapito","Perez","Cristy","Descallar","Perez","Teacher","20000","Married","No","","Roman Catholic","Female","1999-09-09","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","House & lot owner","09872235676","2023-12-03 06:35:59","No");
INSERT INTO family VALUES("202304036","17","","Putingkahoy","Dacanay","Brianne","Son","Dacanay","Nurse","22000","Single","No","","Iglesia ni Cristo","Male","1988-04-03","IV-A CALABARZON","Batangas","Lian Central School","Lian","House owner,rent-free lot w/o owner's consent","09554954949","2023-12-03 06:38:09","No");
INSERT INTO family VALUES("202304037","15","","Matabungkay","Lundag","Jimmuel","Ablero","Lundag","Student","0","Single","No","Batangueno","","Male","2001-12-09","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09055922273","2023-12-03 06:40:11","No");
INSERT INTO family VALUES("202304038","6","3","Bagong Pook","Marcos","Mark","Maydana","Marcos","Professor","22000","Married","No","","","Male","2001-08-29","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","House & lot owner","09065444444","2023-12-03 06:41:08","Yes");
INSERT INTO family VALUES("202304040","19","","San Diego","Masanguid","Ace","Bautista","Masanguid","Housewife","1000","Married","No","Batangueno","Roman Catholic","Male","1978-11-12","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09714750211","2023-12-03 06:45:51","No");
INSERT INTO family VALUES("202304041","17","6","Putingkahoy","Broner","Adrian","Chino","Broner","Police","30000","Married","No","","Born Again","Male","1989-02-21","IV-A CALABARZON","Batangas","Balibago Multi-purpose Hall","Lian","House & lot owner","09234767676","2023-12-03 06:51:36","Yes");
INSERT INTO family VALUES("202304042","7","","Balibago","Eleponga","Maria denzel","Lejano","Eleponga","Teacher","3000","Married","No","Batangueno","","Female","1976-12-08","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09973214563","2023-12-03 06:53:18","No");
INSERT INTO family VALUES("202304043","15","5","Matabungkay","Marquez","Juan","Manuel","Marquez","Doctor","40000","Married","No","","","Male","1970-06-11","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09876543223","2023-12-03 06:55:31","Yes");
INSERT INTO family VALUES("202304044","12","1","Kapito","Calimlim","Cj James","Ablero","Calimlim","Teacher","3000","Single","No","Batagueno","","Male","1992-04-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09532246589","2023-12-03 06:57:05","Yes");
INSERT INTO family VALUES("202304045","2","3","Poblacion 2","Miranda","Ato","Descallar","Miranda","Farmer","15000","Single","No","","","Male","1990-04-21","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","Rented house & lot","09343455345","2023-12-03 06:58:28","Yes");
INSERT INTO family VALUES("202304046","18","","Prenza","Jonson","Gorgie","Maralit","Jonson","Janitor","8000","Married","Yes","","Born Again","Male","1997-01-08","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","Rented house & lot","09065606806","2023-12-03 07:01:31","No");
INSERT INTO family VALUES("202304047","15","5","Matabungkay","Bascuguin","John drake","Claveria","Bascuguin","Teacher","3000","Single","No","Batangueno","Roman Catholic","Male","1998-11-02","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09269475089","2023-12-03 07:03:55","Yes");
INSERT INTO family VALUES("202304048","5","","Poblacion 5","Ablero","Cris","Sebastan","Ablero","Farmer","10000","Single","No","","","Male","1995-02-18","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","House owner & lot renter","09534979377","2023-12-03 07:04:06","No");
INSERT INTO family VALUES("202304049","13","3","Lumaniag","Moral","Charles","Bahigi","Moral","Doctor","50000","Married","No","","Roman Catholic","Male","1991-04-24","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09885435435","2023-12-03 07:07:06","Yes");
INSERT INTO family VALUES("202304050","13","1","Lumaniag","Platon","John","Relis","Platon","Engineer","50000","Married","No","","Roman Catholic","Male","1999-01-17","IV-A CALABARZON","Batangas","Lian Central School","Lian","Rented house & lot","09743543365","2023-12-03 07:09:25","Yes");
INSERT INTO family VALUES("202304051","13","1","Lumaniag","Diones","Tommy","Diones","Ignacio","Housewife","0","Single","No","Batangueno","Born Again","Male","1983-02-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09812248960","2023-12-03 07:09:53","Yes");
INSERT INTO family VALUES("202304052","14","","Luyahan","Nimo","Anton","Mahinahin","Nimo","Police","40000","Married","No","","","Male","1998-06-28","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 4)","Lian","House owner,rent-free lot w/o owner's consent","09465779676","2023-12-03 07:12:24","No");
INSERT INTO family VALUES("202304053","13","","Lumaniag","Manalo","Maecy","Cantos","Manalo","Teacher","20000","Single","No","","Roman Catholic","Female","1990-12-09","IV-A CALABARZON","Batangas","Lian Central School","Lian","Rented house & lot","09876543757","2023-12-03 07:14:58","No");
INSERT INTO family VALUES("202304054","10","","Cumba","Cantos","Christian","Madeli","Cantos","Midwife","13000","Married","No","","Born Again","Male","1998-08-26","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House owner & lot renter","09997857464","2023-12-03 07:18:53","No");
INSERT INTO family VALUES("202304055","14","","Luyahan","Togonon","Isha","Capili","Togonon","Acountant","23000","Single","No","","Roman Catholic","Female","1997-07-12","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","House owner,rent-free lot w/o owner's consent","09986741112","2023-12-03 07:21:35","No");
INSERT INTO family VALUES("202304056","13","","Lumaniag","Maidana","Marcos","El Chino","Maidana","Social Worker","14000","Married","No","","Born Again","Male","1998-08-07","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","Rent-free house & lot with owner's consent","09876867564","2023-12-03 07:24:11","No");
INSERT INTO family VALUES("202304057","2","","Poblacion 2","Natingo","Flora Mae","Natingo","Delios","Housewife","1000","Married","No","Batangueno","","Female","1976-03-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09714750212","2023-12-03 07:26:39","No");
INSERT INTO family VALUES("202304058","14","","Luyahan","De guzman","Faith","Jesseline","De guzman","Acountant","45000","Married","No","","Roman Catholic","Female","1994-04-04","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","Rent-free house & lot with owner's consent","09084358987","2023-12-03 07:41:20","No");
INSERT INTO family VALUES("202304059","8","","Binubusan","Delios","Gloren","Cabral","Delios","Housewife","1500","Married","No","Batangueno","Born Again","Female","1984-01-05","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09612245891","2023-12-03 07:56:33","No");
INSERT INTO family VALUES("202304060","11","","Humayingan","Magyaya","Trisha Mae","Panaligan","Magyaya","Housewife","1000","Married","No","Batangueno","Born Again","Female","1976-07-09","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House & lot owner","09812249087","2023-12-03 08:00:14","No");
INSERT INTO family VALUES("202304061","3","","Poblacion 3","Decilos","Jieboy","Pineza","Decilos","Teacher","2000","Married","No","Batagueno","Roman Catholic","Male","1989-11-06","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","09243432123","2023-12-03 08:08:21","No");
INSERT INTO family VALUES("202304062","14","3","Luyahan","Alvarez","Canelo","Saul","Alvarez","Software Engineer","40000","Married","No","","Roman Catholic","Male","1999-08-12","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","Rented house & lot","09534534535","2023-12-03 08:33:56","Yes");
INSERT INTO family VALUES("202304063","14","","Luyahan","Bulaklak","Caleb","Sinso","Plant","Doctor","50000","Married","No","","Roman Catholic","Male","1999-09-08","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","House & lot owner","09575464343","2023-12-04 04:17:54","No");
INSERT INTO family VALUES("202304064","14","","Luyahan","Urge","Ian","Capili","Urge","Farmer","13000","Married","No","","Roman Catholic","Male","1996-05-03","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House owner & lot renter","09358043047","2023-12-04 04:24:28","No");
INSERT INTO family VALUES("202304065","13","6","Lumaniag","Tolentino","Gemma","Asis","Tolentino","Engineer","50000","Married","No","","Roman Catholic","Female","1989-03-07","IV-A CALABARZON","Batangas","Balibago Multi-purpose Hall","Lian","Rented house & lot","09987643636","2023-12-04 04:32:36","No");
INSERT INTO family VALUES("202304066","17","4","Putingkahoy","Sale","Jia","Asinson","Sale","Teacher","20000","Married","No","","Roman Catholic","Female","1998-05-05","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","Rent-free house & lot with owner's consent","09344654695","2023-12-04 04:42:49","Yes");
INSERT INTO family VALUES("202304067","14","1","Luyahan","Dimailig","Claire","Delayola","Dimailig","Farmer","15000","Married","No","","Islam","Female","1991-09-01","IV-A CALABARZON","Batangas","Lian Central School","Lian","House owner,rent-free lot w/o owner's consent","09537593865","2023-12-04 05:00:52","Yes");
INSERT INTO family VALUES("202304068","18","2","Prenza","Eridao","Mindie","Manalo","Eridao","Accountant","30000","Married","No","","Roman Catholic","Female","1999-07-06","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09421412414","2023-12-04 05:11:35","Yes");
INSERT INTO family VALUES("202304069","16","2","Malaruhatan","Julongbayan","Marie Antoinette","Jusayan","Julongbayan","Psychologist","50000","Married","No","","Roman Catholic","Female","2001-11-19","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House & lot owner","09364364563","2023-12-04 05:23:44","Yes");
INSERT INTO family VALUES("202304070","19","5","San Diego","Concepcion","Rania Rose","Bascon","Concepcion","Housewife","0","Single","No","","The Chruch of Jesus Christ of latter-Day Saint","Female","2001-12-14","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 3)","Lian","House & lot owner","09436346346","2023-12-04 05:41:05","Yes");
INSERT INTO family VALUES("202304071","5","7","Poblacion 5","Catillo","Charles","Mendez","Castillo","Teacher","22000","Married","No","","Roman Catholic","Male","1994-02-02","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 4)","Lian","House & lot owner","09565664434","2023-12-04 06:01:23","Yes");
INSERT INTO family VALUES("202304072","13","4","Lumaniag","Andino","Kurt","Saul","Andino","Doctor","50000","Married","No","","Roman Catholic","Male","1996-09-23","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 2)","Lian","House & lot owner","09655664546","2023-12-04 06:17:32","Yes");
INSERT INTO family VALUES("207373","4","1","Poblacion 4","Descallar","Ferdinand","Maramot","Descallar","Principal","3000","Single","Yes","","Roman Catholic","Male","1991-10-22","IV-A CALABARZON","Batangas","Lian Central School","Lian","House & lot owner","","2023-09-10 00:00:00","Yes");
INSERT INTO family VALUES("20737474","10","1","Cumba","Delayola","Juan","Lama","Delayola","Student","20000","Single","No","","Roman Catholic","Female","2023-09-27","IV-CALABARZON","Batangas","Lian Central School","Lian","Rent-free house & lot with owner's consent","","2023-09-27 00:00:00","No");
INSERT INTO family VALUES("20737475","9","2","Bungahan","Silahis","Remedios","Delayola","Silahis","Null","25","Widow","No","","Catholic","Male","2023-09-27","IV-CALABARZON","Batangas","Lian Covered Court","Lian","House & lot owner","","2023-09-27 00:00:00","No");
INSERT INTO family VALUES("20737476","9","1","Bungahan","Ampon","Jun","De Layola","Ampon","Self-Employed","15000","Married","No","","Roman Catholic","Male","1992-05-24","IV-A CALABARZON","Batangas","Lian Central School","Lian","House owner,rent-free lot with owner's consent","","2023-09-27 00:00:00","Yes");
INSERT INTO family VALUES("20737478","17","1","Putingkahoy","Haveria","Isenhart","Abellera","Haveria","Adonis Dancer","70000","Single","No","","Roman Catholic","Male","2002-08-11","IV-A CALABARZON","Batangas","Lian Central School","Lian","House owner,rent-free lot w/o owner's consent","","2023-10-09 00:00:00","Yes");
INSERT INTO family VALUES("20737479","3","3","Poblacion 3","De Layola","Rodelito","Lama","De Layola","Farmer","15000","Married","No","","Roman Catholic","Male","1985-07-05","IV-A CALABARZON","Batangas","Multi-Purpose Hall (Pob 1)","Lian","House & lot owner","","2023-10-09 00:00:00","Yes");
INSERT INTO family VALUES("20774301","3","1","Poblacion 3","Delayola","Leo","Remotigue","Delayola","Student","20000","Single","No","Demon Slayer","Catholic","Male","2002-02-24","IV-B MIMAROPA","Manila","Lian Central School","Pasay","Rent-free house & lot with owner's consent","09664405859","2023-09-10 00:00:00","Yes");
INSERT INTO family VALUES("23536663","7","2","Balibago","Greyrat","Rudeus","Notos","Greyrat","Adventurer","15000","Married","No","","Other","Male","1990-05-24","IV-A CALABARZON","Batangas","Lian Covered Court","Lian","House & lot owner","","2023-09-10 00:00:00","Yes");



CREATE TABLE `family_members` (
  `member_ID` int NOT NULL AUTO_INCREMENT,
  `Serial_No.` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Evac_Cent_ID` int DEFAULT NULL,
  `Member_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Head_Relation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Age` int NOT NULL,
  `Gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Civil_Status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Educational_Level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Occupational_Skills` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Remarks` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Casualty` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`member_ID`),
  KEY `Serial_No.` (`Serial_No.`),
  KEY `Evac_Cent_ID` (`Evac_Cent_ID`),
  CONSTRAINT `family_members_ibfk_1` FOREIGN KEY (`Serial_No.`) REFERENCES `family` (`Serial_No.`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `family_members_ibfk_2` FOREIGN KEY (`Evac_Cent_ID`) REFERENCES `evac_center` (`Evac_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO family_members VALUES("3","20774301","1","Christopher Adona","Child","31","Male","Married","College","","E","");
INSERT INTO family_members VALUES("4","20774301","1","Christian Adona","Child","27","Male","Married","College","","E","");
INSERT INTO family_members VALUES("8","23536663","2","Sylphiette Greyrat","Spouse","18","Female","Married","College","Office Worker","E","02");
INSERT INTO family_members VALUES("9","23536663","2","Roxy Greyrat","Spouse","50","Female","Married","College","Office Worker","","02");
INSERT INTO family_members VALUES("10","23536663","2","Eris Greyrat","Spouse","20","Female","Married","None","Office Worker","E","04");
INSERT INTO family_members VALUES("12","20737476","1","Uphai Peñaflor Ampon","Spouse","31","Female","Married","College","","","02");
INSERT INTO family_members VALUES("13","20737476","1","Lyron John Ampon","Child","11","Male","Single","Elementary","","","02");
INSERT INTO family_members VALUES("14","20737476","1","Keira Ampon","Child","7","Female","Single","None","","","02");
INSERT INTO family_members VALUES("15","20737476","1","Carlos Miguel Ampon","Child","3","Male","Single","None","","","02");
INSERT INTO family_members VALUES("16","20737478","1","Kian Haveria","Relative","18","Male","Single","College","","C","04");
INSERT INTO family_members VALUES("17","20737478","1","Pamela Kyle Depolly","Spouse","20","Female","Single","College","","A","03");
INSERT INTO family_members VALUES("18","20737479","3","Ermelita De Layola","Spouse","60","Female","Married","High School","","A","04");
INSERT INTO family_members VALUES("19","20737479","3","Babylyn De Layola","Child","45","Female","Married","College","Office Worker","B","02");
INSERT INTO family_members VALUES("20","20737479","3","Rodelito De Layola","Child","40","Male","Married","College","Office Worker","","03");
INSERT INTO family_members VALUES("21","20737479","3","Marivic De Layola","Child","35","Female","Single","College","Office Worker","E","03");
INSERT INTO family_members VALUES("22","20737479","3","Winnie De Layola","Child","30","Female","Single","College","Store Owner","B","04");
INSERT INTO family_members VALUES("23","20737479","3","Alice De Layola","Child","25","Female","Widow","College","Office Worker","E","01");
INSERT INTO family_members VALUES("24","202304001","5","","","0","","","None","","","");
INSERT INTO family_members VALUES("25","202304002","1","AARON ESGUERRA","Child","19","Male","Single","College","","","03");
INSERT INTO family_members VALUES("26","202304003","1","RYAN IVAN C. RIVERA ","Spouse","30","Male","Married","College","","A","03");
INSERT INTO family_members VALUES("27","202304003","1","YVHONNE  B. RIVERA ","Child","7","Female","Single","Elementary","","","03");
INSERT INTO family_members VALUES("28","202304005","1","MARK GREGOR ANTENOR","Spouse","33","Male","Married","College","","","");
INSERT INTO family_members VALUES("29","202304006","1","RACY ANNE RINT","Child","23","Female","Single","College","","","");
INSERT INTO family_members VALUES("31","202304008","1","Antonio Cabali","Relative","55","Male","Single","Elementary","","","");
INSERT INTO family_members VALUES("32","202304009","6","WILFREDO A. BARAL","Spouse","30","Male","Married","College","None","","");
INSERT INTO family_members VALUES("33","202304010","1","John Clarence De Layola","Relative","22","Male","Single","College","Office Worker","","03");
INSERT INTO family_members VALUES("34","202304010","5","Angelika De Layola","Relative","25","Female","Single","College","","","");
INSERT INTO family_members VALUES("35","202304011","5","Daisiree Julongbayan","","45","Female","Married","High School","","","02");
INSERT INTO family_members VALUES("36","202304011","5","Dhenize Julongbayan","Child","21","Female","Single","College","","","02");
INSERT INTO family_members VALUES("37","202304012","2","Precious Maralit","Child","7","Female","Single","Elementary","Student","","02");
INSERT INTO family_members VALUES("38","202304013","7","Rissa Jusayan","Relative","51","Female","Married","High School","Midwife","","");
INSERT INTO family_members VALUES("39","202304013","7","Jerome Jusayan","Child","26","Male","Single","College","Office Worker","","03");
INSERT INTO family_members VALUES("40","202304013","7","Elisha Jusayan","Child","27","Female","Single","College","Office Worker","","02");
INSERT INTO family_members VALUES("41","202304013","7","Psyche Jusayan","Child","16","Female","Single","High School","Student","","02");
INSERT INTO family_members VALUES("42","202304014","1","Jr. Serjo","Relative","34","Male","Married","College","","","04");
INSERT INTO family_members VALUES("43","202304015","1","","","0","","","None","","","");
INSERT INTO family_members VALUES("44","202304016","","","","0","","","None","","","");
INSERT INTO family_members VALUES("45","202304017","","charles javier","Relative","19","Male","Single","High School","Student","","");
INSERT INTO family_members VALUES("46","202304018","1","charles javier","","19","","","None","Student","","03");
INSERT INTO family_members VALUES("47","202304019","","","","0","","","None","","","");
INSERT INTO family_members VALUES("48","202304020","","","","0","","","None","","","");
INSERT INTO family_members VALUES("49","202304021","","Marilyn Javier","Relative","55","Female","Married","High School","office worker","","");
INSERT INTO family_members VALUES("50","202304021","","Mark javier","Child","30","Male","Single","College","student","","");
INSERT INTO family_members VALUES("51","202304022","","Jovit Ramos","Relative","33","Male","Single","High School","Farmer","","");
INSERT INTO family_members VALUES("52","202304023","","","","0","","","None","","","");
INSERT INTO family_members VALUES("53","202304024","","Angelica grace","Relative","18","Female","Single","High School","","","");
INSERT INTO family_members VALUES("54","202304025","","","","0","","","None","","","");
INSERT INTO family_members VALUES("55","202304026","1","Angelica grace","Relative","18","Female","Single","High School","","","02");
INSERT INTO family_members VALUES("56","202304027","","","","0","","","None","","","");
INSERT INTO family_members VALUES("57","202304028","","","","0","","","None","","","");
INSERT INTO family_members VALUES("58","202304029","7","","","0","","","None","","","");
INSERT INTO family_members VALUES("59","202304030","","","","0","","","None","","","");
INSERT INTO family_members VALUES("60","202304031","","","","0","","","None","","","");
INSERT INTO family_members VALUES("61","202304032","","","","0","","","None","","","");
INSERT INTO family_members VALUES("62","202304033","","","","0","","","None","","","");
INSERT INTO family_members VALUES("63","202304034","2","","","0","","","None","","","");
INSERT INTO family_members VALUES("64","202304035","","Eugine Perez","Relative","22","Male","Single","College","Student","","");
INSERT INTO family_members VALUES("65","202304036","","","","0","","","None","","","");
INSERT INTO family_members VALUES("66","202304037","","","","0","","","None","","","");
INSERT INTO family_members VALUES("67","202304038","3","","","0","","","None","","","");
INSERT INTO family_members VALUES("69","202304040","","","","0","","","None","","","");
INSERT INTO family_members VALUES("70","202304041","6","Daniel Broner","Child","12","Male","Single","Elementary","Student","C","03");
INSERT INTO family_members VALUES("71","202304041","6","Maria Broner","Common-law Partner","33","Female","Married","College","Housewife","B","04");
INSERT INTO family_members VALUES("72","202304042","","","","0","","","None","","","");
INSERT INTO family_members VALUES("73","202304043","5","","","0","","","None","","","");
INSERT INTO family_members VALUES("74","202304044","1","","","0","","","None","","","");
INSERT INTO family_members VALUES("75","202304045","3","","","0","","","None","","","");
INSERT INTO family_members VALUES("76","202304046","","Jordan Jonson","Child","23","Male","Single","College","Student","","");
INSERT INTO family_members VALUES("77","202304047","1","","","0","","","None","","","");
INSERT INTO family_members VALUES("78","202304048","","","","0","","","None","","","");
INSERT INTO family_members VALUES("79","202304049","3","Maidelyn Moral","Common-law Partner","28","Female","Married","College","Nurse","","");
INSERT INTO family_members VALUES("80","202304050","1","Patricia Platon","Common-law Partner","25","Female","Married","College","Housewife","","03");
INSERT INTO family_members VALUES("81","202304051","1","","","0","","","None","","","");
INSERT INTO family_members VALUES("82","202304052","","","","0","","","None","","","");
INSERT INTO family_members VALUES("83","202304053","","","","0","","","None","","","");
INSERT INTO family_members VALUES("84","202304054","","Princess Cantos","Common-law Partner","26","Female","Married","College","Housewife","","");
INSERT INTO family_members VALUES("85","202304055","","","","0","","","None","","","");
INSERT INTO family_members VALUES("86","202304056","","Cassandra Maidana","Common-law Partner","27","Female","Married","College","Housewife","","");
INSERT INTO family_members VALUES("87","202304057","","","","0","","","None","","","");
INSERT INTO family_members VALUES("88","202304058","","Cyreen Deguzman","Child","19","Female","Single","Senior High School","Student","C","");
INSERT INTO family_members VALUES("89","202304059","","Sally","Relative","19","Female","Single","High School","Student","","");
INSERT INTO family_members VALUES("90","202304060","","Danica morelli","Relative","21","Female","Single","Senior High School","Student","","");
INSERT INTO family_members VALUES("91","202304061","","Maica nicole","Spouse","39","Female","Married","College","Housewife","B","");
INSERT INTO family_members VALUES("92","202304062","3","Kriss Alvarez","Common-law Partner","26","Female","Married","College","Housewife","","03");
INSERT INTO family_members VALUES("93","202304063","","Princess Bulaklak","Common-law Partner","28","Female","Married","College","office worker","C","");
INSERT INTO family_members VALUES("94","202304063","","Marilyn Bulaklak","Child","19","Female","Single","Senior High School","Student","B","");
INSERT INTO family_members VALUES("95","202304064","","Camille Urge","Child","12","Female","Single","Elementary","Student","C","");
INSERT INTO family_members VALUES("96","202304065","6","Cy Tolentino","Child","19","Female","Single","Senior High School","Student","C","02");
INSERT INTO family_members VALUES("97","202304066","4","Jaj Sale","Child","12","Female","Single","Elementary","Student","C","02");
INSERT INTO family_members VALUES("98","202304066","4","Jorge Sale","Common-law Partner","31","Male","Married","College","Engineer","","02");
INSERT INTO family_members VALUES("99","202304067","1","Jose Dimailig","Common-law Partner","31","Male","Married","College","office worker","C","04");
INSERT INTO family_members VALUES("100","202304067","1","Jowy Dimailig","Child","13","Male","Single","High School","Student","C","03");
INSERT INTO family_members VALUES("101","202304068","5","Paulo Eridao","Common-law Partner","25","Male","Married","College","Nurse","C","02");
INSERT INTO family_members VALUES("102","202304069","2","Paolo Julongbayan","Common-law Partner","28","Male","Married","College","Software Engineer","","02");
INSERT INTO family_members VALUES("103","202304069","2","Kurt Julongbayan","Child","15","Male","Single","High School","Student","","02");
INSERT INTO family_members VALUES("104","202304070","5","Chirstian Olegario","Common-law Partner","23","Male","Single","College","Student","C","02");
INSERT INTO family_members VALUES("105","202304071","7","Kriss Castillo","Common-law Partner","26","Male","Married","None","Farmer","C","03");
INSERT INTO family_members VALUES("106","202304072","4","Maria Andino","Common-law Partner","29","Female","Married","College","Teacher","B","02");



CREATE TABLE `imagetest` (
  `image_ID` int NOT NULL AUTO_INCREMENT,
  `Image_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `The_Image` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`image_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `recent activity` (
  `Act_ID` int NOT NULL AUTO_INCREMENT,
  `Activity` text COLLATE utf8mb4_general_ci NOT NULL,
  `Created_On` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Activity_Type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'INSERT',
  `Account_Used` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Act_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO recent activity VALUES("2","Added Ampon Family as new Record with 4 Family Members aside from Head","2023-09-27 21:29:35","INSERT","Admin");
INSERT INTO recent activity VALUES("3","Added Damage Record for Ampon Family as No Damage during Pre-Oral","2023-09-29 01:14:16","INSERT","Admin");
INSERT INTO recent activity VALUES("4","Added Haveria Family as new Record with 2 Family Members aside from Head","2023-10-09 10:25:59","INSERT","Admin");
INSERT INTO recent activity VALUES("5","Added De Layola Family as new Record with 6 Family Members aside from Head","2023-10-09 11:03:19","INSERT","Admin");
INSERT INTO recent activity VALUES("6","Added Damage Record for Test2 Family as Partially Damaged during Pre-Oral","2023-10-09 13:05:58","INSERT","Admin");
INSERT INTO recent activity VALUES("7","Added Damage Record for Test2 Family as Partially Damaged during Pre-Oral","2023-10-09 13:07:11","INSERT","Admin");
INSERT INTO recent activity VALUES("8","Added Damage Record for Test Family as Partially Damaged during Pre-Oral","2023-10-09 13:07:21","INSERT","Admin");
INSERT INTO recent activity VALUES("9","Added Damage Record for Test2 Family as Partially Damaged during Pre-Oral","2023-10-09 13:10:42","INSERT","Admin");
INSERT INTO recent activity VALUES("10","Added Damage Record for Descallar Family as Partially Damaged during Pre-Oral","2023-10-09 13:18:15","INSERT","Admin");
INSERT INTO recent activity VALUES("11","Added Damage Record for De Layola Family as Totally Damaged during Volcanic Smog","2023-10-09 13:19:17","INSERT","Admin");
INSERT INTO recent activity VALUES("12","Added Damage Record for Haveria Family as Partially Damaged during Before Final","2023-11-16 03:14:10","INSERT","Admin");
INSERT INTO recent activity VALUES("13","Added Damage Record for Haveria Family as No Damage during Before Final","2023-11-16 03:19:50","INSERT","Admin");
INSERT INTO recent activity VALUES("14","Added Damage Record for Haveria Family as Totally Damaged during Before Final","2023-11-17 10:30:23","INSERT","Admin");
INSERT INTO recent activity VALUES("15","Added Montealegre Family as new Record with 1 Family Members aside from Head","2023-11-20 02:32:08","INSERT","Admin");
INSERT INTO recent activity VALUES("18","Added ESGUERRA Family as new Record with 1 Family Members aside from Head","2023-11-22 03:23:19","INSERT","FEAILEEN");
INSERT INTO recent activity VALUES("19","Added RIVERA Family as new Record with 2 Family Members aside from Head","2023-11-22 03:37:42","INSERT","BEVERLYN");
INSERT INTO recent activity VALUES("20","Added Damage Record for RIVERA Family as Partially Damaged during 2","2023-11-22 03:39:23","INSERT","");
INSERT INTO recent activity VALUES("21","Added ANTENOR Family as new Record with 1 Family Members aside from Head","2023-11-22 03:50:48","INSERT","DENISE KAY ANTENOR");
INSERT INTO recent activity VALUES("22","Added Damage Record for ANTENOR Family as Partially Damaged during 2","2023-11-22 03:52:01","INSERT","");
INSERT INTO recent activity VALUES("23","Added RINT Family as new Record with 1 Family Members aside from Head","2023-11-22 04:00:56","INSERT","GRACE RINT");
INSERT INTO recent activity VALUES("24","Added Damage Record for RINT Family as Totally Damaged during 2","2023-11-22 04:03:21","INSERT","");
INSERT INTO recent activity VALUES("25","Account [ERNESTO T. CABALI] Has Been Updated","2023-11-23 01:58:45","UPDATE","Princess Dimapilis");
INSERT INTO recent activity VALUES("26","Added Famtest Family as new Record with 1 Family Members aside from Head","2023-11-23 02:01:32","INSERT","Admin");
INSERT INTO recent activity VALUES("27","Added Cabali Family as new Record with 1 Family Members aside from Head","2023-11-23 02:11:08","INSERT","ERNESTO T. CABALI");
INSERT INTO recent activity VALUES("28","Account [MAILA T. BARAL] Has Been Updated","2023-11-23 02:17:15","UPDATE","Admin");
INSERT INTO recent activity VALUES("29","Added Balibago Multi-purpose Hall as new Evacuation Center with the Address: Brgy. Balibago","2023-11-23 02:23:14","INSERT","MAILA T. BARAL");
INSERT INTO recent activity VALUES("30","Added Baral Family as new Record with 1 Family Members aside from Head","2023-11-23 02:26:25","INSERT","MAILA T. BARAL");
INSERT INTO recent activity VALUES("31","Disaster [Test-Disaster] Has Been Updated","2023-11-23 05:59:46","UPDATE","Admin");
INSERT INTO recent activity VALUES("32","Account [Leo] Has Been Updated","2023-11-23 06:19:34","UPDATE","Admin");
INSERT INTO recent activity VALUES("33","Account [u639839381_root] Has Been Deleted","2023-11-23 06:37:21","DELETE","Admin");
INSERT INTO recent activity VALUES("34","Account [Leo] Has Been Updated","2023-11-23 06:54:39","UPDATE","Admin");
INSERT INTO recent activity VALUES("35","Account [Lheo] Has Been Updated","2023-11-23 08:44:41","UPDATE","Admin");
INSERT INTO recent activity VALUES("36","Account [lheo1624] Has Been Updated","2023-11-23 13:33:01","UPDATE","Admin");
INSERT INTO recent activity VALUES("37","Added De Layola Family as new Record with 2 Family Members aside from Head","2023-11-23 14:16:55","INSERT","lheo1624");
INSERT INTO recent activity VALUES("38","Account [Leo] Has Been Deleted","2023-11-25 14:36:22","DELETE","Admin");
INSERT INTO recent activity VALUES("39","Account [Lheo] Has Been Deleted","2023-11-25 14:36:32","DELETE","Admin");
INSERT INTO recent activity VALUES("40","Account [lheo1624] Has Been Deleted","2023-11-25 14:36:39","DELETE","Admin");
INSERT INTO recent activity VALUES("41","Account [Lheo] Has Been Deleted","2023-11-25 14:36:45","DELETE","Admin");
INSERT INTO recent activity VALUES("42","Account [Leo] Has Been Deleted","2023-11-25 14:36:49","DELETE","Admin");
INSERT INTO recent activity VALUES("43","Added Julongbayan Family as new Record with 2 Family Members aside from Head","2023-12-03 05:16:52","INSERT","Admin");
INSERT INTO recent activity VALUES("44","Added Maralit Family as new Record with 1 Family Members aside from Head","2023-12-03 05:20:14","INSERT","Admin");
INSERT INTO recent activity VALUES("45","Added Jusayan Family as new Record with 4 Family Members aside from Head","2023-12-03 05:27:02","INSERT","Admin");
INSERT INTO recent activity VALUES("46","Added Gualvez Family as new Record with 1 Family Members aside from Head","2023-12-03 05:30:55","INSERT","Admin");
INSERT INTO recent activity VALUES("47","Added Gualvez Family as new Record with 1 Family Members aside from Head","2023-12-03 05:33:02","INSERT","Admin");
INSERT INTO recent activity VALUES("48","Added Gualvez Family as new Record with 1 Family Members aside from Head","2023-12-03 05:35:36","INSERT","Admin");
INSERT INTO recent activity VALUES("49","Added Javier Family as new Record with 1 Family Members aside from Head","2023-12-03 05:37:58","INSERT","Admin");
INSERT INTO recent activity VALUES("50","Added Javier Family as new Record with 1 Family Members aside from Head","2023-12-03 05:39:48","INSERT","Admin");
INSERT INTO recent activity VALUES("51","Added Javier Family as new Record with 1 Family Members aside from Head","2023-12-03 05:43:55","INSERT","Admin");
INSERT INTO recent activity VALUES("52","Added Laygo Family as new Record with 1 Family Members aside from Head","2023-12-03 05:47:09","INSERT","Admin");
INSERT INTO recent activity VALUES("53","Added Javier Family as new Record with 2 Family Members aside from Head","2023-12-03 06:03:32","INSERT","Admin");
INSERT INTO recent activity VALUES("54","Added Ramos Family as new Record with 1 Family Members aside from Head","2023-12-03 06:06:59","INSERT","Admin");
INSERT INTO recent activity VALUES("55","Added Capili Family as new Record with 1 Family Members aside from Head","2023-12-03 06:09:24","INSERT","Admin");
INSERT INTO recent activity VALUES("56","Added Ablero Family as new Record with 1 Family Members aside from Head","2023-12-03 06:18:00","INSERT","Admin");
INSERT INTO recent activity VALUES("57","Added Katigbac Family as new Record with 1 Family Members aside from Head","2023-12-03 06:18:23","INSERT","Admin");
INSERT INTO recent activity VALUES("58","Added Ablero Family as new Record with 1 Family Members aside from Head","2023-12-03 06:19:08","INSERT","Admin");
INSERT INTO recent activity VALUES("59","Added Dayandayan Family as new Record with 1 Family Members aside from Head","2023-12-03 06:20:27","INSERT","Admin");
INSERT INTO recent activity VALUES("60","Added Javier Family as new Record with 1 Family Members aside from Head","2023-12-03 06:22:48","INSERT","Admin");
INSERT INTO recent activity VALUES("61","Added Obrador Family as new Record with 1 Family Members aside from Head","2023-12-03 06:24:26","INSERT","Admin");
INSERT INTO recent activity VALUES("62","Added Corpus Family as new Record with 1 Family Members aside from Head","2023-12-03 06:26:13","INSERT","Admin");
INSERT INTO recent activity VALUES("63","Added De Castro Family as new Record with 1 Family Members aside from Head","2023-12-03 06:27:10","INSERT","Admin");
INSERT INTO recent activity VALUES("64","Added Delas Alas Family as new Record with 1 Family Members aside from Head","2023-12-03 06:29:20","INSERT","Admin");
INSERT INTO recent activity VALUES("65","Added Bagui Family as new Record with 1 Family Members aside from Head","2023-12-03 06:31:28","INSERT","Admin");
INSERT INTO recent activity VALUES("66","Added Perado Family as new Record with 1 Family Members aside from Head","2023-12-03 06:33:36","INSERT","Admin");
INSERT INTO recent activity VALUES("67","Added Perez Family as new Record with 1 Family Members aside from Head","2023-12-03 06:35:59","INSERT","Admin");
INSERT INTO recent activity VALUES("68","Added Dacanay Family as new Record with 1 Family Members aside from Head","2023-12-03 06:38:09","INSERT","Admin");
INSERT INTO recent activity VALUES("69","Added Lundag Family as new Record with 1 Family Members aside from Head","2023-12-03 06:40:11","INSERT","Admin");
INSERT INTO recent activity VALUES("70","Added Marcos Family as new Record with 1 Family Members aside from Head","2023-12-03 06:41:08","INSERT","Admin");
INSERT INTO recent activity VALUES("71","Added Alvarez Family as new Record with 1 Family Members aside from Head","2023-12-03 06:45:25","INSERT","Admin");
INSERT INTO recent activity VALUES("72","Added Masanguid Family as new Record with 1 Family Members aside from Head","2023-12-03 06:45:51","INSERT","Admin");
INSERT INTO recent activity VALUES("73","Added Broner Family as new Record with 2 Family Members aside from Head","2023-12-03 06:51:36","INSERT","Admin");
INSERT INTO recent activity VALUES("74","Added Eleponga Family as new Record with 1 Family Members aside from Head","2023-12-03 06:53:18","INSERT","Admin");
INSERT INTO recent activity VALUES("75","Added Marquez Family as new Record with 1 Family Members aside from Head","2023-12-03 06:55:31","INSERT","Admin");
INSERT INTO recent activity VALUES("76","Added Calimlim Family as new Record with 1 Family Members aside from Head","2023-12-03 06:57:05","INSERT","Admin");
INSERT INTO recent activity VALUES("77","Added Miranda Family as new Record with 1 Family Members aside from Head","2023-12-03 06:58:28","INSERT","Admin");
INSERT INTO recent activity VALUES("78","Added Jonson Family as new Record with 1 Family Members aside from Head","2023-12-03 07:01:31","INSERT","Admin");
INSERT INTO recent activity VALUES("79","Added Bascuguin Family as new Record with 1 Family Members aside from Head","2023-12-03 07:03:55","INSERT","Admin");
INSERT INTO recent activity VALUES("80","Added Ablero Family as new Record with 1 Family Members aside from Head","2023-12-03 07:04:06","INSERT","Admin");
INSERT INTO recent activity VALUES("81","Added Moral Family as new Record with 1 Family Members aside from Head","2023-12-03 07:07:06","INSERT","Admin");
INSERT INTO recent activity VALUES("82","Added Plarton Family as new Record with 1 Family Members aside from Head","2023-12-03 07:09:25","INSERT","Admin");
INSERT INTO recent activity VALUES("83","Added Diones Family as new Record with 1 Family Members aside from Head","2023-12-03 07:09:53","INSERT","Admin");
INSERT INTO recent activity VALUES("84","Added Nimo Family as new Record with 1 Family Members aside from Head","2023-12-03 07:12:24","INSERT","Admin");
INSERT INTO recent activity VALUES("85","Added Manalo Family as new Record with 1 Family Members aside from Head","2023-12-03 07:14:58","INSERT","Admin");
INSERT INTO recent activity VALUES("86","Added Cantos Family as new Record with 1 Family Members aside from Head","2023-12-03 07:18:53","INSERT","Admin");
INSERT INTO recent activity VALUES("87","Added Togonon Family as new Record with 1 Family Members aside from Head","2023-12-03 07:21:35","INSERT","Admin");
INSERT INTO recent activity VALUES("88","Added Maidana Family as new Record with 1 Family Members aside from Head","2023-12-03 07:24:11","INSERT","Admin");
INSERT INTO recent activity VALUES("89","Added Natingo Family as new Record with 1 Family Members aside from Head","2023-12-03 07:26:39","INSERT","Admin");
INSERT INTO recent activity VALUES("90","Account [Paolo] Has Been Updated","2023-12-03 07:36:33","UPDATE","Admin");
INSERT INTO recent activity VALUES("91","Account [Charles] Has Been Updated","2023-12-03 07:36:56","UPDATE","Admin");
INSERT INTO recent activity VALUES("92","Account [Paolo] Has Been Updated","2023-12-03 07:37:42","UPDATE","Admin");
INSERT INTO recent activity VALUES("93","Added De guzman Family as new Record with 1 Family Members aside from Head","2023-12-03 07:41:20","INSERT","Paolo");
INSERT INTO recent activity VALUES("94","Disaster [Typhoon Defense] Has Been Updated","2023-12-03 07:51:57","UPDATE","Paolo");
INSERT INTO recent activity VALUES("95","Added Delios Family as new Record with 1 Family Members aside from Head","2023-12-03 07:56:33","INSERT","Admin");
INSERT INTO recent activity VALUES("96","Added Magyaya Family as new Record with 1 Family Members aside from Head","2023-12-03 08:00:14","INSERT","Admin");
INSERT INTO recent activity VALUES("97","Added Decilos Family as new Record with 1 Family Members aside from Head","2023-12-03 08:08:21","INSERT","Admin");
INSERT INTO recent activity VALUES("98","Added Alvarez Family as new Record with 1 Family Members aside from Head","2023-12-03 08:33:56","INSERT","Paolo");
INSERT INTO recent activity VALUES("99","Added Bulaklak Family as new Record with 2 Family Members aside from Head","2023-12-04 04:17:54","INSERT","Paolo");
INSERT INTO recent activity VALUES("100","Added Urge Family as new Record with 1 Family Members aside from Head","2023-12-04 04:24:28","INSERT","Paolo");
INSERT INTO recent activity VALUES("101","Family Member [Princess Bulaklak] Has Been Updated","2023-12-04 04:25:22","UPDATE","Paolo");
INSERT INTO recent activity VALUES("102","Family Member [Marilyn Bulaklak] Has Been Updated","2023-12-04 04:25:41","UPDATE","Paolo");
INSERT INTO recent activity VALUES("103","Family Member [Maica nicole] Has Been Updated","2023-12-04 04:26:24","UPDATE","Paolo");
INSERT INTO recent activity VALUES("104","Family Member [Maica nicole] Has Been Updated","2023-12-04 04:26:24","UPDATE","Paolo");
INSERT INTO recent activity VALUES("105","Family Member [Cyreen Deguzman] Has Been Updated","2023-12-04 04:27:26","UPDATE","Paolo");
INSERT INTO recent activity VALUES("106","Family Member [Daniel Broner] Has Been Updated","2023-12-04 04:28:24","UPDATE","Paolo");
INSERT INTO recent activity VALUES("107","Family Member [Maria Broner] Has Been Updated","2023-12-04 04:28:50","UPDATE","Paolo");
INSERT INTO recent activity VALUES("108","Added Tolentino Family as new Record with 1 Family Members aside from Head","2023-12-04 04:32:36","INSERT","Paolo");
INSERT INTO recent activity VALUES("109","Added Sale Family as new Record with 2 Family Members aside from Head","2023-12-04 04:42:49","INSERT","Paolo");
INSERT INTO recent activity VALUES("110","Added Dimailig Family as new Record with 2 Family Members aside from Head","2023-12-04 05:00:52","INSERT","Paolo");
INSERT INTO recent activity VALUES("111","Added Eridao Family as new Record with 1 Family Members aside from Head","2023-12-04 05:11:35","INSERT","Paolo");
INSERT INTO recent activity VALUES("112","Added Julongbayan Family as new Record with 2 Family Members aside from Head","2023-12-04 05:23:44","INSERT","Paolo");
INSERT INTO recent activity VALUES("113","Added Concepcion Family as new Record with 1 Family Members aside from Head","2023-12-04 05:41:05","INSERT","Paolo");
INSERT INTO recent activity VALUES("114","Added Catillo Family as new Record with 1 Family Members aside from Head","2023-12-04 06:01:23","INSERT","Paolo");
INSERT INTO recent activity VALUES("115","Disaster [Agaton] Has Been Updated","2023-12-04 06:04:27","UPDATE","Paolo");
INSERT INTO recent activity VALUES("116","Added Andino Family as new Record with 1 Family Members aside from Head","2023-12-04 06:17:32","INSERT","Paolo");
INSERT INTO recent activity VALUES("117","Account [Paolo] Username has been Updated to [Paolo D. Julongbayan]","2023-12-04 14:03:37","UPDATE","Paolo");
INSERT INTO recent activity VALUES("118","Account [Paolo D. Julongbayan] Has Been Deleted","2023-12-05 02:39:55","DELETE","Admin");
INSERT INTO recent activity VALUES("119","Disaster [Typhoon Defense] Has Been Updated","2023-12-05 02:42:58","UPDATE","Admin");
INSERT INTO recent activity VALUES("120","Disaster [Typhoon Final Defense] Has Been Deleted","2023-12-05 02:43:06","DELETE","Admin");
INSERT INTO recent activity VALUES("121","Account [Patrick Julongbayan] Has Been Updated","2023-12-05 02:48:22","UPDATE","Admin");
INSERT INTO recent activity VALUES("122","Account [Patrick Julongbayan] Has Been Updated","2023-12-05 02:48:56","UPDATE","Admin");
INSERT INTO recent activity VALUES("123","Added Damage Record for RIVERA Family as Totally Damaged during 7","2023-12-05 03:55:18","INSERT","Patrick Julongbayan");
INSERT INTO recent activity VALUES("124","Account [Paolo D. Julongbayan] Has Been Updated","2023-12-05 05:47:24","UPDATE","Admin");
INSERT INTO recent activity VALUES("125","Account [Paolo D. Julongbayan] Has Been Updated","2023-12-05 06:02:29","UPDATE","Admin");
INSERT INTO recent activity VALUES("126","Added Damage Record for Eridao Family as Partially Damaged during 7","2023-12-05 06:13:53","INSERT","Paolo D. Julongbayan");
INSERT INTO recent activity VALUES("127","Evacuation Center [Lian Central School] Has Been Updated","2024-01-10 01:25:58","UPDATE","Admin");
INSERT INTO recent activity VALUES("128","Evacuation Center [Lian Central School] Has Been Updated","2024-01-10 01:49:18","UPDATE","Admin");
INSERT INTO recent activity VALUES("129","Evacuation Center [Lian Central School] Has Been Updated","2024-01-10 01:50:08","UPDATE","Admin");
INSERT INTO recent activity VALUES("130","Evacuation Center [Lian Central School] Has Been Updated","2024-01-10 01:53:08","UPDATE","Admin");
INSERT INTO recent activity VALUES("131","Evacuation Center [Lian Central Schools] Has Been Updated","2024-01-10 01:55:01","UPDATE","Admin");
INSERT INTO recent activity VALUES("132","Evacuation Center [Lian Central School] Has Been Updated","2024-01-10 01:55:15","UPDATE","Admin");
INSERT INTO recent activity VALUES("133","Evacuation Center [Lian Central Schools] Has Been Updated","2024-01-10 02:05:13","UPDATE","Admin");
INSERT INTO recent activity VALUES("134","Evacuation Center [Multi-Purpose Hall (Pob 2)] Has Been Updated","2024-01-10 05:22:26","UPDATE","Admin");
INSERT INTO recent activity VALUES("135","Evacuation Center [Bagyong Ernesto] Has Been Updated","2024-01-10 05:23:12","UPDATE","Admin");
INSERT INTO recent activity VALUES("136","Evacuation Center [Bagyong Ernesto] Has Been Updated","2024-01-10 05:23:57","UPDATE","Admin");
INSERT INTO recent activity VALUES("137","Disaster [BAGYONG ERNESTO] Has Been Updated","2024-01-10 05:24:26","UPDATE","Admin");
INSERT INTO recent activity VALUES("138","Disaster [Tropical Storm Leo] Has Been Updated","2024-01-10 05:27:37","UPDATE","Admin");
INSERT INTO recent activity VALUES("139","Disaster [Tropical Storm] Has Been Updated","2024-01-10 05:31:15","UPDATE","Admin");
INSERT INTO recent activity VALUES("140","Disaster [Tropical Depression] Has Been Updated","2024-01-10 05:36:32","UPDATE","Admin");
INSERT INTO recent activity VALUES("141","Disaster [Tropical Storm] Has Been Updated","2024-01-10 05:37:16","UPDATE","Admin");
INSERT INTO recent activity VALUES("142","Evacuation Center [Lian Covered Court] Has Been Updated","2024-01-10 05:37:35","UPDATE","Admin");
INSERT INTO recent activity VALUES("143","Evacuation Center [Lian Plaza] Has Been Updated","2024-01-10 05:37:53","UPDATE","Admin");
INSERT INTO recent activity VALUES("144","Disaster [Tropical Depression] Has Been Updated","2024-01-10 05:38:38","UPDATE","Admin");
INSERT INTO recent activity VALUES("145","Disaster [Tropical Storm] Has Been Updated","2024-01-10 05:43:22","UPDATE","Admin");
INSERT INTO recent activity VALUES("146","Disaster [Tropical Depression] Has Been Updated","2024-01-10 05:46:32","UPDATE","Admin");
INSERT INTO recent activity VALUES("147","Disaster [Tropical Storm] Has Been Updated","2024-01-10 05:48:08","UPDATE","Admin");
INSERT INTO recent activity VALUES("148","Disaster [Tropical Depression] Has Been Updated","2024-01-10 05:50:42","UPDATE","Admin");
INSERT INTO recent activity VALUES("149","Disaster [Tropical Storm] Has Been Updated","2024-01-10 05:54:44","UPDATE","Admin");
INSERT INTO recent activity VALUES("150","Disaster [Tropical Depression] Has Been Updated","2024-01-10 06:02:33","UPDATE","Admin");
INSERT INTO recent activity VALUES("151","Disaster [Tropical Storm] Has Been Updated","2024-01-10 06:02:39","UPDATE","Admin");
INSERT INTO recent activity VALUES("152","Disaster [Tropical Depression] Has Been Updated","2024-01-10 06:02:44","UPDATE","Admin");
INSERT INTO recent activity VALUES("153","Evacuation Center [Lian Covered Court] Has Been Updated","2024-01-10 06:04:28","UPDATE","Admin");
INSERT INTO recent activity VALUES("154","Evacuation Center [Lian Plaza] Has Been Updated","2024-01-10 06:04:38","UPDATE","Admin");
INSERT INTO recent activity VALUES("155","Disaster [Typhoon Carding] Has Been Updated","2024-01-10 06:05:54","UPDATE","Admin");
INSERT INTO recent activity VALUES("156","Damage of Family [] Has Been Updated","2024-01-12 10:05:39","UPDATE","Admin");
INSERT INTO recent activity VALUES("157","Damage of Family [] Has Been Updated","2024-01-12 10:05:41","UPDATE","Admin");
INSERT INTO recent activity VALUES("158","Damage of Family [] Has Been Updated","2024-01-12 10:08:31","UPDATE","Admin");
INSERT INTO recent activity VALUES("159","Damage of Family [] Has Been Updated","2024-01-12 10:09:48","UPDATE","Admin");
INSERT INTO recent activity VALUES("160","Damage of Family [] Has Been Updated","2024-01-12 10:10:58","UPDATE","Admin");
INSERT INTO recent activity VALUES("161","Damage of Family [Eridao] Has Been Updated","2024-01-12 10:12:33","UPDATE","Admin");
INSERT INTO recent activity VALUES("162","Damage of Family [Eridao] Has Been Updated","2024-01-12 10:19:09","UPDATE","Admin");
INSERT INTO recent activity VALUES("163","Damage of Family [Eridao] Has Been Updated","2024-01-12 10:19:22","UPDATE","Admin");
INSERT INTO recent activity VALUES("164","Damage of Family [Eridao] Has Been Updated","2024-01-12 10:19:56","UPDATE","Admin");
INSERT INTO recent activity VALUES("165","Damage of Family [Eridao] Has Been Updated","2024-01-12 10:20:01","UPDATE","Admin");
INSERT INTO recent activity VALUES("166","Added Damage Record for Concepcion Family as Partially Damaged during Typhoon Defense","2024-01-17 02:18:55","INSERT","Admin");
INSERT INTO recent activity VALUES("167","Damage of Family [Concepcion] Has Been Updated","2024-01-17 02:56:55","UPDATE","Admin");



CREATE TABLE `relief_distribution` (
  `rd_ID` int NOT NULL AUTO_INCREMENT,
  `Serial_No.` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `damage_ID` int NOT NULL,
  `Date` date NOT NULL DEFAULT (curdate()),
  `Recieving_Family` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Rec_Fam_Member` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Kind/Type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Quantity` int DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  `Provider` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rd_ID`),
  KEY `Serial_No.` (`Serial_No.`),
  KEY `damage_ID` (`damage_ID`),
  CONSTRAINT `relief_distribution_ibfk_2` FOREIGN KEY (`damage_ID`) REFERENCES `damages` (`damage_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `relief_distribution_ibfk_3` FOREIGN KEY (`Serial_No.`) REFERENCES `family` (`Serial_No.`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO relief_distribution VALUES("1","20737476","10","2023-09-29","Ampon","Lyron John Ampon","Hygiene Kits","10","0","Admin");
INSERT INTO relief_distribution VALUES("6","20737476","10","2023-09-29","Ampon","Uphai Peñaflor Ampon","Hot Meal","5","1000","Admin");
INSERT INTO relief_distribution VALUES("7","20737476","10","2023-09-29","Ampon","Jun Ampon","Gaming PC","2345","12312","Leo");
INSERT INTO relief_distribution VALUES("8","20737479","17","2023-11-22","De Layola","Rodelito De Layola","SARDINES,NOODLES","12","0","FEAILEEN");
INSERT INTO relief_distribution VALUES("9","202304003","21","2023-11-22","RIVERA","RYAN IVAN C. RIVERA ","NOODLES","2","0","BEVERLYN");
INSERT INTO relief_distribution VALUES("10","202304005","22","2023-11-22","ANTENOR","DENISE KAY ANTENOR","NOODLES","1","0","DENISE KAY ANTENOR");
INSERT INTO relief_distribution VALUES("11","202304006","23","2023-11-22","RINT","RACY ANNE RINT","NOODLES","12","0","GRACE RINT");
INSERT INTO relief_distribution VALUES("12","202304008","24","2023-11-23","Cabali","Antonio Cabali","NOODLES","2","0","ERNESTO T. CABALI");
INSERT INTO relief_distribution VALUES("13","202304009","25","2023-11-23","Baral","Maila Baral","Cash","1","5000","MAILA T. BARAL");
INSERT INTO relief_distribution VALUES("14","202304010","26","2023-11-23","De Layola","Leo De Layola","Health Kit","3","0","lheo1624");
INSERT INTO relief_distribution VALUES("15","202304010","26","2023-11-23","De Layola","Angelika De Layola","Cash","1","5000","lheo1624");
INSERT INTO relief_distribution VALUES("16","202304010","26","2023-11-24","De Layola","Leo De Layola","Cash","1","5000","Leo");
INSERT INTO relief_distribution VALUES("18","202304011","28","2023-12-03","Julongbayan","Pablo Julongbayan","Can Goods","9","0","Admin");
INSERT INTO relief_distribution VALUES("19","202304012","30","2023-12-03","Maralit","Nicole Maralit","Noodles","5","0","Paolo");
INSERT INTO relief_distribution VALUES("20","202304001","31","2023-12-03","Montealegre","JaJa Montealegre","Cash","5000","0","Paolo");
INSERT INTO relief_distribution VALUES("23","202304013","34","2023-12-03","Jusayan","Antonio Jusayan","Can Goods","13","0","Paolo");
INSERT INTO relief_distribution VALUES("24","202304014","35","2023-12-03","Gualvez","Garry Gualvez","Cash","5000","0","Paolo");
INSERT INTO relief_distribution VALUES("25","202304044","36","2023-12-03","Calimlim","Cj James Calimlim","Can Goods","3","0","Paolo");
INSERT INTO relief_distribution VALUES("28","202304034","38","2023-12-03","Perado","Jerome Perado","Can Goods","12","5000","Paolo");
INSERT INTO relief_distribution VALUES("29","202304011","28","2023-12-03","Julongbayan","Pablo Julongbayan","Can Goods","14","3000","Paolo");
INSERT INTO relief_distribution VALUES("30","202304011","41","2023-12-03","Julongbayan","Pablo Julongbayan","Can Goods","4","0","Paolo");
INSERT INTO relief_distribution VALUES("31","202304011","41","2023-12-03","Julongbayan","Pablo Julongbayan","Can Goods","5","0","Paolo");
INSERT INTO relief_distribution VALUES("32","202304062","40","2023-12-03","Alvarez","Canelo Alvarez","Can Goods","6","0","Paolo");
INSERT INTO relief_distribution VALUES("33","202304041","42","2023-12-04","Broner","Adrian Broner","Can Goods","12","0","Paolo");
INSERT INTO relief_distribution VALUES("34","202304038","43","2023-12-04","Marcos","Mark Marcos","Noodles","12","0","Paolo");
INSERT INTO relief_distribution VALUES("36","202304066","46","2023-12-04","Sale","Jorge Sale","Cash","1","5000","Paolo");
INSERT INTO relief_distribution VALUES("37","202304049","47","2023-12-04","Moral","Maidelyn Moral","Noodles","5","0","Paolo");
INSERT INTO relief_distribution VALUES("38","202304067","48","2023-12-04","Dimailig","Claire Dimailig","Noodles","12","3000","Paolo");
INSERT INTO relief_distribution VALUES("39","202304068","49","2023-12-04","Eridao","Mindie Eridao","Cash","1","5000","Paolo");
INSERT INTO relief_distribution VALUES("40","202304069","50","2023-12-04","Julongbayan","Marie Antoinette Julongbayan","Noodles","10","5000","Paolo");
INSERT INTO relief_distribution VALUES("41","202304070","51","2023-12-04","Concepcion","Rania Rose Concepcion","Noodles","12","5000","Paolo");
INSERT INTO relief_distribution VALUES("42","202304049","47","2023-12-04","Moral","Charles Moral","Can Goods","14","2000","Paolo");
INSERT INTO relief_distribution VALUES("43","202304047","53","2023-12-04","Bascuguin","John drake Bascuguin","Can Goods","12","0","Paolo");
INSERT INTO relief_distribution VALUES("44","202304051","54","2023-12-04","Diones","Tommy Ignacio","Noodles","12","0","Paolo");
INSERT INTO relief_distribution VALUES("45","202304045","55","2023-12-04","Miranda","Ato Miranda","Can Goods","12","4000","Paolo");
INSERT INTO relief_distribution VALUES("46","202304043","56","2023-12-04","Marquez","Juan Marquez","Noodles","14","0","Paolo");
INSERT INTO relief_distribution VALUES("47","23536663","57","2023-12-04","Greyrat","Rudeus Greyrat","Can Goods","12","0","Paolo");
INSERT INTO relief_distribution VALUES("48","202304071","58","2023-12-04","Catillo","Charles Castillo","Can Goods","12","0","Paolo");
INSERT INTO relief_distribution VALUES("49","202304072","59","2023-12-04","Andino","Kurt Andino","Can Goods","14","0","Paolo");
INSERT INTO relief_distribution VALUES("50","20737476","63","2023-12-04","Ampon","Jun Ampon","Can goods","12","3000","Paolo");
INSERT INTO relief_distribution VALUES("51","202304029","64","2023-12-05","Obrador","Pamela Obrador","Can goods","12","0","Paolo D. Julongbayan");
INSERT INTO relief_distribution VALUES("52","20737478","65","2023-12-05","Haveria","Isenhart Haveria","Can goods","4","0","Paolo D. Julongbayan");
INSERT INTO relief_distribution VALUES("53","23536663","66","2023-12-05","Greyrat","Rudeus Greyrat","Can goods","8","5000","Paolo D. Julongbayan");
INSERT INTO relief_distribution VALUES("54","202304068","68","2023-12-05","Eridao","Mindie Eridao","Food Packs","10","0","Paolo D. Julongbayan");

