<div class="bg-[url('../img/hero-60.png')] min-h-screen bg-slate-400">
    <x-slot name='title'>
        Login
    </x-slot>
    <div class="w-screen py-32 lg:px-40 sm:px-10 px-2 ">
        <div class="w-full flex flex-wrap lg:justify-start justify-between">
            @foreach ($candidates as $candidate)
                <div class="lg:w-3/12 w-[48%] px-0 md:px-2 py-4">
                    <div class="w-full bg-slate-100 p-2 flex border-transparent flex-col rounded-md">
                        <div class="w-full h-40 border overflow-hidden rounded-md bg-white">
                            <img src="/storage/{{ $candidate->image }}" class="w-full h-full object-cover" alt="">
                        </div>
                        <div class="w-full my-2 flex justify-between">
                            <span>{{ $candidate->name }}</span>
                            <input type="color" class="bg-transparent w-8" disabled value="{{ $candidate->color }}">
                        </div>
                        <div class="w-full h-[0.5px] bg-slate-500"></div>
                        <div class="w-full  mt-3 flex flex-col justify-center text-white">
                            <span class="text-slate-500">Perolehan</span>
                            <span class="bg-slate-500 py-2 flex rounded-md  justify-center">{{ $candidate->points }} Suara</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
        <div class="w-full flex space-y-5 space-x-0 lg:space-y-0 flex-col lg:flex-row lg:space-x-5 mt-20">
            <div class="w-full lg:w-1/2 bg-slate-100 p-2 rounded-lg h-[300px] ">
                <canvas id="myChart"></canvas>
            </div>
            <div class="w-full lg:w-1/2 bg-slate-100 p-2 rounded-lg h-[300px]">
                <canvas id="myPie"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    const url = "{{ url('/admin/chart') }}"
    
    document.addEventListener('DOMContentLoaded', function () {
            fetch(url)
                .then( res => { return res.json(); } )
                .then( data => { const response = data
                    let name = new Array();
                    let points = new Array();
                    let colors = new Array();
                    console.log(points)
                    response.forEach(data => {
                        name.push(data.name);
                        points.push(data.points);
                        colors.push(data.color);
                    });
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const isi = {
                        labels: name,
                        datasets: [{
                            label: 'Candidate',
                            backgroundColor: colors,
                            borderColor: 'rgb(255, 99, 132)',
                            data: points,
                        }]
                    };
                    const config = {
                        type: 'bar',
                        data: isi,
                        options: { 
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: {
                                            color: '#1475AA'
                                        },
                                        ticks: {
                                            color: '#000'
                                        }
                                    },
                                    x: {
                                        beginAtZero: true,
                                        grid: {
                                            color: '#1475AA'
                                        },
                                        ticks: {
                                            color: '#000'
                                        }
                                    }
                                },
                                maintainAspectRatio: false,
                                reponsive: true,
                                plugins: {
                                legend: {
                                    labels: {
                                        boxWidth: 0,
                                        color: 'rgba(0, 0, 0, 1)',
                                        font: {
                                            size: 16
                                        }
                                    }
                                }
                            }
                        }
                    };
                    const myChart = new Chart(ctx, config)

                    const ctxPie = document.getElementById('myPie').getContext('2d');
                    const isiPie = {
                        labels: name,
                        datasets: [{
                            label: 'Candidate',
                            backgroundColor: colors,
                            borderColor: 'white',
                            data: points,
                        }]
                    };
                    const configPie = {
                        type: 'pie',
                        data: isiPie,
                        options: { 
                                maintainAspectRatio: false,
                                reponsive: true,
                                plugins: {
                                legend: {
                                    labels: {
                                        boxWidth: 0,
                                        color: 'rgba(0, 0, 0, 1)',
                                        font: {
                                            size: 16
                                        }
                                    }
                                }
                            }
                        }
                    };
                    const myPie = new Chart(ctxPie, configPie)
                } )
                .catch( err => { console.errror(error) } )
    }, false)
</script>
