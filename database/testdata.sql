/*
 * spdx_docs 4 inserts
 */

INSERT INTO `spdx_file` (`spdx_pk`,`spdx_id`,`version`,`data_license`,`document_name`,`document_comment`,`created_date`) VALUES (1001, 1, 1, "MIT", "AngularJS","#FOSSOLOGY_ONLY",NOW());
INSERT INTO `spdx_file` (`spdx_pk`,`spdx_id`,`version`,`data_license`,`document_name`,`document_comment`,`created_date`) VALUES (1002, 2, 1, "APACHE 2.0", "Node.js", "#FOSSOLOGY_ONLY",NOW());
INSERT INTO `spdx_file` (`spdx_pk`,`spdx_id`,`version`,`data_license`,`document_name`,`document_comment`,`created_date`) VALUES (1003, 3, 1, "GPL V2", "Django", "#FOSSOLOGY_ONLY",NOW());
INSERT INTO `spdx_file` (`spdx_pk`,`spdx_id`,`version`,`data_license`,`document_name`,`document_comment`,`created_date`) VALUES (1004, 4, 1, "GPL", "ExpressJS", "#FOSSOLOGY_ONLY",NOW());

/*------------------------------------------------------------------------------------------------------------------------------*/

/*
 * spdx_package_info 4 inserts
 */

INSERT INTO `spdx_package_info` (`package_info_pk`,`name`,`filename`,`download_location`,`package_copyright_text`,`version`,`description`,`summary`,`originator`,`supplier`,`license_concluded`,`license_declared`,`checksum`,`home_page`,`source_info`,`license_info_from_files`,`license_comment`,`verificationcode`,`spdx_fk`) VALUES (1001, "ExpressJS", "Package File Name 1", "Package Download Location 1", "Package Copyright Text 1", "V1.1", "Package Description 1", "Package Summary 1", "Package Originator 1", "Package Supplier 1", "GPL", "GPL", "PACKAGECHECKSUM1", "Home Page 1", "Source Info Test 1", "License Info From Files 1", "Package License Comments 1", "Package Verification Code 1", 1001);
INSERT INTO `spdx_package_info` (`package_info_pk`,`name`,`filename`,`download_location`,`package_copyright_text`,`version`,`description`,`summary`,`originator`,`supplier`,`license_concluded`,`license_declared`,`checksum`,`home_page`,`source_info`,`license_info_from_files`,`license_comment`,`verificationcode`,`spdx_fk`) VALUES (1002, "Node.js", "Package File Name 2", "Package Download Location 2", "Package Copyright Text 2", "V2.1", "Package Description 2", "Package Summary 2", "Package Originator 2", "Package Supplier 2", "APACHE 2.0", "APACHE 2.0", "PACKAGECHECKSUM2", "Home Page 2", "Source Info Test 2", "License Info From Files 2", "Package License Comments 2", "Package Verification Code 2", 1002);
INSERT INTO `spdx_package_info` (`package_info_pk`,`name`,`filename`,`download_location`,`package_copyright_text`,`version`,`description`,`summary`,`originator`,`supplier`,`license_concluded`,`license_declared`,`checksum`,`home_page`,`source_info`,`license_info_from_files`,`license_comment`,`verificationcode`,`spdx_fk`) VALUES (1003, "AngularJS", "Package File Name 3", "Package Download Location 3", "Package Copyright Text 3", "V3.1", "Package Description 3", "Package Summary 3", "Package Originator 3", "Package Supplier 3", "MIT", "MIT", "PACKAGECHECKSUM3", "Home Page 3", "Source Info Test 3", "License Info From Files 3", "Package License Comments 3", "Package Verification Code 3", 1003);
INSERT INTO `spdx_package_info` (`package_info_pk`,`name`,`filename`,`download_location`,`package_copyright_text`,`version`,`description`,`summary`,`originator`,`supplier`,`license_concluded`,`license_declared`,`checksum`,`home_page`,`source_info`,`license_info_from_files`,`license_comment`,`verificationcode`,`spdx_fk`) VALUES (1004, "Django", "Package File Name 4", "Package Download Location 4", "Package Copyright Text 4", "V4.1", "Package Description 4", "Package Summary 4", "Package Originator 4", "Package Supplier 4", "GPL V2", "GPL V2", "PACKAGECHECKSUM4", "Home Page 4", "Source Info Test 4", "License Info From Files 4", "Package License Comments 4", "Package Verification Code 4", 1004);

/*------------------------------------------------------------------------------------------------------------------------------*/

/*
 * spdx_file_info 12 inserts (3 for each pacakge)
 */

