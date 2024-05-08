// src/routes/api/orderService.ts

import { PrismaClient } from '@prisma/client';

const prisma = new PrismaClient();

export async function getOrders() {
  try {
    const orders = await prisma.order.findMany();
    return orders;
  } catch (error) {
    console.error('Error fetching orders:', error);
    throw error; // Rethrow the error to handle it in the component
  }
}
