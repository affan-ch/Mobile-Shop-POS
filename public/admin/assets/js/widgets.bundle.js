"use strict";
var KTCardsWidget1 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_1_chart");
            if (e) {
                var t = e.getAttribute("data-kt-chart-color"),
                    a = parseInt(KTUtil.css(e, "height")),
                    r = KTUtil.getCssVariableValue("--bs-gray-500"),
                    i = KTUtil.isHexColor(t) ? t : KTUtil.getCssVariableValue("--bs-" + t),
                    o = KTUtil.getCssVariableValue("--bs-gray-300"),
                    s = new ApexCharts(e, {
                        series: [{
                            name: "Net Profit",
                            data: [30, 75, 55, 45, 30, 60, 75, 50],
                            margin: {
                                left: 5,
                                right: 5
                            }
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "bar",
                            height: a,
                            toolbar: {
                                show: !1
                            },
                            sparkline: {
                                enabled: !0
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: ["35%"],
                                borderRadius: 6
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        stroke: {
                            show: !0,
                            width: 4,
                            colors: ["transparent"]
                        },
                        xaxis: {
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                show: !1,
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                show: !1
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1,
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                }
                            }
                        },
                        fill: {
                            type: "solid"
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            x: {
                                formatter: function (e) {
                                    return "Impression: " + e
                                }
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " revenue"
                                }
                            }
                        },
                        colors: [i, o],
                        grid: {
                            borderColor: !1,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            },
                            padding: {
                                top: 10,
                                left: 25,
                                right: 25
                            }
                        }
                    });
                setTimeout((function () {
                    s.render()
                }), 300)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardsWidget1), KTUtil.onDOMContentLoaded((function () {
    KTCardsWidget1.init()
}));
var KTCardsWidget10 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_10_chart");
            if (e) {
                var t = {
                        size: e.getAttribute("data-kt-size") ? parseInt(e.getAttribute("data-kt-size")) : 70,
                        lineWidth: e.getAttribute("data-kt-line") ? parseInt(e.getAttribute("data-kt-line")) : 11,
                        rotate: e.getAttribute("data-kt-rotate") ? parseInt(e.getAttribute("data-kt-rotate")) : 145
                    },
                    a = document.createElement("canvas"),
                    r = document.createElement("span");
                "undefined" != typeof G_vmlCanvasManager && G_vmlCanvasManager.initElement(a);
                var i = a.getContext("2d");
                a.width = a.height = t.size, e.appendChild(r), e.appendChild(a), i.translate(t.size / 2, t.size / 2), i.rotate((t.rotate / 180 - .5) * Math.PI);
                var o = (t.size - t.lineWidth) / 2,
                    s = function (e, t, a) {
                        a = Math.min(Math.max(0, a || 1), 1), i.beginPath(), i.arc(0, 0, o, 0, 2 * Math.PI * a, !1), i.strokeStyle = e, i.lineCap = "round", i.lineWidth = t, i.stroke()
                    };
                s("#E4E6EF", t.lineWidth, 1), s(KTUtil.getCssVariableValue("--bs-primary"), t.lineWidth, 100 / 150), s(KTUtil.getCssVariableValue("--bs-success"), t.lineWidth, .4)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardsWidget10), KTUtil.onDOMContentLoaded((function () {
    KTCardsWidget10.init()
}));
var KTCardsWidget4 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_4_chart");
            if (e) {
                var t = {
                        size: e.getAttribute("data-kt-size") ? parseInt(e.getAttribute("data-kt-size")) : 70,
                        lineWidth: e.getAttribute("data-kt-line") ? parseInt(e.getAttribute("data-kt-line")) : 11,
                        rotate: e.getAttribute("data-kt-rotate") ? parseInt(e.getAttribute("data-kt-rotate")) : 145
                    },
                    a = document.createElement("canvas"),
                    r = document.createElement("span");
                "undefined" != typeof G_vmlCanvasManager && G_vmlCanvasManager.initElement(a);
                var i = a.getContext("2d");
                a.width = a.height = t.size, e.appendChild(r), e.appendChild(a), i.translate(t.size / 2, t.size / 2), i.rotate((t.rotate / 180 - .5) * Math.PI);
                var o = (t.size - t.lineWidth) / 2,
                    s = function (e, t, a) {
                        a = Math.min(Math.max(0, a || 1), 1), i.beginPath(), i.arc(0, 0, o, 0, 2 * Math.PI * a, !1), i.strokeStyle = e, i.lineCap = "round", i.lineWidth = t, i.stroke()
                    };
                s("#E4E6EF", t.lineWidth, 1), s(KTUtil.getCssVariableValue("--bs-danger"), t.lineWidth, 100 / 150), s(KTUtil.getCssVariableValue("--bs-primary"), t.lineWidth, .4)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardsWidget4), KTUtil.onDOMContentLoaded((function () {
    KTCardsWidget4.init()
}));
var KTCardsWidget6 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_6_chart");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = KTUtil.getCssVariableValue("--bs-gray-500"),
                    r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    i = KTUtil.getCssVariableValue("--bs-primary"),
                    o = KTUtil.getCssVariableValue("--bs-gray-300"),
                    s = new ApexCharts(e, {
                        series: [{
                            name: "Sales",
                            data: [30, 60, 53, 45, 60, 75, 53]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "bar",
                            height: t,
                            toolbar: {
                                show: !1
                            },
                            sparkline: {
                                enabled: !0
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: ["55%"],
                                borderRadius: 6
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        stroke: {
                            show: !0,
                            width: 9,
                            colors: ["transparent"]
                        },
                        xaxis: {
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1,
                                tickPlacement: "between"
                            },
                            labels: {
                                show: !1,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                show: !1
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            }
                        },
                        fill: {
                            type: "solid"
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            x: {
                                formatter: function (e) {
                                    return "Impressions: " + e
                                }
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + "K"
                                }
                            }
                        },
                        colors: [i, o],
                        grid: {
                            padding: {
                                left: 10,
                                right: 10
                            },
                            borderColor: r,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        }
                    });
                setTimeout((function () {
                    s.render()
                }), 300)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardsWidget6), KTUtil.onDOMContentLoaded((function () {
    KTCardsWidget6.init()
}));
var KTCardWidget8 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_8_chart");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = (KTUtil.getCssVariableValue("--bs-border-dashed-color"), KTUtil.getCssVariableValue("--bs-gray-800")),
                    r = KTUtil.getCssVariableValue("--bs-light-info"),
                    i = new ApexCharts(e, {
                        series: [{
                            name: "Net Profit",
                            data: [35, 25, 45, 15, 60, 50, 57, 35, 70, 40, 45, 25, 45, 30, 70]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "solid",
                            opacity: 0
                        },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 2,
                            colors: [a]
                        },
                        xaxis: {
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                show: !1
                            },
                            crosshairs: {
                                position: "front",
                                stroke: {
                                    color: a,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            x: {
                                formatter: function (e) {
                                    return "Impression " + e
                                }
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        colors: [r],
                        grid: {
                            strokeDashArray: 4,
                            padding: {
                                top: 0,
                                right: -20,
                                bottom: -20,
                                left: -20
                            },
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        },
                        markers: {
                            strokeColor: a,
                            strokeWidth: 2
                        }
                    });
                setTimeout((function () {
                    i.render()
                }), 300)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardWidget8), KTUtil.onDOMContentLoaded((function () {
    KTCardWidget8.init()
}));
var KTCardWidget9 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_card_widget_9_chart");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = (KTUtil.getCssVariableValue("--bs-border-dashed-color"), KTUtil.getCssVariableValue("--bs-gray-800")),
                    r = KTUtil.getCssVariableValue("--bs-light-info"),
                    i = new ApexCharts(e, {
                        series: [{
                            name: "Net Profit",
                            data: [35, 25, 35, 15, 40, 60, 25, 40, 70, 30, 55, 45, 45, 30, 50]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "solid",
                            opacity: 0
                        },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 2,
                            colors: [a]
                        },
                        xaxis: {
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                show: !1
                            },
                            crosshairs: {
                                position: "front",
                                stroke: {
                                    color: a,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                show: !1
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            x: {
                                formatter: function (e) {
                                    return "Sales " + e
                                }
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        colors: [r],
                        grid: {
                            strokeDashArray: 4,
                            padding: {
                                top: 0,
                                right: -20,
                                bottom: -20,
                                left: -20
                            },
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        },
                        markers: {
                            strokeColor: a,
                            strokeWidth: 2
                        }
                    });
                setTimeout((function () {
                    i.render()
                }), 300)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTCardWidget9), KTUtil.onDOMContentLoaded((function () {
    KTCardWidget9.init()
}));
var KTChartsWidget1 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_1");
            if (e) {
                var t = e.hasAttribute("data-kt-negative-color") ? e.getAttribute("data-kt-negative-color") : KTUtil.getCssVariableValue("--bs-success"),
                    a = parseInt(KTUtil.css(e, "height")),
                    r = KTUtil.getCssVariableValue("--bs-gray-500"),
                    i = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    o = KTUtil.getCssVariableValue("--bs-primary"),
                    s = new ApexCharts(e, {
                        series: [{
                            name: "Net Profit",
                            data: [20, 30, 20, 40, 60, 75, 65, 18, 10, 5, 15, 40, 60, 18, 35, 55, 20]
                        }, {
                            name: "Revenue",
                            data: [-20, -15, -5, -20, -30, -15, -10, -8, -5, -5, -10, -25, -15, -5, -10, -5, -15]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "bar",
                            stacked: !0,
                            height: a,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: "35%",
                                barHeight: "70%",
                                borderRadius: [6, 6]
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        xaxis: {
                            categories: ["Jan 5", "Jan 7", "Jan 9", "Jan 11", "Jan 13", "Jan 15", "Jan 17", "Jan 19", "Jan 20", "Jan 21", "Jan 23", "Jan 24", "Jan 25", "Jan 26", "Jan 24", "Jan 28", "Jan 29"],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            tickAmount: 10,
                            labels: {
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                show: !1
                            }
                        },
                        yaxis: {
                            min: -50,
                            max: 80,
                            tickAmount: 6,
                            labels: {
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                },
                                formatter: function (e) {
                                    return parseInt(e) + "K"
                                }
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px",
                                borderRadius: 4
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        colors: [o, t],
                        grid: {
                            borderColor: i,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        }
                    });
                setTimeout((function () {
                    s.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget1), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget1.init()
}));
var KTChartsWidget10 = function () {
    var e = function (e, t, a, r) {
        var i = document.querySelector(t);
        if (i) {
            var o = parseInt(KTUtil.css(i, "height")),
                s = (KTUtil.getCssVariableValue("--bs-gray-900"), KTUtil.getCssVariableValue("--bs-border-dashed-color")),
                l = {
                    series: [{
                        name: "Net Profit",
                        data: a
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "bar",
                        height: o,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: ["22%"],
                            borderRadius: 5,
                            dataLabels: {
                                position: "top"
                            },
                            startingShape: "flat"
                        }
                    },
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !0,
                        offsetY: -30,
                        style: {
                            fontSize: "13px",
                            colors: ["labelColor"]
                        },
                        formatter: function (e) {
                            return e + "%"
                        }
                    },
                    stroke: {
                        show: !0,
                        width: 2,
                        colors: ["transparent"]
                    },
                    xaxis: {
                        categories: ["Metals", "Energy", "Agro", "Machines", "Transport", "Textile", "Wood"],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            }
                        },
                        crosshairs: {
                            fill: {
                                gradient: {
                                    opacityFrom: 0,
                                    opacityTo: 0
                                }
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            },
                            formatter: function (e) {
                                return parseInt(e) + "K"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {
                            formatter: function (e) {
                                return "$" + e + " thousands"
                            }
                        }
                    },
                    colors: [KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-light-primary")],
                    grid: {
                        borderColor: s,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    }
                },
                n = new ApexCharts(i, l),
                d = !1,
                c = document.querySelector(e);
            !0 === r && (n.render(), d = !0), c.addEventListener("shown.bs.tab", (function (e) {
                0 == d && (n.render(), d = !0)
            }))
        }
    };
    return {
        init: function () {
            e("#kt_charts_widget_10_tab_1", "#kt_charts_widget_10_chart_1", [30, 18, 43, 70, 13, 37, 23], !0), e("#kt_charts_widget_10_tab_2", "#kt_charts_widget_10_chart_2", [25, 55, 35, 50, 45, 20, 31], !1), e("#kt_charts_widget_10_tab_3", "#kt_charts_widget_10_chart_3", [45, 15, 35, 70, 45, 50, 21], !1), e("#kt_charts_widget_10_tab_4", "#kt_charts_widget_10_chart_4", [15, 55, 25, 50, 25, 60, 31], !1)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget10), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget10.init()
}));
var KTChartsWidget11 = function () {
    var e = function (e, t, a, r) {
        var i = document.querySelector(t),
            o = parseInt(KTUtil.css(i, "height"));
        if (i) {
            var s = KTUtil.getCssVariableValue("--bs-gray-500"),
                l = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                n = KTUtil.getCssVariableValue("--bs-success"),
                d = KTUtil.getCssVariableValue("--bs-success"),
                c = new ApexCharts(i, {
                    series: [{
                        name: "Sales",
                        data: a
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "area",
                        height: o,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: .3,
                            opacityTo: .7,
                            stops: [0, 90, 100]
                        }
                    },
                    stroke: {
                        curve: "smooth",
                        show: !0,
                        width: 3,
                        colors: [n]
                    },
                    xaxis: {
                        categories: ["", "Apr 02", "Apr 06", "Apr 06", "Apr 05", "Apr 06", "Apr 10", "Apr 08", "Apr 09", "Apr 14", "Apr 10", "Apr 12", "Apr 18", "Apr 14", "Apr 15", "Apr 14", "Apr 17", "Apr 18", "Apr 02", "Apr 06", "Apr 18", "Apr 05", "Apr 06", "Apr 10", "Apr 08", "Apr 22", "Apr 14", "Apr 11", "Apr 12", ""],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        tickAmount: 5,
                        labels: {
                            rotate: 0,
                            rotateAlways: !0,
                            style: {
                                colors: s,
                                fontSize: "13px"
                            }
                        },
                        crosshairs: {
                            position: "front",
                            stroke: {
                                color: n,
                                width: 1,
                                dashArray: 3
                            }
                        },
                        tooltip: {
                            enabled: !0,
                            formatter: void 0,
                            offsetY: 0,
                            style: {
                                fontSize: "13px"
                            }
                        }
                    },
                    yaxis: {
                        tickAmount: 4,
                        max: 24,
                        min: 10,
                        labels: {
                            style: {
                                colors: s,
                                fontSize: "13px"
                            }
                        }
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {
                            formatter: function (e) {
                                return "$" + e + "K"
                            }
                        }
                    },
                    colors: [d],
                    grid: {
                        borderColor: l,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    },
                    markers: {
                        strokeColor: n,
                        strokeWidth: 3
                    }
                }),
                u = !1,
                p = document.querySelector(e);
            !0 === r && (c.render(), u = !0), p.addEventListener("shown.bs.tab", (function (e) {
                0 == u && (c.render(), u = !0)
            }))
        }
    };
    return {
        init: function () {
            e("#kt_chart_widget_11_tab_1", "#kt_chart_widget_11_chart_1", [16, 19, 19, 16, 16, 14, 15, 15, 17, 17, 19, 19, 18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 20, 20, 22], !1), e("#kt_chart_widget_11_tab_2", "#kt_chart_widget_11_chart_2", [18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 18, 20, 20, 22, 15, 18, 18, 17, 17, 15, 15, 17, 17, 19, 17], !1), e("#kt_chart_widget_11_tab_3", "#kt_chart_widget_11_chart_3", [17, 20, 20, 19, 19, 17, 17, 19, 19, 21, 21, 19, 19, 21, 21, 18, 18, 16, 17, 17, 19, 19, 21, 21, 19, 19, 17, 17, 18, 18], !0)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget11), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget11.init()
}));
var KTChartsWidget12 = function () {
    var e = function (e, t, a, r) {
        var i = document.querySelector(t);
        if (i) {
            var o = parseInt(KTUtil.css(i, "height")),
                s = (KTUtil.getCssVariableValue("--bs-gray-900"), KTUtil.getCssVariableValue("--bs-border-dashed-color")),
                l = {
                    series: [{
                        name: "Net Profit",
                        data: a
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "bar",
                        height: o,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: ["22%"],
                            borderRadius: 5,
                            dataLabels: {
                                position: "top"
                            },
                            startingShape: "flat"
                        }
                    },
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !0,
                        offsetY: -28,
                        style: {
                            fontSize: "13px",
                            colors: ["labelColor"]
                        }
                    },
                    stroke: {
                        show: !0,
                        width: 2,
                        colors: ["transparent"]
                    },
                    xaxis: {
                        categories: ["Grossey", "Pet Food", "Flowers", "Restaurant", "Kids Toys", "Clothing", "Still Water"],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            }
                        },
                        crosshairs: {
                            fill: {
                                gradient: {
                                    opacityFrom: 0,
                                    opacityTo: 0
                                }
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            },
                            formatter: function (e) {
                                return parseInt(e) + "K"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {
                            formatter: function (e) {
                                return "$" + e + " thousands"
                            }
                        }
                    },
                    colors: [KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-light-primary")],
                    grid: {
                        borderColor: s,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    }
                },
                n = new ApexCharts(i, l),
                d = !1,
                c = document.querySelector(e);
            !0 === r && (n.render(), d = !0), c.addEventListener("shown.bs.tab", (function (e) {
                0 == d && (n.render(), d = !0)
            }))
        }
    };
    return {
        init: function () {
            e("#kt_charts_widget_12_tab_1", "#kt_charts_widget_12_chart_1", [54, 42, 75, 110, 23, 87, 50], !0), e("#kt_charts_widget_12_tab_2", "#kt_charts_widget_12_chart_2", [25, 55, 35, 50, 45, 20, 31], !1), e("#kt_charts_widget_12_tab_3", "#kt_charts_widget_12_chart_3", [45, 15, 35, 70, 45, 50, 21], !1)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget12), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget12.init()
}));
var KTChartsWidget13 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_charts_widget_13_chart");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5xy.XYChart.new(t, {
                        panX: !0,
                        panY: !0,
                        wheelX: "panX",
                        wheelY: "zoomX"
                    }));
                    a.set("cursor", am5xy.XYCursor.new(t, {
                        behavior: "none"
                    })).lineY.set("visible", !1);
                    var r = [{
                            year: "2003",
                            cars: 1587,
                            motorcycles: 650,
                            bicycles: 121
                        }, {
                            year: "2004",
                            cars: 1567,
                            motorcycles: 683,
                            bicycles: 146
                        }, {
                            year: "2005",
                            cars: 1617,
                            motorcycles: 691,
                            bicycles: 138
                        }, {
                            year: "2006",
                            cars: 1630,
                            motorcycles: 642,
                            bicycles: 127
                        }, {
                            year: "2007",
                            cars: 1660,
                            motorcycles: 699,
                            bicycles: 105
                        }, {
                            year: "2008",
                            cars: 1683,
                            motorcycles: 721,
                            bicycles: 109
                        }, {
                            year: "2009",
                            cars: 1691,
                            motorcycles: 737,
                            bicycles: 112
                        }, {
                            year: "2010",
                            cars: 1298,
                            motorcycles: 680,
                            bicycles: 101
                        }, {
                            year: "2011",
                            cars: 1275,
                            motorcycles: 664,
                            bicycles: 97
                        }, {
                            year: "2012",
                            cars: 1246,
                            motorcycles: 648,
                            bicycles: 93
                        }, {
                            year: "2013",
                            cars: 1318,
                            motorcycles: 697,
                            bicycles: 111
                        }, {
                            year: "2014",
                            cars: 1213,
                            motorcycles: 633,
                            bicycles: 87
                        }, {
                            year: "2015",
                            cars: 1199,
                            motorcycles: 621,
                            bicycles: 79
                        }, {
                            year: "2016",
                            cars: 1110,
                            motorcycles: 210,
                            bicycles: 81
                        }, {
                            year: "2017",
                            cars: 1165,
                            motorcycles: 232,
                            bicycles: 75
                        }, {
                            year: "2018",
                            cars: 1145,
                            motorcycles: 219,
                            bicycles: 88
                        }, {
                            year: "2019",
                            cars: 1163,
                            motorcycles: 201,
                            bicycles: 82
                        }, {
                            year: "2020",
                            cars: 1180,
                            motorcycles: 285,
                            bicycles: 87
                        }, {
                            year: "2021",
                            cars: 1159,
                            motorcycles: 277,
                            bicycles: 71
                        }],
                        i = a.xAxes.push(am5xy.CategoryAxis.new(t, {
                            categoryField: "year",
                            startLocation: .5,
                            endLocation: .5,
                            renderer: am5xy.AxisRendererX.new(t, {}),
                            tooltip: am5.Tooltip.new(t, {})
                        }));
                    i.get("renderer").grid.template.setAll({
                        disabled: !0,
                        strokeOpacity: 0
                    }), i.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), i.data.setAll(r);
                    var o = a.yAxes.push(am5xy.ValueAxis.new(t, {
                        renderer: am5xy.AxisRendererY.new(t, {})
                    }));

                    function s(e, s, l) {
                        var n = a.series.push(am5xy.LineSeries.new(t, {
                            name: e,
                            xAxis: i,
                            yAxis: o,
                            stacked: !0,
                            valueYField: s,
                            categoryXField: "year",
                            fill: am5.color(l),
                            tooltip: am5.Tooltip.new(t, {
                                pointerOrientation: "horizontal",
                                labelText: "[bold]{name}[/]\n{categoryX}: {valueY}"
                            })
                        }));
                        n.fills.template.setAll({
                            fillOpacity: .5,
                            visible: !0
                        }), n.data.setAll(r), n.appear(1e3)
                    }
                    o.get("renderer").grid.template.setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                        strokeWidth: 1,
                        strokeOpacity: 1,
                        strokeDasharray: [3]
                    }), o.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), s("Cars", "cars", KTUtil.getCssVariableValue("--bs-primary")), s("Motorcycles", "motorcycles", KTUtil.getCssVariableValue("--bs-success")), s("Bicycles", "bicycles", KTUtil.getCssVariableValue("--bs-warning")), a.set("scrollbarX", am5.Scrollbar.new(t, {
                        orientation: "horizontal",
                        marginBottom: 25,
                        height: 8
                    }));
                    var l = i.makeDataItem({
                        category: "2016",
                        endCategory: "2021"
                    });
                    i.createAxisRange(l), l.get("grid").setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                        strokeOpacity: .5,
                        strokeDasharray: [3]
                    }), l.get("axisFill").setAll({
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                        fillOpacity: .1
                    }), l.get("label").setAll({
                        inside: !0,
                        text: "Fines increased",
                        rotation: 90,
                        centerX: am5.p100,
                        centerY: am5.p100,
                        location: 0,
                        paddingBottom: 10,
                        paddingRight: 15
                    });
                    var n = i.makeDataItem({
                        category: "2021"
                    });
                    i.createAxisRange(n), n.get("grid").setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                        strokeOpacity: 1,
                        strokeDasharray: [3]
                    }), n.get("label").setAll({
                        inside: !0,
                        text: "Fee introduced",
                        rotation: 90,
                        centerX: am5.p100,
                        centerY: am5.p100,
                        location: 0,
                        paddingBottom: 10,
                        paddingRight: 15
                    }), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget13), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget13.init()
}));
var KTChartsWidget14 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_charts_widget_14_chart");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5radar.RadarChart.new(t, {
                            panX: !1,
                            panY: !1,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            innerRadius: am5.percent(20),
                            startAngle: -90,
                            endAngle: 180
                        })),
                        r = [{
                            category: "Research",
                            value: 80,
                            full: 100,
                            columnSettings: {
                                fillOpacity: 1,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-info"))
                            }
                        }, {
                            category: "Marketing",
                            value: 35,
                            full: 100,
                            columnSettings: {
                                fillOpacity: 1,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-danger"))
                            }
                        }, {
                            category: "Distribution",
                            value: 92,
                            full: 100,
                            columnSettings: {
                                fillOpacity: 1,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            category: "Human Resources",
                            value: 68,
                            full: 100,
                            columnSettings: {
                                fillOpacity: 1,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-success"))
                            }
                        }];
                    a.set("cursor", am5radar.RadarCursor.new(t, {
                        behavior: "zoomX"
                    })).lineY.set("visible", !1);
                    var i = am5radar.AxisRendererCircular.new(t, {});
                    i.labels.template.setAll({
                        radius: 10
                    }), i.grid.template.setAll({
                        forceHidden: !0
                    });
                    var o = a.xAxes.push(am5xy.ValueAxis.new(t, {
                            renderer: i,
                            min: 0,
                            max: 100,
                            strictMinMax: !0,
                            numberFormat: "#'%'",
                            tooltip: am5.Tooltip.new(t, {})
                        })),
                        s = am5radar.AxisRendererRadial.new(t, {
                            minGridDistance: 20
                        });
                    s.labels.template.setAll({
                        centerX: am5.p100,
                        fontWeight: "500",
                        fontSize: 18,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                        templateField: "columnSettings"
                    }), s.grid.template.setAll({
                        forceHidden: !0
                    });
                    var l = a.yAxes.push(am5xy.CategoryAxis.new(t, {
                        categoryField: "category",
                        renderer: s
                    }));
                    l.data.setAll(r);
                    var n = a.series.push(am5radar.RadarColumnSeries.new(t, {
                        xAxis: o,
                        yAxis: l,
                        clustered: !1,
                        valueXField: "full",
                        categoryYField: "category",
                        fill: t.interfaceColors.get("alternativeBackground")
                    }));
                    n.columns.template.setAll({
                        width: am5.p100,
                        fillOpacity: .08,
                        strokeOpacity: 0,
                        cornerRadius: 20
                    }), n.data.setAll(r);
                    var d = a.series.push(am5radar.RadarColumnSeries.new(t, {
                        xAxis: o,
                        yAxis: l,
                        clustered: !1,
                        valueXField: "value",
                        categoryYField: "category"
                    }));
                    d.columns.template.setAll({
                        width: am5.p100,
                        strokeOpacity: 0,
                        tooltipText: "{category}: {valueX}%",
                        cornerRadius: 20,
                        templateField: "columnSettings"
                    }), d.data.setAll(r), n.appear(1e3), d.appear(1e3), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget14), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget14.init()
}));
var KTChartsWidget15 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_charts_widget_15_chart");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5xy.XYChart.new(t, {
                            panX: !1,
                            panY: !1,
                            layout: t.verticalLayout
                        })),
                        r = (a.get("colors"), [{
                            country: "US",
                            visits: 725,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/united-states.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "UK",
                            visits: 625,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/united-kingdom.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "China",
                            visits: 602,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/china.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Japan",
                            visits: 509,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/japan.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Germany",
                            visits: 322,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/germany.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "France",
                            visits: 214,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/france.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "India",
                            visits: 204,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/india.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Spain",
                            visits: 200,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/spain.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Italy",
                            visits: 165,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/italy.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Russia",
                            visits: 152,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/russia.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Norway",
                            visits: 125,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/norway.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }, {
                            country: "Canada",
                            visits: 99,
                            icon: "https://www.amcharts.com/wp-content/uploads/flags/canada.svg",
                            columnSettings: {
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                            }
                        }]),
                        i = a.xAxes.push(am5xy.CategoryAxis.new(t, {
                            categoryField: "country",
                            renderer: am5xy.AxisRendererX.new(t, {
                                minGridDistance: 30
                            }),
                            bullet: function (e, t, a) {
                                return am5xy.AxisBullet.new(e, {
                                    location: .5,
                                    sprite: am5.Picture.new(e, {
                                        width: 24,
                                        height: 24,
                                        centerY: am5.p50,
                                        centerX: am5.p50,
                                        src: a.dataContext.icon
                                    })
                                })
                            }
                        }));
                    i.get("renderer").labels.template.setAll({
                        paddingTop: 20,
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), i.get("renderer").grid.template.setAll({
                        disabled: !0,
                        strokeOpacity: 0
                    }), i.data.setAll(r);
                    var o = a.yAxes.push(am5xy.ValueAxis.new(t, {
                        renderer: am5xy.AxisRendererY.new(t, {})
                    }));
                    o.get("renderer").grid.template.setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                        strokeWidth: 1,
                        strokeOpacity: 1,
                        strokeDasharray: [3]
                    }), o.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    });
                    var s = a.series.push(am5xy.ColumnSeries.new(t, {
                        xAxis: i,
                        yAxis: o,
                        valueYField: "visits",
                        categoryXField: "country"
                    }));
                    s.columns.template.setAll({
                        tooltipText: "{categoryX}: {valueY}",
                        tooltipY: 0,
                        strokeOpacity: 0,
                        templateField: "columnSettings"
                    }), s.columns.template.setAll({
                        strokeOpacity: 0,
                        cornerRadiusBR: 0,
                        cornerRadiusTR: 6,
                        cornerRadiusBL: 0,
                        cornerRadiusTL: 6
                    }), s.data.setAll(r), s.appear(), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget15), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget15.init()
}));
var KTChartsWidget16 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_charts_widget_16_chart");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5xy.XYChart.new(t, {
                            panX: !1,
                            panY: !1,
                            wheelX: "panX",
                            wheelY: "zoomX",
                            layout: t.verticalLayout
                        })),
                        r = (a.get("colors"), [{
                            country: "US",
                            visits: 725
                        }, {
                            country: "UK",
                            visits: 625
                        }, {
                            country: "China",
                            visits: 602
                        }, {
                            country: "Japan",
                            visits: 509
                        }, {
                            country: "Germany",
                            visits: 322
                        }, {
                            country: "France",
                            visits: 214
                        }, {
                            country: "India",
                            visits: 204
                        }, {
                            country: "Spain",
                            visits: 198
                        }, {
                            country: "Italy",
                            visits: 165
                        }, {
                            country: "Russia",
                            visits: 130
                        }, {
                            country: "Norway",
                            visits: 93
                        }, {
                            country: "Canada",
                            visits: 41
                        }]);
                    ! function () {
                        for (var e = 0, t = 0; t < r.length; t++) {
                            var a = r[t].visits;
                            e += a
                        }
                        var i = 0;
                        for (t = 0; t < r.length; t++) i += a = r[t].visits, r[t].pareto = i / e * 100
                    }();
                    var i = a.xAxes.push(am5xy.CategoryAxis.new(t, {
                        categoryField: "country",
                        renderer: am5xy.AxisRendererX.new(t, {
                            minGridDistance: 30
                        })
                    }));
                    i.get("renderer").labels.template.setAll({
                        paddingTop: 10,
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), i.get("renderer").grid.template.setAll({
                        disabled: !0,
                        strokeOpacity: 0
                    }), i.data.setAll(r);
                    var o = a.yAxes.push(am5xy.ValueAxis.new(t, {
                        renderer: am5xy.AxisRendererY.new(t, {})
                    }));
                    o.get("renderer").labels.template.setAll({
                        paddingLeft: 10,
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), o.get("renderer").grid.template.setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                        strokeWidth: 1,
                        strokeOpacity: 1,
                        strokeDasharray: [3]
                    });
                    var s = am5xy.AxisRendererY.new(t, {
                            opposite: !0
                        }),
                        l = a.yAxes.push(am5xy.ValueAxis.new(t, {
                            renderer: s,
                            min: 0,
                            max: 100,
                            strictMinMax: !0
                        }));
                    l.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), s.grid.template.set("forceHidden", !0), l.set("numberFormat", "#'%");
                    var n = a.series.push(am5xy.ColumnSeries.new(t, {
                        xAxis: i,
                        yAxis: o,
                        valueYField: "visits",
                        categoryXField: "country"
                    }));
                    n.columns.template.setAll({
                        tooltipText: "{categoryX}: {valueY}",
                        tooltipY: 0,
                        strokeOpacity: 0,
                        cornerRadiusTL: 6,
                        cornerRadiusTR: 6
                    }), n.columns.template.adapters.add("fill", (function (e, t) {
                        return a.get("colors").getIndex(n.dataItems.indexOf(t.dataItem))
                    }));
                    var d = a.series.push(am5xy.LineSeries.new(t, {
                        xAxis: i,
                        yAxis: l,
                        valueYField: "pareto",
                        categoryXField: "country",
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-dark")),
                        maskBullets: !1
                    }));
                    d.bullets.push((function () {
                        return am5.Bullet.new(t, {
                            locationY: 1,
                            sprite: am5.Circle.new(t, {
                                radius: 5,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-dark"))
                            })
                        })
                    })), n.data.setAll(r), d.data.setAll(r), n.appear(), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget16), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget16.init()
}));
var KTChartsWidget17 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_charts_widget_17_chart");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5percent.PieChart.new(t, {
                        startAngle: 180,
                        endAngle: 360,
                        layout: t.verticalLayout,
                        innerRadius: am5.percent(50)
                    })).series.push(am5percent.PieSeries.new(t, {
                        startAngle: 180,
                        endAngle: 360,
                        valueField: "value",
                        categoryField: "category",
                        alignLabels: !1
                    }));
                    a.labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 13,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500"))
                    }), a.states.create("hidden", {
                        startAngle: 180,
                        endAngle: 180
                    }), a.slices.template.setAll({
                        cornerRadius: 5
                    }), a.ticks.template.setAll({
                        forceHidden: !0
                    }), a.data.setAll([{
                        value: 10,
                        category: "One",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-primary"))
                    }, {
                        value: 9,
                        category: "Two",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-success"))
                    }, {
                        value: 6,
                        category: "Three",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-danger"))
                    }, {
                        value: 5,
                        category: "Four",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-warning"))
                    }, {
                        value: 4,
                        category: "Five",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-info"))
                    }, {
                        value: 3,
                        category: "Six",
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-secondary"))
                    }]), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget17), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget17.init()
}));
var KTChartsWidget18 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_18_chart");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = KTUtil.getCssVariableValue("--bs-gray-900"),
                    r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    i = {
                        series: [{
                            name: "Net Profit",
                            data: [54, 42, 75, 110, 23, 87, 50]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "bar",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: !1,
                                columnWidth: ["28%"],
                                borderRadius: 5,
                                dataLabels: {
                                    position: "top"
                                },
                                startingShape: "flat"
                            }
                        },
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !0,
                            offsetY: -28,
                            style: {
                                fontSize: "13px",
                                colors: [a]
                            }
                        },
                        stroke: {
                            show: !0,
                            width: 2,
                            colors: ["transparent"]
                        },
                        xaxis: {
                            categories: ["QA Analysis", "Marketing", "Web Dev", "Maths", "Front-end Dev", "Physics", "Phylosophy"],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                style: {
                                    colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                    fontSize: "13px"
                                }
                            },
                            crosshairs: {
                                fill: {
                                    gradient: {
                                        opacityFrom: 0,
                                        opacityTo: 0
                                    }
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                    fontSize: "13px"
                                },
                                formatter: function (e) {
                                    return parseInt(e) + "H"
                                }
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        colors: [KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-light-primary")],
                        grid: {
                            borderColor: r,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        }
                    },
                    o = new ApexCharts(e, i);
                setTimeout((function () {
                    o.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget18), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget18.init()
}));
var KTChartsWidget2 = {
    init: function () {
        var e;
        e = document.querySelectorAll(".charts-widget-2"), [].slice.call(e).map((function (e) {
            var t = parseInt(KTUtil.css(e, "height"));
            if (e) {
                var a = e.getAttribute("data-kt-chart-color"),
                    r = KTUtil.getCssVariableValue("--bs-gray-800"),
                    i = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    o = KTUtil.getCssVariableValue("--bs-" + a),
                    s = KTUtil.getCssVariableValue("--bs-light-" + a),
                    l = new ApexCharts(e, {
                        series: [{
                            name: "Net Profit",
                            data: [15, 15, 45, 45, 25, 25, 55, 55, 20, 20, 37]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            },
                            zoom: {
                                enabled: !1
                            },
                            sparkline: {
                                enabled: !0
                            }
                        },
                        plotOptions: {},
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "solid",
                            opacity: 1
                        },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 3,
                            colors: [o]
                        },
                        xaxis: {
                            categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                show: !1,
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                show: !1,
                                position: "front",
                                stroke: {
                                    color: i,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            min: 0,
                            max: 60,
                            labels: {
                                show: !1,
                                style: {
                                    colors: r,
                                    fontSize: "12px"
                                }
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        colors: [s],
                        markers: {
                            colors: [s],
                            strokeColor: [o],
                            strokeWidth: 3
                        }
                    });
                setTimeout((function () {
                    l.render()
                }), 200)
            }
        }))
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget2), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget2.init()
}));
var KTChartsWidget3 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_3");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = KTUtil.getCssVariableValue("--bs-gray-500"),
                    r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    i = KTUtil.getCssVariableValue("--bs-success"),
                    o = KTUtil.getCssVariableValue("--bs-success"),
                    s = new ApexCharts(e, {
                        series: [{
                            name: "Sales",
                            data: [18, 18, 20, 20, 18, 18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 18, 20, 20, 22]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {},
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: .4,
                                opacityTo: 0,
                                stops: [0, 80, 100]
                            }
                        },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 3,
                            colors: [i]
                        },
                        xaxis: {
                            categories: ["", "Apr 02", "Apr 03", "Apr 04", "Apr 05", "Apr 06", "Apr 07", "Apr 08", "Apr 09", "Apr 10", "Apr 11", "Apr 12", "Apr 13", "Apr 14", "Apr 15", "Apr 16", "Apr 17", "Apr 18", ""],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            tickAmount: 6,
                            labels: {
                                rotate: 0,
                                rotateAlways: !0,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                position: "front",
                                stroke: {
                                    color: i,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            tickAmount: 4,
                            max: 24,
                            min: 10,
                            labels: {
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                },
                                formatter: function (e) {
                                    return "$" + Number(e / 10).toFixed(1) + "K"
                                }
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + "K"
                                }
                            }
                        },
                        colors: [o],
                        grid: {
                            borderColor: r,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        },
                        markers: {
                            strokeColor: i,
                            strokeWidth: 3
                        }
                    });
                setTimeout((function () {
                    s.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget3), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget3.init()
}));
var KTChartsWidget4 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_4");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = KTUtil.getCssVariableValue("--bs-gray-500"),
                    r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    i = KTUtil.getCssVariableValue("--bs-primary"),
                    o = KTUtil.getCssVariableValue("--bs-primary"),
                    s = new ApexCharts(e, {
                        series: [{
                            name: "Discounted",
                            data: [34.5, 34.5, 35, 35, 35.5, 35.5, 35, 35, 34.5, 34.5, 34.5, 34.5, 35, 35, 34.5, 35.5, 35.5, 35.5, 35]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {},
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                shadeIntensity: 1,
                                opacityFrom: .4,
                                opacityTo: 0,
                                stops: [0, 80, 100]
                            }
                        },
                        stroke: {
                            curve: "smooth",
                            show: !0,
                            width: 3,
                            colors: [i]
                        },
                        xaxis: {
                            categories: ["", "Apr 02", "Apr 03", "Apr 04", "Apr 05", "Apr 06", "Apr 07", "Apr 08", "Apr 09", "Apr 10", "Apr 11", "Apr 12", "Apr 13", "Apr 14", "Apr 17", "Apr 18", "Apr 19", "Apr 21", ""],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            tickAmount: 6,
                            labels: {
                                rotate: 0,
                                rotateAlways: !0,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                position: "front",
                                stroke: {
                                    color: i,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            max: 36.3,
                            min: 33,
                            tickAmount: 6,
                            labels: {
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                },
                                formatter: function (e) {
                                    return "$" + parseInt(10 * e)
                                }
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + parseInt(10 * e)
                                }
                            }
                        },
                        colors: [o],
                        grid: {
                            borderColor: r,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        },
                        markers: {
                            strokeColor: i,
                            strokeWidth: 3
                        }
                    });
                setTimeout((function () {
                    s.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget4), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget4.init()
}));
var KTChartsWidget5 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_5");
            if (e) {
                var t = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    a = {
                        series: [{
                            data: [15, 12, 10, 8, 7, 4, 3],
                            show: !1
                        }],
                        chart: {
                            type: "bar",
                            height: 350,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: !0,
                                distributed: !0,
                                barHeight: 23
                            }
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        legend: {
                            show: !1
                        },
                        colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA", "#50CDCD", "#3F4254"],
                        xaxis: {
                            categories: ["Phones", "Laptops", "Headsets", "Games", "Keyboardsy", "Monitors", "Speakers"],
                            labels: {
                                formatter: function (e) {
                                    return e + "K"
                                },
                                style: {
                                    colors: KTUtil.getCssVariableValue("--bs-gray-400"),
                                    fontSize: "14px",
                                    fontWeight: "600",
                                    align: "left"
                                }
                            },
                            axisBorder: {
                                show: !1
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: KTUtil.getCssVariableValue("--bs-gray-800"),
                                    fontSize: "14px",
                                    fontWeight: "600"
                                },
                                offsetY: 2,
                                align: "left"
                            }
                        },
                        grid: {
                            borderColor: t,
                            xaxis: {
                                lines: {
                                    show: !0
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: !1
                                }
                            },
                            strokeDashArray: 4
                        }
                    },
                    r = new ApexCharts(e, a);
                setTimeout((function () {
                    r.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget5), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget5.init()
}));
var KTChartsWidget6 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_6");
            if (e) {
                var t = KTUtil.getCssVariableValue("--bs-gray-800"),
                    a = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    r = new ApexCharts(e, {
                        series: [{
                            name: "Sales",
                            data: [15, 12, 10, 8, 7]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "bar",
                            height: 350,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 8,
                                horizontal: !0,
                                distributed: !0,
                                barHeight: 50,
                                dataLabels: {
                                    position: "bottom"
                                }
                            }
                        },
                        dataLabels: {
                            enabled: !0,
                            textAnchor: "start",
                            offsetX: 0,
                            formatter: function (e, t) {
                                return e *= 1e3, wNumb({
                                    thousand: ","
                                }).to(e)
                            },
                            style: {
                                fontSize: "14px",
                                fontWeight: "600",
                                align: "left"
                            }
                        },
                        legend: {
                            show: !1
                        },
                        colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],
                        xaxis: {
                            categories: ["ECR - 90%", "FGI - 82%", "EOQ - 75%", "FMG - 60%", "PLG - 50%"],
                            labels: {
                                formatter: function (e) {
                                    return e + "K"
                                },
                                style: {
                                    colors: t,
                                    fontSize: "14px",
                                    fontWeight: "600",
                                    align: "left"
                                }
                            },
                            axisBorder: {
                                show: !1
                            }
                        },
                        yaxis: {
                            labels: {
                                formatter: function (e, t) {
                                    return Number.isInteger(e) ? e + " - " + parseInt(100 * e / 18).toString() + "%" : e
                                },
                                style: {
                                    colors: t,
                                    fontSize: "14px",
                                    fontWeight: "600"
                                },
                                offsetY: 2,
                                align: "left"
                            }
                        },
                        grid: {
                            borderColor: a,
                            xaxis: {
                                lines: {
                                    show: !0
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: !1
                                }
                            },
                            strokeDashArray: 4
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return e + "K"
                                }
                            }
                        }
                    });
                setTimeout((function () {
                    r.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget6), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget6.init()
}));
var KTChartsWidget7 = function () {
    var e = function (e) {
        var t = document.querySelector(e);
        if (t) {
            var a = parseInt(KTUtil.css(t, "height")),
                r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                i = {
                    series: [{
                        name: "Net Profit",
                        data: data1
                    }, {
                        name: "Revenue",
                        data: data2
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "bar",
                        height: a,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: ["40%"],
                            borderRadius: [6]
                        }
                    },
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    stroke: {
                        show: !0,
                        width: 2,
                        colors: ["transparent"]
                    },
                    xaxis: {
                        categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !1
                        },
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-700"),
                                fontSize: "12px"
                            }
                        }
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-700"),
                                fontSize: "12px"
                            }
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    states: {
                        normal: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        hover: {
                            filter: {
                                type: "none",
                                value: 0
                            }
                        },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: {
                                type: "none",
                                value: 0
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        y: {
                            formatter: function (e) {
                                return "$" + e + " thousands"
                            }
                        }
                    },
                    colors: [KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-light-primary")],
                    grid: {
                        borderColor: r,
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    }
                },
                o = new ApexCharts(t, i),
                s = !1,
                l = document.querySelector(tabSelector);
            !0 === initByDefault && (o.render(), s = !0), l.addEventListener("shown.bs.tab", (function (e) {
                0 == s && (o.render(), s = !0)
            })), (o = new ApexCharts(t, i)).render()
        }
    };
    return {
        init: function () {
            e("#kt_chart_widget_7_tab_1"), e("#kt_chart_widget_7_tab_2"), e("#kt_chart_widget_7_tab_3"), e("#kt_chart_widget_7_tab_4")
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget7), KTUtil.onDOMContentLoaded((function () {}));
var KTChartsWidget8 = function () {
    var e = function (e, t, a, r) {
        var i = document.querySelector(t);
        if (i) {
            var o = parseInt(KTUtil.css(i, "height")),
                s = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                l = {
                    series: [{
                        name: "Social Campaigns",
                        data: a[0]
                    }, {
                        name: "Email Newsletter",
                        data: a[1]
                    }, {
                        name: "TV Campaign",
                        data: a[2]
                    }, {
                        name: "Google Ads",
                        data: a[3]
                    }, {
                        name: "Courses",
                        data: a[4]
                    }, {
                        name: "Radio",
                        data: a[5]
                    }],
                    chart: {
                        fontFamily: "inherit",
                        type: "bubble",
                        height: o,
                        toolbar: {
                            show: !1
                        }
                    },
                    plotOptions: {
                        bubble: {}
                    },
                    stroke: {
                        show: !1,
                        width: 0
                    },
                    legend: {
                        show: !1
                    },
                    dataLabels: {
                        enabled: !1
                    },
                    xaxis: {
                        type: "numeric",
                        tickAmount: 7,
                        min: 0,
                        max: 700,
                        axisBorder: {
                            show: !1
                        },
                        axisTicks: {
                            show: !0,
                            height: 0
                        },
                        labels: {
                            show: !0,
                            trim: !0,
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            }
                        }
                    },
                    yaxis: {
                        tickAmount: 7,
                        min: 0,
                        max: 700,
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px"
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: "12px"
                        },
                        x: {
                            formatter: function (e) {
                                return "Clicks: " + e
                            }
                        },
                        y: {
                            formatter: function (e) {
                                return "$" + e + "K"
                            }
                        },
                        z: {
                            title: "Impression: "
                        }
                    },
                    crosshairs: {
                        show: !0,
                        position: "front",
                        stroke: {
                            color: KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                            width: 1,
                            dashArray: 0
                        }
                    },
                    colors: [KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-warning"), KTUtil.getCssVariableValue("--bs-danger"), KTUtil.getCssVariableValue("--bs-info"), "#43CED7"],
                    fill: {
                        opacity: 1
                    },
                    grid: {
                        borderColor: s,
                        strokeDashArray: 4,
                        padding: {
                            right: 20
                        },
                        yaxis: {
                            lines: {
                                show: !0
                            }
                        }
                    }
                },
                n = !1,
                d = new ApexCharts(i, l),
                c = document.querySelector(e);
            !0 === r && setTimeout((function () {
                d.render(), n = !0
            }), 200), c.addEventListener("shown.bs.tab", (function (e) {
                !1 === n && (d.render(), n = !0)
            }))
        }
    };
    return {
        init: function () {
            e("#kt_chart_widget_8_week_toggle", "#kt_chart_widget_8_week_chart", [[[100, 250, 30]], [[225, 300, 35]], [[300, 350, 25]], [[350, 350, 20]], [[450, 400, 25]], [[550, 350, 35]]], !1), e("#kt_chart_widget_8_month_toggle", "#kt_chart_widget_8_month_chart", [[[125, 300, 40]], [[250, 350, 35]], [[350, 450, 30]], [[450, 250, 25]], [[500, 500, 30]], [[600, 250, 28]]], !0)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTChartsWidget8), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget8.init()
}));
var KTChartsWidget9 = {
    init: function () {
        ! function () {
            var e = document.getElementById("kt_charts_widget_9");
            if (e) {
                var t = parseInt(KTUtil.css(e, "height")),
                    a = KTUtil.getCssVariableValue("--bs-gray-400"),
                    r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                    i = KTUtil.getCssVariableValue("--bs-gray-200"),
                    o = KTUtil.getCssVariableValue("--bs-primary"),
                    s = {
                        series: [{
                            name: "Net Profit",
                            data: [21, 21, 26, 26, 31, 31, 27]
                        }, {
                            name: "Revenue",
                            data: [12, 16, 16, 21, 21, 18, 18]
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: t,
                            toolbar: {
                                show: !1
                            }
                        },
                        plotOptions: {},
                        legend: {
                            show: !1
                        },
                        dataLabels: {
                            enabled: !1
                        },
                        fill: {
                            type: "solid",
                            opacity: 1
                        },
                        stroke: {
                            curve: "smooth"
                        },
                        xaxis: {
                            categories: ["", "06 Sep", "13 Sep", "20 Sep", "27 Sep", "30 Sep", ""],
                            axisBorder: {
                                show: !1
                            },
                            axisTicks: {
                                show: !1
                            },
                            labels: {
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            },
                            crosshairs: {
                                position: "front",
                                stroke: {
                                    color: a,
                                    width: 1,
                                    dashArray: 3
                                }
                            },
                            tooltip: {
                                enabled: !0,
                                formatter: void 0,
                                offsetY: 0,
                                style: {
                                    fontSize: "12px"
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                }
                            }
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: !1,
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function (e) {
                                    return "$" + e + " thousands"
                                }
                            }
                        },
                        crosshairs: {
                            show: !0,
                            position: "front",
                            stroke: {
                                color: KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                                width: 1,
                                dashArray: 0
                            }
                        },
                        colors: [i, o],
                        grid: {
                            borderColor: r,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: !0
                                }
                            }
                        },
                        markers: {
                            colors: [i, o],
                            strokeColor: [KTUtil.getCssVariableValue("--bs-danger"), KTUtil.getCssVariableValue("--bs-warning")],
                            strokeWidth: 3
                        }
                    },
                    l = new ApexCharts(e, s);
                setTimeout((function () {
                    l.render()
                }), 200)
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTChartsWidget9), KTUtil.onDOMContentLoaded((function () {
    KTChartsWidget9.init()
}));
var KTSlidersWidget1 = function () {
    var e = function (e, t) {
        var a = document.querySelector(e);
        if (a && !a.classList.contains("initialized")) {
            var r = parseInt(KTUtil.css(a, "height")),
                i = KTUtil.getCssVariableValue("--bs-primary"),
                o = KTUtil.getCssVariableValue("--bs-light-primary");
            new ApexCharts(a, {
                series: [t],
                chart: {
                    fontFamily: "inherit",
                    height: r,
                    type: "radialBar",
                    sparkline: {
                        enabled: !0
                    }
                },
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 0,
                            size: "45%"
                        },
                        dataLabels: {
                            showOn: "always",
                            name: {
                                show: !1
                            },
                            value: {
                                show: !1
                            }
                        },
                        track: {
                            background: o,
                            strokeWidth: "100%"
                        }
                    }
                },
                colors: [i],
                stroke: {
                    lineCap: "round"
                },
                labels: ["Progress"]
            }).render(), a.classList.add("initialized")
        }
    };
    return {
        init: function () {
            e("#kt_slider_widget_1_chart_1", 76);
            var t = document.querySelector("#kt_sliders_widget_1_slider");
            t && t.addEventListener("slid.bs.carousel", (function (t) {
                1 === t.to && e("#kt_slider_widget_1_chart_2", 55), 2 === t.to && e("#kt_slider_widget_1_chart_3", 25)
            }))
        }
    }
}();
"undefined" != typeof module && (module.exports = KTSlidersWidget1), KTUtil.onDOMContentLoaded((function () {
    KTSlidersWidget1.init()
}));
var KTSlidersWidget3 = function () {
    var e = function (e, t) {
        var a = document.querySelector(e);
        if (a && !a.classList.contains("initialized")) {
            var r = parseInt(KTUtil.css(a, "height")),
                i = KTUtil.getCssVariableValue("--bs-gray-500"),
                o = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                s = KTUtil.getCssVariableValue("--bs-danger"),
                l = KTUtil.getCssVariableValue("--bs-danger");
            new ApexCharts(a, {
                series: [{
                    name: "Sales",
                    data: t
                }],
                chart: {
                    fontFamily: "inherit",
                    type: "area",
                    height: r,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {},
                legend: {
                    show: !1
                },
                dataLabels: {
                    enabled: !1
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: .3,
                        opacityTo: .7,
                        stops: [0, 90, 100]
                    }
                },
                stroke: {
                    curve: "smooth",
                    show: !0,
                    width: 3,
                    colors: [s]
                },
                xaxis: {
                    categories: ["", "Apr 05", "Apr 06", "Apr 07", "Apr 08", "Apr 09", "Apr 11", "Apr 12", "Apr 14", "Apr 15", "Apr 16", "Apr 17", "Apr 18", ""],
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    tickAmount: 6,
                    labels: {
                        rotate: 0,
                        rotateAlways: !0,
                        style: {
                            colors: i,
                            fontSize: "12px"
                        }
                    },
                    crosshairs: {
                        position: "front",
                        stroke: {
                            color: s,
                            width: 1,
                            dashArray: 3
                        }
                    },
                    tooltip: {
                        enabled: !0,
                        formatter: void 0,
                        offsetY: 0,
                        style: {
                            fontSize: "12px"
                        }
                    }
                },
                yaxis: {
                    tickAmount: 4,
                    max: 24,
                    min: 10,
                    labels: {
                        style: {
                            colors: i,
                            fontSize: "12px"
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: "none",
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: "none",
                            value: 0
                        }
                    },
                    active: {
                        allowMultipleDataPointsSelection: !1,
                        filter: {
                            type: "none",
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: "12px"
                    }
                },
                colors: [l],
                grid: {
                    borderColor: o,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: !0
                        }
                    }
                },
                markers: {
                    strokeColor: s,
                    strokeWidth: 3
                }
            }).render(), a.classList.add("initialized")
        }
    };
    return {
        init: function () {
            e("#kt_slider_widget_3_chart_1", [18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 18, 20, 20, 22]);
            var t = document.querySelector("#kt_sliders_widget_3_slider");
            t && t.addEventListener("slid.bs.carousel", (function (t) {
                1 === t.to && e("#kt_slider_widget_3_chart_2", [18, 22, 22, 20, 20, 18, 18, 20, 20, 18, 18, 20, 20, 22])
            }))
        }
    }
}();
"undefined" != typeof module && (module.exports = KTSlidersWidget3), KTUtil.onDOMContentLoaded((function () {
    KTSlidersWidget3.init()
}));



