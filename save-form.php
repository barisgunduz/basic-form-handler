<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    date_default_timezone_set("Europe/Istanbul");

    $timestamp = date("Y-m-d H:i:s");
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : 'general';
    $format = 'txt';

    if (str_ends_with($formType, '_csv')) {
        $format = 'csv';
        $formType = substr($formType, 0, -4);
    } elseif (str_ends_with($formType, '_txt')) {
        $formType = substr($formType, 0, -4);
    }

    $dirPath = __DIR__ . "/form-records";
    if (!file_exists($dirPath)) {
        mkdir($dirPath, 0777, true);
    }

    $filePath = $dirPath . "/" . $formType . "-records." . $format;

    if ($format === 'csv') {
        $fp = fopen($filePath, 'a');
        if (filesize($filePath) === 0) {
            fputcsv($fp, array_keys(array_filter($_POST, fn($k) => $k !== 'form_type', ARRAY_FILTER_USE_KEY)));
        }
        fputcsv($fp, array_values(array_filter($_POST, fn($k) => $k !== 'form_type', ARRAY_FILTER_USE_KEY)));
        fclose($fp);
    } else {
        $content = "Submission Time: " . $timestamp . "\n";
        foreach ($_POST as $key => $value) {
            if ($key === 'form_type') continue;
            $content .= ucfirst($key) . ": " . strip_tags(trim($value)) . "\n";
        }
        $content .= str_repeat("-", 40) . "\n\n";
        file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
    }

    echo "Form submitted successfully.";
} else {
    echo "Invalid request.";
}
?>
