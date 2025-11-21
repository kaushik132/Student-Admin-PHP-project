




    // Bar Chart - Applicants by Category
const ctxCategory = document.getElementById('categoryChart').getContext('2d');
const categoryChart = new Chart(ctxCategory, {
    type: 'bar',
    data: {
        labels: ['Software', 'Design', 'Marketing', 'Finance', 'HR'],
        datasets: [{
            label: 'Applicants',
            data: [44, 25, 30, 15, 12],
            backgroundColor: ['#007bff', '#ffc107', '#28a745', '#fd5730', '#6f42c1']
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

// Line Chart - Monthly Applications
const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(ctxMonthly, {
    type: 'line',
    data: {
        labels: ['June', 'July', 'Aug', 'Sept', 'Oct', 'Nov'],
        datasets: [{
            label: 'Applications',
            data: [22, 35, 48, 41, 56, 62],
            backgroundColor: 'rgba(0,123,255,0.2)',
            borderColor: '#007bff',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#007bff'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});



