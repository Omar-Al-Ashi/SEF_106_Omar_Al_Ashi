-- Return the first and last names of actors who played in a film involving a “Crocodile” and a “Shark”, along
-- with the release year of the movie, sorted by the actors’ last names.


--not done yet :/
SELECT concat(actor.first_name," ", actor.last_name) AS "actor"
from actor, film
-- where film.description LIKE "%Crocodile%Shark%" OR film.description LIKE "%Shark%Crocodile%";
where film.description LIKE "%Crocodile%Shark%" OR film.description LIKE "%Shark%Crocodile%";