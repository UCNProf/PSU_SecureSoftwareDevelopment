#include <stdio.h>

void log_message(const char *message)
{
    // Student exercise: inspect how the user-controlled message is used.
    printf(message);
    putchar('\n');
}

int main(int argc, char *argv[])
{
    if (argc != 2)
    {
        fprintf(stderr, "Usage: %s <message>\n", argv[0]);
        return 1;
    }

    log_message(argv[1]);
    return 0;
}
