DROP DATABASE claims_db;
CREATE DATABASE IF NOT EXISTS claims_db;
USE claims_db;

CREATE TABLE IF NOT EXISTS Claims (
  claim_id     INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
  patient_name TEXT                           NOT NULL
);

CREATE TABLE IF NOT EXISTS Defendants (
  defendant_name VARCHAR(25) NOT NULL,
  claim_id       INT         NOT NULL,
  FOREIGN KEY (claim_id) REFERENCES Claims (claim_id)
);


CREATE TABLE IF NOT EXISTS ClaimStatusCodes (
  claim_status      VARCHAR(2) NOT NULL PRIMARY KEY,
  claim_status_desc TEXT       NOT NULL,
  claim_seq         INT        NOT NULL
);

CREATE TABLE IF NOT EXISTS LegalEvents (
  claim_id       INT         NOT NULL,
  defendant_name VARCHAR(25) NOT NULL,
  claim_status   VARCHAR(2)  NOT NULL,
  change_date    DATE        NOT NULL,
  FOREIGN KEY (claim_id) REFERENCES Claims (claim_id),
  FOREIGN KEY (claim_status) REFERENCES ClaimStatusCodes (claim_status)
);


INSERT INTO Claims (patient_name)
VALUES ("Bassem Dghaidi"), ("Omar Breidi"), ("Marwan Sawwan");

INSERT INTO Defendants (claim_id, defendant_name)
VALUES (1, "Jean Skaff"), (1, "Elie Meouchi"), (1, "Radwan Sameh"),
  (2, "Joseph Eid"),
  (2, "Paul Syoufi"), (2, "Radwan Sameh"), (3, "Issam Awwad");


INSERT INTO ClaimStatusCodes (claim_status, claim_status_desc, claim_seq)
VALUES ("AP", "Awaiting review panel", 1),
  ("OR", "Panel opinion rendered", 2),
  ("SF", "Suit filed", 3),
  ("CL", "Closed", 4);


INSERT INTO LegalEvents (claim_id, defendant_name, claim_status, change_date)
VALUES (1, "Jean Skaff", "AP", "2016-01-01"),
  (1, "Jean Skaff", "OR", "2016-02-02"),
  (1, "Jean Skaff", "SF", "2016-03-01"),
  (1, "Jean Skaff", "CL", "2016-04-01"),
  (1, "Radwan Sameh", "AP", "2016-02-02"),
  (1, "Radwan Sameh", "OR", "2016-02-02"),
  (1, "Radwan Sameh", "SF", "2016-03-01"),
  (1, "Elie Meouchi", "AP", "2016-01-01"),
  (1, "Elie Meouchi", "OR", "2016-02-02"),
  (2, "Radwan Sameh", "AP", "2016-01-01"),
  (2, "Radwan Sameh", "OR", "2016-02-01"),
  (2, "Paul Syoufi", "AP", "2016-01-01"),
  (3, "Issam Awwad", "AP", "2016-01-01");


-- Query
SELECT
  C1.claim_id,
  C1.patient_name,
  S1.claim_status
FROM Claims AS C1, ClaimStatusCodes AS S1
WHERE S1.claim_seq
      IN (SELECT MIN(S2.claim_seq)
          FROM ClaimStatusCodes AS S2
          WHERE S2.claim_seq
                IN (SELECT MAX(S3.claim_seq)
                    FROM LegalEvents AS E1,
                      ClaimStatusCodes AS S3
                    WHERE E1.claim_status = S3.claim_status
                          AND E1.claim_id = C1.claim_id
                    GROUP BY E1.defendant_name))
ORDER BY claim_id;