var KTTablesWidget3 = function () {
    var e, t;

    const initFilter = () => {
        const filterGrade = document.querySelector('[data-kt-table-widget-3="filter_grade"]');
        $(filterGrade).on("select2:select", function () {
            const gradeValue = $(filterGrade).val();
            if (gradeValue === "Show All") {
                t.column(1).search("").draw(); // Reset grade filter
            } else {
                t.column(1).search(gradeValue).draw(); // Apply grade filter
            }
        });

        const filterSubject = document.querySelector('[data-kt-table-widget-3="filter_subject"]');
        $(filterSubject).on("select2:select", function () {
            const subjectValue = $(filterSubject).val();
            if (subjectValue === "Show All") {
                t.column(2).search("").draw(); // Reset subject filter
            } else {
                t.column(2).search(subjectValue).draw(); // Apply subject filter
            }
        });

        const filterSubSubject = document.querySelector('[data-kt-table-widget-3="filter_sub_subject"]');
        $(filterSubSubject).on("select2:select", function () {
            const subSubjectValue = $(filterSubSubject).val();
            if (subSubjectValue === "Show All") {
                t.column(3).search("").draw(); // Reset sub-subject filter
            } else {
                t.column(3).search(subSubjectValue).draw(); // Apply sub-subject filter
            }
        });
    };

    const initSearch = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function() {
            const searchTerm = filterSearch.value;
            t.search(searchTerm).draw(); // Apply search term
        });
    };

    return {
        init: function () {
            e = document.querySelector("#kt_widget_table_3");
            if (e) {
                t = $(e).DataTable({
                    info: false,
                    order: [],
                    paging: true, // Enable pagination
                    pageLength: 10, // Optional: Set the number of items per page
                });
            }

            initFilter();
            initSearch();
        }
    };
}();


