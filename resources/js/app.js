import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import Chart from 'chart.js/auto';
window.Chart = Chart;
import ChartDataLabels from 'chartjs-plugin-datalabels';
Chart.register(ChartDataLabels);

import '../js/script.js';
import $ from 'jquery';
window.$ = window.jQuery = $;

$(function () {
    console.log("jQuery loaded via Vite!");
});

