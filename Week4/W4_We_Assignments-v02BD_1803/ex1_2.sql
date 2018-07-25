-- What are the top 3 languages for movies released in 2006?

SELECT
  language.name AS 'language',
  count(*)      AS 'count'
FROM film
  INNER JOIN language ON film.language_id = language.language_id
WHERE film.release_year = 2006
GROUP BY language.language_id
limit 3;