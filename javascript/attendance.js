const { createApp } = Vue;
createApp({
    data(){
        return{
            attendance: [],
            count: 1
        }
    },
    methods:{
        getAllInserted:function(e){
            const vue = this;
            var data = new FormData();
            data.append("method","getAttendance");
            axios.post('../source/model.php',data)
            .then(function(r) {
                vue.attendance = []; 
                for(var v of r.data){
                    vue.attendance.push({
                        attenId: v.attenId,
                        userid: v.userid,
                        status: v.status,
                        dateCreated: v.dateCreated,
                        timeCreate: v.timeCreate
                    });
                }
            });
        },
        insertTimein:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","timein");
            axios.post('../source/model.php',data)
            .then(function(r){
                if(r.data == '200'){
                    vue.getAllInserted();
                }
            });
        },
        insertTimeout:function(){
            const vue = this;
            var data = new FormData();
            data.append("method","timeout");
            axios.post('../source/model.php',data)
            .then(function(r){
                if(r.data == '200'){
                    vue.getAllInserted();
                }
            });
        }
    },
    created:function(){
        this.getAllInserted();
    }
}).mount('#attendance')