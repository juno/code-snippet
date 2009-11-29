#include <stdio.h>

int factorial(int n)
{
    if (n > 0) {
        return n * factorial(n - 1);
    }

    return 1;
}

int main()
{
    int result = factorial(10);
    printf("Result is %d\n", result);
}

