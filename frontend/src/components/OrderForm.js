import React, { useState } from 'react';
import axios from 'axios';

function OrderForm() {
  const [product, setProduct] = useState('');
  const [quantity, setQuantity] = useState('');

  const handleSubmit = (event) => {
    event.preventDefault();

    axios.post('http://localhost:8000/api/orders', {
      product: product,
      quantity: quantity
    })
    .then(response => {
      console.log('Pedido creado:', response.data);
    })
    .catch(error => {
      console.error('Error al crear pedido', error);
    });
  };

  return (
    <form onSubmit={handleSubmit}>
      <label>
        Producto:
        <input type="text" value={product} onChange={e => setProduct(e.target.value)} />
      </label>
      <br />
      <label>
        Cantidad:
        <input type="number" value={quantity} onChange={e => setQuantity(e.target.value)} />
      </label>
      <br />
      <button type="submit">Crear Pedido</button>
    </form>
  );
}

export default OrderForm;
