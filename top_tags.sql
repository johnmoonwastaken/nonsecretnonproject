CREATE TABLE top_tags AS SELECT * FROM (SELECT tag_name, count(tag_name) as total from tag
LEFT JOIN course_tags
ON course_tags.tag_id = tag.tag_id
WHERE 1
GROUP BY tag_name
ORDER BY total desc
LIMIT 0,30) as t1
ORDER BY tag_name