<div>
    <form wire:submit.prevent="submit">
        <input type="file" wire:model="text_from_writing">
        <button type="submit">แปลงภาพเป็นข้อความ</button>
    </form>

    @if(session()->has('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    @if($output_text)
        <h3>ผลลัพธ์ OCR:</h3>
        <p>{{ $output_text }}</p>
    @endif
</div>
