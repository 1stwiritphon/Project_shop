<!DOCTYPE html>
<html>

<head>
    <title>Generate Excel</title>
    <!-- Include the necessary JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
</head>

<body>
    <button onclick="generateExcel()">Generate Excel</button>

    <script>
        function generateExcel() {
            // Retrieve data from SQL using AJAX
            $.ajax({
                url: 'get-cut-data.php', // Replace with the URL that points to the PHP script for retrieving SQL data
                method: 'GET', // Or use the desired HTTP method (e.g., GET, POST)
                success: function(response) {
                    var data = response; // No need to parse the response since it's already an array of objects

                    // Create a Workbook
                    var wb = XLSX.utils.book_new();

                    // Create a Worksheet
                    var ws = XLSX.utils.json_to_sheet(data);

                    // Add the Worksheet to the Workbook
                    XLSX.utils.book_append_sheet(wb, ws, "Sheet1");

                    // Save the Workbook as an Excel file
                    var wbout = XLSX.write(wb, {
                        bookType: 'xlsx',
                        type: 'binary'
                    });

                    // Convert the binary data to a Blob
                    var blob = new Blob([s2ab(wbout)], {
                        type: 'application/octet-stream'
                    });

                    // Download the Excel file
                    saveAs(blob, 'sales_report.xlsx');
                }
            });
        }


        // Convert a String to an ArrayBuffer
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
            return buf;
        }
    </script>

</body>

</html>