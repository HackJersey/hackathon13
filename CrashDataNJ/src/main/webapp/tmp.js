var chart1; // globally available
var chart2;
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function jsonRequest(year) {
    $('#current_year').html(year)
    $('#loading').show();
    $('#charts').hide();
    $.getJSON('/accidents/' + year, function(data) {
        $('#loading').hide();
        $('#charts').show();
        title = numberWithCommas(data['total_accidents']) +  ' Accidents'
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'chart',
                type: 'area'
            },
            title: {
                text: title
            },
            xAxis: {
                type:'datetime',
                title:{text:null}
            },
            yAxis: {
                title: {
                    text: 'Number of Accidents'
                }
            },
            series: [{
                pointInterval:24*3600*1000,
                pointStart:Date.UTC(year,0,01),
                name: 'Accidents Per Day',
                data: data['daily_accidents']
            }]
        });

        fatal = data['fatal_accidents']
        injuries = data['injured_accidents']
        in_town = data['in_town']
        out_of_town = data['out_of_town']
        chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'driver_types',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Driver Origin State'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled:false
                    },
                    showInLegend:true
                }
            },
            series: [{
                type: 'pie',
                name: 'Origin State',
                data: [
                    ['In State', in_town],
                    ['Visitor', out_of_town],
                ]
            }]
        });
        
        chart3 = new Highcharts.Chart({
            chart: {
                renderTo: 'driver_sex',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Driver Sex'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false,
                    },
                    showInLegend:true
                },
            },
            series: [{
                type: 'pie',
                name: 'Sex',
                data: [
                    ['Male', data['males']],
                    ['Female', data['females']],
                ]
            }]
        });

        chart4 = new Highcharts.Chart({
            chart: {
                renderTo: 'driver_age',
                type: 'bar'
            },
            title: {
                text: 'Drver Age Demographics'
            },
            xAxis: {
                categories: ['18-27', '28-37', '38-47', '48-57', '58+'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Drivers',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled:false
            },
            credits: {
                enabled: false
            },
            series: [{
                data: [data['18to27'], data['28to37'], data['38to47'], data['48to57'], data['58andup']]
            }]
        });
        
        chart5 = new Highcharts.Chart({
            chart: {
                renderTo: 'gsp',
                type: 'bar'
            },
            title: {
                text: 'Garden State Parkway Accidents By Mile Marker'
            },
            xAxis: {
                categories: [
                    '0-10',
                    '10-20',
                    '20-30',
                    '30-40',
                    '40-50',
                    '50-60',
                    '60-70',
                    '70-80',
                    '80-90',
                    '90-100',
                    '100-110',
                    '110-120',
                    '120-130',
                    '130-140',
                    '140-150',
                    '150+'
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Number of Accidents',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                enabled:false
            },
            credits: {
                enabled: false
            },
            series: [{
                data: [
                    data['gsp_markers'][0],
                    data['gsp_markers'][1],
                    data['gsp_markers'][2],
                    data['gsp_markers'][3],
                    data['gsp_markers'][4],
                    data['gsp_markers'][5],
                    data['gsp_markers'][7],
                    data['gsp_markers'][8],
                    data['gsp_markers'][9],
                    data['gsp_markers'][10],
                    data['gsp_markers'][11],
                    data['gsp_markers'][12],
                    data['gsp_markers'][13],
                    data['gsp_markers'][14],
                    data['gsp_markers'][15],
                    data['gsp_markers'][16],
                ]
            }]
        });
    });
}

$(document).ready(function() {
    jsonRequest(2012)
});
