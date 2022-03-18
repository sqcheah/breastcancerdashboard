<?php
$file = "mamogram.csv";
try {
        if (!file_exists($file)) {
                throw new Exception('File not found.');
        }
        if (($handle = fopen($file, "r")) === false) {
                throw new Exception("can't open the file.");
        }

        $csv_headers = fgetcsv($handle);
        $csv_json = array();
        while ($row = fgetcsv($handle)) {
                $csv_json[] = array_combine($csv_headers, $row);
        }

        fclose($handle);
} catch (Exception $e) {
        echo $e->getMessage();
}
// echo  '{"draw":1,"recordsTotal":'.$rowCount.',"recordsFiltered":'.$rowCount.',"data":'.json_encode($csv_json).'}';
echo '{"data":' . json_encode($csv_json) . '}';
    //https://datatables.net/forums/discussion/39397/i-am-trying-to-implement-the-basic-json-data-source-its-not-working
//https://datatables.net/manual/server-side#Returned-data
//https://stackoverflow.com/questions/41723555/showing-0-to-0-of-0-entries-filtered-from-nan-total-entries