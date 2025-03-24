<?php

namespace App\Livewire\Lab;

use Livewire\Component;
use Livewire\WithFileUploads;
use thiagoalessio\TesseractOCR\TesseractOCR;

class TestTesseractOCR extends Component
{
    use WithFileUploads;
    
    public $text_from_writing;
    public $output_text; // เพิ่มตัวแปรเก็บผลลัพธ์ OCR

    public function submit()
    {
        // ตรวจสอบว่ามีไฟล์อัปโหลดจริงหรือไม่
        if (!$this->text_from_writing) {
            session()->flash('error', 'กรุณาอัปโหลดไฟล์ภาพก่อน!');
            return;
        }

        // บันทึกไฟล์ที่อัปโหลดไปยัง storage
        $imagePath = $this->text_from_writing->store('ocr_images', 'public'); // บันทึกที่ storage/app/public/ocr_images
        $fullPath = storage_path("app/public/{$imagePath}"); // แปลง path ให้เป็น full path

        // ตรวจสอบว่าไฟล์มีอยู่จริง
        if (!file_exists($fullPath)) {
            session()->flash('error', 'ไม่สามารถอ่านไฟล์ที่อัปโหลดได้!');
            return;
        }

        // ใช้ Tesseract OCR อ่านไฟล์
        $text = (new TesseractOCR($fullPath))
            ->lang('tha', 'eng') // รองรับไทยและอังกฤษ
            ->run();

        // แสดงผลข้อความ OCR
        $this->output_text = $text;
    }

    public function render()
    {
        return view('livewire.lab.test-tesseract-o-c-r', [
            'output_text' => $this->output_text ?? '',
        ]);
    }
}

