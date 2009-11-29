#include <stdio.h>

int factorial(int n)
{
    int i, f;

    f = 1;
    for (i = 1; i <= n; i++) {
        f *= i;
    }

    return f;
}

int main()
{
    printf("Result is %d\n", factorial(3));
}

