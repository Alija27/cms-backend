<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateFeeForTopStudent
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $studentId, public int $position)
    {
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $student = Student::find($this->studentId);
        $user = $student->user;
        $account = Account::where("user_id", $user->id)->first();
        $fee = $account->total_fees;
        $paid_fee = $account->paid_fees;
        if($this->position == 1){
            $account->update([
                "paid_fees"=> $paid_fee + ($fee * 0.1),
            ]);
        } else if($this->position == 2){
            $fee = $user->account->total_fees;
            $account->update([
                "paid_fees"=> $paid_fee + ($fee * 0.05),
            ]);
        } else if($this->position == 3){
            $fee = $user->account->total_fees;
            $account->update([
                "paid_fees"=> $paid_fee + ($fee * 0.03),
            ]);
        }
    }
}
