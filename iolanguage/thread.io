for(i, 1, 20,
        Thread createThread("System sleep(1); writeln(" .. i .. ")")
        writeln("launched ", i)
   )

while(Thread threadCount > 1,
        writeln("waiting for threads to complete")
        System sleep(1)
     )

writeln("done")
