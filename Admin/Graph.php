<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="barChart" width="400" height="200"></canvas>
    <canvas id="pieChart" width="400" height="200"></canvas>

     <script>
        // Fetch data from PHP script
        fetch('FeedbackAnalysisaction.php')
            .then(response => response.json())
            .then(data => {
                // Data for Bar Chart
				console.log(data);
				
                var barData = {
                    labels: ['positive', 'negative'],
                    datasets: [{
                        label: 'Feedback Sentiments',
                        backgroundColor: ['green', 'red'],
                        data: [data.positive || 0, data.negative || 0]
                    }]
                };

                // Data for Pie Chart
                var pieData = {
                    labels: ['positive', 'negative'],
                    datasets: [{
                        data: [data.positive || 0, data.negative || 0],
                        backgroundColor: ['green', 'red']
                    }]
                };

                // Create Bar Chart
                var barChart = new Chart(document.getElementById('barChart').getContext('2d'), {
                    type: 'bar',
                    data: barData
                });

                // Create Pie Chart
                var pieChart = new Chart(document.getElementById('pieChart').getContext('2d'), {
                    type: 'pie',
                    data: pieData
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>

</body>
</html>
