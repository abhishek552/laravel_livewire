<?php

namespace App\Jobs;

use App\Mail\ContactFormMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendContactFormEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3; 
    public $timeout = 30; 
    protected $formData;

    /**
     * Create a new job instance.
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            
            Mail::to('admin21@yopmail.com')->send(new ContactFormMail($this->formData));

            // Prepare API payload
            $payload = [
                'title' => $this->formData['subject'] ?? 'No Subject',
                'body' => $this->formData['message'] ?? '',
                'userId' => $this->formData['id'] ?? 1,
            ];

            $response = Http::withOptions([
                'verify' => false
            ])->post('https://jsonplaceholder.typicode.com/posts', $payload);

            if ($response->successful()) {
                \Log::info('API call successful', $response->json());
            } else {
                \Log::error('API call failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                throw new \Exception('API request failed with status: ' . $response->status());
            }

        } catch (\Throwable $e) {
            \Log::error('SendContactFormEmail job error: ' . $e->getMessage(), [
                'exception' => $e,
                'data' => $this->formData
            ]);

            throw $e;
        }
    }
}
