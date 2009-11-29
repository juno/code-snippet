(defmulti blank? class)
(defmethod blank? String [s] (every? #{\space} s))
(defmethod blank? nil [_] true)
(blank? "")