"undefined" != typeof module && (module.exports = KTTablesWidget3), KTUtil.onDOMContentLoaded((function () {
    KTTablesWidget3.init()
}));
var KTTablesWidget4 = function () {
    var e, t, a;
    const r = () => {
            const e = document.querySelector('[data-kt-table-widget-4="filter_status"]');
            $(e).on("select2:select", (function (e) {
                const a = $(this).val();
                "Show All" === a ? t.search("").draw() : t.search(a).draw()
            }))
        },
        i = [{
            image: "76",
            name: "Go Pro 8",
            description: "Latest  version of Go Pro.",
            cost: "500.00",
            qty: "1",
            total: "500.00",
            stock: "12"
        }, {
            image: "60",
            name: "Bose Earbuds",
            description: "Top quality earbuds from Bose.",
            cost: "300.00",
            qty: "1",
            total: "300.00",
            stock: "8"
        }, {
            image: "211",
            name: "Dry-fit Sports T-shirt",
            description: "Comfortable sportswear.",
            cost: "89.00",
            qty: "1",
            total: "89.00",
            stock: "18"
        }, {
            image: "21",
            name: "Apple Airpod 3",
            description: "Apple's latest earbuds.",
            cost: "200.00",
            qty: "2",
            total: "400.00",
            stock: "32"
        }, {
            image: "83",
            name: "Nike Pumps",
            description: "Apple's latest headphones.",
            cost: "200.00",
            qty: "1",
            total: "200.00",
            stock: "8"
        }],
        o = () => {
            const e = document.querySelectorAll('[data-kt-table-widget-4="expand_row"]'),
                t = [3, 1, 3, 1, 2, 1];
            e.forEach(((e, a) => {
                e.addEventListener("click", (r => {
                    r.stopImmediatePropagation(), r.preventDefault();
                    const o = e.closest("tr"),
                        l = ["isOpen", "border-bottom-0"],
                        n = [];
                    for (var d = 0; d < t[a]; d++) n.push(i[d]);
                    if (o.classList.contains("isOpen")) {
                        for (; o.nextSibling && "subtable_template" === o.nextSibling.getAttribute("data-kt-table-widget-4");) o.nextSibling.parentNode.removeChild(o.nextSibling);
                        o.classList.remove(...l), e.classList.remove("active")
                    } else s(n, o), o.classList.add(...l), e.classList.add("active")
                }))
            }))
        },
        s = (t, r) => {
            t.forEach(((i, o) => {
                const s = a.cloneNode(!0),
                    l = s.querySelector('[data-kt-table-widget-4="template_image"]'),
                    n = s.querySelector('[data-kt-table-widget-4="template_name"]'),
                    d = s.querySelector('[data-kt-table-widget-4="template_description"]'),
                    c = s.querySelector('[data-kt-table-widget-4="template_cost"]'),
                    u = s.querySelector('[data-kt-table-widget-4="template_qty"]'),
                    p = s.querySelector('[data-kt-table-widget-4="template_total"]'),
                    g = s.querySelector('[data-kt-table-widget-4="template_stock"]'),
                    m = l.getAttribute("data-kt-src-path");
                l.setAttribute("src", m + i.image + ".gif"), n.innerText = i.name, d.innerText = i.description, c.innerText = i.cost, u.innerText = i.qty, p.innerText = i.total, i.stock > 10 ? g.innerHTML = '<div class="badge badge-light-success">In Stock</div>' : g.innerHTML = '<div class="badge badge-light-warning">Low Stock</div>', 1 === t.length || t.length;
                e.querySelector("tbody").insertBefore(s, r.nextSibling)
            }))
        },
        l = () => {
            document.querySelectorAll('[data-kt-table-widget-4="subtable_template"]').forEach((e => {
                e.parentNode.removeChild(e)
            }));
            e.querySelectorAll("tbody tr").forEach((e => {
                e.classList.remove("isOpen"), e.querySelector('[data-kt-table-widget-4="expand_row"]') && e.querySelector('[data-kt-table-widget-4="expand_row"]').classList.remove("active")
            }))
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_table_widget_4_table")) && ((() => {
                e.querySelectorAll("tbody tr").forEach((e => {
                    const t = e.querySelectorAll("td"),
                        a = moment(t[1].innerHTML, "DD MMM YYYY, LT").format();
                    e.closest('[data-kt-table-widget-4="subtable_template"]') || (t[1].setAttribute("data-order", a), t[1].innerText = moment(a).fromNow())
                }));
                const r = document.querySelector('[data-kt-table-widget-4="subtable_template"]');
                (a = r.cloneNode(!0)).classList.remove("d-none"), r.parentNode.removeChild(r), (t = $(e).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 3,
                    columnDefs: [{
                        orderable: !1,
                        targets: 0
                    }, {
                        orderable: !1,
                        targets: 6
                    }]
                })).on("draw", (function () {
                    l(), o()
                }))
            })(), document.querySelector('[data-kt-table-widget-4="search"]').addEventListener("keyup", (function (e) {
                t.search(e.target.value).draw()
            })), r(), o())
        }
    }
}();
"undefined" != typeof module && (module.exports = KTTablesWidget4), KTUtil.onDOMContentLoaded((function () {
    KTTablesWidget4.init()
}));
var KTTablesWidget5 = function () {
    var e, t;
    const a = () => {
        const e = document.querySelector('[data-kt-table-widget-5="filter_status"]');
        $(e).on("select2:select", (function (e) {
            const a = $(this).val();
            "Show All" === a ? t.search("").draw() : t.search(a).draw()
        }))
    };
    return {
        init: function () {
            (e = document.querySelector("#kt_table_widget_5_table")) && (e.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"),
                    a = moment(t[2].innerHTML, "MMM DD, YYYY").format();
                t[2].setAttribute("data-order", a)
            })), t = $(e).DataTable({
                info: !1,
                order: [],
                lengthChange: !1,
                pageLength: 6,
                paging: !1,
                columnDefs: [{
                    orderable: !1,
                    targets: 1
                }]
            }), a())
        }
    }
}();
"undefined" != typeof module && (module.exports = KTTablesWidget5), KTUtil.onDOMContentLoaded((function () {
    KTTablesWidget5.init()
}));
var KTMapsWidget1 = {
    init: function () {
        ! function () {
            if ("undefined" != typeof am5) {
                var e = document.getElementById("kt_maps_widget_1_map");
                e && am5.ready((function () {
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var a = t.container.children.push(am5map.MapChart.new(t, {
                            panX: "translateX",
                            panY: "translateY",
                            projection: am5map.geoMercator(),
                            paddingLeft: 0,
                            paddingrIGHT: 0,
                            paddingBottom: 0
                        })),
                        r = a.series.push(am5map.MapPolygonSeries.new(t, {
                            geoJSON: am5geodata_worldLow,
                            exclude: ["AQ"]
                        }));
                    r.mapPolygons.template.setAll({
                        tooltipText: "{name}",
                        toggleKey: "active",
                        interactive: !0,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-300"))
                    }), r.mapPolygons.template.states.create("hover", {
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-success"))
                    }), r.mapPolygons.template.states.create("active", {
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-success"))
                    });
                    var i = a.series.push(am5map.MapPolygonSeries.new(t, {
                        geoJSON: am5geodata_worldLow,
                        include: ["US", "BR", "RU"]
                    }));
                    i.mapPolygons.template.setAll({
                        tooltipText: "{name}",
                        toggleKey: "active",
                        interactive: !0
                    }), am5.ColorSet.new(t, {}), i.mapPolygons.template.set("fill", am5.color(KTUtil.getCssVariableValue("--bs-primary"))), i.mapPolygons.template.states.create("hover", {
                        fill: t.interfaceColors.get("primaryButtonHover")
                    }), i.mapPolygons.template.states.create("active", {
                        fill: t.interfaceColors.get("primaryButtonHover")
                    }), a.chartContainer.get("background").events.on("click", (function () {
                        a.goHome()
                    })), a.appear(1e3, 100)
                }))
            }
        }()
    }
};
"undefined" != typeof module && (module.exports = KTMapsWidget1), KTUtil.onDOMContentLoaded((function () {
    KTMapsWidget1.init()
}));
var KTTimelineWidget1 = function () {
    const e = () => {
        document.querySelectorAll('[data-kt-timeline-widget-1="tab"]').forEach((e => {
            e.addEventListener("shown.bs.tab", (t => {
                "#kt_timeline_widget_1_tab_week" === e.getAttribute("href") && (() => {
                    const e = document.querySelector("#kt_timeline_widget_1_2");
                    if (!e) return;
                    if (e.innerHTML) return;
                    var t = Date.now(),
                        a = e.getAttribute("data-kt-timeline-widget-1-image-root"),
                        r = new vis.DataSet([{
                            id: 1,
                            content: "Research",
                            order: 1
                        }, {
                            id: 2,
                            content: "Phase 2.6 QA",
                            order: 2
                        }, {
                            id: 3,
                            content: "UI Design",
                            order: 3
                        }, {
                            id: 4,
                            content: "Development",
                            order: 4
                        }]),
                        i = new vis.DataSet([{
                            id: 1,
                            group: 1,
                            start: t,
                            end: moment(t).add(7, "days"),
                            content: "Framework",
                            progress: "71%",
                            color: "primary",
                            users: ["avatars/300-6.jpg", "avatars/300-1.jpg"]
                        }, {
                            id: 2,
                            group: 2,
                            start: moment(t).add(7, "days"),
                            end: moment(t).add(14, "days"),
                            content: "Accessibility",
                            progress: "84%",
                            color: "success",
                            users: ["avatars/300-2.jpg"]
                        }, {
                            id: 3,
                            group: 3,
                            start: moment(t).add(3, "days"),
                            end: moment(t).add(20, "days"),
                            content: "Microsites",
                            progress: "69%",
                            color: "danger",
                            users: ["avatars/300-5.jpg", "avatars/300-20.jpg"]
                        }, {
                            id: 4,
                            group: 4,
                            start: moment(t).add(10, "days"),
                            end: moment(t).add(21, "days"),
                            content: "Deployment",
                            progress: "74%",
                            color: "info",
                            users: ["avatars/300-23.jpg", "avatars/300-12.jpg", "avatars/300-9.jpg"]
                        }]),
                        o = {
                            zoomable: !1,
                            moveable: !1,
                            selectable: !1,
                            margin: {
                                item: {
                                    horizontal: 10,
                                    vertical: 35
                                }
                            },
                            showCurrentTime: !1,
                            xss: {
                                disabled: !1,
                                filterOptions: {
                                    whiteList: {
                                        div: ["class", "style"],
                                        img: ["src", "alt"],
                                        a: ["href", "class"]
                                    }
                                }
                            },
                            template: function (e) {
                                const t = e.users;
                                let r = "";
                                return t.forEach((e => {
                                    r += `<div class="symbol symbol-circle symbol-25px"><img src="${a+e}" alt="" /></div>`
                                })), `<div class="rounded-pill bg-light-${e.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">\n                    <div class="position-absolute rounded-pill d-block bg-${e.color} start-0 top-0 h-100 z-index-1" style="width: ${e.progress};"></div>\n        \n                    <div class="d-flex align-items-center position-relative z-index-2">\n                        <div class="symbol-group symbol-hover flex-nowrap me-3">\n                            ${r}\n                        </div>\n        \n                        <a href="#" class="fw-bold text-white text-hover-dark">${e.content}</a>\n                    </div>\n        \n                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">\n                        ${e.progress}\n                    </div>\n                </div>        \n                `
                            },
                            onInitialDrawComplete: function () {
                                const t = e.closest('[data-kt-timeline-widget-1-blockui="true"]'),
                                    a = KTBlockUI.getInstance(t);
                                a.isBlocked() && setTimeout((() => {
                                    a.release()
                                }), 1e3)
                            }
                        };
                    const s = new vis.Timeline(e, i, r, o);
                    s.on("currentTimeTick", (() => {
                        s.off("currentTimeTick")
                    }))
                })(), "#kt_timeline_widget_1_tab_month" === e.getAttribute("href") && (() => {
                    const e = document.querySelector("#kt_timeline_widget_1_3");
                    if (!e) return;
                    if (e.innerHTML) return;
                    var t = Date.now(),
                        a = e.getAttribute("data-kt-timeline-widget-1-image-root"),
                        r = new vis.DataSet([{
                            id: "research",
                            content: "Research",
                            order: 1
                        }, {
                            id: "qa",
                            content: "Phase 2.6 QA",
                            order: 2
                        }, {
                            id: "ui",
                            content: "UI Design",
                            order: 3
                        }, {
                            id: "dev",
                            content: "Development",
                            order: 4
                        }]),
                        i = new vis.DataSet([{
                            id: 1,
                            group: "research",
                            start: t,
                            end: moment(t).add(2, "months"),
                            content: "Tags",
                            progress: "79%",
                            color: "primary",
                            users: ["avatars/300-6.jpg", "avatars/300-1.jpg"]
                        }, {
                            id: 2,
                            group: "qa",
                            start: moment(t).add(.5, "months"),
                            end: moment(t).add(5, "months"),
                            content: "Testing",
                            progress: "64%",
                            color: "success",
                            users: ["avatars/300-2.jpg"]
                        }, {
                            id: 3,
                            group: "ui",
                            start: moment(t).add(2, "months"),
                            end: moment(t).add(6.5, "months"),
                            content: "Media",
                            progress: "82%",
                            color: "danger",
                            users: ["avatars/300-5.jpg", "avatars/300-20.jpg"]
                        }, {
                            id: 4,
                            group: "dev",
                            start: moment(t).add(4, "months"),
                            end: moment(t).add(7, "months"),
                            content: "Plugins",
                            progress: "58%",
                            color: "info",
                            users: ["avatars/300-23.jpg", "avatars/300-12.jpg", "avatars/300-9.jpg"]
                        }]),
                        o = {
                            zoomable: !1,
                            moveable: !1,
                            selectable: !1,
                            margin: {
                                item: {
                                    horizontal: 10,
                                    vertical: 35
                                }
                            },
                            showCurrentTime: !1,
                            xss: {
                                disabled: !1,
                                filterOptions: {
                                    whiteList: {
                                        div: ["class", "style"],
                                        img: ["src", "alt"],
                                        a: ["href", "class"]
                                    }
                                }
                            },
                            template: function (e) {
                                const t = e.users;
                                let r = "";
                                return t.forEach((e => {
                                    r += `<div class="symbol symbol-circle symbol-25px"><img src="${a+e}" alt="" /></div>`
                                })), `<div class="rounded-pill bg-light-${e.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">\n                    <div class="position-absolute rounded-pill d-block bg-${e.color} start-0 top-0 h-100 z-index-1" style="width: ${e.progress};"></div>\n        \n                    <div class="d-flex align-items-center position-relative z-index-2">\n                        <div class="symbol-group symbol-hover flex-nowrap me-3">\n                            ${r}\n                        </div>\n        \n                        <a href="#" class="fw-bold text-white text-hover-dark">${e.content}</a>\n                    </div>\n        \n                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">\n                        ${e.progress}\n                    </div>\n                </div>        \n                `
                            },
                            onInitialDrawComplete: function () {
                                const t = e.closest('[data-kt-timeline-widget-1-blockui="true"]'),
                                    a = KTBlockUI.getInstance(t);
                                a.isBlocked() && setTimeout((() => {
                                    a.release()
                                }), 1e3)
                            }
                        };
                    const s = new vis.Timeline(e, i, r, o);
                    s.on("currentTimeTick", (() => {
                        s.off("currentTimeTick")
                    }))
                })()
            }))
        }))
    };
    return {
        init: function () {
            (() => {
                const e = document.querySelector("#kt_timeline_widget_1_1");
                if (!e) return;
                if (e.innerHTML) return;
                var t = Date.now(),
                    a = e.getAttribute("data-kt-timeline-widget-1-image-root"),
                    r = new vis.DataSet([{
                        id: "research",
                        content: "Research",
                        order: 1
                    }, {
                        id: "qa",
                        content: "Phase 2.6 QA",
                        order: 2
                    }, {
                        id: "ui",
                        content: "UI Design",
                        order: 3
                    }, {
                        id: "dev",
                        content: "Development",
                        order: 4
                    }]),
                    i = new vis.DataSet([{
                        id: 1,
                        group: "research",
                        start: t,
                        end: moment(t).add(1.5, "hours"),
                        content: "Meeting",
                        progress: "60%",
                        color: "primary",
                        users: ["avatars/300-6.jpg", "avatars/300-1.jpg"]
                    }, {
                        id: 2,
                        group: "qa",
                        start: moment(t).add(1, "hours"),
                        end: moment(t).add(2, "hours"),
                        content: "Testing",
                        progress: "47%",
                        color: "success",
                        users: ["avatars/300-2.jpg"]
                    }, {
                        id: 3,
                        group: "ui",
                        start: moment(t).add(30, "minutes"),
                        end: moment(t).add(2.5, "hours"),
                        content: "Landing page",
                        progress: "55%",
                        color: "danger",
                        users: ["avatars/300-5.jpg", "avatars/300-20.jpg"]
                    }, {
                        id: 4,
                        group: "dev",
                        start: moment(t).add(1.5, "hours"),
                        end: moment(t).add(3, "hours"),
                        content: "Products module",
                        progress: "75%",
                        color: "info",
                        users: ["avatars/300-23.jpg", "avatars/300-12.jpg", "avatars/300-9.jpg"]
                    }]),
                    o = {
                        zoomable: !1,
                        moveable: !1,
                        selectable: !1,
                        margin: {
                            item: {
                                horizontal: 10,
                                vertical: 35
                            }
                        },
                        showCurrentTime: !1,
                        xss: {
                            disabled: !1,
                            filterOptions: {
                                whiteList: {
                                    div: ["class", "style"],
                                    img: ["src", "alt"],
                                    a: ["href", "class"]
                                }
                            }
                        },
                        template: function (e) {
                            const t = e.users;
                            let r = "";
                            return t.forEach((e => {
                                r += `<div class="symbol symbol-circle symbol-25px"><img src="${a+e}" alt="" /></div>`
                            })), `<div class="rounded-pill bg-light-${e.color} d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">\n                    <div class="position-absolute rounded-pill d-block bg-${e.color} start-0 top-0 h-100 z-index-1" style="width: ${e.progress};"></div>\n        \n                    <div class="d-flex align-items-center position-relative z-index-2">\n                        <div class="symbol-group symbol-hover flex-nowrap me-3">\n                            ${r}\n                        </div>\n        \n                        <a href="#" class="fw-bold text-white text-hover-dark">${e.content}</a>\n                    </div>\n        \n                    <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">\n                        ${e.progress}\n                    </div>\n                </div>        \n                `
                        },
                        onInitialDrawComplete: function () {
                            const t = e.closest('[data-kt-timeline-widget-1-blockui="true"]'),
                                a = KTBlockUI.getInstance(t);
                            a.isBlocked() && setTimeout((() => {
                                a.release()
                            }), 1e3)
                        }
                    };
                const s = new vis.Timeline(e, i, r, o);
                s.on("currentTimeTick", (() => {
                    s.off("currentTimeTick")
                }))
            })(), document.querySelectorAll('[data-kt-timeline-widget-1-blockui="true"]').forEach((e => {
                new KTBlockUI(e, {
                    overlayClass: "bg-body"
                }).block()
            })), e()
        }
    }
}();
"undefined" != typeof module && (module.exports = KTTimelineWidget1), KTUtil.onDOMContentLoaded((function () {
    KTTimelineWidget1.init()
}));
var KTTimelineWidget2 = function () {
    var e = function (e, t, a, r) {
        var i = document.querySelector(t);
        if (i) {
            parseInt(KTUtil.css(i, "height"));
            var o = {
                    series: a,
                    chart: {
                        type: "donut",
                        width: 200
                    },
                    colors: [KTUtil.getCssVariableValue("--bs-info"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-danger")],
                    dataLabels: {
                        style: {
                            fontSize: "10px"
                        }
                    },
                    stroke: {
                        width: 0
                    },
                    labels: ["Sales", "Sales", "Sales", "Sales"],
                    legend: {
                        show: !1
                    },
                    fill: {
                        type: "false"
                    }
                },
                s = new ApexCharts(i, o),
                l = !1,
                n = document.querySelector(e);
            !0 === r && (s.render(), l = !0), n.addEventListener("shown.bs.tab", (function (e) {
                0 == l && (s.render(), l = !0)
            }))
        }
    };
    return {
        init: function () {
            e("#kt_timeline_widget_2_tab_1", "#kt_timeline_widget_2_chart_1", [10.6, 100, 6.8, 2], !0), e("#kt_timeline_widget_2_tab_2", "#kt_timeline_widget_2_chart_2", [70, 13, 11, 2], !1)
        }
    }
}();
"undefined" != typeof module && (module.exports = KTTimelineWidget2), KTUtil.onDOMContentLoaded((function () {
    KTTimelineWidget2.init()
}));
