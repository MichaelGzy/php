<?php
/**
 * Created by PhpStorm.
 * User: MichaelGzy
 * Date: 19/4/14
 * Time: 20:26
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/js/vue-v2.6.8.js"></script>
    <script src="/js/axios.js"></script>
</head>

<body>
<div id="app">
    <table border="1">
        <tr>
            <td>id</td>
            <td>标题</td>
            <td>图片</td>
        </tr>
        <tr v-for="(val,key) in list_data">
            <td>@{{val.id}}</td>
            <td>@{{val.title}}</td>
            <td><img src=''>@{{val.tp}} </td>
        </tr>
    </table>
</div>
</body>
<script>
    var app = new Vue({
        el:'#app',
        data:{
            list_data:[],
        },
        mounted:function(){
//            var that=this;
            let url = 'http://www.lar.com:80/article/getlist';
            axios.get(url).then((backdata)=>{
                // console.log(backdata.data);
                this.list_data = backdata.data;
//                console.log(this.list_data)
        });
        },
    });

</script>

</html>






