import { Link } from 'react-router-dom';
import React from 'react';

function HomePage() {
  return (
    <div>
      <h1>Order Management App</h1>
      <p>Welcome to the Order Management App!</p>
      <Link to="/orders">View Orders</Link>
    </div>
  );
}

export default HomePage;
