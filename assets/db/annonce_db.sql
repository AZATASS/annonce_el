
-- Création de la base de données
create database annonce_db; 

-- sélectionner database
use annonce_db;

-- Création des tables
create table if not exists `el_langue`( 
  id smallint unsigned not null auto_increment,
  code varchar(50) not null,
  libelle varchar(100) not null,
  primary key(id)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_pays` (
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  code int(3) NOT NULL,
  alpha2 varchar(2) NOT NULL,
  alpha3 varchar(3) NOT NULL,
  indicatif varchar(10),
  nom_en_gb varchar(45) NOT NULL,
  nom_fr_fr varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_ville` (
  id smallint unsigned NOT NULL AUTO_INCREMENT,
  libelle varchar(100) NOT NULL,
  idpays smallint unsigned NOT NULL,
  primary key(id),
  unique key `ville` (`libelle`),
  foreign key(idpays) references el_pays(id) on delete cascade
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_categorie`( 
  id smallint unsigned not null auto_increment,
  libelle varchar(100) not null,
  primary key(id),
  unique key `categorie` (`libelle`)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_sous_categorie`( 
  id smallint unsigned not null auto_increment,
  libelle varchar(100) not null,
  idcategorie smallint unsigned not null,
  primary key(id),
  unique key `categorie` (`libelle`),
  foreign key(idcategorie) references el_categorie(id) on delete cascade
) ENGINE=Innodb DEFAULT CHARSET=utf8;


create table if not exists `el_type_annonceur`( 
  id smallint unsigned not null auto_increment,
  libelle varchar(100) not null,
  primary key(id),
  unique key `type_annonceur` (`libelle`)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_type_compte`( 
  id smallint unsigned not null auto_increment,
  libelle varchar(100) not null,
  primary key(id),
  unique key `type_compte` (`libelle`)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_annonceur`(
  id int unsigned not null unique auto_increment,
  identifiant varchar(50) not null,
  titulaire varchar(200) not null,
  telephone varchar(50),
  email varchar(100) not null,
  pwd varchar(100) not null,
  type_annonceur varchar(50) not null,
  statut varchar(50) not null,
  primary key(identifiant)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_annonce` (
  id int unsigned not null unique auto_increment,
  reference varchar(50) not null,
  titre varchar(50) not null,
  prix int not null,
  date_publication date not null,
  description TEXT not null,
  image1 varchar(100),
  image2 varchar(100),
  image3 varchar(100),
  image4 varchar(100),
  image5 varchar(100),
  image6 varchar(100),
  nbre_vue smallint unsigned default 0,
  idsous_categorie smallint unsigned not null,
  idville smallint unsigned not null,
  annonceur varchar(50) not null,
  primary key (reference),
  foreign key(idsous_categorie) references el_sous_categorie(id) on delete cascade,
  foreign key(idville) references el_ville(id) on delete cascade,
  foreign key(annonceur) references el_annonceur(identifiant) on delete cascade
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_boutique` (
  id int unsigned not null auto_increment,
  libelle varchar(50) not null,
  description TEXT not null,
  image_page varchar(100),
  annonceur varchar(50) not null,
  primary key (id),
  foreign key(annonceur) references el_annonceur(identifiant) on delete cascade
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_produit` (
  id int unsigned not null auto_increment,
  libelle varchar(50) not null,
  prix int not null,
  description TEXT not null,
  image1 varchar(100),
  image2 varchar(100),
  image3 varchar(100),
  image4 varchar(100),
  image5 varchar(100),
  image6 varchar(100),
  idcategorie smallint unsigned not null,
  idboutique int unsigned not null,
  primary key (`id`),
  foreign key(idcategorie) references el_categorie(id) on delete cascade,
  foreign key(idboutique) references el_boutique(id) on delete cascade
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_compte`( 
  id int unsigned not null unique auto_increment,
  num_compte varchar(50) not null,
  date_creation date not null,
  type_compte varchar(100) not null,
  statut varchar(50) not null,
  annonceur varchar(50) not null,
  primary key(num_compte),
  foreign key(annonceur) references el_annonceur(identifiant) on delete cascade
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_paiement`( 
  id int unsigned not null auto_increment,
  reference varchar(100) not null,
  identifiant_compte varchar(50) not null,
  montant int,
  date_paiement date not null,
  mode_paiement varchar(100) not null,
  primary key(id)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_internaute`(
  id int unsigned not null auto_increment,
  titulaire varchar(200) not null,
  email varchar(100) not null,
  telephone varchar(50),
  primary key(id)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_intereser`( 
  id int unsigned not null auto_increment,
  date_intereser date not null,
  reference varchar(50) not null,
  idinternaute int unsigned not null,
  primary key(id),
  foreign key(reference) references el_annonce(reference) on delete cascade,
  foreign key(idinternaute) references el_internaute(id) on delete cascade
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_favorie`( 
  id int unsigned not null auto_increment,
  reference varchar(50) not null,
  idinternaute int unsigned not null,
  primary key(id),
  foreign key(reference) references el_annonce(reference) on delete cascade,
  foreign key(idinternaute) references el_internaute(id) on delete cascade
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_temoignage`(
  id int unsigned not null auto_increment,
  date_temoignage date not null,
  note smallint not null,
  commentaire TEXT not null,
  primary key(id)
) ENGINE=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_historique_cx` (
  id int unsigned not null auto_increment,
  date date not null,
  heure varchar(10) not null,
  date_heure varchar(30) not null,
  adresse_ip varchar(50),
  adresse_mac varchar(50),
  annonceur varchar(50) not null,
  primary key (`id`),
  foreign key(annonceur) references el_annonceur(identifiant)
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_statut` (
  id smallint unsigned not null auto_increment,
  code varchar(10) not null,
  libelle varchar(50) not null,
  primary key (`id`),
  unique key `statut` (`libelle`)
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_etat` (
  id smallint unsigned not null auto_increment,
  libelle varchar(50) not null,
  primary key (`id`),
  unique key `etat` (`libelle`)
) Engine=Innodb DEFAULT CHARSET=utf8;

create table if not exists `el_genere_code`( 
  id smallint unsigned not null auto_increment,
  lettre1 char(1) not null,
  lettre2 char(1) not null,
  nombre1 char(2) not null,
  nombre2 char(2) not null,
  nombre3 char(2) not null,
  date_modif varchar(20) not null,
  primary key (id)
) ENGINE=Innodb DEFAULT CHARSET=utf8;


insert into el_genere_code(lettre1,lettre2,nombre1,nombre2,nombre3,date_modif) values("Z","A","00","99","99","9999-12-31");



-- Insertion type d'annonceur
insert into el_type_annonceur(libelle) values("Particulier"),
                                            ("Entreprise");

-- Insertion type de compte
insert into el_type_compte(libelle) values("Standard"),
                                          ("Premium");

-- Insertion etat
insert into el_etat(libelle) values("annulé"),
                                    ("encours"),
                                    ("terminé");


-- Insertion statut
insert into el_statut(libelle) values("actif"),
                                      ("désactivé"),
                                      ("en attente"),
                                      ("suspendu");

-- Insertion catégorie annonce
insert into el_categorie(libelle) values("Téléphones & Tablettes"),
                                                ("Informatique & Multimédia"),
                                                ("Véhicules"),
                                                ("Immobilier"),
                                                ("Mode & Vêtements"),
                                                ("Loisirs"),
                                                ("Pour la Maison"),
                                                ("Emplois & Formations"),
                                                ("Entreprises & Services"),
                                                ("Beauté & Bien être");

-- Insertion sous catégorie annonce
insert into el_sous_categorie(libelle,idcategorie) values("Mobiles & Smartphones",1),
                                                                        ("Tablettes",1),
                                                                        ("Accessoires Téléphone",1),
                                                                        ("Ordinateurs",2),
                                                                        ("Jeux vidéos & Consoles",2),
                                                                        ("TV & Vidéo",2),
                                                                        ("Photo & Caméras",2),
                                                                        ("Son, Casques, Enceintes",2),
                                                                        ("Accessoires Informatiques",2),
                                                                        ("Voitures d'occassions",3),
                                                                        ("Voitures neuves",3),
                                                                        ("Location de véhicules",3),
                                                                        ("Moto & Vélos",3),
                                                                        ("Véhicules professionnels",3),
                                                                        ("Bateau & Nautisme",3),
                                                                        ("Pièces détachées & accessoires",3),
                                                                        ("Appartements à louer",4),
                                                                        ("Appartements à vendre",4),
                                                                        ("Appartements meublés",4),
                                                                        ("Studios & Chambres à louer",4),
                                                                        ("Maisons à vendre",4),
                                                                        ("Maisons à louer",4),
                                                                        ("Terrains & parcelles",4),
                                                                        ("Locaux Commerciaux & Bureaux",4),
                                                                        ("Locaux industriels",4),
                                                                        ("Investissements Immobilier",4),
                                                                        ("Vêtements Hommes",5),
                                                                        ("Chaussures Hommes",5),
                                                                        ("Vêtements Femmes",5),
                                                                        ("Chaussures Femmes",5),
                                                                        ("Vêtements Enfants",5),
                                                                        ("Sacs & Bagagerie",5),
                                                                        ("Bijoux & Monstres",5),
                                                                        ("Accessoires de mode & Tissus",5),
                                                                        ("Sport & Fitness",6),
                                                                        ("Instruments de musique",6),
                                                                        ("Livres, Films, Jouets",6),
                                                                        ("Evènements",6),
                                                                        ("Voyage & Tourisme",6),
                                                                        ("Art & Artisanat",6),
                                                                        ("Electroménager",7),
                                                                        ("Meubles & Luminaires",7),
                                                                        ("Décoration",7),
                                                                        ("Arts de la table & Vaisselles",7),
                                                                        ("Literie",7),
                                                                        ("Bricolage & Jardinage",7),
                                                                        ("Enfants & bébés",7),
                                                                        ("Animaux de compagnie",7),
                                                                        ("Offres d'emploi",8),
                                                                        ("Formations & Cours",8),
                                                                        ("Recherche d'emploi",8),
                                                                        ("Service",9),
                                                                        ("Equipement professionnel",9),
                                                                        ("Equipement de Bureau",9),
                                                                        ("Matériaux de construction",9),
                                                                        ("Produits agricoles & Elevage",9),
                                                                        ("Messages Pro",10),
                                                                        ("Cheveux & coiffure",10),
                                                                        ("Cosmétiques & Soins",10),
                                                                        ("Parfums",10),
                                                                        ("Santé & Médécine",10),
                                                                        ("Accessoires beauté",10);


insert into `el_pays` (`id`, `code`, `alpha2`, `alpha3`, `indicatif`, `nom_en_gb`, `nom_fr_fr`) VALUES
(59, 204, 'BJ', 'BEN', '00229','Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', '','Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', '','Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', '','Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', '','Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', '','El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', '','Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', '','Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', '','Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', '','Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', '','Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', '','Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', '','South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', '','Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', '','Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', '','Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', '','France', 'France'),
(76, 254, 'GF', 'GUF', '','French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', '','French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', '','French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', '','Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', '','Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', '','Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', '','Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', '','Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', '','Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', '','Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', '','Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', '','Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', '','Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', '','Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', '','Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', '','Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', '','Guam', 'Guam'),
(93, 320, 'GT', 'GTM', '','Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', '','Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', '','Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', '','Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', '','Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', '','Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', '','Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', '','Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', '','Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', '','Iceland', 'Islande'),
(103, 356, 'IN', 'IND', '','India', 'Inde'),
(104, 360, 'ID', 'IDN', '','Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', '','Islamic Republic of Iran', 'République Islamique d''Iran'),
(106, 368, 'IQ', 'IRQ', '','Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', '','Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', '','Israel', 'Israël'),
(109, 380, 'IT', 'ITA', '','Italy', 'Italie'),
(110, 384, 'CI', 'CIV', '00225','Côte d''Ivoire', 'Côte d''Ivoire'),
(111, 388, 'JM', 'JAM', '','Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', '','Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', '','Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', '','Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', '','Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', '','Democratic People''s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', '','Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', '','Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', '','Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', '','Lao People''s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', '','Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', '','Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', '','Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', '','Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', '','Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', '','Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', '','Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', '','Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', '','Macao', 'Macao'),
(130, 450, 'MG', 'MDG', '','Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', '','Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', '','Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', '','Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', '','Mali', 'Mali'),
(135, 470, 'MT', 'MLT', '','Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', '','Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', '','Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', '','Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', '','Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', '','Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', '','Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', '','Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', '','Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', '','Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', '','Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', '','Oman', 'Oman'),
(147, 516, 'NA', 'NAM', '','Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', '','Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', '','Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', '','Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', '','Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', '','Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', '','New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', '','Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', '','New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', '','Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', '','Niger', 'Niger'),
(241, 894, 'ZM', 'ZMB', '','Zambia', 'Zambie');


-- Insertion de ville
insert into el_ville(libelle,idpays) values ("Abengourou",110),
                                            ("Abobo",110),
                                            ("Aboisso",110),
                                            ("Adiaké",110),
                                            ("Adjamé",110),
                                            ("Adzopé",110),
                                            ("Afféry",110),
                                            ("Agboville",110),
                                            ("Agnibilékrou",110),
                                            ("Agou",110),
                                            ("Akoupé",110),
                                            ("Alépé",110),
                                            ("Anoumaba",110),
                                            ("Anyama",110),
                                            ("Arrah",110),
                                            ("Assinie",110),
                                            ("Assuéffry",110),
                                            ("Attécoubé",110),
                                            ("Attiegouakro",110),
                                            ("Ayamé",110),
                                            ("Azaguié",110),
                                            ("Bako",110),
                                            ("Bangolo",110),
                                            ("Bassawa",110),
                                            ("Bédiala",110),
                                            ("Béoumi",110),
                                            ("Béttié",110),
                                            ("Biankouma",110),
                                            ("Bin-Houyé",110),
                                            ("Bingerville",110),
                                            ("Bloléquin",110),
                                            ("Bocanda",110),
                                            ("Bodokro",110),
                                            ("Bondoukou",110),
                                            ("Bongouanou",110),
                                            ("Boniérédougou",110),
                                            ("Bonon",110),
                                            ("Bonoua",110),
                                            ("Booko",110),
                                            ("Borotou",110),
                                            ("Botro",110),
                                            ("Bouaflé",110),
                                            ("Bouaké",110),
                                            ("Bouna",110),
                                            ("Boundiali",110),
                                            ("Brobo",110),
                                            ("Buyo",110),
                                            ("Cocody",110),
                                            ("Dabakala",110),
                                            ("Dabou",110),
                                            ("Daloa",110),
                                            ("Danané",110),
                                            ("Daoukro",110),
                                            ("Diabo",110),
                                            ("Dianra",110),
                                            ("Diawala",110),
                                            ("Didiévi",110),
                                            ("Diégonéfla",110),
                                            ("Dikodougou",110),
                                            ("Dimbokro",110),
                                            ("Dioulatiédougou",110),
                                            ("Divo",110),
                                            ("Djebonoua",110),
                                            ("Djèkanou",110),
                                            ("Djibrosso",110),
                                            ("Doropo",110),
                                            ("Dualla",110),
                                            ("Duékoué",110),
                                            ("Ettrokro",110),
                                            ("Facobly",110),
                                            ("Ferkessédougou",110),
                                            ("Foumbolo",110),
                                            ("Fresco",110),
                                            ("Fronan",110),
                                            ("Gagnoa",110),
                                            ("Gbeleban",110),
                                            ("Gboguhé",110),
                                            ("Gbon",110),
                                            ("Gbonné",110),
                                            ("Gohitafla",110),
                                            ("Goulia",110),
                                            ("Grabo",110),
                                            ("Grand-Bassam",110),
                                            ("Grand-Béréby",110),
                                            ("Grand-Lahou",110),
                                            ("Grand-Zattry",110),
                                            ("Guéyo",110),
                                            ("Guibéroua",110),
                                            ("Guiembé",110),
                                            ("Guiglo",110),
                                            ("Guintéguéla",110),
                                            ("Guitry",110),
                                            ("Hiré",110),
                                            ("Issia",110),
                                            ("Jacqueville",110),
                                            ("Kanakono",110),
                                            ("Kani",110),
                                            ("Kaniasso",110),
                                            ("Karakoro",110),
                                            ("Kasséré",110),
                                            ("Katiola",110),
                                            ("Kokoumbo",110),
                                            ("Kolia",110),
                                            ("Komborodougou",110),
                                            ("Kong",110),
                                            ("Kongasso",110),
                                            ("Koonan",110),
                                            ("Korhogo",110),
                                            ("Koro",110),
                                            ("Kouassi-Datékro",110),
                                            ("Kouassi-Kouassikro",110),
                                            ("Kouibly",110),
                                            ("Koumassi",110),
                                            ("Koumbala",110),
                                            ("Koun-Fao",110),
                                            ("Kounahiri",110),
                                            ("Kouto",110),
                                            ("Lakota",110),
                                            ("Logoualé",110),
                                            ("M'bahiakro",110),
                                            ("M'batto",110),
                                            ("M'bengué",110),
                                            ("Madinani",110),
                                            ("Maféré",110),
                                            ("Man",110),
                                            ("Mankono",110),
                                            ("Marcory",110),
                                            ("Massala",110),
                                            ("Mayo",110),
                                            ("Méagui",110),
                                            ("Minignan",110),
                                            ("Morondo",110),
                                            ("N'douci",110),
                                            ("Napié",110),
                                            ("Nassian",110),
                                            ("Niablé",110),
                                            ("Niakaramandougou",110),
                                            ("Niéllé",110),
                                            ("Niofoin",110),
                                            ("Odienné",110),
                                            ("Ouangolodougou",110),
                                            ("Ouaninou",110),
                                            ("Ouellé",110),
                                            ("Oumé",110),
                                            ("Ouragahio",110),
                                            ("Plateau",110),
                                            ("Port-bouët",110),
                                            ("Prikro",110),
                                            ("Rubino",110),
                                            ("Saïoua",110),
                                            ("Sakassou",110),
                                            ("Samatiguila",110),
                                            ("San Pedro",110),
                                            ("Sandégué",110),
                                            ("Sangouiné",110),
                                            ("Sarhala",110),
                                            ("Sassandra",110),
                                            ("Satama-Sokoro",110),
                                            ("Satama-Sokoura",110),
                                            ("Séguéla",110),
                                            ("Séguelon",110),
                                            ("Seydougou",110),
                                            ("Sifié",110),
                                            ("Sikensi",110),
                                            ("Sinématiali",110),
                                            ("Sinfra",110),
                                            ("Sipilou",110),
                                            ("Sirasso",110),
                                            ("Songon",110),
                                            ("Soubré",110),
                                            ("Taabo",110),
                                            ("Tabou",110),
                                            ("Tafiré",110),
                                            ("Taï",110),
                                            ("Tanda",110),
                                            ("Téhini",110),
                                            ("Tengréla",110),
                                            ("Tiapoum",110),
                                            ("Tiassalé",110),
                                            ("Tie-n'diekro",110),
                                            ("Tiébissou",110),
                                            ("Tiémé",110),
                                            ("Tiémélékro",110),
                                            ("Tiéningboué",110),
                                            ("Tienko",110),
                                            ("Tioroniaradougou",110),
                                            ("Tortiya",110),
                                            ("Touba",110),
                                            ("Toulépleu",110),
                                            ("Toumodi",110),
                                            ("Transua",110),
                                            ("Treichville",110),
                                            ("Vavoua",110),
                                            ("Worofla",110),
                                            ("Yakassé-Attobrou",110),
                                            ("Yamoussoukro",110),
                                            ("Yopougon",110),
                                            ("Zikisso",110),
                                            ("Zouan-Hounien",110),
                                            ("Zoukougbeu",110),
                                            ("Zuénoula",110);










