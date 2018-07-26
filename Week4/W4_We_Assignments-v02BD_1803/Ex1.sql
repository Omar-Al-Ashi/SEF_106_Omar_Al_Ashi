-- query 1
-- What is the total number of movies per actor?

SELECT
  concat(actor.first_name, " ", actor.last_name) AS 'full name',
  count(*)                                       AS 'count'
FROM film_actor
  INNER JOIN actor on film_actor.actor_id = actor.actor_id
GROUP BY actor.actor_id;



-- query 2
-- What are the top 3 languages for movies released in 2006?

SELECT
  language.name AS 'language',
  count(*)      AS 'count'
FROM film
  INNER JOIN language ON film.language_id = language.language_id
WHERE film.release_year = 2006
GROUP BY language.language_id
limit 3;



-- query 3
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



-- query 4
-- Find all the addresses where the second address is not empty (i.e., contains some text), and return these
-- second addresses sorted.

SELECT address.address2
from address
where address2 != " "
order by address2 ASC;



-- query 5
-- Return the first and last names of actors who played in a film involving a
-- “Crocodile” and a “Shark”, along with the release year of the movie, sorted
-- by the actors’ last names
--
-- still need work.
SELECT concat(actor.first_name, " ", actor.last_name),
  film.description AS 'description'
from actor, film, film_actor
  inner join actor a on a.actor_id = film_actor.actor_id
  inner join film f on f.film_id = film_actor.film_id
WHERE film.description LIKE "%crocodile%" AND film.description LIKE "%shark%"
order by actor.last_name DESC;



-- query 6
-- Find all the film categories in which there are between 55 and 65 films.
-- Return the names of these categories and the number of films per category,
-- sorted by the number of films. If there are no categories between 55 and 65,
-- return the highest available counts.

SELECT
    C.name, COUNT(*) as total
FROM
    film_category AS FC
        JOIN
    category AS C ON C.category_id = FC.category_id
GROUP BY FC.category_id
HAVING IF((SELECT
            COUNT(*)
        FROM
            (SELECT
                COUNT(*) as cat_count
            FROM
                film_category AS FC
            JOIN category AS C ON C.category_id = FC.category_id
            GROUP BY FC.category_id
            HAVING cat_count BETWEEN 55 and 65) AS B) > 0,
    total BETWEEN 55 AND 65,
    total < 55 OR total > 65);



-- query 7
-- Find the names (first and last) of all the actors and costumers whose
-- first name is the same as the first name of the actor with ID 8. Do not
-- return the actor with ID 8 himself. Note that you cannot use the name of
-- the actor with ID 8 as a constant (only the ID). There is more than one way
-- to solve this question, but you need to provide only one solution.

SELECT DISTINCT
  concat(customer.first_name, " ", customer.last_name) AS 'customer',
  concat(actor.first_name, " ", actor.last_name) AS 'actor'
FROM actor, customer
WHERE customer.first_name = (SELECT first_name
                             FROM actor
                             WHERE actor_id = 8) AND
      actor.first_name = (SELECT first_name
                          FROM actor
                          WHERE actor_id = 8);



-- query 8
-- Get the total and average values of rentals per month per year per store




-- query 9
-- Get the top 3 customers who rented the highest number of movies within a
-- given year