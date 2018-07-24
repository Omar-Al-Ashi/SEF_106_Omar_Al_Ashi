DROP DATABASE if exists FinanceDB;

CREATE DATABASE FinanceDB;
USE FinanceDB;
CREATE TABLE FiscalYearTable (
  fiscal_year Year(4) NOT NULL UNIQUE,
  start_date  DATE    NOT NULL UNIQUE,
  end_date    DATE    NOT NULL UNIQUE,
  PRIMARY KEY (fiscal_year)
);

DROP TRIGGER IF EXISTS `FinanceDB`.`FiscalYearTableBeforeInsert`;
DELIMITER !
CREATE TRIGGER FiscalYearTableBeforeInsert
  BEFORE INSERT
  ON FiscalYearTable
  FOR EACH ROW
  BEGIN

    -- Check if the starting date is after the ending date
    IF DATEDIFF(NEW.end_date, NEW.start_date) < 0
    THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'end_date must be after start_date';
    END IF;

    -- Check if the end_date is ahead of the start_date by more than a year
    IF DATEDIFF(NEW.end_date, NEW.start_date) < 364
       OR DATEDIFF(NEW.end_date, NEW.start_date) > 365
    THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'NOT a full fiscal year';
    END IF;

    -- Check if the start_date is between 1 and 31
    IF DAY(NEW.start_date) < 1
       OR DAY(NEW.start_date) > 31
    THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Day should be between 1 and 31';
    END IF;

    -- Check if the end_date is between 1 and 31
    IF DAY(NEW.end_date) < 1
       OR DAY(NEW.end_date) > 31
    THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'Day should be between 1 and 31';
    END IF;

    -- check for overlapping entries
    IF EXISTS
    (
      SELECT *
      FROM FinanceDB.FiscalYearTable
      WHERE (NEW.start_date >= start_date
             AND NEW.end_date >= start_date)
            OR (NEW.start_date <= start_date
                AND NEW.end_date <= end_date)
    )
    THEN
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'overlapping date entries are not supported.';
    END IF;

  END !
DELIMITER ;

-- A working insert example
INSERT INTO FinanceDB.FiscalYearTable
VALUES ('1999', '1999-09-1', '2000-08-30');

-- Test when end date is before start date:
INSERT INTO FinanceDB.FiscalYearTable
VALUES ('1997', '1997-08-17', '1998-08-17');

-- To check for if start_date is before end_date
INSERT INTO FinanceDB.FiscalYearTable
VALUES ('1999', '1999-08-17', '1998-08-17');
