#include <stdio.h>
#include <stdlib.h>
#include <mpi.h>
#define N 3
void matrix_mult(int A[N][N], int B[N][N], int C[N][N]) {
int i, j, k;
for (i = 0; i < N; i++) {
for (j = 0; j < N; j++) {
C[i][j] = 0;
for (k = 0; k < N; k++) {
C[i][j] += A[i][k] * B[k][j];
}}}
}
int main(int argc, char *argv[]) {
int rank, size;
MPI_Init(&argc, &argv);
MPI_Comm_rank(MPI_COMM_WORLD, &rank);
MPI_Comm_size(MPI_COMM_WORLD, &size);
if (size != N) {
if (rank == 0)
printf("Number of processes must be equal to matrix size N.\n");
MPI_Finalize();
return 1;
}
int A[N][N], B[N][N], C[N][N];
if (rank == 0) {
printf("Enter elements of matrix A (%d x %d):\n", N, N);
for (int i = 0; i < N; i++) {
for (int j = 0; j < N; j++) {
scanf("%d", &A[i][j]);
}}
printf("Enter elements of matrix B (%d x %d):\n", N, N);
for (int i = 0; i < N; i++) {
for (int j = 0; j < N; j++) {
scanf("%d", &B[i][j]);
}}}
MPI_Bcast(A, N*N, MPI_INT, 0, MPI_COMM_WORLD);
MPI_Bcast(B, N*N, MPI_INT, 0, MPI_COMM_WORLD);
if (rank == 0) {
printf("Matrix A:\n");
for (int i = 0; i < N; i++) {
for (int j = 0; j < N; j++) {
printf("%d ", A[i][j])}
printf("\n");}
printf("Matrix B:\n");
for (int i = 0; i < N; i++) {
for (int j = 0; j < N; j++) {
printf("%d ", B[i][j]);}
printf("\n");}}
matrix_mult(A, B, C);
if (rank == 0) {
printf("Matrix C after multiplication:\n");
for (int i = 0; i < N; i++) {
for (int j = 0; j < N; j++) {
printf("%d ", C[i][j]);}
printf("\n");}}
MPI_Finalize();
return 0;
}
