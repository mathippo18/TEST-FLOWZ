<?php

class Mailer
{
    public static function send(string $to, string $subject, string $message, ?string $attachmentPath = null)
    {
        $headers = "From: noreply@sprinteur.local\r\n";
        $boundary = uniqid();

        if ($attachmentPath && file_exists($attachmentPath)) {
            $filename = basename($attachmentPath);
            $fileContent = chunk_split(base64_encode(file_get_contents($attachmentPath)));

            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

            $body = "--$boundary\r\n";
            $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n\r\n";
            $body .= $message . "\r\n";
            $body .= "--$boundary\r\n";
            $body .= "Content-Type: image/jpeg; name=\"$filename\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment; filename=\"$filename\"\r\n\r\n";
            $body .= $fileContent . "\r\n";
            $body .= "--$boundary--";

        } else {
            $headers .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
            $body = $message;
        }

        mail($to, $subject, $body, $headers);
    }
}
