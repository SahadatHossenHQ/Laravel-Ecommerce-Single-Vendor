<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Retrieve mail configurations from your settings or any other dynamic source
        $mailHost = setting('MAIL_HOST', 'smtp.mailgun.org');
        $mailPort = setting('MAIL_PORT', 587);
        $mailEncryption = setting('MAIL_ENCRYPTION', 'tls');
        $mailUsername = setting('MAIL_USERNAME');
        $mailPassword = setting('MAIL_PASSWORD');

        // Set the mail configurations dynamically
        config([
            'mail.default' => env('MAIL_MAILER', 'smtp'),
            'mail.mailers.smtp.transport' => 'smtp',
            'mail.mailers.smtp.host' => $mailHost,
            'mail.mailers.smtp.port' => $mailPort,
            'mail.mailers.smtp.encryption' => $mailEncryption,
            'mail.mailers.smtp.username' => $mailUsername,
            'mail.mailers.smtp.password' => $mailPassword,
            'mail.from.address' => setting('MAIL_FROM_ADDRESS', 'hello@example.com'),
            'mail.from.name' => setting('MAIL_FROM_NAME', 'Example'),
            'mail.markdown.theme' => 'default',
            'mail.markdown.paths' => [resource_path('views/vendor/mail')],
        ]);

        // Optionally, you can also set other mailer configurations based on your needs

        // Example: Set the log channel for the 'log' mailer
        config([
            'mail.mailers.log.channel' => env('MAIL_LOG_CHANNEL'),
        ]);
    }
}
