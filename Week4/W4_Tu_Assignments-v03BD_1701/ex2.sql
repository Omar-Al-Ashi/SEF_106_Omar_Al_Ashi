DROP DATABASE IF EXISTS HospitalRecords;

CREATE DATABASE HospitalRecords;
USE HospitalRecords;

CREATE TABLE AnestProcedures (
  proc_id    INT  NOT NULL UNIQUE AUTO_INCREMENT,
  anest_name TEXT NOT NULL,
  start_time TIME NOT NULL,
  end_time   TIME NOT NULL,
  PRIMARY KEY (proc_id)
);

INSERT INTO HospitalRecords.AnestProcedures (anest_name, start_time, end_time)
VALUES
  ("Kamil", "8:00", "11:00"),
  ("Kamil", "9:00", "13:00"),
  ("Albert", "8:00", "13:30"),
  ("Albert", "9:00", "15:30"),
  ("Albert", "10:00", "11:30"),
  ("Albert", "12:30", "13:30"),
  ("Albert", "13:30", "14:30"),
  ("Albert", "18:30", "19:00");

-- TRIALS
-- SELECT
--   P1.proc_id,
--   P1.anest_name,
--   MAX(E1.ecount) AS maxops
-- FROM Procs P1,
--   (SELECT
--      P2.anest_name,
--      P2.start_time etime,
--      COUNT(*)      ecount
--    FROM Procs P1, Procs P2
--    WHERE P1.anest_name = P2.anest_name
--          AND P1.start_time <= P2.start_time
--          AND P1.end_time > P2.start_time
--    GROUP BY P2.anest_name, P2.start_time
--   ) E1
-- WHERE E1.anest_name = P1.anest_name
--       AND E1.etime >= P1.start_time
--       AND E1.etime < P1.end_time
-- GROUP BY P1.proc_id, P1.anest_name;
--
--
-- SELECT anest_name, start_time AS t FROM AnestProcedures
-- UNION
-- SELECT anest_name, end_time AS t FROM AnestProcedures;
--
-- SELECT anest_name, b.*, COUNT(*) over (PARTITION BY AnestProcedures.anest_name, a.t) AS ct
--
-- FROM (SELECT anest_name, start_time AS t FROM AnestProcedures
--
--       UNION
--
--       SELECT anest_name, end_time AS t FROM AnestProcedures) a
--
--   INNER JOIN AnestProcedures b ON (b.anest_name = a.anest_name AND b.start_time <= a.t AND b.end_time > a.t)
--
-- ORDER BY 3, 1, 2;
--
--
-- CREATE VIEW Events (proc_id, comparison_proc, anest_name,
--     event_time, event_type)
--   AS SELECT P1.proc_id,
--        P2.proc_id,
--        P1.anest_name,
--        P2.start_time,
--        +1
--      FROM AnestProcedures AS P1, AnestProcedures AS P2
--      WHERE P1.anest_name = P2.anest_name
--            AND NOT (P2.end_time <= P1.start_time
--                     OR P2.start_time >= P1.end_time)
--      UNION
--      SELECT P1.proc_id,
--        P2.proc_id,
--        P1.anest_name,
--        P2.end_time,
--        -1 AS event_type
--      FROM AnestProcedures AS P1, AnestProcedures AS P2
--      WHERE P1.anest_name= P2.anest_name
--            AND NOT (P2.end_time <= P1.start_time
--                     OR P2.start_time >= P1.end_time);
--
-- SELECT E1.proc_id, E1.event_time,
--   (SELECT SUM(E2.event_type)
--    FROM Events AS E2
--    WHERE E2.proc_id = E1.proc_id
--          AND E2.event_time < E1.event_time)
--     AS instantaneous_count
-- FROM Events AS E1
-- ORDER BY E1.proc_id, E1.event_time;
--
--
-- SELECT proc_id,
--   MAX(instantaneous_count) AS max_inst
-- FROM ConcurrentProcs
-- GROUP BY proc_id;
-- SELECT E1.proc_id,
--   MAX((SELECT SUM(E2.event_type)
--        FROM Events AS E2
--        WHERE E2.proc_id = E1.proc_id
--              AND E2.event_time < E1.event_time)) AS
--     max_inst_count
-- FROM Events AS E1
-- GROUP BY E1.proc_id;
--
-- SELECT P3.proc_id, MAX(ConcurrentProcs.tally)
-- FROM (SELECT P1.anest_name, P1.start_time, COUNT(*)
--       FROM AnestProcedures AS P1
--         INNER JOIN
--         AnestProcedures AS P2
--           ON P1.anest_name= P2.anest
--              AND P2.start_time <= P1.start_time
--              AND P2.stop_time > P1.start_time
--       GROUP BY P1.anest_name, P1.start_time)
--   AS AnestProcedures(anest_name, start_time, tally)
--   INNER JOIN
--   AnestProcedures AS P3
--     ON AnestProcedures.anest_name= P3.anest
--        AND P3.start_time <= ConcurrentProcs.start_time
--        AND P3.stop_time > ConcurrentProcs.start_time
-- GROUP BY P3.proc_id;


SELECT * from HospitalRecords.AnestProcedures;
