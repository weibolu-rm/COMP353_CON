USE `eac353_2`;

/*row data for building table*/
INSERT INTO building (square_footage, address) VALUES (2300, "3524 Rue Sherbrooke, Montreal, QC");
INSERT INTO building (square_footage, address) VALUES (3000, "1587 Rue Laval, Montreal, QC");
INSERT INTO building (square_footage, address) VALUES (2500, "2490 Rue St Denis, Montreal, QC");

/*row data for condo table*/
INSERT INTO condo VALUES (1,1);
INSERT INTO condo VALUES (1,2);
INSERT INTO condo VALUES (1,3);
INSERT INTO condo VALUES (1,4);
INSERT INTO condo VALUES (1,5);
INSERT INTO condo VALUES (1,6);
INSERT INTO condo VALUES (1,7);
INSERT INTO condo VALUES (1,8);
INSERT INTO condo VALUES (1,9);
INSERT INTO condo VALUES (1,10);
INSERT INTO condo VALUES (2,1);
INSERT INTO condo VALUES (2,2);
INSERT INTO condo VALUES (2,3);
INSERT INTO condo VALUES (2,4);
INSERT INTO condo VALUES (2,5);
INSERT INTO condo VALUES (2,6);
INSERT INTO condo VALUES (2,7);
INSERT INTO condo VALUES (2,8);
INSERT INTO condo VALUES (2,9);
INSERT INTO condo VALUES (2,10);
INSERT INTO condo VALUES (3,1);
INSERT INTO condo VALUES (3,2);
INSERT INTO condo VALUES (3,3);
INSERT INTO condo VALUES (3,4);
INSERT INTO condo VALUES (3,5);
INSERT INTO condo VALUES (3,6);
INSERT INTO condo VALUES (3,7);
INSERT INTO condo VALUES (3,8);
INSERT INTO condo VALUES (3,9);
INSERT INTO condo VALUES (3,10);

/* Data for populating condo owners */
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Shinji Ikari", "s.ikari@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #1, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Misato Katsuragi", "m.katsuragi@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #2, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Rei Ayanami", "r.ayami@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #3, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Asuka Langley Soryu", "a.soryu@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #4, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Gendo Ikari", "g.ikari@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #5, Montreal, QC", "admin", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Ritsuko Akagi", "r.akagi@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #6, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Kozo Fuyutsuki", "k.fuyutsuki@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #7, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Ryoji Kaji", "r.kaji@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #8, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Makoto Hyuga", "m.hyuga@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #9, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Maya Ibuki", "m.ibuki@consys.com", "passw0rd1234", "3524 Rue Sherbrooke #10, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Shigeru Aoba", "s.aoba@consys.com", "passw0rd1234", "1587 Rue Laval #1, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Kaworu Nagisa", "k.nagisa@consys.com", "passw0rd1234", "1587 Rue Laval #2, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Toji Suzuhara", "t.suzuhara@consys.com", "passwo0rd1234", "1587 Rue Laval #3, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Kensuke Aida", "k.aida@consys.com", "passw0rd1234", "1587 Rue Laval #4, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Hikari Horaki", "h.horaki@consys.com", "passw0rd1234", "1587 Rue Laval #5, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Pen Pen", "p.pen@consys.com", "passw0rd1234", "1587 Rue Laval #6, Montreal, QC", "admin", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Naoko Akagi", "n.akagi@consys.com", "passw0rd1234", "1587 Rue Laval #7, Montreal, QC", "admin", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Yui Ikari", "y.ikari@consys.com", "passw0rd1234", "1587 Rue Laval #8, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Kyoko Zeppelin Soryu", "k.soryu@consys.com", "passw0rd1234", "1587 Rue Laval #9, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Keel Lorenz", "k.lorenz@consys.com", "passw0rd1234", "1587 Rue Laval #10, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Adam Angel", "a.angel@consys.com", "passw0rd1234", "2490 Rue St Denis #1, Montreal, QC", "admin", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Lilith Angel", "lth.angel@consys.com", "passw0rd1234", "2490 Rue St Denis #2, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Tabris Angel", "t.angel@consys.com", "passw0rd1234", "2490 Rue St Denis #3, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Lilin Angel", "ln.angel@consys.com", "passw0rd1234", "2490 Rue St Denis #4, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Lain Iwakura", "l.iwakura@consys.com", "passw0rd1234", "2490 Rue St Denis #5, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Mika Iwakura", "m.iwakura@consys.com", "passw0rd1234", "2490 Rue St Denis #6, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Masami Eiri", "m.eiri@consys.com", "passw0rd1234", "2490 Rue St Denis #7, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Alice Mizuki", "a.mizuki@consys.com", "passw0rd1234", "2490 Rue St Denis #8, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Chisa Yomoda", "c.yomoda@consys.com", "passw0rd1234", "2490 Rue St Denis #9, Montreal, QC", "user", 10);
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("Yasuo Iwakura", "y.iwakura@consys.com", "passw0rd1234", "2490 Rue St Denis #10, Montreal, QC", "user", 10);

