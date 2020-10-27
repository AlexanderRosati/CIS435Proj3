-- Create the tech_support database
DROP DATABASE IF EXISTS tech_support;
CREATE DATABASE tech_support;
USE tech_support;

CREATE TABLE products (
    productCode varchar(10) NOT NULL,
    name varchar(50) NOT NULL,
    version decimal(18, 1) NOT NULL,
    releaseDate datetime NOT NULL,
    PRIMARY KEY (productCode)
);

INSERT INTO products VALUES 
('DRAFT10', 'Draft Manager 1.0', 1.0, '2015-03-01'), 
('DRAFT20', 'Draft Manager 2.0', 2.0, '2017-08-15'),
('LEAG10', 'League Scheduler 1.0', 1.0, '2014-06-01'), 
('LEAGD10', 'League Scheduler Deluxe 1.0', 1.0, '2014-09-01'),
('TEAM10', 'Team Manager Version 1.0', 1.0, '2015-06-01'), 
('TRNY10', 'Tournament Master Version 1.0', 1.0, '2014-01-01'), 
('TRNY20', 'Tournament Master Version 2.0', 2.0, '2016-03-15');

CREATE TABLE technicians (
    techID int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    phone varchar(20) NOT NULL,
    password varchar(20) NOT NULL,
    PRIMARY KEY (techID)
);

INSERT INTO technicians VALUES 
(11, 'Alison', 'Diaz', 'alison@sportspro.com', '800-555-0443', 'sesame'), 
(12, 'Jason', 'Lee', 'jason@sportspro.com', '800-555-0444', 'sesame'),
(13, 'Andrew', 'Wilson', 'awilson@sportspro.com', '800-555-0449', 'sesame'), 
(14, 'Gunter', 'Wendt', 'gunter@sportspro.com', '800-555-0400', 'sesame'), 
(15, 'Gina', 'Fiori', 'gfiori@sportspro.com', '800-555-0459', 'sesame');

CREATE TABLE customers (
    customerID int NOT NULL AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    address varchar(50) NOT NULL,
    city varchar(50) NOT NULL,
    state varchar(50) NOT NULL,
    postalCode varchar(20) NOT NULL,
    countryCode char(2) NOT NULL,
    phone varchar(20) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    password varchar(20) NOT NULL,
    PRIMARY KEY (customerID)
);

