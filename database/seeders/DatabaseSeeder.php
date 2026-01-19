<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Pet;
use App\Models\Treatment;
use App\Models\Checkup;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $owners = [
            ['name' => 'Budi Santoso', 'phone' => '08123456789', 'address' => 'Jl. Merdeka No. 123, Jakarta'],
            ['name' => 'Siti Nurhaliza', 'phone' => '08234567890', 'address' => 'Jl. Sudirman No. 456, Bandung'],
            ['name' => 'Ahmad Dahlan', 'phone' => '08345678901', 'address' => 'Jl. Diponegoro No. 789, Surabaya'],
            ['name' => 'Rina Wijaya', 'phone' => '08156789012', 'address' => 'Jl. Gatot Subroto No. 234, Jakarta'],
            ['name' => 'Fajar Prasetyo', 'phone' => '08267890123', 'address' => 'Jl. Ahmad Yani No. 567, Yogyakarta'],
            ['name' => 'Linda Kusuma', 'phone' => '08378901234', 'address' => 'Jl. Pahlawan No. 890, Semarang'],
            ['name' => 'Denny Kurniawan', 'phone' => '08489012345', 'address' => 'Jl. Asia Afrika No. 321, Bandung'],
            ['name' => 'Maya Sari', 'phone' => '08590123456', 'address' => 'Jl. Veteran No. 654, Malang'],
            ['name' => 'Rudi Hartono', 'phone' => '08601234567', 'address' => 'Jl. Pemuda No. 987, Surabaya'],
            ['name' => 'Dewi Lestari', 'phone' => '08712345678', 'address' => 'Jl. Kartini No. 135, Solo'],
            ['name' => 'Agus Setiawan', 'phone' => '08823456789', 'address' => 'Jl. Majapahit No. 246, Bali'],
            ['name' => 'Novi Rahmawati', 'phone' => '08934567890', 'address' => 'Jl. Proklamasi No. 357, Jakarta'],
            ['name' => 'Hendra Gunawan', 'phone' => '08045678901', 'address' => 'Jl. Thamrin No. 468, Jakarta'],
            ['name' => 'Sari Indah', 'phone' => '08156789012', 'address' => 'Jl. Gajah Mada No. 579, Yogyakarta'],
            ['name' => 'Bambang Wijaya', 'phone' => '08267890123', 'address' => 'Jl. Hayam Wuruk No. 680, Semarang'],
        ];

        foreach ($owners as $owner) {
            Owner::create($owner);
        }

        $treatments = [
            ['name' => 'Vaksin Rabies', 'price' => 150000, 'type' => 'Vaksin'],
            ['name' => 'Grooming Lengkap', 'price' => 100000, 'type' => 'Grooming'],
            ['name' => 'Pemeriksaan Rutin', 'price' => 75000, 'type' => 'Pemeriksaan'],
            ['name' => 'Vaksin Distemper', 'price' => 120000, 'type' => 'Vaksin'],
            ['name' => 'Vaksin Parvovirus', 'price' => 130000, 'type' => 'Vaksin'],
            ['name' => 'Grooming Cuci & Sisir', 'price' => 50000, 'type' => 'Grooming'],
            ['name' => 'Grooming Potong Kuku', 'price' => 25000, 'type' => 'Grooming'],
            ['name' => 'Pemeriksaan Kesehatan', 'price' => 100000, 'type' => 'Pemeriksaan'],
            ['name' => 'Pemeriksaan Gigi', 'price' => 85000, 'type' => 'Pemeriksaan'],
            ['name' => 'Sterilisasi', 'price' => 500000, 'type' => 'Pemeriksaan'],
        ];

        foreach ($treatments as $treatment) {
            Treatment::create($treatment);
        }

        $pets = [
            ['owner_id' => 1, 'unique_code' => '0852000100001', 'name' => 'MILO', 'type' => 'KUCING', 'age' => 2, 'weight' => 4.5],
            ['owner_id' => 1, 'unique_code' => '0853000100002', 'name' => 'BELLA', 'type' => 'ANJING', 'age' => 3, 'weight' => 12.5],
            ['owner_id' => 2, 'unique_code' => '0854000200001', 'name' => 'COCO', 'type' => 'KUCING', 'age' => 1, 'weight' => 3.2],
            ['owner_id' => 2, 'unique_code' => '0855000200002', 'name' => 'MAX', 'type' => 'ANJING', 'age' => 4, 'weight' => 15.8],
            ['owner_id' => 3, 'unique_code' => '0856000300001', 'name' => 'LUNA', 'type' => 'KUCING', 'age' => 2, 'weight' => 4.0],
            ['owner_id' => 3, 'unique_code' => '0857000300002', 'name' => 'CHARLIE', 'type' => 'ANJING', 'age' => 5, 'weight' => 18.3],
            ['owner_id' => 4, 'unique_code' => '0858000400001', 'name' => 'SIMBA', 'type' => 'KUCING', 'age' => 3, 'weight' => 5.1],
            ['owner_id' => 4, 'unique_code' => '0859000400002', 'name' => 'ROCKY', 'type' => 'ANJING', 'age' => 2, 'weight' => 11.2],
            ['owner_id' => 5, 'unique_code' => '0900000500001', 'name' => 'WHISKERS', 'type' => 'KUCING', 'age' => 1, 'weight' => 3.5],
            ['owner_id' => 5, 'unique_code' => '0901000500002', 'name' => 'BUDDY', 'type' => 'ANJING', 'age' => 4, 'weight' => 14.7],
            ['owner_id' => 6, 'unique_code' => '0902000600001', 'name' => 'TIGER', 'type' => 'KUCING', 'age' => 2, 'weight' => 4.8],
            ['owner_id' => 6, 'unique_code' => '0903000600002', 'name' => 'DUKE', 'type' => 'ANJING', 'age' => 3, 'weight' => 16.5],
            ['owner_id' => 7, 'unique_code' => '0904000700001', 'name' => 'KITTY', 'type' => 'KUCING', 'age' => 1, 'weight' => 2.9],
            ['owner_id' => 7, 'unique_code' => '0905000700002', 'name' => 'COOPER', 'type' => 'ANJING', 'age' => 5, 'weight' => 19.2],
            ['owner_id' => 8, 'unique_code' => '0906000800001', 'name' => 'SHADOW', 'type' => 'KUCING', 'age' => 4, 'weight' => 5.5],
            ['owner_id' => 8, 'unique_code' => '0907000800002', 'name' => 'BEAR', 'type' => 'ANJING', 'age' => 2, 'weight' => 13.4],
            ['owner_id' => 9, 'unique_code' => '0908000900001', 'name' => 'SMOKEY', 'type' => 'KUCING', 'age' => 3, 'weight' => 4.6],
            ['owner_id' => 9, 'unique_code' => '0909000900002', 'name' => 'JACK', 'type' => 'ANJING', 'age' => 1, 'weight' => 9.8],
            ['owner_id' => 10, 'unique_code' => '0910001000001', 'name' => 'OLIVER', 'type' => 'KUCING', 'age' => 2, 'weight' => 4.3],
            ['owner_id' => 10, 'unique_code' => '0911001000002', 'name' => 'ZEUS', 'type' => 'ANJING', 'age' => 6, 'weight' => 20.1],
            ['owner_id' => 11, 'unique_code' => '0912001100001', 'name' => 'LEO', 'type' => 'KUCING', 'age' => 1, 'weight' => 3.1],
            ['owner_id' => 11, 'unique_code' => '0913001100002', 'name' => 'TOBY', 'type' => 'ANJING', 'age' => 3, 'weight' => 14.2],
            ['owner_id' => 12, 'unique_code' => '0914001200001', 'name' => 'FELIX', 'type' => 'KUCING', 'age' => 5, 'weight' => 6.0],
            ['owner_id' => 12, 'unique_code' => '0915001200002', 'name' => 'OSCAR', 'type' => 'ANJING', 'age' => 2, 'weight' => 12.8],
            ['owner_id' => 13, 'unique_code' => '0916001300001', 'name' => 'MITTENS', 'type' => 'KUCING', 'age' => 3, 'weight' => 4.7],
            ['owner_id' => 13, 'unique_code' => '0917001300002', 'name' => 'BAILEY', 'type' => 'ANJING', 'age' => 4, 'weight' => 17.6],
            ['owner_id' => 14, 'unique_code' => '0918001400001', 'name' => 'OREO', 'type' => 'KUCING', 'age' => 1, 'weight' => 3.3],
            ['owner_id' => 14, 'unique_code' => '0919001400002', 'name' => 'BRUNO', 'type' => 'ANJING', 'age' => 5, 'weight' => 19.5],
            ['owner_id' => 15, 'unique_code' => '0920001500001', 'name' => 'PATCHES', 'type' => 'KUCING', 'age' => 2, 'weight' => 4.1],
            ['owner_id' => 15, 'unique_code' => '0921001500002', 'name' => 'DIESEL', 'type' => 'ANJING', 'age' => 3, 'weight' => 15.3],
        ];

        foreach ($pets as $pet) {
            Pet::create($pet);
        }

        $checkups = [
            ['pet_id' => 1, 'treatment_id' => 1, 'notes' => 'Vaksin rutin tahunan'],
            ['pet_id' => 2, 'treatment_id' => 2, 'notes' => 'Grooming bulu lebat'],
            ['pet_id' => 3, 'treatment_id' => 3, 'notes' => 'Pemeriksaan kesehatan rutin'],
            ['pet_id' => 4, 'treatment_id' => 4, 'notes' => 'Vaksin booster'],
            ['pet_id' => 5, 'treatment_id' => 5, 'notes' => 'Vaksin pencegahan parvovirus'],
            ['pet_id' => 6, 'treatment_id' => 1, 'notes' => 'Vaksinasi anti rabies'],
            ['pet_id' => 7, 'treatment_id' => 6, 'notes' => 'Cuci dan sisir bulu'],
            ['pet_id' => 8, 'treatment_id' => 7, 'notes' => 'Potong kuku yang panjang'],
            ['pet_id' => 9, 'treatment_id' => 8, 'notes' => 'Medical check up lengkap'],
            ['pet_id' => 10, 'treatment_id' => 9, 'notes' => 'Pembersihan karang gigi'],
            ['pet_id' => 11, 'treatment_id' => 2, 'notes' => 'Full grooming treatment'],
            ['pet_id' => 12, 'treatment_id' => 3, 'notes' => 'Cek kondisi fisik'],
            ['pet_id' => 13, 'treatment_id' => 1, 'notes' => 'Vaksin pertama'],
            ['pet_id' => 14, 'treatment_id' => 4, 'notes' => 'Vaksin distemper tahap 2'],
            ['pet_id' => 15, 'treatment_id' => 5, 'notes' => 'Vaksin parvo lengkap'],
            ['pet_id' => 16, 'treatment_id' => 6, 'notes' => 'Grooming sederhana'],
            ['pet_id' => 17, 'treatment_id' => 8, 'notes' => 'Pemeriksaan bulanan'],
            ['pet_id' => 18, 'treatment_id' => 1, 'notes' => 'Vaksin rabies wajib'],
            ['pet_id' => 19, 'treatment_id' => 2, 'notes' => 'Grooming premium'],
            ['pet_id' => 20, 'treatment_id' => 3, 'notes' => 'Konsultasi kesehatan'],
            ['pet_id' => 21, 'treatment_id' => 7, 'notes' => 'Perawatan kuku'],
            ['pet_id' => 22, 'treatment_id' => 9, 'notes' => 'Scaling gigi'],
            ['pet_id' => 23, 'treatment_id' => 8, 'notes' => 'General health check'],
            ['pet_id' => 24, 'treatment_id' => 1, 'notes' => 'Vaksin rabies update'],
            ['pet_id' => 25, 'treatment_id' => 2, 'notes' => 'Spa grooming'],
            ['pet_id' => 26, 'treatment_id' => 4, 'notes' => 'Vaksin distemper'],
            ['pet_id' => 27, 'treatment_id' => 5, 'notes' => 'Vaksin parvo booster'],
            ['pet_id' => 28, 'treatment_id' => 3, 'notes' => 'Check up lengkap'],
            ['pet_id' => 29, 'treatment_id' => 6, 'notes' => 'Bath & brush'],
            ['pet_id' => 30, 'treatment_id' => 1, 'notes' => 'Vaksinasi tahunan'],
        ];

        foreach ($checkups as $checkup) {
            Checkup::create($checkup);
        }
    }
}
