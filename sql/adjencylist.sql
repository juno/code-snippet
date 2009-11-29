CREATE TABLE employee (
id INT PRIMARY KEY,
name VARCHAR(20),
manager_id INTEGER
);

INSERT INTO employee VALUES (1, 'みやはら', NULL);
INSERT INTO employee VALUES (2, 'きむら', 1);
INSERT INTO employee VALUES (3, 'かまたき', 1);
INSERT INTO employee VALUES (4, '加藤', 2);
INSERT INTO employee VALUES (5, '林', 2);
INSERT INTO employee VALUES (6, '三浦', 5);

WITH RECURSIVE n AS
(SELECT id,name
 FROM employee
 WHERE name = 'きむら'
 UNION ALL
 SELECT nnext.id, nnext.name
   FROM employee AS nnext, n
  WHERE n.id = nnext.manager_id
)
SELECT name FROM n;