/*data for maintenance table*/
INSERT INTO maintenance VALUES ("Terminexx", "2020-03-24", "2020-03-26", "unclogged rats from sink", 54.10, 1, 7);
INSERT INTO maintenance VALUES ("Father Jean Francois", "2020-01-19", "2020-01-19", "excorcized malaevolent spirits from gym", 210.99, 1, null);
INSERT INTO maintenance VALUES ("Terminexx", "2020-05-03", "2020-05-06", "removed raccoons from bedroom", 50.24, 1, 10);
INSERT INTO maintenance VALUES ("PlumbCo", "2020-01-10", "2020-01-10", "replaced shattered toilet", 200.87, 2, 6);
INSERT INTO maintenance VALUES ("ElectroPro", "2020-02-10", "2020-02-18", "rewired entire living room after The Incident", 1450.69, 2, 8);
INSERT INTO maintenance VALUES ("Terminexx", "2020-03-12", "2020-03-12", "fumigated storage shed for Australian Huntsman spiders", 189.12, 2, null);
INSERT INTO maintenance VALUES ("Claude's Repairs", "2020-02-14", "2020-02-16", "repaired shotgun damage to bedroom wall", 300.64, 3, 3);
INSERT INTO maintenance VALUES ("Plumbco", "2020-06-20", "2020-06-20", "neutralized sewage geiser from toilet", 310.45, 3, 7);
INSERT INTO maintenance VALUES ("ElectroPro", "2020-04-21", "2020-04-22", "fixed flickering lights in kitchen", 230.34, 3, 1);
INSERT INTO maintenance VALUES ("RenovationInc", "2020-04-21", null, "Stairs restoration", 15000.00 , 3, null);

