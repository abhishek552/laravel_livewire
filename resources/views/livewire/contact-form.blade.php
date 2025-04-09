<div class="form-container">
    <h2>Contact Us</h2>

    @if ($success)
        <div class="success-message">
            ✅ Thank you! Contact form has been submitted.
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label>Name</label>
            <input type="text" wire:model.live="name" placeholder="Your name">
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" wire:model.live="email" placeholder="you@example.com">
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Subject</label>
            <input type="text" wire:model.live="subject" placeholder="Subject">
            @error('subject') <small class="error">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea wire:model.live="message" rows="4" placeholder="Write your message here..."></textarea>
            @error('message') <small class="error">{{ $message }}</small> @enderror
        </div>

        <button type="submit">Send Message</button>
    </form>
</div>
