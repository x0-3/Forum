------------------------------------------------------ Home page --------------------------------------------------- 
SELECT id_topic, id_user, title, DATE_FORMAT(topicCreatedAt,'%d/%m/%Y') AS DATE, avatar, pseudo
FROM topic t
INNER JOIN user u
ON t.user_id = u.id_user
ORDER BY YEAR(DATE) DESC, MONTH(DATE) DESC 




---------------------------------------------- category page ---------------------------------------------------------

-- show categories on the page
SELECT nameCategory
FROM category

-- redirect for topic page 
SELECT id_category, id_topic, title
FROM category c
INNER JOIN topic t
ON t.category_id = c.id_category
WHERE id_category = 3




---------------------------------------------------- topic page -----------------------------------------------------
SELECT id_topic, id_user, title, DATE_FORMAT(topicCreatedAt,'%d/%m/%Y') AS DATE, avatar, pseudo
FROM topic t
INNER JOIN user u
ON t.user_id = u.id_user
ORDER BY YEAR(DATE) DESC, MONTH(DATE) DESC 




--------------------------------------------------- article page ----------------------------------------------------
-- article section
SELECT id_topic, id_user, title, DATE_FORMAT(topicCreatedAt,'%d/%m/%Y') AS DATE, avatar, pseudo, lockTopic
FROM topic t
INNER JOIN user u
ON t.user_id = u.id_user
WHERE id_topic = 2

-- messages section
SELECT id_message, id_topic, id_user, pseudo, DATE_FORMAT(messCreatedAt,'%d/%m/%Y') AS commentDate, text
FROM message m
INNER JOIN topic t
ON m.topic_id = t.id_topic
INNER JOIN user u
ON u.id_user = m.user_id
WHERE id_topic = 2
ORDER BY YEAR(commentDate) DESC, MONTH(commentDate) DESC 


