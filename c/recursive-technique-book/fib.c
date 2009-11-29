#include <stdio.h>
#include <stdlib.h>

int fib(int n)
{
    if (n > 2) {
        return fib(n - 2) + fib(n - 1);
    }

    return 1;
}

int main(int argc, char *argv[])
{
    if (argc > 1) {
        printf("Result is %d\n", fib(atoi(argv[1])));
    }
}

