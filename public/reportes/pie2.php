<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pie</title>
        <link rel="stylesheet" href="build/css/global.css" type="text/css"/>
        <link rel="stylesheet" href="build/css/canvasXpress.css" type="text/css"/>
        <!--[if lt IE 9]><script type="text/javascript" src="./js/flashcanvas.js"></script><![endif]-->
        <script type="text/javascript" src="build/js/canvasXpress.min.js"></script>
        <script id='demoScript'>
            var showDemo = function () {
                var cx2 = new CanvasXpress("canvas2",
                        {
                            "z": {
                                "Annt1": ["Desc:1", "Desc:2", "Desc:3", "Desc:4"],
                                "Annt2": ["Desc:A", "Desc:B", "Desc:A", "Desc:B"],
                                "Annt3": ["Desc:X", "Desc:X", "Desc:Y", "Desc:Y"],
                                "Annt4": [5, 10, 15, 20],
                                "Annt5": [8, 16, 24, 32],
                                "Annt6": [10, 20, 30, 40]
                            },
                            "x": {
                                "Factor1": ["Lev:1", "Lev:2", "Lev:3", "Lev:1", "Lev:2", "Lev:3"],
                                "Factor2": ["Lev:A", "Lev:B", "Lev:A", "Lev:B", "Lev:A", "Lev:B"],
                                "Factor3": ["Lev:X", "Lev:X", "Lev:Y", "Lev:Y", "Lev:Z", "Lev:Z"],
                                "Factor4": [5, 10, 15, 20, 25, 30],
                                "Factor5": [8, 16, 24, 32, 40, 48],
                                "Factor6": [10, 20, 30, 40, 50, 60]
                            },
                            "y": {
                                "vars": ["Variable1", "Variable2", "Variable3", "Variable4"],
                                "smps": ["Sample1", "Sample2", "Sample3", "Sample4", "Sample5", "Sample6"],
                                "data": [[5, 10, 25, 40, 45, 50], [95, 80, 75, 70, 55, 40], [25, 30, 45, 60, 65, 70], [55, 40, 35, 30, 15, 1]],
                                "desc": ["Magnitude1", "Magnitude2"]
                            },
                            "a": {
                                "xAxis": ["Variable1", "Variable2"],
                                "xAxis2": ["Variable3", "Variable4"]
                            },
                            "t": {
                                "vars": "(((Variable1,Variable3),Variable4),Variable2)",
                                "smps": "(((((Sample1,Sample2),Sample3),Sample4),Sample5),Sample6)"
                            }
                        },
                {"graphType": "Pie",
                    "pieSegmentLabels": "outside",
                    "pieSegmentPrecision": 1,
                    "pieSegmentSeparation": 2,
                    "pieType": "solid"
                }
                );

            }

            var showCode = function (e, id) {
                var cx = CanvasXpress.getObject(id)
                cx.stopEvent(e);
                cx.cancelEvent(e);
                cx.updateCodeDiv(10000);
                return false;
            }

        </script>
    </head>
    <body onLoad="showDemo();">
        <div id="Pie">
            <h1>Pie</h1>            
            <center>
                <canvas id='canvas2' width='540' height='540'></canvas>
            </center>
        </div>        
    </body>
</html>
