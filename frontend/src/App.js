import React from 'react';
import ProductList from './components/ProductList';
import OrderForm from './components/OrderForm';

function App() {
  return (
    <div className="App">
      <h1>Plataforma de E-commerce</h1>
      <ProductList />
      <OrderForm />
    </div>
  );
}

export default App;
