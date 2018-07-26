-- Find all the film categories in which there are between 55 and 65 films.
-- Return the names of these categories and the number of films per category,
-- sorted by the number of films. If there are no categories between 55 and 65,
-- return the highest available counts.

select distinct category.category_id, category.name
from category, film_category
inner join category ca on film_category.category_id = ca.category_id
group by category.category_id