INSERT INTO `spdx_file_info` (`file_info_pk`, `filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1001, "app", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 1", "Artifact Of Project URI Homepage 1", "Artifact Of Project URI 1", "MIT", "MIT", "FILECHECKSUM1","#FOSSOLOGY_ONLY", "File Notice 1", "File Contributor 1","File Comment 1",1001,1001);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1002, "index", "HTML", "Creative Commons", "Artifact Of Project URI Name 2", "Artifact Of Project URI Homepage 2", "Artifact Of Project URI 2", "MIT", "MIT", "FILECHECKSUM2", "#FOSSOLOGY_ONLY", "File Notice 2", "File Contributor 2", "File Comment 2",1001,1001);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1003, "angular", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 3", "Artifact Of Project URI Homepage 3", "Artifact Of Project URI 3", "MIT", "MIT", "FILECHECKSUM3","#FOSSOLOGY_ONLY", "File Notice 3", "File Contributor 3", "File Comment 3",1001,1001);

INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1004, "config", "XML", "Creative Commons", "Artifact Of Project URI Name 4", "Artifact Of Project URI Homepage 4", "Artifact Of Project URI 4", "GPL V2", "GPL V2", "FILECHECKSUM4","#FOSSOLOGY_ONLY", "File Notice 4", "File Contributor 4",  "File Comment 4",1002,1002);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1005, "index", "HTML", "Creative Commons", "Artifact Of Project URI Name 5", "Artifact Of Project URI Homepage 5", "Artifact Of Project URI 5", "GPL V2", "GPL V2", "FILECHECKSUM5", "#FOSSOLOGY_ONLY", "File Notice 5", "File Contributor 5",  "File Comment 5",1002,1002);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1006,  "django", "Python", "Creative Commons", "Artifact Of Project URI Name 6", "Artifact Of Project URI Homepage 6", "Artifact Of Project URI 6", "GPL V2", "GPL V2", "FILECHECKSUM6","#FOSSOLOGY_ONLY", "File Notice 6", "File Contributor 6",  "File Comment 6",1002,1002);

INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1007,"express", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 7", "Artifact Of Project URI Homepage 7", "Artifact Of Project URI 7", "GPL", "GPL", "FILECHECKSUM7", "#FOSSOLOGY_ONLY", "File Notice 7", "File Contributor 7",  "File Comment 7",1003,1003);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1008,"config", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 8", "Artifact Of Project URI Homepage 8", "Artifact Of Project URI 8", "GPL", "GPL", "FILECHECKSUM8", "#FOSSOLOGY_ONLY", "File Notice 8", "File Contributor 8", "File Comment 8",1003,1003);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1009,"connect", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 9", "Artifact Of Project URI Homepage 9", "Artifact Of Project URI 9", "GPL", "GPL", "FILECHECKSUM9", "#FOSSOLOGY_ONLY", "File Notice 9", "File Contributor 9","File Comment 9",1003,1003);

INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1010,"node", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 10", "Artifact Of Project URI Homepage 10", "Artifact Of Project URI 10", "APACHE 2.0", "APACHE 2.0", "FILECHECKSUM10",  "#FOSSOLOGY_ONLY", "File Notice 10",  "File Dependency 10", "File Comment 10",1004,1004);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1011,"config", "XML", "Creative Commons", "Artifact Of Project URI Name 11", "Artifact Of Project URI Homepage 11", "Artifact Of Project URI 11", "APACHE 2.0", "APACHE 2.0", "FILECHECKSUM11", "#FOSSOLOGY_ONLY", "File Notice 11", "File Contributor 11", "File Comment 11",1004,1004);
INSERT INTO `spdx_file_info` (`file_info_pk`,`filename`,`filetype`,`file_copyright_text`,`artifact_of_project`,`artifact_of_homepage`,`artifact_of_url`,`license_concluded`,`license_info_in_file`,`checksum`,`license_comment`,`file_notice`,`file_contributor`,`file_comment`,`package_info_fk`,`spdx_fk`) VALUES (1012,"modules", "JavaScript", "Creative Commons", "Artifact Of Project URI Name 12", "Artifact Of Project URI Homepage 12", "Artifact Of Project URI 12", "APACHE 2.0", "APACHE 2.0", "FILECHECKSUM12", "#FOSSOLOGY_ONLY", "File Notice 12", "File Contributor 12", "File Comment 12",1004,1004);

/*------------------------------------------------------------------------------------------------------------------------------*/


INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1001, 34, "Beerware", "Beerware License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1002, 170, "JSON", "JSON License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1003, 189, "MIT", "MIT License", NOW());

INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1004, 189, "MIT", "MIT License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1005, 21, "Apache-2.0", "Apache License 2.0", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1006, 34, "Beerware", "Beerware License", NOW());

INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1007, 170, "JSON", "JSON License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1008, 189, "MIT", "MIT License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1009, 189, "MIT", "MIT License", NOW());

INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1010, 21, "Apache-2.0", "Apache License 2.0", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1011, 34, "Beerware", "Beerware License", NOW());
INSERT INTO `spdx_license_associations` (`file_info_pk`,`license_list_pk`,`license_identifier`,`license_fullname`, `created_at`) VALUES (1012, 170, "JSON", "JSON License", NOW());

/*------------------------------------------------------------------------------------------------------------------------------*/


INSERT INTO `spdx_annotations_create` (`annotator`,`annotator_date`,`annotator_type`,`annotator_comment`,`spdx_fk`) VALUES ("Person 1", NOW(), "EDIT", "OMG ITS SOOO AWESOME!", 1001);
INSERT INTO `spdx_annotations_create` (`annotator`,`annotator_date`,`annotator_type`,`annotator_comment`,`spdx_fk`) VALUES ("Person 2", NOW(), "EDIT", "OMG ITS SOOO AWESOME!", 1002);
INSERT INTO `spdx_annotations_create` (`annotator`,`annotator_date`,`annotator_type`,`annotator_comment`,`spdx_fk`) VALUES ("Person 3", NOW(), "EDIT", "OMG ITS SOOO AWESOME!", 1003);
INSERT INTO `spdx_annotations_create` (`annotator`,`annotator_date`,`annotator_type`,`annotator_comment`,`spdx_fk`) VALUES ("Person 4", NOW(), "EDIT", "OMG ITS SOOO AWESOME!", 1004);