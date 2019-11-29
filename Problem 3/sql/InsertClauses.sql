USE MPMgmtDB;
INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Portia', 'Simpson-Miller', 'SW St. Andrew',
  'portia.simpson-miller@example.gov.jm', 39,'43d3214b03f4d814c688fdeab25e46cd',
  MD5(CONCAT('12345','43d3214b03f4d814c688fdeab25e46cd')));

INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Andrew', 'Holness', 'West Central St. Andrew',
  'andrew.holness@example.gov.jm', 22,'550bf43527d65e84fc48b9fb2025addb',
  MD5(CONCAT('12345','550bf43527d65e84fc48b9fb2025addb')));
INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Orette', 'Golding', 'Kingston West',
  'bruce.golding@example.gov.jm', 20,'00168a1b260b7aac1d732df4475f5dea',
  MD5(CONCAT('12345','00168a1b260b7aac1d732df4475f5dea')));
INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Percival', 'Patterson', 'Westmoreland Eastern',
  'percival.patterson@example.gov.jm', 27,'dd8072d78d2a9d07923fe5fb632bf143',
  MD5(CONCAT('12345','dd8072d78d2a9d07923fe5fb632bf143')));
INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Michael', 'Manley', 'Kingston Central',
  'michael.manley@example.gov.jm', 25,'b7166e25ade87e934c13dde68b9a3183',
  MD5(CONCAT('12345','b7166e25ade87e934c13dde68b9a3183')));
INSERT INTO Representatives (first_name, last_name, constituency, email,
 yrs_service, salt, password_digest) 
  VALUES ('Edward', 'Seaga', 'Kingston Central',
  'edward.seaga@example.gov.jm', 43,'8974ffceac233c957f9f1e181bf02f7e',
  MD5(CONCAT('12345','8974ffceac233c957f9f1e181bf02f7e')));
