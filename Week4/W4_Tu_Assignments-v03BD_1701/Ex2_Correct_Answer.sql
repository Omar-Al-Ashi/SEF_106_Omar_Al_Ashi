SELECT
    proc_id, MAX(Total) AS max_inst_count
FROM
    (SELECT
        P1.proc_id, COUNT(*) AS Total
    FROM
        HospitalRecords.AnestProcedures AS P1,
        HospitalRecords.AnestProcedures AS P2,
        HospitalRecords.AnestProcedures AS P3
    WHERE
        P2.anest_name = P1.anest_name
            AND P3.anest_name = P1.anest_name
            AND P1.start_time <= P2.start_time
            AND P2.start_time < P1.end_time
            AND P3.start_time <= P2.start_time
            AND P2.start_time < P3.end_time
    GROUP BY P1.proc_id , P2.proc_id) AS ResultTable
GROUP BY proc_id;