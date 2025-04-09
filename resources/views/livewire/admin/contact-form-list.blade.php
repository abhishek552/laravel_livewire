<div class="admin-container">
    <h2>Contact Submissions</h2>

    <input type="text" wire:model.live="search" placeholder="Search by email or subject..." class="search-input">

    <table class="contact-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $index => $contact)
                <tr>
                    <td>{{ $contacts->firstItem() + $index }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->subject }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($contact->message, 40) }}</td>
                    <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No submissions found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination-wrapper">
        {{ $contacts->links('pagination::bootstrap-5') }}
    </div>
</div>

