{{> header}}


{{#notificacion}}
        <div class="container">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card black darken-1">
                        <div class="card-content white-text">
                            <p class="error center-align {{colorNotificacion}}-text ">{{notificacion}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{/notificacion}}


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="estadoProformas" ></canvas>
    <canvas id="equipos" ></canvas>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js" integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ==" crossorigin="anonymous"></script>

<style>
    @media (max-width: 600px){
        canvas {
            width: 100%;
        }
    }
</style>

<script defer>

    window.onload = async() => {

        let responseProforma  = await axios.post("/supervisor/obtenerEstadoProformas",{})
        var ctx = document.getElementById('estadoProformas').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',

            // The data for our dataset
            data: {
                labels: ['Pendiente','Finalizados'],
                datasets: [{
                    label: 'Proformas',
                    backgroundColor: ['rgb(255,143,99)','rgb(33,99,231)'],
                    data: [responseProforma.data[0] || 0 ,responseProforma.data[1] || 0]
                }]
            },

            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Estado Proformas'
                }
            }
        });
        chart.canvas.parentNode.style.width = '90%';

        let responseEquipo = await axios.post("/supervisor/obtenerEquipos",{})
        var ctxEquipos = document.getElementById('equipos').getContext('2d');
        var chartEquipo = new Chart(ctxEquipos, {
            // The type of chart we want to create
            type: 'doughnut',

            // The data for our dataset
            data: {
                labels: ['Arrastrados','Tractores'],
                datasets: [{
                    label: 'Equipos',
                    backgroundColor: ['rgb(60,130,31)','rgb(231,33,33)'],
                    data: [responseEquipo.data[0] || 0 ,responseEquipo.data[1] || 0]
                }]
            },

            // Configuration options go here
            options: {
                title: {
                    display: true,
                    text: 'Equipos'
                }
            }
        });

        chartEquipo.canvas.parentNode.style.width = '90%';

    }

</script>

{{> footer}}