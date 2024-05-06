import React, { useState, useEffect } from 'react';
import { PrismaClient } from '@prisma/client';
import { FaTrash, FaEdit, FaPlus } from 'react-icons/fa';
import { getOrders } from './orderService'; // Import the getOrders function

function OrdersPage() {
  const [orders, setOrders] = useState([]);

  // Fetch orders from the database when the component mounts
  useEffect(() => {
    async function fetchOrders() {
      try {
        const ordersFromDB = await getOrders();
        setOrders(ordersFromDB);
      } catch (error) {
        console.error('Error fetching orders:', error);
      }
    }
    fetchOrders();
  }, []);

  return (
    <div>
      <h1>ORDER MANAGEMENT SYSTEM</h1>
      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '20px' }}>
        <h2>ORDERS</h2>
        <button><FaPlus /> Add</button>
      </div>
      <div style={{ display: 'grid', gridTemplateColumns: 'repeat(auto-fit, minmax(300px, 1fr))', gap: '20px' }}>
        {orders.map((order) => (
          <div key={order.id} style={{ border: '1px solid #ccc', padding: '10px', backgroundColor: '#f0f8ff' }}>
            <p><strong>Order ID:</strong> {order.orderID}</p>
            <p><strong>Shipper:</strong> {order.shipper}</p>
            <p><strong>Product:</strong> {order.product}</p>
            <p><strong>Status:</strong> {order.status}</p>
            <p><strong>AWB Number:</strong> {order.AWBNumber}</p>
            <p><strong>Shipped Via:</strong> {order.shippedVia}</p>
            <p><strong>Shipment Date:</strong> {new Date(order.shipmentDate).toLocaleDateString()}</p>
            <p><strong>Expected Delivery:</strong> {new Date(order.expectedDelivery).toLocaleDateString()}</p>
            <div style={{ display: 'flex', justifyContent: 'space-between', marginTop: '10px' }}>
              <button style={{ color: 'red' }}><FaTrash /> DELETE</button>
              <button style={{ color: 'darkblue' }}><FaEdit /> EDIT</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

export default OrdersPage;
