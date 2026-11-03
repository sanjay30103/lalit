<?php
/**
 * Contact form handler - validates, stores to storage/enquiries.csv, optionally emails.
 * Returns [errors[], old[]]; redirects on success (PRG pattern).
 */
declare(strict_types=1);

function handle_enquiry(array $site, array $requirements): array
{
    $errors = [];
    $old = [
        'name'        => trim((string) ($_POST['name'] ?? '')),
        'phone'       => preg_replace('/\D/', '', (string) ($_POST['phone'] ?? '')),
        'requirement' => (string) ($_POST['requirement'] ?? ''),
        'location'    => trim((string) ($_POST['location'] ?? '')),
        'budget'      => trim((string) ($_POST['budget'] ?? '')),
        'message'     => trim((string) ($_POST['message'] ?? '')),
    ];

    // Honeypot (bots fill hidden "website" field)
    if (!empty($_POST['website'])) {
        header('Location: contact.php?sent=1#enquiry');
        exit;
    }

    if (!hash_equals($_SESSION['csrf'] ?? '', (string) ($_POST['csrf'] ?? ''))) {
        $errors['form'] = 'Session expired. Please submit the form again.';
    }

    if (mb_strlen($old['name']) < 2 || mb_strlen($old['name']) > 80) {
        $errors['name'] = 'Please enter your name.';
    }
    if (strlen($old['phone']) === 12 && str_starts_with($old['phone'], '91')) {
        $old['phone'] = substr($old['phone'], 2);
    }
    if (!preg_match('/^[6-9]\d{9}$/', $old['phone'])) {
        $errors['phone'] = 'Please enter a valid 10-digit mobile number.';
    }
    if (!isset($requirements[$old['requirement']])) {
        $errors['requirement'] = 'Please choose what you need.';
    }
    if (mb_strlen($old['message']) > 1000) {
        $errors['message'] = 'Message is too long (max 1000 characters).';
    }

    if ($errors) {
        return [$errors, $old];
    }

    // Save to CSV
    $dir = __DIR__ . '/../storage';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    $file = $dir . '/enquiries.csv';
    $isNew = !is_file($file);
    $fh = fopen($file, 'a');
    if ($fh) {
        flock($fh, LOCK_EX);
        if ($isNew) {
            fputcsv($fh, ['date', 'name', 'phone', 'requirement', 'location', 'budget', 'message', 'ip'], ',', '"', '');
        }
        $safe = static fn(string $v): string => preg_match('/^[=+\-@]/', $v) ? "'" . $v : $v; // CSV-injection guard
        fputcsv($fh, [
            date('Y-m-d H:i'),
            $safe($old['name']),
            $old['phone'],
            $requirements[$old['requirement']],
            $safe($old['location']),
            $safe($old['budget']),
            $safe($old['message']),
            $_SERVER['REMOTE_ADDR'] ?? '',
        ], ',', '"', '');
        flock($fh, LOCK_UN);
        fclose($fh);
    }

    // Email notification (works when the host has mail() configured)
    if (!empty($site['mail_enquiries']) && function_exists('mail')) {
        $body = "New enquiry from website\n\n"
            . "Name: {$old['name']}\nPhone: {$old['phone']}\n"
            . "Need: {$requirements[$old['requirement']]}\n"
            . "Location: {$old['location']}\nBudget: {$old['budget']}\n\n{$old['message']}\n";
        @mail($site['email'], 'Website enquiry: ' . $old['name'], $body, 'Content-Type: text/plain; charset=UTF-8');
    }

    $_SESSION['last_enquiry'] = ['name' => $old['name'], 'requirement' => $requirements[$old['requirement']]];
    unset($_SESSION['csrf']);
    header('Location: contact.php?sent=1#enquiry');
    exit;
}