INSERT INTO customers VALUES 
(1002, 'Kelly', 'Irvin', 'PO Box 96621', 'Washington', 'DC', '20090', 'US', '(301) 555-8950', 'kelly@example.com', 'sesame'),
(1004, 'Kenzie', 'Quinn', '1990 Westwood Blvd Ste 260', 'Los Angeles', 'CA', '90025', 'US', '(800) 555-8725', 'kenzie@jobtrak.com', 'sesame'),
(1006, 'Anton', 'Mauro', '3255 Ramos Cir', 'Sacramento', 'CA', '95827', 'US', '(916) 555-6670', 'amauro@yahoo.org', 'sesame'),
(1008, 'Kaitlyn', 'Anthoni', 'Box 52001', 'San Francisco', 'CA', '94152', 'US', '(800) 555-6081', 'kanthoni@pge.com', 'sesame'),
(1010, 'Kendall', 'Mayte', 'PO Box 2069', 'Fresno', 'CA', '93718', 'US', '(559) 555-9999', 'kmayte@fresno.ca.gov', 'sesame'),
(1012, 'Marvin', 'Quintin', '4420 N. First Street, Suite 108', 'Fresno', 'CA', '93726', 'US', '(559) 555-9586', 'marvin@expedata.com', 'sesame'),
(1015, 'Gonzalo', 'Keeton', '27371 Valderas', 'Mission Viejo', 'CA', '92691', 'US', '(214) 555-3647', '', 'sesame'),
(1016, 'Derek', 'Chaddick', '1952 "H" Street', 'Fresno', 'CA', '93718', 'US', '(559) 555-3005', 'dChaddick@fresnophoto.com', 'sesame'),
(1017, 'Malia', 'Marques', '7700 Forsyth', 'St Louis', 'MO', '63105', 'US', '(314) 555-8834', 'malia@gmail.com', 'sesame'),
(1018, 'Emily', 'Evan', '1555 W Lane Ave', 'Columbus', 'OH', '43221', 'US', '(614) 555-4435', 'Emily@MicroCenter.com', 'sesame'),
(1019, 'Alexandro', 'Alexis', '3711 W Franklin', 'Fresno', 'CA', '93706', 'US', '(559) 555-2993', 'alal@yaleindustries.com', 'sesame'),
(1023, 'Ingrid', 'Neil', '12 Daniel Road', 'Fairfield', 'NJ', '07004', 'US', '(201) 555-9742', 'Ingrid@richadvertizing.com', 'sesame'),
(1026, 'Eileen', 'Lawrence', '1483 Chain Bridge Rd, Ste 202', 'Mclean', 'VA', '22101', 'US', '(770) 555-9558', 'eLawrence@ecomm.com', 'sesame'),
(1027, 'Marjorie', 'Essence', 'PO Box 31', 'East Brunswick', 'NJ', '08810', 'US', '(800) 555-8110', 'messence@hotmail.com', 'sesame'),
(1029, 'Trentin', 'Camron', 'PO Box 61000', 'San Francisco', 'CA', '94161', 'US', '(800) 555-4426', 'tCamron@ibm.com', 'sesame'),
(1030, 'Demetrius', 'Hunter', 'PO Box 956', 'Selma', 'CA', '93662', 'US', '(559) 555-1534', 'demetrius@termite.com', 'sesame'),
(1033, 'Thalia', 'Neftaly', '60 Madison Ave', 'New York', 'NY', '10010', 'US', '(212) 555-4800', 'tneftaly@venture.com', 'sesame'),
(1034, 'Harley', 'Myles', 'PO Box 7028', 'St Louis', 'MO', '63177', 'US', '(301) 555-1494', 'harley@cprinting.com', 'sesame'),
(1037, 'Gideon', 'Paris', '1033 N Sycamore Ave.', 'Los Angeles', 'CA', '90038', 'US', '(213) 555-4322', 'gideon@opamp.com', 'sesame'),
(1038, 'Jayda', 'Maxwell', 'PO Box 39046', 'Minneapolis', 'MN', '55439', 'US', '(612) 555-0057', 'jmaxwell@ccredit.com', 'sesame'),
(1040, 'Kristofer', 'Gerald', 'PO Box 40513', 'Jacksonville', 'FL', '32231', 'US', '(800) 555-6041', 'kgerald@naylorpub.com', 'sesame'),
(1045, 'Priscilla', 'Smith', 'Box 1979', 'Marion', 'OH', '43305', 'US', '(800) 555-1669', 'psmith@example.com', 'sesame'),
(1047, 'Brian', 'Griffin', '1150 N Tustin Ave', 'Anaheim', 'CA', '92807', 'US', '(714) 555-9000', 'bgriffin@azteklabel.com', 'sesame'),
(1049, 'Kaylea', 'Cheyenne', '2384 E Gettysburg', 'Fresno', 'CA', '93726', 'US', '(559) 555-0765', 'kaylea@yahoo.com', 'sesame'),
(1050, 'Kayle', 'Misael', 'PO Box 95857', 'Chicago', 'IL', '60694', 'US', '(800) 555-5811', 'misael@qualityeducation.com', 'sesame'),
(1051, 'Clarence', 'Maeve', 'PO Box 7247-7051', 'Philadelphia', 'PA', '19170', 'US', '(215) 555-8700', 'cmaeve@springhouse.com', 'sesame'),
(1054, 'Jovon', 'Walker', '627 Aviation Way', 'Manhatttan Beach', 'CA', '90266', 'US', '(310) 555-2732', 'jovon@ama.org', 'sesame'),
(1056, 'Nashalie', 'Angelica', '828 S Broadway', 'Tarrytown', 'NY', '10591', 'US', '(800) 555-0037', 'nangelica@aba.org', 'sesame'),
(1063, 'Leroy', 'Aryn', '3502 W Greenway #7', 'Phoenix', 'AZ', '85023', 'US', '(602) 547-0331', 'laryn@gmail.com', 'sesame'),
(1065, 'Anne', 'Braydon', 'PO Box 942', 'Fresno', 'CA', '93714', 'US', '(559) 555-7900', 'anne@gmail.com', 'sesame'),
(1066, 'Leah', 'Colton', '1626 E Street', 'Fresno', 'CA', '93786', 'US', '(559) 555-4442', 'lcolton@fresnobee.com', 'sesame'),
(1067, 'Cesar', 'Arodondo', '4545 Glenmeade Lane', 'Auburn Hills', 'MI', '48326', 'US', '(810) 555-3700', 'arododo@drc.com', 'sesame'),
(1068, 'Rachael', 'Danielson', '353 E Shaw Ave', 'Fresno', 'CA', '93710', 'US', '(559) 555-1704', 'rdanielson@eop.com', 'sesame'),
(1070, 'Salina', 'Edgardo', '6435 North Palm Ave, Ste 101', 'Fresno', 'CA', '93704', 'US', '(559) 555-7070', 'sadgardo@rpc.com', 'sesame'),
(1071, 'Daniel', 'Bradlee', '4 Cornwall Dr Ste 102', 'East Brunswick', 'NJ', '08816', 'US', '(908) 555-7222', 'dbradlee@simondirect.com', 'sesame'),
(1074, 'Quentin', 'Warren', 'PO Box 12332', 'Fresno', 'CA', '93777', 'US', '(559) 555-3112', 'quentin@valprint.com', 'sesame'),
(1080, 'Jillian', 'Clifford', '3250 Spring Grove Ave', 'Cincinnati', 'OH', '45225', 'US', '(800) 555-1957', 'jillian@champion.com', 'sesame'),
(1081, 'Angel', 'Lloyd', 'Department #1872', 'San Francisco', 'CA', '94161', 'US', '(617) 555-0700', 'alloyd@cw.com', 'sesame'),
(1083, 'Jeanette', 'Helena', '4775 E Miami River Rd', 'Cleves', 'OH', '45002', 'US', '(513) 555-3043', 'jhelena@eds.com', 'sesame'),
(1086, 'Luciano', 'Destin', 'P O Box 7126', 'Pasadena', 'CA', '91109', 'US', '(800) 555-7009', 'ldestin@mwp.com', 'sesame'),
(1089, 'Kyra', 'Francis', '4150 W Shaw Ave ', 'Fresno', 'CA', '93722', 'US', '(559) 555-8300', 'kyra@abbey.com', 'sesame'),
(1094, 'Lance', 'Potter', '28210 N Avenue Stanford', 'Valencia', 'CA', '91355', 'US', '(805) 555-0584', 'lpotter@bis.com', 'sesame'),
(1097, 'Jeffrey', 'Smitzen', 'Post Office Box 924', 'New Delhi', '', '110001', 'IN', '91-12345-12345', 'jeffreys@example.com', 'sesame'),
(1098, 'Vance', 'Smith', '9 River Pk Pl E 400', 'Boston', 'MA', '02134', 'US', '(508) 555-8737', 'vsmith@example.com', 'sesame'),
(1100, 'Thom', 'Aaronsen', '7112 N Fresno St Ste 200', 'Fresno', 'CA', '93720', 'US', '(559) 555-8484', 'taaronsen@dgm.com', 'sesame'),
(1112, 'Harold', 'Spivak', '2874 S Cherry Ave', 'Fresno', 'CA', '93706', 'US', '(559) 555-2770', 'harold@propane.com', 'sesame'),
(1113, 'Rachael', 'Bluzinski', 'P.O. Box 860070', 'Pasadena', 'CA', '91186', 'US', '(415) 555-7600', 'rachael@unocal.com', 'sesame'),
(1114, 'Reba', 'Hernandez', 'PO Box 2061', 'Fresno', 'CA', '93718', 'US', '(559) 555-0600', 'rhernandez@yesmed.com', 'sesame'),
(1116, 'Jaime', 'Ronaldsen', '3467 W Shaw Ave #103', 'Fresno', 'CA', '93711', 'US', '(559) 555-8625', 'jronaldsen@zylka.com', 'sesame'),
(1117, 'Violet', 'Beauregard', 'P.O. Box 505820', 'Reno', 'NV', '88905', 'US', '(800) 555-0855', 'vbeauregard@ups.com', 'sesame'),
(1118, 'Charlie', 'Bucket', 'Lodhi Road', 'New Delhi', '', '110003', 'IN', '(800) 555-4091', 'cbucket@yahoo.com', 'sesame');


