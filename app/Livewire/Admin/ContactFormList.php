<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactFormSubmission;
use Livewire\WithPagination;

class ContactFormList extends Component
{
    use WithPagination;

    public $search = '';
    protected $updatesQueryString = ['search'];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $contacts = ContactFormSubmission::query()
            ->when($this->search, function ($query) {
                $searchTerm = '%' . $this->search . '%';
                $query->where('email', 'like', $searchTerm)
                      ->orWhere('subject', 'like', $searchTerm);
            })
            ->latest()
            ->paginate(10);
        
        return view('livewire.admin.contact-form-list', [
            'contacts' => $contacts
        ])->layout('layouts.app');
    }
}
