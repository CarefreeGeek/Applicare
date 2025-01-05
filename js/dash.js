const logoutBtn = document.getElementById('logout-btn');

logoutBtn.addEventListener('click', () => {
window.location.href = 'index.html';
});


// Assuming you have a function to fetch data from the database
function fetchOrders() {
    // Replace this with your actual database query
    return fetch('/api/orders')
        .then(response => response.json())
        .then(data => data.orders);
}

// Load orders data from the database
fetchOrders().then(orders => {
    const tableBody = document.getElementById('orders-table-body');
    orders.forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${order.id}</td>
            <td>${order.name}</td>
            <td>${order.phone}</td>
            <td>${order.email}</td>
            <td>${order.address}</td>
            <td>${order.appliance}</td>
            <td>${order.service}</td>
            <td>${order.massage}</td>
        `;
        tableBody.appendChild(row);
    });
});



