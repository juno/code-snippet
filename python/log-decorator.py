# coding: utf-8
from __future__ import print_function
import sys

def log(out=sys.stderr):
    def decorator(func):
        name = func.__name__
        def decorated(*args, **kwargs):
            print("%s start" % name, file=out)
            func(*args, **kwargs)
            print("%s end" % name, file=out)
        return decorated
    return decorator

@log(sys.stdout)
def foo(a, b):
    print(a + b)

foo(1, 2)
