<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Market Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-4">
        <h2 class="mb-3">魚市場データ</h2>
        <p class="mb-4">
            ※水揚日が空欄の魚種は、発行日当日の水揚げです。 ※魚体組成が不明の魚種は、「魚体組成（％）」はゼロ表示になっており、価格は「大」区分に表示されています。 ※高値・中値・安値が不明の魚種は、高値・中値・安値に同じ値が表示されています。
        </p>
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th rowspan="2" scope="col">市場</th>
                    <th rowspan="2" scope="col">水揚日</th>
                    <th rowspan="2" scope="col">魚種</th>
                    <th rowspan="2" scope="col">数量 (t)</th>
                    <th colspan="4" scope="col">魚体組成 (%)</th> <!-- New columns for fish_body_composition -->
                    <th colspan="3" scope="col">価格 (大)</th>
                    <th colspan="3" scope="col">価格 (中)</th>
                    <th colspan="3" scope="col">価格 (小)</th>
                    <th colspan="3" scope="col">追加価格</th>
                </tr>
                <tr>
                    <th scope="col">大</th>
                    <th scope="col">中</th>
                    <th scope="col">小</th>
                    <th scope="col">極小</th>
                    <th scope="col">高値</th>
                    <th scope="col">中値</th>
                    <th scope="col">安値</th>
                    <th scope="col">高値</th>
                    <th scope="col">中値</th>
                    <th scope="col">安値</th>
                    <th scope="col">高値</th>
                    <th scope="col">中値</th>
                    <th scope="col">安値</th>
                    <th scope="col">高値</th>
                    <th scope="col">中値</th>
                    <th scope="col">安値</th>
                </tr>
            </thead>
            <tbody id="fishDataTable">
                <!-- Data will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        

        // Function to populate the table
        function populateTable(data) {
            const tbody = document.getElementById('fishDataTable');
            tbody.innerHTML = ''; // Clear existing rows

            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.market}</td>
                    <td>${item.date}</td>
                    <td>${item.fishType}</td>
                    <td>${item.quantity}</td>
                    <td>${item.prices.fish_body_composition.large ?? '-'}</td> <!-- Fish Body Composition -->
                    <td>${item.prices.fish_body_composition.medium ?? '-'}</td>
                    <td>${item.prices.fish_body_composition.small ?? '-'}</td>
                    <td>${item.prices.fish_body_composition.vary_small ?? '-'}</td>
                    <td>${item.prices.large.high ?? '-'}</td>
                    <td>${item.prices.large.medium ?? '-'}</td>
                    <td>${item.prices.large.low_price ?? '-'}</td>
                    <td>${item.prices.medium.high ?? '-'}</td>
                    <td>${item.prices.medium.middle_value ?? '-'}</td>
                    <td>${item.prices.medium.low_price ?? '-'}</td>
                    <td>${item.prices.small.high ?? '-'}</td>
                    <td>${item.prices.small.middle_value ?? '-'}</td>
                    <td>${item.prices.small.low_price ?? '-'}</td>
                    <td>${item.additional_metrics.high ?? '-'}</td> <!-- Additional Metrics -->
                    <td>${item.additional_metrics.middle_value ?? '-'}</td>
                    <td>${item.additional_metrics.low_price ?? '-'}</td>
                `;
                tbody.appendChild(row);
            });
        }

    
        fetch('https://aquaticadventureshop.com/fetch-data-api-data')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    populateTable(data.data);
                } else {
                    console.error('Failed to fetch data');
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    
    </script>
</body>
</html>