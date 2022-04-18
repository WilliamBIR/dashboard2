<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            Registros
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <!--
            <div class="p-6 flex flex-col items-center">
                <label>Entrada y salida de la tienda 2</label>
                <div style="width:350px;">
                    <canvas id="countPeople" width="100" height="100"></canvas>
                </div> 
            </div>
            -->
            <!--
            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l flex flex-col items-center">
                <label>Emociones detectadas 2</label>
                <div style="width:350px;">
                    <canvas id="emotionDetector" width="100" height="100"></canvas>
                </div> 
            </div>
            -->
            <div class="p-6 border-t border-gray-200 flex flex-col items-center">
                <label>Productos vendidos por mes</label>
                <div style="width:350px;">
                    <canvas id="productxmonth" width="100" height="100"></canvas>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l flex flex-col items-center">
                <label>Productos Vendidos por hora</label>
                <div style="width:350px;">
                    <canvas id="perHourProduct" width="100" height="100"></canvas>
                </div>
            </div>
            
            
            <div class="p-6 border-t border-gray-200 md:border-l flex flex-col items-center">
                <label>Productos Totales</label>
                <div style="width:350px;">
                    <canvas id="countProducts" width="100" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['peoples','label','products','proxmes','proxhours'],
        mounted(){
 
            var perHour=document.getElementById('perHourProduct').getContext('2d');
            var proxhourChart = new Chart(perHour,{
                type:'radar',
                data:{
                    labels:[
                        '07:00-07:59',
                        '08:00-08:59',
                        '09:00-09:59',
                        '10:00-10:59',
                        '11:00-11:59',
                        '12:00-12:59',
                        '13:00-13:59',
                        '14:00-14:59',
                        '15:00-15:59',
                        '16:00-16:59',
                        '17:00-17:59',
                        '18:00-18:59',
                        '19:00-19:59',
                        '20:00-20:59',
                        '21:00-21:59',
                        '22:00-22:59',
                    ],
                    datasets:[
                        {
                            label:'Producto 1',
                            data:this.proxhours[0],
                            fill:true,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgb(255, 99, 132)',
                            pointBackgroundColor: 'rgb(255, 99, 132)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 99, 132)',
                            borderWidth: 1
                        },
                        {
                            label:'Producto 2',
                            data:this.proxhours[1],
                            fill:true,
                            backgroundColor:'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            pointBackgroundColor: 'rgb(54, 162, 235)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(54, 162, 235)',
                            borderWidth: 1
                        },
                         {
                            label:'Producto 3',
                            data:this.proxhours[2],
                            fill:true,
                            backgroundColor:'rgba(255, 206, 86 0.2)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            pointBackgroundColor: 'rgb(255, 206, 86)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(255, 206, 86)',
                            borderWidth: 1
                        },
                         {
                            label:'Producto 4',
                            data:this.proxhours[3],
                            fill:true,
                            backgroundColor:'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            pointBackgroundColor: 'rgb(75, 192, 192)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgb(75, 192, 192)',
                            borderWidth: 1
                        },
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            display:false
                        }
                    }
                }
            });

            var productxmonth = document.getElementById('productxmonth').getContext('2d');
            var proxmonChart = new Chart(productxmonth, {
                type: 'bar',
                data: {
                    labels: this.label,
                    datasets: [{
                        label: 'Producto1',
                        data: this.proxmes[0],
                        backgroundColor:'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Producto 2',
                        data: this.proxmes[1],
                        backgroundColor:'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                                        {
                        label: 'Producto 3',
                        data: this.proxmes[2],
                        backgroundColor:'rgba(255, 206, 86, 0.2)',
                        borderColor:'rgba(255, 206, 86, 1)',
                            
                        borderWidth: 1
                    },
                                        {
                        label: 'Producto 4',
                        data: this.proxmes[3],
                        backgroundColor:'rgba(75, 192, 192, 0.2)',
                        borderColor:'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        	var products=document.getElementById('countProducts').getContext('2d');
        	var productsChart = new Chart(products, {
                type: 'bar',
                data: {
                    labels: ['Producto 1', ' Producto 2', 'Producto 3', 'Producto 4'],
                    datasets: [{
                        label: 'Productos',
                        data: this.products,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',       
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            
                        ],
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
          
        }
    }
</script>
