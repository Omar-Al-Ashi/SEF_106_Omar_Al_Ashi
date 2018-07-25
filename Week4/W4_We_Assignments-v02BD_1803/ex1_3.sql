-- What are the top 3 countries from which customers are originating?

SELECT
  customer_list.country AS 'Country',
  count(*)              as count
from customer_list
  inner join customer on customer_list.ID = customer.customer_id
group by customer_list.country
order by count DESC
limit 3;