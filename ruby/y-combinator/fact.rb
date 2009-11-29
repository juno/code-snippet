Y = proc{|g|
  proc{|f|
    g[f[f]]
  }[
    proc{|f|
      g[proc{|y| f[f][y]}]
    }
  ]
}

fact = proc{|f| proc{|n| n == 0 ? 1 : n * f[n-1]}}
fib = proc{|f| proc{|n| n <= 1 ? n : f[n-1] + f[n-2]}}

p Y[fact][5] #=> 120
p Y[fib][10] #=> 55