CREATE TABLE registrations (
    customerID int NOT NULL,
    productCode varchar(10) NOT NULL,
    registrationDate datetime NOT NULL,
    PRIMARY KEY (customerID, productCode)
);

INSERT INTO registrations VALUES 
(1002, 'LEAG10', '2015-11-01'), 
(1004, 'DRAFT10', '2016-01-11'), 
(1004, 'LEAG10', '2014-09-19'), 
(1004, 'TRNY10', '2016-01-13'), 
(1006, 'TRNY10', '2016-11-18'), 
(1008, 'DRAFT10', '2015-08-03'), 
(1008, 'LEAG10', '2014-10-29'), 
(1008, 'TEAM10', '2016-03-01'), 
(1008, 'TRNY10', '2014-04-02'), 
(1010, 'LEAG10', '2015-01-29'), 
(1012, 'DRAFT10', '2015-03-19'), 
(1015, 'TRNY10', '2014-05-19'), 
(1016, 'TEAM10', '2016-02-14'), 
(1017, 'TRNY10', '2016-05-09'), 
(1018, 'TEAM10', '2015-06-03'), 
(1018, 'TRNY10', '2014-12-25'), 
(1019, 'TRNY20', '2016-06-20'), 
(1023, 'LEAGD10', '2015-05-12'), 
(1026, 'LEAG10', '2015-01-02'), 
(1027, 'LEAGD10', '2015-03-14'), 
(1029, 'LEAGD10', '2016-10-18'), 
(1029, 'TEAM10', '2016-03-28'), 
(1030, 'LEAG10', '2015-01-04'), 
(1033, 'DRAFT10', '2015-07-20'), 
(1034, 'DRAFT10', '2015-03-20'), 
(1034, 'LEAGD10', '2016-02-21'), 
(1034, 'TEAM10', '2016-02-22'), 
(1037, 'LEAGD10', '2015-03-10'), 
(1038, 'LEAG10', '2015-01-03'), 
(1038, 'TRNY10', '2014-04-03'), 
(1040, 'TRNY10', '2014-04-07'), 
(1045, 'LEAGD10', '2015-01-14'), 
(1047, 'LEAGD10', '2015-02-14'), 
(1047, 'TEAM10', '2015-10-27'), 
(1047, 'TRNY20', '2017-02-27'), 
(1049, 'DRAFT10', '2016-01-11'), 
(1049, 'LEAGD10', '2015-07-12'), 
(1049, 'TRNY10', '2016-09-21'), 
(1049, 'TRNY20', '2016-07-12'), 
(1050, 'LEAGD10', '2015-08-24'), 
(1051, 'TEAM10', '2016-03-18'), 
(1054, 'DRAFT10', '2015-07-07'), 
(1054, 'TRNY20', '2016-05-09'), 
(1056, 'TRNY20', '2016-07-06'), 
(1063, 'LEAG10', '2015-01-02'), 
(1063, 'TEAM10', '2016-11-05'), 
(1065, 'LEAG10', '2015-01-21'), 
(1065, 'LEAGD10', '2015-07-04'), 
(1065, 'TEAM10', '2016-03-14'), 
(1066, 'LEAGD10', '2014-12-22'), 
(1066, 'TEAM10', '2015-10-01'), 
(1066, 'TRNY10', '2014-06-22'), 
(1067, 'LEAGD10', '2016-01-04'), 
(1068, 'DRAFT10', '2015-03-03'), 
(1070, 'DRAFT10', '2015-07-28'), 
(1070, 'LEAGD10', '2015-06-09'), 
(1070, 'TEAM10', '2015-07-29'), 
(1070, 'TRNY20', '2016-09-13'), 
(1071, 'TRNY10', '2014-10-15'), 
(1074, 'LEAG10', '2014-11-02'), 
(1080, 'DRAFT10', '2016-01-24'), 
(1080, 'LEAGD10', '2015-01-05'), 
(1080, 'TRNY10', '2016-05-29'), 
(1081, 'LEAGD10', '2015-02-09'), 
(1083, 'LEAG10', '2014-11-07'), 
(1083, 'LEAGD10', '2015-03-27'), 
(1083, 'TEAM10', '2016-05-26'), 
(1086, 'LEAG10', '2015-05-01'), 
(1089, 'LEAG10', '2016-10-12'), 
(1089, 'LEAGD10', '2015-10-10'), 
(1089, 'TRNY10', '2014-06-03'), 
(1094, 'TEAM10', '2017-01-08'), 
(1097, 'TRNY20', '2016-09-18'), 
(1098, 'LEAG10', '2014-12-03'), 
(1098, 'TRNY10', '2014-04-11'), 
(1100, 'LEAG10', '2014-08-07'), 
(1112, 'DRAFT10', '2015-09-27'), 
(1112, 'TRNY10', '2014-11-12'), 
(1112, 'TRNY20', '2016-12-13'), 
(1113, 'LEAGD10', '2015-02-18'), 
(1114, 'TRNY10', '2016-07-06'), 
(1116, 'DRAFT10', '2015-06-09'), 
(1117, 'DRAFT10', '2016-05-06'), 
(1117, 'TRNY10', '2014-03-04'), 
(1117, 'TRNY20', '2016-08-22'), 
(1118, 'DRAFT10', '2015-11-23');

