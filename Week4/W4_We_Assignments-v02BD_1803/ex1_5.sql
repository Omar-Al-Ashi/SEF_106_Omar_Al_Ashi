-- Return the first and last names of actors who played in a film involving a
-- “Crocodile” and a “Shark”, along with the release year of the movie, sorted
-- by the actors’ last names
--
-- still need work.
SELECT distinct
  actor.first_name,
  " ",
  actor.last_name,
  film.description AS 'description'
from actor, film, film_actor
  inner join actor a on a.actor_id = film_actor.actor_id
  inner join film f on f.film_id = film_actor.film_id
WHERE film.description LIKE "%crocodile%" AND film.description LIKE "%shark%"
order by actor.last_name DESC