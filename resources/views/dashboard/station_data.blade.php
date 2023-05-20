<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Station Data"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-6">
                    <x-stations.station_data
                    title="Temperatature"
                    subtitle="Last Campaign Performance"
                    type="line"
                    color="success"
                    x="date_time"
                    y="dry_bulb"
                    :station_data=$station_data
                    ></x-stations.station_data>
                </div>

                <div class="col-lg-12 mb-6">
                    <x-stations.station_data
                    title="Rainfall"
                    subtitle="Last Campaign Performance"
                    type="line"
                    color="info"
                    y="rainfall"
                    x="date_time"
                    :station_data=$station_data
                    ></x-stations.station_data>
                </div>

                <div class="col-lg-12 mb-6">
                    <x-stations.station_data
                    title="Humidity"
                    subtitle="Last Campaign Performance"
                    type="line"
                    color="primary"
                    y="humidity"
                    x="date_time"
                    :station_data=$station_data
                    ></x-stations.station_data>
                </div>

                <div class="col-lg-12 mb-6">
                    <x-stations.station_data
                    title="Max Temp."
                    subtitle="Last Campaign Performance"
                    type="bar"
                    color="warning"
                    y="max_temp"
                    x="event_date"
                    :station_data=$station_data_minmax
                    ></x-stations.station_data>
                </div>
                <div class="col-lg-12 mb-6">
                    <x-stations.station_data
                    title="Min Temp."
                    subtitle="Last Campaign Performance"
                    type="bar"
                    color="danger"
                    y="min_temp"
                    x="event_date"
                    :station_data=$station_data_minmax
                    ></x-stations.station_data>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    {{-- <x-plugins></x-plugins> --}}
    </div>
    @push('js')
        <script>

            // new Chart(ctx2, {
            //     type: "line",
            //     data: {
            //         labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            //         datasets: [{
            //             label: "Mobile apps",
            //             tension: 0,
            //             borderWidth: 0,
            //             pointRadius: 5,
            //             pointBackgroundColor: "rgba(255, 255, 255, .8)",
            //             pointBorderColor: "transparent",
            //             borderColor: "rgba(255, 255, 255, .8)",
            //             borderColor: "rgba(255, 255, 255, .8)",
            //             borderWidth: 4,
            //             backgroundColor: "transparent",
            //             fill: true,
            //             data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
            //             maxBarThickness: 6

            //         }],
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //         interaction: {
            //             intersect: false,
            //             mode: 'index',
            //         },
            //         scales: {
            //             y: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: true,
            //                     drawOnChartArea: true,
            //                     drawTicks: false,
            //                     borderDash: [5, 5],
            //                     color: 'rgba(255, 255, 255, .2)'
            //                 },
            //                 ticks: {
            //                     display: true,
            //                     color: '#f8f9fa',
            //                     padding: 10,
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //             x: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: false,
            //                     drawOnChartArea: false,
            //                     drawTicks: false,
            //                     borderDash: [5, 5]
            //                 },
            //                 ticks: {
            //                     display: true,
            //                     color: '#f8f9fa',
            //                     padding: 10,
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //         },
            //     },
            // });

            // new Chart(ctx3, {
            //     type: "line",
            //     data: {
            //         labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            //         datasets: [{
            //             label: "Mobile apps",
            //             tension: 0,
            //             borderWidth: 0,
            //             pointRadius: 5,
            //             pointBackgroundColor: "rgba(255, 255, 255, .8)",
            //             pointBorderColor: "transparent",
            //             borderColor: "rgba(255, 255, 255, .8)",
            //             borderWidth: 4,
            //             backgroundColor: "transparent",
            //             fill: true,
            //             data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            //             maxBarThickness: 6

            //         }],
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false,
            //         plugins: {
            //             legend: {
            //                 display: false,
            //             }
            //         },
            //         interaction: {
            //             intersect: false,
            //             mode: 'index',
            //         },
            //         scales: {
            //             y: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: true,
            //                     drawOnChartArea: true,
            //                     drawTicks: false,
            //                     borderDash: [5, 5],
            //                     color: 'rgba(255, 255, 255, .2)'
            //                 },
            //                 ticks: {
            //                     display: true,
            //                     padding: 10,
            //                     color: '#f8f9fa',
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //             x: {
            //                 grid: {
            //                     drawBorder: false,
            //                     display: false,
            //                     drawOnChartArea: false,
            //                     drawTicks: false,
            //                     borderDash: [5, 5]
            //                 },
            //                 ticks: {
            //                     display: true,
            //                     color: '#f8f9fa',
            //                     padding: 10,
            //                     font: {
            //                         size: 14,
            //                         weight: 300,
            //                         family: "Roboto",
            //                         style: 'normal',
            //                         lineHeight: 2
            //                     },
            //                 }
            //             },
            //         },
            //     },
            // });
        </script>
    @endpush
</x-layout>
