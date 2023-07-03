const { createApp } = Vue;
createApp({
    data(){
        return{
            username: '',
            AllAttendance: [],
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
                    alert("Failed to Register this Users");
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
            
        },
        deleteUser:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method","deleteUser")
            data.append("userid",id)
            axios.post('../source/model.php',data)
            .then(function(r){
               alert(r.data);
               vue.getAllAttendance();
            });
        },
        getAllAttendance:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","getAllAttendance");
            axios.post('../source/model.php',data)
            .then(function(r){
                vue.AllAttendance = [];
                for(var v of r.data){
                    vue.AllAttendance.push({
                        username: v.username,
                        email: v.email,
                        id: v.id,
                        statusName: v.statusName,
                        role: v.role,
                        dateCreated: v.dateCreated,
                        attenId: v.attenId,
                        userid: v.userid,
                        dateCreated: v.dateCreated,
                        timeCreate: v.timeCreate
                    });
                }
            });
            
        },

    },
    created:function(){
        this.getAllAttendance();
    }
}).mount('#dashboard')