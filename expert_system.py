import json
import sys
from laptop_manager import LaptopManager

class Laptop:
    def __init__(self, id_laptop, nama_laptop, tahun, kode_laptop, merek, seri, penggunaan, ram, penyimpanan, GPU, prosessor, OS, display, io_port, baterai, berat, webcam, harga, gambar):
        # Definisi class Laptop tetap sama
        self.id_laptop = id_laptop
        self.nama_laptop = nama_laptop
        self.tahun = tahun
        self.kode_laptop = kode_laptop
        self.merek = merek
        self.seri = seri
        self.penggunaan = penggunaan
        self.ram = ram
        self.penyimpanan = penyimpanan
        self.GPU = GPU
        self.prosessor = prosessor
        self.OS = OS
        self.display = display
        self.io_port = io_port
        self.baterai = baterai
        self.berat = berat
        self.webcam = webcam
        self.harga = harga
        self.gambar = gambar

class ExpertSystem:
    def __init__(self, laptop_manager):
        self.laptop_manager = laptop_manager

    def search(self, filters):
        filtered_laptops = self.laptop_manager.get_laptops_by_criteria(filters)
        print("Original laptops:", len(filtered_laptops))

        # Mengonversi budget menjadi angka untuk perbandingan
        budget_mapping = {
            "dibawah_5jt": 5000000,
            "5jt_sampai_10jt": (5000000, 10000000),
            "10jt_sampai_15jt": (10000000, 15000000),
            "15jt_20jt": (15000000, 20000000),
            "diatas_20jt": 20000000,
        }

        # Filter berdasarkan budget
        if 'budget' in filters and filters['budget'] in budget_mapping:
            budget_value = budget_mapping[filters['budget']]
            if isinstance(budget_value, tuple):
                filtered_laptops = [laptop for laptop in filtered_laptops if budget_value[0] <= laptop.harga <= budget_value[1]]
            else:
                filtered_laptops = [laptop for laptop in filtered_laptops if laptop.harga <= budget_value]
        print("After budget filter:", len(filtered_laptops))

        # Filter berdasarkan penggunaan
        if 'usage' in filters:
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.penggunaan.lower() == filters['usage'].lower()]
        print("After usage filter:", len(filtered_laptops))
        
        # Filter berdasarkan merek
        if 'brand' in filters:
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.merek.lower() == filters['brand'].lower()]
        print("After brand filter:", len(filtered_laptops))

        # Filter berdasarkan ukuran layar
        if 'layar' in filters:
            if filters['layar'] == 'dibawah_13':
                filtered_laptops = [laptop for laptop in filtered_laptops if '13' not in laptop.display and '14' not in laptop.display]
            elif filters['layar'] == '13_sampai_14':
                filtered_laptops = [laptop for laptop in filtered_laptops if '13' in laptop.display or '14' in laptop.display]
            elif filters['layar'] == '15_sampai_16':
                filtered_laptops = [laptop for laptop in filtered_laptops if '15' in laptop.display or '16' in laptop.display]
            elif filters['layar'] == 'diatas_16':
                filtered_laptops = [laptop for laptop in filtered_laptops if '17' in laptop.display or '18' in laptop.display]
        print("After display filter:", len(filtered_laptops))

        # Filter berdasarkan RAM
        if 'ram' in filters:
            try:
                ram_capacity = int(filters['ram'].replace("gb", "").strip())
                filtered_laptops = [
                    laptop for laptop in filtered_laptops
                    if any(int(ram.strip().replace("GB", "")) >= ram_capacity for ram in laptop.ram.split('/'))
                ]
            except ValueError:
                print("Invalid RAM filter value:", filters['ram'])
        print("After RAM filter:", len(filtered_laptops))

        # Filter berdasarkan penyimpanan
        if 'storage' in filters:
            storage_type = filters['storage'].lower()
            if storage_type == 'ssd':
                filtered_laptops = [laptop for laptop in filtered_laptops if 'SSD' in laptop.penyimpanan]
        print("After storage filter:", len(filtered_laptops))
        
        # Filter berdasarkan tahun keluaran terbaru (misalnya tahun ini)
        if 'keluaran' in filters and filters['keluaran'] == "terbaru":
            current_year = 2024  # Misalnya tahun saat ini
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.tahun == current_year]
        print("After release year filter:", len(filtered_laptops))

        return filtered_laptops



    def get_filtered_laptops_as_json(self, filters):
        filtered_laptops = self.search(filters)
        laptop_dicts = [
            {
                'id_laptop': laptop.id_laptop,
                'nama_laptop': laptop.nama_laptop,
                'tahun': laptop.tahun,
                'kode_laptop': laptop.kode_laptop,
                'merek': laptop.merek,
                'seri': laptop.seri,
                'penggunaan': laptop.penggunaan,
                'ram': laptop.ram,
                'penyimpanan': laptop.penyimpanan,
                'GPU': laptop.GPU,
                'prosessor': laptop.prosessor,
                'OS': laptop.OS,
                'display': laptop.display,
                'io_port': laptop.io_port,
                'baterai': laptop.baterai,
                'berat': laptop.berat,
                'webcam': laptop.webcam,
                'harga': laptop.harga,
                'gambar': laptop.gambar
            }
            for laptop in filtered_laptops
        ]
        return json.dumps(laptop_dicts, indent=4)

if __name__ == "__main__":
    # Check if the script was called with a command-line argument
    if len(sys.argv) > 1:
        # Assume the first argument is the JSON data
        json_data = sys.argv[1]
        simulated_filters = {
        "budget": "dibawah_5jt",
        "penggunaan": "gaming",
        "merek": "acer",
        "layar": "15_sampai_16",
        "ram": "32gb",
        "penyimpanan": "ssd",
        "keluaran": "terbaru"
    }
    else:
        simulated_filters = {}

    # Ambil data laptop dari database
    laptop_manager = LaptopManager()

    expert_system = ExpertSystem(laptop_manager)
    result_json = expert_system.get_filtered_laptops_as_json(simulated_filters)
    
    print(result_json)