<?php
require_once __DIR__ . '/../../../Model/Home.php';

class ChartData extends Model
{
    public function getChartData()
    {
        $query = "SELECT DATE(post_created_at) as date, COUNT(*) as earnings,SUM(post_like) as expense FROM posts WHERE post_created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() GROUP BY DATE(post_created_at) ORDER BY DATE(post_created_at)";
        $result = $this->db->query($query);
        if (!$result) {
            // Jika query gagal, berikan log error atau tangani dengan cara lain
            error_log("Query error: " . $this->db->error);
            return [
                'dates' => [],
                'earnings' => [],
                'expenses' => []
            ];
        }

        $data = [
            'dates' => [],
            'earnings' => [],
            'expenses' => []
        ];

        while ($row = $result->fetch_assoc()) {
            $data['dates'][] = $row['date'];
            $data['earnings'][] = (int)$row['earnings'];
            $data['expenses'][] = (int)$row['expense'];
        }
        return $data;
    }
}

// Inisialisasi objek dan ambil data chart
$chartData = new ChartData();
$data = $chartData->getChartData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<div id="chart"></div>
<script>
    $(function() {
        // Data dari PHP
        var data = {
            dates: <?php echo json_encode($data['dates']); ?>,
            earnings: <?php echo json_encode($data['earnings']); ?>,
            expenses: <?php echo json_encode($data['expenses']); ?>
        };

        // =====================================
        // Profit Chart
        // =====================================
        var chart = {
            series: [{
                    name: "Earnings this month:",
                    data: data.earnings
                }, // Earnings
                {
                    name: "Expense this month:",
                    data: data.expenses
                }, // Expenses
            ],
            chart: {
                type: "bar",
                height: 352,
                offsetX: -15,
                toolbar: {
                    show: true
                },
                foreColor: "#adb0bb",
                fontFamily: 'inherit',
                sparkline: {
                    enabled: false
                },
            },
            colors: ["#5D87FF", "#49BEFF"],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "35%",
                    borderRadius: [6],
                    borderRadiusApplication: 'end',
                    borderRadiusWhenStacked: 'all',
                },
            },
            markers: {
                size: 0
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: false
            },
            grid: {
                borderColor: "rgba(0,0,0,0.1)",
                strokeDashArray: 3,
                xaxis: {
                    lines: {
                        show: false
                    }
                },
            },
            xaxis: {
                type: "category",
                categories: data.dates, // Tanggal dari PHP
                labels: {
                    style: {
                        cssClass: "grey--text lighten-2--text fill-color"
                    },
                },
            },
            yaxis: {
                show: true,
                min: 0,
                labels: {
                    style: {
                        cssClass: "grey--text lighten-2--text fill-color"
                    },
                },
            },
            stroke: {
                show: true,
                width: 3,
                lineCap: "butt",
                colors: ["transparent"],
            },
            tooltip: {
                theme: "light"
            },
            responsive: [{
                    breakpoint: 1400,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: [5]
                            }
                        }
                    },
                },
                {
                    breakpoint: 600,
                    options: {
                        plotOptions: {
                            bar: {
                                borderRadius: [3]
                            }
                        }
                    },
                },
            ],
        };

        // Render chart
        var chartInstance = new ApexCharts(document.querySelector("#chart"), chart);
        chartInstance.render();
    });
</script>
<script src="./../libs/apexcharts/dist/apexcharts.min.js"></script>