/*row data for transaction_record table*/
INSERT INTO transaction_record VALUES (1, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (1, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (1, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (2, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (2, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (2, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (3, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (3, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (3, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (4, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (4, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (4, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (5, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (5, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (5, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (6, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (6, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (6, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (7, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (7, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-03-26", null, 54.10);
INSERT INTO transaction_record VALUES (7, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (7, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (8, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (8, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (8, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (9, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (9, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (9, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (10, "2020-01-19", null, 21.10);
INSERT INTO transaction_record VALUES (10, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-05-03", null, 50.24);
INSERT INTO transaction_record VALUES (10, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (10, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (11, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (11, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (11, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (12, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (12, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (12, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (13, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (13, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (13, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (14, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (14, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (14, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (15, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (15, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (15, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (16, "2020-01-01", 750, null);
INSERT INTO transaction_record values (16, "2020-01-10", NULL, 200.87);
INSERT INTO transaction_record VALUES (16, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (16, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (16, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (17, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (17, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (17, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (18, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-02-18", null, 1450.69);
INSERT INTO transaction_record VALUES (18, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (18, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (18, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (19, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-03-12", null, 18.90);
INSERT INTO transaction_record VALUES (19, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (19, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (20, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-04-22", null, 230.34);
INSERT INTO transaction_record VALUES (20, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (20, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (20, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (21, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (21, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (21, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (22, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (22, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (22, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (23, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-02-16", null, 300.64);
INSERT INTO transaction_record VALUES (23, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (23, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (23, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (24, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (24, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (24, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (25, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (25, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (25, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (26, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (26, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (26, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (27, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (27, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-06-20", null, 310.45);
INSERT INTO transaction_record VALUES (27, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (27, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (28, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (28, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (28, "2020-12-01", 750, null);

INSERT INTO transaction_record VALUES (29, "2020-01-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-02-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-03-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-04-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-05-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-05-02", null, 1500); 
INSERT INTO transaction_record VALUES (29, "2020-06-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-07-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-08-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-09-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-10-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-11-01", 750, null);
INSERT INTO transaction_record VALUES (29, "2020-12-01", 750, null);

/*data for parking table*/
insert into parking_space values (1, 1);
insert into parking_space values (1, 2);
insert into parking_space values (1, 3);
insert into parking_space values (1, 4);
insert into parking_space values (1, 5);
insert into parking_space values (1, 6);
insert into parking_space values (1, 7);
insert into parking_space values (1, 8);
insert into parking_space values (1, 9);
insert into parking_space values (1, 10);
insert into parking_space values (2, 1);
insert into parking_space values (2, 2);
insert into parking_space values (2, 3);
insert into parking_space values (2, 4);
insert into parking_space values (2, 5);
insert into parking_space values (2, 6);
insert into parking_space values (2, 7);
insert into parking_space values (2, 8);
insert into parking_space values (2, 9);
insert into parking_space values (2, 10);
insert into parking_space values (3, 1);
insert into parking_space values (3, 2);
insert into parking_space values (3, 3);
insert into parking_space values (3, 4);
insert into parking_space values (3, 5);
insert into parking_space values (3, 6);
insert into parking_space values (3, 7);
insert into parking_space values (3, 8);
insert into parking_space values (3, 9);
insert into parking_space values (3, 10);

/*data for public_spaces table*/
insert into public_space values (1, "gym", 210);
insert into public_space values (2, "gym", 250);
insert into public_space values (3, "gym", 300);
insert into public_space values (1, "stairs", 200);
insert into public_space values (2, "stairs", 200);
insert into public_space values (3, "stairs", 200);

/*data for storage_spaces table*/
insert into storage_space values (1, 1);
insert into storage_space values (1, 2);
insert into storage_space values (1, 3);
insert into storage_space values (1, 4);
insert into storage_space values (1, 5);
insert into storage_space values (1, 6);
insert into storage_space values (1, 7);
insert into storage_space values (1, 8);
insert into storage_space values (1, 9);
insert into storage_space values (1, 10);
insert into storage_space values (2, 1);
insert into storage_space values (2, 2);
insert into storage_space values (2, 3);
insert into storage_space values (2, 4);
insert into storage_space values (2, 5);
insert into storage_space values (2, 6);
insert into storage_space values (2, 7);
insert into storage_space values (2, 8);
insert into storage_space values (2, 9);
insert into storage_space values (2, 10);
insert into storage_space values (3, 1);
insert into storage_space values (3, 2);
insert into storage_space values (3, 3);
insert into storage_space values (3, 4);
insert into storage_space values (3, 5);
insert into storage_space values (3, 6);
insert into storage_space values (3, 7);
insert into storage_space values (3, 8);
insert into storage_space values (3, 9);
insert into storage_space values (3, 10);

insert into posts (user_id, post_date, title, content, is_announcement, image_id)
VALUES (1, "2020-11-28 20:30:30", "Administrator Announcement", "Welcome to CONSYS", 1, "condo.jpg");
insert into posts (user_id, post_date, title, content, view_permission)
VALUES (2, "2020-11-28 20:30:35", "Wow so cool", "Guys, I love my new condo. Thanks for having me", "user");
insert into posts (user_id, post_date, title, content, view_permission)
VALUES (3, "2020-11-28 20:30:35", "Test message", "Can anyone see this post???", "user");
insert into posts (user_id, post_date, title, content, view_permission)
VALUES (4, "2020-11-28 20:30:35", "Package stealing", "It has come to my attention that a few of my packages have been
getting stolen. After speaking with some of my neighbors, it seems that it is a common occurence.", "user");
insert into posts (user_id, post_date, title, content)
VALUES (5, "2020-11-28 20:30:35", "Free cookies", "Email me with a receipt of your donation to your favorite charity and I'll
make the arrangements for you to get free cookies.


Best, Asuka.");

INSERT INTO emails (from_id, to_id, subject, content, email_date) 
VALUES (2, 1, "Test Email", "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
 pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
 mollit anim id est laborum.", "2020-11-30 00:12:12");


INSERT INTO emails_record (from_id, to_id, subject, content, email_date) 
VALUES (2, 1, "Test Email", "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
 sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
 veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
 Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
 pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
 mollit anim id est laborum.", "2020-11-30 00:12:12");
 
 
 
INSERT INTO `groups`(`group_id`, `owner_id`, `group_name`) VALUES (1,6, "3524Sherb");
INSERT INTO `groups`(`group_id`, `owner_id`, `group_name`) VALUES (2,17, "1587Laval1");
INSERT INTO `groups`(`group_id`, `owner_id`, `group_name`) VALUES (3,18, "1587Laval2");
INSERT INTO `groups`(`group_id`, `owner_id`, `group_name`) VALUES (4,22, "2490Stden");


INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 12, 2);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 13, 2);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 14, 2);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 15, 2);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 16, 2);


INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 19, 3);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 20, 3);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 21, 3);


INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 23, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 24, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 25, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 26, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 27, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 28, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 29, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 30, 4);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 31, 4);


INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 2, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 3, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 4, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 5, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 7, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 8, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 9, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 10, 1);
INSERT INTO `from_group`(`user_id`, `group_id`) VALUES ( 11, 1);


