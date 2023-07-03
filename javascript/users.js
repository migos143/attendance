const { createApp } = Vue;
createApp({
    data(){
        return{
            username: ''
        }
    },
    methods:{
        insertUser:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","registerUser");
            axios.post('../source/model.php',data)
            .then(function(r){
                if(r.data == 'registered'){
                    alert('Successfully Registered');
                    window.location.href = '../index.php';
                }else{
                    alert("not register");
                }
            });
            
        },
        


        loginUser:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","loginUser");
            axios.post('source/model.php',data)
            .then(function(r){
                if(r.data){
                    window.location.href = 'system/dashboard.php';
                }else{
                    alert('No data Existed');
                }
            });
            
        }
    },
    created:function(){

    }
}).mount('#users')