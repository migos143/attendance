const { createApp } = Vue;
createApp({
    data(){
        return{
            chart: [],
        }
    },
    methods:{
        getChart:function(){
            const vue = this;
            const data = new FormData()
            data.append("method","getStatus")
            axios.post('../source/model.php',data)
            .then(function(r){
                var chartdata = [];
                r.data.forEach(function(v){
                    chartdata.push({
                        'status' : v.statusRole,
                        'count': v.count
                    })
                });
    
                var chart = document.getElementById('chart');
                new Chart(chart,{
                    type:'bar',
                    data: {
                        labels: chartdata.map(row => row.status),
                        datasets: [
                        {
                            label: 'Users',
                                data: chartdata.map(row => row.count),
                            backgroundColor:['red','blue','white'],
                            borderWidth: 1
                        }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                suggestedMin: 0,
                                suggestedMax: 10
                            },
                        }
                    }
                });
            })
            
        },
        
        
    },
    created:function(){
        this.getChart();    
    },
}).mount('#chart-app');