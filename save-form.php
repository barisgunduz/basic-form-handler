<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    date_default_timezone_set("Europe/Istanbul");

    $timestamp = date("Y-m-d H:i:s");
    $formTypeRaw = isset($_POST['form_type']) ? $_POST['form_type'] : 'generic_txt';

    // Format ayrımı: contact_txt vs contact_csv
    $parts = explode('_', $formTypeRaw);
    $formType = $parts[0];
    $format = isset($parts[1]) ? strtolower($parts[1]) : 'txt';

    $dirPath = __DIR__ . "/form-records";
    if (!file_exists($dirPath)) {
        mkdir($dirPath, 0777, true);
    }

    if ($format === "csv") {
        $filePath = $dirPath . "/" . $formType . "-records.csv";
        $headers = [];
        $values = [];
        foreach ($_POST as $key => $value) {
            if ($key === 'form_type') continue;
            $headers[] = ucfirst($key);
            $values[] = str_replace(["\r", "\n", ","], " ", strip_tags(trim($value)));
        }
        if (!file_exists($filePath)) {
            file_put_contents($filePath, implode(",", $headers) . "\n", FILE_APPEND | LOCK_EX);
        }
        file_put_contents($filePath, implode(",", $values) . "\n", FILE_APPEND | LOCK_EX);
        echo "Form has been saved (CSV).";
    } else {
        $filePath = $dirPath . "/" . $formType . "-records.txt";
        $content = "Submission Time: " . $timestamp . "\n";
        foreach ($_POST as $key => $value) {
            if ($key === 'form_type') continue;
            $content .= ucfirst($key) . ": " . strip_tags(trim($value)) . "\n";
        }
        $content .= str_repeat("-", 40) . "\n\n";
        file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
        echo "Form has been saved (TXT).";
    }
} else {
    echo "Invalid request.";
}
?>