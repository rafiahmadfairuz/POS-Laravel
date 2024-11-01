<x-app>
    <section>
        <x-nav></x-nav>
    @section('title', 'Dashboard')

        <!-- container -->
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                Hello, {{ Auth::user()->full_name }}
            </div>
        </div>
        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div>
                    <canvas id="myChart"></canvas>
                  </div>
            </div>
        </div>
    </section>
    <script>
        const ctx = document.getElementById('myChart');
        const labels = {!! json_encode($labels)!!};
        const data = {!! json_encode($data)!!};
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: '# Data Penjualan',
              data: data,
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



</x-app>
