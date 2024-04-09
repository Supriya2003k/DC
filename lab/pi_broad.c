#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <mpi.h>
double calculate_pi(int rank, int size, int num_points) {
int points_inside_circle = 0;
double x, y;
unsigned int seed = rank;
for (int i = 0; i < num_points; i++) {
x = (double)rand_r(&seed) / RAND_MAX;
y = (double)rand_r(&seed) / RAND_MAX;
if (x*x + y*y <= 1.0) {
points_inside_circle++;
}
}
int total_points_inside_circle;
MPI_Reduce(&points_inside_circle, &total_points_inside_circle, 1, MPI_INT, MPI_SUM, 0, MPI_COMM_WORLD);
double pi_estimate;
if (rank == 0) {
pi_estimate = 4.0 * total_points_inside_circle / (double)(num_points * size);
}
MPI_Bcast(&pi_estimate, 1, MPI_DOUBLE, 0, MPI_COMM_WORLD);
return pi_estimate;
}
int main(int argc, char *argv[]) {
int rank, size, num_points;
double pi_estimate;
MPI_Init(&argc, &argv);
MPI_Comm_rank(MPI_COMM_WORLD, &rank);
MPI_Comm_size(MPI_COMM_WORLD, &size);
if (rank == 0) {
printf("Enter the number of points for Pi estimation: ");
scanf("%d", &num_points);
}
MPI_Bcast(&num_points, 1, MPI_INT, 0, MPI_COMM_WORLD);
pi_estimate = calculate_pi(rank, size, num_points);
if (rank == 0) {
printf("Estimated value of Pi with %d points: %.10f\n", num_points, pi_estimate);
}
MPI_Finalize();
return 0;
}
