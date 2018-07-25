-- Find all the addresses where the second address is not empty (i.e., contains some text), and return these
-- second addresses sorted.

SELECT address.address2
from address
where address2 != " "
order by address2 ASC;