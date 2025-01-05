// script.js

async function fetchBookingData() {
    try {
        const response = await fetch('fetch_bookings.php'); // Fetching data from the PHP file
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json(); // Assuming the PHP returns JSON
        populateTable(data);
    } catch (error) {
        console.error('There has been a problem with your fetch operation:', error);
    }
}

function populateTable(bookings) {
    const tableBody = document.getElementById('bookingTable').getElementsByTagName('tbody')[0];
    tableBody.innerHTML = ''; // Clear existing table data

    bookings.forEach(booking => {
        const row = tableBody.insertRow();
        const cellId = row.insertCell(0);
        const cellName = row.insertCell(1);
        const cellDate = row.insertCell(2);
        const cellStatus = row.insertCell(3);

        cellId.textContent = booking.id; // Assuming booking has an 'id' property
        cellName.textContent = booking.name; // Assuming booking has a 'name' property
        cellDate.textContent = booking.date; // Assuming booking has a 'date' property
        cellStatus.textContent = booking.status; // Assuming booking has a 'status' property
    });
}

// Call the function to fetch data when the script loads
fetchBookingData();