<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Otp;
use Carbon\Carbon;

class DeleteExpiredOtps extends Command
{
    protected $signature = 'otp:delete-expired';
    protected $description = 'Delete expired OTP codes from the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Find and delete expired OTP codes
        Otp::where('expires_at', '<', Carbon::now())->delete();

        $this->info('Expired OTP codes have been deleted.');
    }
}