CREATE TABLE incidents(
    incidentID int NOT NULL AUTO_INCREMENT,
    customerID int NOT NULL,
    productCode varchar(10) NOT NULL,
    techID int NULL,
    dateOpened datetime NOT NULL,
    dateClosed datetime NULL,
    title varchar(50) NOT NULL,
    description varchar(2000) NOT NULL,
    PRIMARY KEY (incidentID) 
);

INSERT INTO incidents VALUES 
(27, 1010, 'LEAG10', 11, '2017-06-05', '2017-06-06', 'Could not install', 'Media appears to be bad.'), 
(28, 1117, 'TRNY20', 11, '2017-06-14', NULL, 'Error importing data', 'Received error message 415 while trying to import data from previous version.'), 
(29, 1116, 'DRAFT10', 13, '2017-06-20', NULL, 'Could not install', 'Setup failed with code 104.'), 
(30, 1010, 'TEAM10', 14, '2017-06-21', '2017-06-24', 'Error launching program', 'Program fails with error code 510, unable to open database.'), 
(31, 1010, 'TRNY20', 14, '2017-06-21', NULL, 'Unable to activate product', 'Customer''s product activation key does not work.'), 
(32, 1056, 'TRNY20', 12, '2017-06-24', NULL, 'Product activation error', 'Customer could not activate product because of an invalid product activation code.'), 
(34, 1018, 'DRAFT10', 13, '2017-07-02', '2017-07-04', 'Error launching program', 'Program fails with error code 340: Database exceeds size limit.'), 
(36, 1065, 'LEAG10', NULL, '2017-07-04', NULL, 'Error adding data', 'Received error message 201 when trying to add records: database must be reorganized.'), 
(42, 1097, 'TRNY20', NULL, '2017-07-08', NULL, 'Unable to import data', 'Import command not available for importing data from previous version.'), 
(44, 1063, 'LEAG10', NULL, '2017-07-09', NULL, 'Installation error', 'Error during installation: cmd.exe not found.'), 
(45, 1089, 'LEAGD10', NULL, '2017-07-09', NULL, 'Problem upgrading from League Scheduler 1.0', 'Program fails with error 303 when trying to install upgrade.'), 
(46, 1016, 'TEAM10', NULL, '2017-07-09', NULL, 'Unable to restore data from backup', 'Error 405 encountered while restoring backup: File not found.'), 
(47, 1034, 'DRAFT10', NULL, '2017-07-09', NULL, 'Can''t activate product', 'Product activation code invalid.'), 
(48, 1049, 'TRNY20', NULL, '2017-07-09', NULL, 'Unable to print brackets', 'Program doesn''t recognize printer.'), 
(49, 1083, 'LEAGD10', NULL, '2017-07-10', NULL, 'Can''t start application', 'Error 521 on startup: database must be reorganized.'), 
(50, 1116, 'DRAFT10', NULL, '2017-07-10', NULL, 'Error during data file backup', 'Program abends with error 228 during database backup'), 
(51, 1067, 'LEAGD10', NULL, '2017-07-10', NULL, 'Error when adding new records', 'Received error 340: database exceeds size limit.'), 
(52, 1066, 'TEAM10', NULL, '2017-07-11', NULL, 'Installation problem', 'Customer states that the setup program failed with code 203 during configuration.');

