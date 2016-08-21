<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="row">

                    <v-paginator :resource.sync="animals" :resource_url="resource_url"></v-paginator>
                    <ul>
                        <li v-for="animal in animals">
                            @{{ animal.email }}
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.9.3/vue-resource.min.js"></script>
        <script src="https://cdn.jsdelivr.net/vuejs-paginator/1.0.13/vuejs-paginator.min.js"></script>

        <script>
            Vue.http.options.root = 'http://localhost/paginationvue/public';
            new Vue({
                el: 'body',
                components: {
                    VPaginator: VuePaginator
                },
                    ready: function() {
                this.recupererCompetences();
            },
                data: {
                    animals: [],
                    resource_url: 'http://localhost/paginationvue/public/aaa'  // here you define the url of your paginated API
                },
                    methods:{
                        recupererCompetences: function () {
                            this.$http.get('http://localhost/paginationvue/public/aaa')
                                .then(function(data){
                                        console.log("Recuperation compétences OK");
                                        console.log(data);
                                        this.animals= data;

                                    },
                                    function(data){
                                        console.log("Recuperation compétences PAS OK");
                                        console.log(data);
                                    });
                        },
                    },
            });
        </script>
    </body>
</html>
