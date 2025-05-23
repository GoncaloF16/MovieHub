document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('graficoFavoritos');
    if (!el) return;

    const labels = JSON.parse(el.dataset.labels);
    const values = JSON.parse(el.dataset.values);
    const ctx = el.getContext('2d');

    // Criar gradiente vertical para as barras
    const gradient = ctx.createLinearGradient(0, 0, 0, el.height);
    gradient.addColorStop(0, 'rgba(58,123,213,0.8)');
    gradient.addColorStop(1, 'rgba(0,210,255,0.7)');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Filmes Favoritados',
                data: values,
                backgroundColor: gradient,
                borderRadius: 12,
                barPercentage: 0.5,
                categoryPercentage: 0.6,
                maxBarThickness: 25,
                hoverBackgroundColor: 'rgba(0,210,255,1)',
                // tira borda
                borderWidth: 0,
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    top: 10,
                    bottom: 10,
                    left: 0,
                    right: 0
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        color: '#444',
                        font: {
                            size: 13,
                            weight: '600',
                            family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
                        },
                        maxRotation: 0,
                        minRotation: 0,
                    }
                },
                y: {
                    grid: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        color: '#444',
                        font: {
                            size: 13,
                            family: "'Segoe UI', Tahoma, Geneva, Verdana, sans-serif",
                        },
                        padding: 8,
                    }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    titleFont: {
                        size: 16,
                        weight: '700',
                    },
                    bodyFont: {
                        size: 14,
                    },
                    padding: 8,
                    cornerRadius: 8,
                    boxPadding: 6,
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeOutQuart',
            }
        }
    });
});
