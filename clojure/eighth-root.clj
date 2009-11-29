(defn square [x] (* x x))
(defn quadruplicate [x] (square (square x)))
(defn eighth-root [x] (quadruplicate (quadruplicate x)))

(println (eighth-root 2))
