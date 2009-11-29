#include <stdio.h>
#include "gmp.h"

int main()
{
    mpf_t a, b, p;

    // 変数の初期化
    mpf_init2(a, 256);
    mpf_init2(b, 1024);
    mpf_init2(p, 256);

    // aの値を与える
    mpf_set_str(a, "314159265358979323846.0", 10);

    // 正の平方根を生成
    mpf_sqrt(b, a);

    // stdoutに出力
    mpf_out_str(stdout, 10, 0, b);

    puts("");
    printf("\n");

    // 2乗して戻す
    mpf_mul(p, b, b);

    mpf_out_str(stdout, 10, 0, p);
    puts("");

    // 変数クリア
    mpf_clear(a);
    mpf_clear(b);
    mpf_clear(p);

    return 0;
}

