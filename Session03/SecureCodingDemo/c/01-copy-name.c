#include <stdio.h>
#include <string.h>

void create_greeting(const char *name)
{
    char greeting[32];

    // Student exercise: identify what can happen for a long name.
    strcpy(greeting, name);
    printf("Hello, %s!\n", greeting);
}

int main(int argc, char *argv[])
{
    if (argc != 2)
    {
        fprintf(stderr, "Usage: %s <name>\n", argv[0]);
        return 1;
    }

    create_greeting(argv[1]);
    return 0;
}
