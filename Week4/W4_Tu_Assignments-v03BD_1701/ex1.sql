
CREATE database if not exists FinanceDB;
CREATE table FinanceDB.FiscalYearTable (
  start_date DATE NOT NULL UNIQUE ,
  end_date DATE NOT NULL UNIQUE ,
  fiscal_year VARCHAR(10) UNIQUE
);



delimiter $$
create trigger myTrigger
  before insert on FinanceDB.FiscalYearTable
  for each row
  begin
    if NEW.start_date = 2013-12-12 then
      set NEW.start_date= 2011-12-12;
    end if;
  end$$



INSERT INTO FinanceDB.FiscalYearTable (start_date, end_date, fiscal_year)
VALUES ("2013-12-12", "2011-9-30", "2010");