CREATE TABLE countries (
    countryCode char(2) NOT NULL,
    countryName varchar(100) NOT NULL,
    PRIMARY KEY (countryCode)
);

INSERT INTO countries VALUES
('AF', 'Afghanistan'), 
('AX', 'Aland Islands'), 
('AL', 'Albania'), 
('DZ', 'Algeria'), 
('AS', 'American Samoa'), 
('AD', 'Andorra'), 
('AO', 'Angola'), 
('AI', 'Anguilla'), 
('AQ', 'Antarctica'), 
('AG', 'Antigua and Barbuda'), 
('AR', 'Argentina'), 
('AM', 'Armenia'), 
('AW', 'Aruba'), 
('AU', 'Australia'), 
('AT', 'Austria'), 
('AZ', 'Azerbaijan'), 
('BS', 'Bahamas, The'), 
('BH', 'Bahrain'), 
('BD', 'Bangladesh'), 
('BB', 'Barbados'), 
('BY', 'Belarus'), 
('BE', 'Belgium'), 
('BZ', 'Belize'), 
('BJ', 'Benin'), 
('BM', 'Bermuda'), 
('BT', 'Bhutan'), 
('BO', 'Bolivia'), 
('BA', 'Bosnia and Herzegovina'), 
('BW', 'Botswana'), 
('BV', 'Bouvet Island'), 
('BR', 'Brazil'), 
('IO', 'British Indian Ocean Territory'), 
('BN', 'Brunei Darussalam'), 
('BG', 'Bulgaria'), 
('BF', 'Burkina Faso'), 
('BI', 'Burundi'), 
('KH', 'Cambodia'), 
('CM', 'Cameroon'), 
('CA', 'Canada'), 
('CV', 'Cape Verde'), 
('KY', 'Cayman Islands'), 
('CF', 'Central African Republic'), 
('TD', 'Chad'), 
('CL', 'Chile'), 
('CN', 'China'), 
('CX', 'Christmas Island'), 
('CC', 'Cocos (Keeling) Islands'), 
('CO', 'Colombia'), 
('KM', 'Comoros'), 
('CG', 'Congo'), 
('CD', 'Congo, The Democratic Republic Of The'), 
('CK', 'Cook Islands'), 
('CR', 'Costa Rica'), 
('CI', 'Cote D''ivoire'), 
('HR', 'Croatia'), 
('CY', 'Cyprus'), 
('CZ', 'Czech Republic'), 
('DK', 'Denmark'), 
('DJ', 'Djibouti'), 
('DM', 'Dominica'), 
('DO', 'Dominican Republic'), 
('EC', 'Ecuador'), 
('EG', 'Egypt'), 
('SV', 'El Salvador'), 
('GQ', 'Equatorial Guinea'), 
('ER', 'Eritrea'), 
('EE', 'Estonia'), 
('ET', 'Ethiopia'), 
('FK', 'Falkland Islands - Malvinas'), 
('FO', 'Faroe Islands'), 
('FJ', 'Fiji'), 
('FI', 'Finland'), 
('FR', 'France'), 
('GF', 'French Guiana'), 
('PF', 'French Polynesia'), 
('TF', 'French Southern Territories'), 
('GA', 'Gabon'), 
('GM', 'Gambia, The'), 
('GE', 'Georgia'), 
('DE', 'Germany'), 
('GH', 'Ghana'), 
('GI', 'Gibraltar'), 
('GR', 'Greece'), 
('GL', 'Greenland'), 
('GD', 'Grenada'), 
('GP', 'Guadeloupe'), 
('GU', 'Guam'), 
('GT', 'Guatemala'), 
('GG', 'Guernsey'), 
('GN', 'Guinea'), 
('GW', 'Guinea-Bissau'), 
('GY', 'Guyana'), 
('HT', 'Haiti'), 
('HM', 'Heard Island and the McDonald Islands'), 
('VA', 'Holy See'), 
('HN', 'Honduras'), 
('HK', 'Hong Kong'), 
('HU', 'Hungary'), 
('IS', 'Iceland'), 
('IN', 'India'), 
('ID', 'Indonesia'), 
('IQ', 'Iraq'), 
('IE', 'Ireland'), 
('IM', 'Isle Of Man'), 
('IL', 'Israel'), 
('IT', 'Italy'), 
('JM', 'Jamaica'), 
('JP', 'Japan'), 
('JE', 'Jersey'), 
('JO', 'Jordan'), 
('KZ', 'Kazakhstan'), 
('KE', 'Kenya'), 
('KI', 'Kiribati'), 
('KR', 'Korea, Republic Of'), 
('KW', 'Kuwait'), 
('KG', 'Kyrgyzstan'), 
('LA', 'Lao People''s Democratic Republic'), 
('LV', 'Latvia'), 
('LB', 'Lebanon'), 
('LS', 'Lesotho'), 
('LR', 'Liberia'), 
('LY', 'Libya'), 
('LI', 'Liechtenstein'), 
('LT', 'Lithuania'), 
('LU', 'Luxembourg'), 
('MO', 'Macao'), 
('MK', 'Macedonia, The Former Yugoslav Republic Of'), 
('MG', 'Madagascar'), 
('MW', 'Malawi'), 
('MY', 'Malaysia'), 
('MV', 'Maldives'), 
('ML', 'Mali'), 
('MT', 'Malta'), 
('MH', 'Marshall Islands'), 
('MQ', 'Martinique'), 
('MR', 'Mauritania'), 
('MU', 'Mauritius'), 
('YT', 'Mayotte'), 
('MX', 'Mexico'), 
('FM', 'Micronesia, Federated States Of'), 
('MD', 'Moldova, Republic Of'), 
('MC', 'Monaco'), 
('MN', 'Mongolia'), 
('ME', 'Montenegro'), 
('MS', 'Montserrat'), 
('MA', 'Morocco'), 
('MZ', 'Mozambique'), 
('MM', 'Myanmar'), 
('NA', 'Namibia'), 
('NR', 'Nauru'), 
('NP', 'Nepal'), 
('NL', 'Netherlands'), 
('AN', 'Netherlands Antilles'), 
('NC', 'New Caledonia'), 
('NZ', 'New Zealand'), 
('NI', 'Nicaragua'), 
('NE', 'Niger'), 
('NG', 'Nigeria'), 
('NU', 'Niue'), 
('NF', 'Norfolk Island'), 
('MP', 'Northern Mariana Islands'), 
('NO', 'Norway'), 
('OM', 'Oman'), 
('PK', 'Pakistan'), 
('PW', 'Palau'), 
('PS', 'Palestinian Territories'), 
('PA', 'Panama'), 
('PG', 'Papua New Guinea'), 
('PY', 'Paraguay'), 
('PE', 'Peru'), 
('PH', 'Philippines'), 
('PN', 'Pitcairn'), 
('PL', 'Poland'), 
('PT', 'Portugal'), 
('PR', 'Puerto Rico'), 
('QA', 'Qatar'), 
('RE', 'Reunion'), 
('RO', 'Romania'), 
('RU', 'Russian Federation'), 
('RW', 'Rwanda'), 
('BL', 'Saint Barthelemy'), 
('SH', 'Saint Helena'), 
('KN', 'Saint Kitts and Nevis'), 
('LC', 'Saint Lucia'), 
('MF', 'Saint Martin'), 
('PM', 'Saint Pierre and Miquelon'), 
('VC', 'Saint Vincent and The Grenadines'), 
('WS', 'Samoa'), 
('SM', 'San Marino'), 
('ST', 'Sao Tome and Principe'), 
('SA', 'Saudi Arabia'), 
('SN', 'Senegal'), 
('RS', 'Serbia'), 
('SC', 'Seychelles'), 
('SL', 'Sierra Leone'), 
('SG', 'Singapore'), 
('SK', 'Slovakia'), 
('SI', 'Slovenia'), 
('SB', 'Solomon Islands'), 
('SO', 'Somalia'), 
('ZA', 'South Africa'), 
('GS', 'South Georgia and the South Sandwich Islands'), 
('ES', 'Spain'), 
('LK', 'Sri Lanka'), 
('SR', 'Suriname'), 
('SJ', 'Svalbard and Jan Mayen'), 
('SZ', 'Swaziland'), 
('SE', 'Sweden'), 
('CH', 'Switzerland'), 
('TW', 'Taiwan'), 
('TJ', 'Tajikistan'), 
('TZ', 'Tanzania, United Republic Of'), 
('TH', 'Thailand'), 
('TL', 'Timor-leste'), 
('TG', 'Togo'), 
('TK', 'Tokelau'), 
('TO', 'Tonga'), 
('TT', 'Trinidad and Tobago'), 
('TN', 'Tunisia'), 
('TR', 'Turkey'), 
('TM', 'Turkmenistan'), 
('TC', 'Turks and Caicos Islands'), 
('TV', 'Tuvalu'), 
('UG', 'Uganda'), 
('UA', 'Ukraine'), 
('AE', 'United Arab Emirates'), 
('GB', 'United Kingdom'), 
('US', 'United States'), 
('UM', 'United States Minor Outlying Islands'), 
('UY', 'Uruguay'), 
('UZ', 'Uzbekistan'), 
('VU', 'Vanuatu'), 
('VE', 'Venezuela'), 
('VN', 'Vietnam'), 
('VG', 'Virgin Islands, British'), 
('VI', 'Virgin Islands, U.S.'), 
('WF', 'Wallis and Futuna'), 
('EH', 'Western Sahara'), 
('YE', 'Yemen'), 
('ZM', 'Zambia'), 
('ZW', 'Zimbabwe');

CREATE TABLE administrators (
  username    VARCHAR(40)    NOT NULL     UNIQUE,
  password    VARCHAR(40)    NOT NULL,
  PRIMARY KEY (username)
);

INSERT INTO administrators VALUES
('admin', 'sesame'),
('joel', 'sesame');


-- Create a user named ts_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO ts_user@localhost
IDENTIFIED BY 'pa55word';