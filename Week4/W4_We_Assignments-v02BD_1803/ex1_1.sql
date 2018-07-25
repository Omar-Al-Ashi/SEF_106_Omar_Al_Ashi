-- What is the total number of movies per actor?

SELECT
  concat(actor.first_name, " ", actor.last_name) AS 'full name',
  count(*)                                       AS 'count'
from film_actor
  inner join actor on film_actor.actor_id = actor.actor_id
group by actor.actor_id;
