  
        <div class="templatemo-content">
          <h1>Feedback Analysis</h1>
		<hr>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show">

<div class="col-md-6">
        <canvas id="barChart"></canvas>
    </div>
    <br>
    <div class="col-md-6">
        <canvas id="pieChart"></canvas>
    </div>

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
</div>

</div>
</div>
