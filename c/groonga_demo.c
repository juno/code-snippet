#include <stdio.h>
#include "libmemcached/memcached.h"

int main(int argc, char *argv[])
{
    struct memcached_st *memc;
    struct memcached_server_st *servers;
    memcached_return rc;
    char *val;
    size_t val_len;
    uint32_t flags;

    memc = memcached_create(NULL);
    memcached_behavior_set(memc, MEMCACHED_BEHAVIOR_BINARY_PROTOCOL, 1);
    servers = memcached_servers_parse("127.0.0.1:10041");
    rc = memcached_server_push(memc, servers);
    if (rc != MEMCACHED_SUCCESS) {
        fprintf(stderr, "Error: %s\n", memcached_strerror(memc, rc));
        return -1;
    }
    rc = memcached_set(memc, "key", 3, "value", 5, 0, 0);
    if (rc != MEMCACHED_SUCCESS) {
        fprintf(stderr, "Error: %s\n", memcached_strerror(memc, rc));
        return -1;
    }

    val = memcached_get(memc, "key", 3, &val_len, &flags, &rc);
    if (rc == MEMCACHED_SUCCESS) {
        printf("val: %.*s\n", val_len, val);
    }
    if (val) {
        free(val);
    }

    memcached_server_list_free(servers);
    memcached_free(memc);

    return 0;
}
