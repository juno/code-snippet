(defn fib1 [x]
  (cond (> x 2)
        (+ (fib1 (- x 1)) (fib1 (- x 2)))
        :else
        1))

(defn fib2 [n]
  (cond
   (= n 0) 0
   (= n 1) 1
   :else (+ (fib2 (- n 1)) (fib2 (- n 2)))))

(println (fib1 20))
(println (fib2 20))
