/* ------------------------------------------------------------------------------
 *
 *  # Echarts - lines and areas
 *
 *  Lines and areas chart configurations
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function() {
    var fee;
    var baseUrl = window.location.protocol + "//" + window.location.host + "/"+ commonurl + '/api';


    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: 'assets/js/plugins/visualization/echarts'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/bar',
            'echarts/chart/line'
        ],


        // Charts setup
        function (ec, limitless) {

            // Initialize charts
            // ------------------------------
            var stacked_area = ec.init(document.getElementById('stacked_area'), limitless);

            // var basic_lines = ec.init(document.getElementById('basic_lines'), limitless);
            // var stacked_lines = ec.init(document.getElementById('stacked_lines'), limitless);
            // var inverted_axes = ec.init(document.getElementById('inverted_axes'), limitless);
            // var line_point = ec.init(document.getElementById('line_point'), limitless);
            // var basic_area = ec.init(document.getElementById('basic_area'), limitless);
            // var reversed_value = ec.init(document.getElementById('reversed_value'), limitless);



            // Charts setup
            // ------------------------------
            stacked_area_options = {

                // Setup grid
                grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },

                // Add tooltip
                tooltip: {
                    trigger: 'axis'
                },

                // Add legend
                legend: {
                    data: ['Pending', 'Collected', 'Defaulter', 'Total Fee']
                },

                // Enable drag recalculate
                calculable: true,

                // Add horizontal axis
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                }],

                // Add vertical axis
                yAxis: [{
                    type: 'value'
                }],

                // Add series
                series: [
                    {
                        name: 'Pending',
                        type: 'line',
                        stack: 'Total',
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: []
                    },
                    {
                        name: 'Collected',
                        type: 'line',
                        stack: 'Total',
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: []
                    },
                    {
                        name: 'Defaulter',
                        type: 'line',
                        stack: 'Total',
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: []
                    },
                    {
                        name: 'Funded',
                        type: 'line',
                        stack: 'Total',
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        data: []
                    }
                ]
            };
            
            

            // basic_lines.setOption(basic_lines_options);
            // stacked_lines.setOption(stacked_lines_options);
            // inverted_axes.setOption(inverted_axes_options);
            // line_point.setOption(line_point_options);
            // basic_area.setOption(basic_area_options);
            // reversed_value.setOption(reversed_value_options);

            // Resize charts
            // ------------------------------

            $('.DATA').submit(function(event){
                event.preventDefault();
                console.log($(this))
                var count = 0;
                var formData = {
                'year'    : $('#year').val()
                 };
                 console.log('form' , formData , 'urlfghf' , baseUrl);
                $.ajax({
        type: "GET",
        url: baseUrl + "/getfeecharts",
        dataType: "json",
        async: true,
        data: formData,
        contentType: 'application/json',
        success: function (response) {
            console.log(Object.keys(response).length)
            $.each(response , function(index, value) {
                console.log(count , value)
                if(value != null){
                stacked_area_options['series'][0]['data'][count] = value.UNPAID_FEE;
                stacked_area_options['series'][1]['data'][count] = value.PAID_FEE;
                stacked_area_options['series'][2]['data'][count] = value.DEFAULTER;
                stacked_area_options['series'][3]['data'][count] = value.TOTAL_FEE;
                }
                else{
                 stacked_area_options['series'][0]['data'][count] = 0;
                stacked_area_options['series'][1]['data'][count] = 0;
                stacked_area_options['series'][2]['data'][count] = 0;
                stacked_area_options['series'][3]['data'][count] = 0;   
                }
                count++
            });


            // console.log(response, 'data');
            // fee = response.list;
            // stacked_area_options['series'][0]['data'][0] = fee
            // stacked_area_options['series'][0]['data'][1] = fee
            // console.log('test' , stacked_area_options , stacked_area_options['series'][0]['data'][1]);
                stacked_area.setOption(stacked_area_options);
        }
    });
                
            })


            window.onresize = function () {
                setTimeout(function () {
                    // basic_lines.resize();
                    // stacked_lines.resize();
                    // inverted_axes.resize();
                    // line_point.resize();
                    // basic_area.resize();
                    stacked_area.resize();
                    // reversed_value.resize();
                }, 200);
            }
        }
    );
});
