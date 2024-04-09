#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct {
    int id;
    char holding;
    char waiting;
} Process;

void probe(Process *pList, int count, Process *cur, int start) {
    for (int i = 0; i < count; i++) {
        if (cur->waiting == pList[i].holding) {
            printf("Process-%d sends message (%d,%d,%d)\n", cur->id, start, cur->id, pList[i].id);
            if (pList[i].id == start) {
                printf("Deadlock detected\n");
                return;
            } else {
                probe(pList, count, &pList[i], start);
            }
        }
    }
}

int main() {
    int initial;
    printf("Enter number of processes: ");
    scanf("%d", &initial);

    Process *pList = (Process *)malloc(initial * sizeof(Process));
    for (int i = 0; i < initial; i++) {
        char hld[2], wai[2];
        printf("What resource is process-%d holding? : ", i);
        scanf("%s", hld);
        printf("What resource is process-%d waiting for? : ", i);
        scanf("%s", wai);

        pList[i].id = i;
        pList[i].holding = hld[0];
        pList[i].waiting = wai[0];
    }

    int det;
    printf("Process id that initiates probe : ");
    scanf("%d", &det);

    Process *cur = NULL;
    for (int i = 0; i < initial; i++) {
        if (pList[i].id == det) {
            cur = &pList[i];
            break;
        }
    }

    if (cur != NULL) {
        int start = cur->id;
        probe(pList, initial, cur, start);
    }

    free(pList);
    return 0;
}