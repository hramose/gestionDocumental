<script>
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.


    var pieOptions = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke: true,
        //String - The colour of each segment stroke
        segmentStrokeColor: "#fff",
        //Number - The width of each segment stroke
        segmentStrokeWidth: 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps: 100,
        //String - Animation easing effect
        animationEasing: "easeOutBounce",
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate: true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale: false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: false,
        //String - A legend template
        // legendTemplate: "<ul class=\'< %=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:< %=segments[i].fillColor%>\"></span>< %if(segments[i].label){%>< %=segments[i].label%><%}%></li><%}%></ul>'"
        };

        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // Create the Doughnut Chart

</script>
@foreach($departamentos as $dep )
    @if($dep->completado+$dep->enproceso+$dep->standby>0)
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">{{$dep->DESCRIPCION}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="chart-responsive">
                        <canvas id="pieChart{{$dep->ID_DEPARTAMNETO}}" height="150"></canvas>
                    </div><!-- ./chart-responsive -->
                </div><!-- /.col -->
                <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-green"></i> {{trans("req_fun.completado")}}</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> {{trans("req_fun.enproceso")}}</li>
                        <li><i class="fa fa-circle-o text-red"></i> {{trans("req_fun.standby")}}</li>
                    </ul>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.box-body -->
        <div class="box-footer no-padding">
            <!---->
            <div class="panel-group" id="accordion{{$dep->ID_DEPARTAMNETO}}" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne{{$dep->ID_DEPARTAMNETO}}">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse"  href="#collapseOne{{$dep->ID_DEPARTAMNETO}}" aria-expanded="true" aria-controls="collapseOne{{$dep->ID_DEPARTAMNETO}}">
                                {{trans("req_fun.completado")}} <span class="pull-right text-green">{{$dep->completado}}</span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne{{$dep->ID_DEPARTAMNETO}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne{{$dep->ID_DEPARTAMNETO}}">
                        <div class="panel-body">
                            <div id="tabC{{$dep->ID_DEPARTAMNETO}}"></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo{{$dep->ID_DEPARTAMNETO}}">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse"  href="#collapseTwo{{$dep->ID_DEPARTAMNETO}}" aria-expanded="false" aria-controls="collapseTwo{{$dep->ID_DEPARTAMNETO}}">
                                {{trans("req_fun.enproceso")}} <span class="pull-right text-yellow"> {{$dep->enproceso}}</span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo{{$dep->ID_DEPARTAMNETO}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo{{$dep->ID_DEPARTAMNETO}}">
                        <div class="panel-body">
                            <div id="tabP{{$dep->ID_DEPARTAMNETO}}"></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree{{$dep->ID_DEPARTAMNETO}}">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse"  href="#collapseThree{{$dep->ID_DEPARTAMNETO}}" aria-expanded="false" aria-controls="collapseThree{{$dep->ID_DEPARTAMNETO}}">
                                {{trans("req_fun.standby")}} <span class="pull-right text-red"> {{$dep->standby}}</span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseThree{{$dep->ID_DEPARTAMNETO}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree{{$dep->ID_DEPARTAMNETO}}">
                        <div class="panel-body">
                            <div id="tabS{{$dep->ID_DEPARTAMNETO}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!---->
            <script>
                $('#collapseOne{{$dep->ID_DEPARTAMNETO}}').on('show.bs.collapse', function () {
                    fn_requerimiento_list_repo('darUsuarioSdeReq-ReporteTotal','{{$dep->ID_DEPARTAMNETO}}','COMPLETADO','#tabC{{$dep->ID_DEPARTAMNETO}}');
                });
                $('#collapseTwo{{$dep->ID_DEPARTAMNETO}}').on('show.bs.collapse', function () {
                    fn_requerimiento_list_repo('darUsuarioSdeReq-ReporteTotal','{{$dep->ID_DEPARTAMNETO}}','EN PROCESO','#tabP{{$dep->ID_DEPARTAMNETO}}');
                })
                $('#collapseThree{{$dep->ID_DEPARTAMNETO}}').on('show.bs.collapse', function () {
                    fn_requerimiento_list_repo('darUsuarioSdeReq-ReporteTotal','{{$dep->ID_DEPARTAMNETO}}','STAND BY','#tabS{{$dep->ID_DEPARTAMNETO}}');
                })

            </script>
        </div><!-- /.footer -->

    </div><!-- /.box -->
    <script>
        var pieChartCanvas{{$dep->ID_DEPARTAMNETO}} = $("#pieChart{{$dep->ID_DEPARTAMNETO}}").get(0).getContext("2d");
        //var pieChartCanvas = document.getElementById("pieChart");
        var pieChart{{$dep->ID_DEPARTAMNETO}} = new Chart(pieChartCanvas{{$dep->ID_DEPARTAMNETO}});
        var PieData{{$dep->ID_DEPARTAMNETO}} = [
            {
                value: {{$dep->completado}},
                color: "#00a65a",
                highlight: "#f39c12",
                label: "{{trans("req_fun.completado")}}"
            },
            {
                value: {{$dep->enproceso}},
                color: "#f39c12",
                highlight: "#f56954",
                label: "{{trans("req_fun.enproceso")}}"
            },
            {
                value: {{$dep->standby}},
                color: "#f56954",
                highlight: "#00a65a",
                label: "{{trans("req_fun.standby")}}"
            }
        ];

        pieChart{{$dep->ID_DEPARTAMNETO}}.Doughnut(PieData{{$dep->ID_DEPARTAMNETO}}, pieOptions);
    </script>
    @endif
@endforeach



