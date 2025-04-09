<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactFormSubmission;
use App\Jobs\SendContactFormEmail;

class ContactForm extends Component
{
    public $name, $email, $subject, $message;
    public $success = false;

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|min:3',
        'subject' => 'required|string|min:3',
        'message' => 'required|string|min:3',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validated = $this->validate();

        $submitData= ContactFormSubmission::create($validated);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'id'=>$submitData->id,
        ];
    
        SendContactFormEmail::dispatch($data);

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->success = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
