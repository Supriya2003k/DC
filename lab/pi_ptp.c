#include <stdio.h>
#include <stdlib.h>
#include <mpi.h>
#include <time.h>
int main(int argc, char **argv) {
    int rank, size;
    int pointsInCircle = 0;
    int pointsInCirclePartial = 0;
    int totalPoints;

    MPI_Init(&argc, &argv);
    MPI_Comm_size(MPI_COMM_WORLD, &size);
    MPI_Comm_rank(MPI_COMM_WORLD, &rank);

    if (argc != 2) {
        if (rank == 0) {
            printf("Usage: %s <total_points>\n", argv[0]);
        }
        MPI_Finalize();
        return 1;
    }
    totalPoints = atoi(argv[1]);
    srand(time(NULL) + rank); // Seed the random number generator with rank-specific seed

    // Each process generates a portion of random points
    int pointsPerProcess = totalPoints / size;
    for (int i = 0; i < pointsPerProcess; i++) {
        double x = (double)rand() / RAND_MAX;
        double y = (double)rand() / RAND_MAX;
        double distance = x * x + y * y;

        if (distance <= 1.0) {
            pointsInCirclePartial++;
        }
    }
    // Sum the partial results from each process
    MPI_Reduce(&pointsInCirclePartial, &pointsInCircle, 1, MPI_INT, MPI_SUM, 0, MPI_COMM_WORLD);
    // Master process calculates the final result
    if (rank == 0) {
        double pi = 4.0 * pointsInCircle / totalPoints;

        printf("Estimated value of pi: %f\n", pi);
    }
    MPI_Finalize();
    return 0;
}

