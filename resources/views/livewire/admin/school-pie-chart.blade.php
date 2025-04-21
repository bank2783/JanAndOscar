<div wire:ignore>
    @assets
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endassets
  
    <div class="w-[300px] mx-auto">
      <canvas id="schoolPieChart"></canvas>
    </div>
  
    @script
    <script>
      const ctx = document.getElementById('schoolPieChart');
        const sponsored_school_ratio = @json($sponsored_school_ratio);

      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: sponsored_school_ratio.map(item => item.school_name),
          datasets: [{
            label: 'My First Dataset',
            data: sponsored_school_ratio.map(item => item.student_count),
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'bottom'
            }
          }
        }
      });
    </script>
    @endscript
  </div>
  