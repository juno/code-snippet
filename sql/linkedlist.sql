-- 連結リスト

CREATE TABLE linkedlist (
id INT PRIMARY KEY,
name VARCHAR(20) NOT NULL,
pid INT DEFAULT NULL
);

INSERT INTO linkedlist VALUES (1, 'TRAILER', NULL);
INSERT INTO linkedlist VALUES (2, 'KIMURA', 1);
INSERT INTO linkedlist VALUES (3, 'KAMATAKI', 2);

SELECT t1.name AS lev1,
       t2.name AS lev2,
       t3.name AS lev3
  FROM linkedlist AS t1
  LEFT JOIN linkedlist AS t2 ON t1.pid = t2.id
  LEFT JOIN linkedlist AS t3 ON t2.pid = t3.id
 WHERE t1.name = 'KAMATAKI'
   AND t3.name = 'TRAILER'
