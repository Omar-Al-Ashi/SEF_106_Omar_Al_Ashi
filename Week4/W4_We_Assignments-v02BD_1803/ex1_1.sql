-- What is the total number of movies per actor?

SELECT
  concat(actor.first_name, " ", actor.last_name) AS 'full name',
  count(*)                                       AS 'count'
FROM film_actor
  INNER JOIN actor on film_actor.actor_id = actor.actor_id
GROUP BY actor.actor_id;
