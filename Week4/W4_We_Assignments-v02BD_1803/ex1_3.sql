-- What are the top 3 countries from which customers are originating?

SELECT
  country.country AS 'Country',
  COUNT(*)        AS 'Count'
FROM country
  INNER JOIN city
    ON country.country_id = city.country_id
  Inner JOIN address
    ON city.city_id = address.city_id
  INNER JOIN customer
    ON address.address_id = customer_id
group by country.country_id
ORDER BY Count DESC
LIMIT 3;