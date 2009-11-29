(def visitors (ref #{}))

(dosync (commute visitors conj "stu"))

(defn hello [username]
  (let [past-visitor (@visitors username)]
    (dosync (commute visitors conj username))
    (if past-visitor
      (str "Welcome back, " username)
      (str "Hello, " username))))
