<div wire:ignore>

    @assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endassets
    <div class="">
        <canvas id="myChart"></canvas>
      </div>
      
      
      @script
      <script>
        const ctx = document.getElementById('myChart');
            const subscriptions = @json($schools_scholarships);
            console.log(subscriptions);
          
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels:subscriptions.map(item => item.school_name),
            datasets: [{
              label: 'ข้อมูลการมอบทุนการศึกษาของแต่ละโรงเรียน',
              data:subscriptions.map(item => item.scholarship_amount),  
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
      @endscript
</div>