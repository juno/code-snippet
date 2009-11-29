(define fact
  (lambda (n)
    (if (zero? n)
        1
        (* n (fact (- n 1))))))

(define fact-maker
  (lambda (proc)
    (lambda (n)
      (if (zero? n)
          1
          (* n ((proc proc) (- n 1)))))))

(display (fact 10))
(display "\n")

(display ((fact-maker fact-maker) 10))
(display "\n")
