<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

trait Logger
{
    /**
     * Log an informational message.
     *
     * @param string $message
     * @param array $data
     * @return void
     */
    public function logInfo(string $message, array $data = []): void
    {
        Log::info($message, $data);
    }

    /**
     * Log a warning message.
     *
     * @param string $message
     * @param array $data
     * @return void
     */
    public function logWarning(string $message, array $data = []): void
    {
        Log::warning($message, $data);
    }

    /**
     * Log an error message.
     *
     * @param string $message
     * @param array $data
     * @return void
     */
    public function logError(string $message, array $data = []): void
    {
        Log::error($message, $data);
    }

    /**
     * Format the log message with user information if available.
     *
     * @param string $message
     * @return string
     */
    private function formatLogMessage(string $message): string
    {
        $user = Auth::check() ? 'User ID: ' . Auth::id() : 'Guest';
        return "[{$user}] {$message}";
    }
}
