import json
import sys
import time
import os
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler
from laptop_manager import LaptopManager

class Laptop:
    def __init__(self, id_laptop, nama_laptop, tahun, kode_laptop, merek, seri, penggunaan, ram, penyimpanan, GPU, prosessor, OS, display, io_port, baterai, berat, webcam, harga, gambar):
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
        
        budget_mapping = {
            "dibawah_5jt": 5000000,
            "5jt_sampai_10jt": (5000000, 10000000),
            "10jt_sampai_15jt": (10000000, 15000000),
            "15jt_20jt": (15000000, 20000000),
            "diatas_20jt": 20000000,
        }

        if 'budget' in filters and filters['budget'] in budget_mapping:
            budget_value = budget_mapping[filters['budget']]
            if isinstance(budget_value, tuple):
                filtered_laptops = [laptop for laptop in filtered_laptops if budget_value[0] <= laptop.harga <= budget_value[1]]
            else:
                filtered_laptops = [laptop for laptop in filtered_laptops if laptop.harga <= budget_value]

        if 'penggunaan' in filters:
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.penggunaan.lower() == filters['penggunaan'].lower()]

        if 'merek' in filters:
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.merek.lower() == filters['merek'].lower()]

        if 'layar' in filters:
            if filters['layar'] == 'dibawah_13':
                filtered_laptops = [laptop for laptop in filtered_laptops if '13' not in laptop.display and '14' not in laptop.display]
            elif filters['layar'] == '13_sampai_14':
                filtered_laptops = [laptop for laptop in filtered_laptops if '13' in laptop.display or '14' in laptop.display]
            elif filters['layar'] == '15_sampai_16':
                filtered_laptops = [laptop for laptop in filtered_laptops if '15' in laptop.display or '16' in laptop.display]
            elif filters['layar'] == 'diatas_16':
                filtered_laptops = [laptop for laptop in filtered_laptops if '17' in laptop.display or '18' in laptop.display]

        if 'ram' in filters:
            try:
                ram_capacity = int(filters['ram'].replace("gb", "").strip())
                filtered_laptops = [
                    laptop for laptop in filtered_laptops
                    if any(int(ram.strip().replace("GB", "")) >= ram_capacity for ram in laptop.ram.split('/'))
                ]
            except ValueError:
                print("Invalid RAM filter value:", filters['ram'])

        if 'penyimpanan' in filters:
            storage_type = filters['penyimpanan'].lower()
            if storage_type == 'ssd':
                filtered_laptops = [laptop for laptop in filtered_laptops if 'SSD' in laptop.penyimpanan]
        
        if 'keluaran' in filters and filters['keluaran'] == "terbaru":
            current_year = 2024
            filtered_laptops = [laptop for laptop in filtered_laptops if laptop.tahun == current_year]

        return filtered_laptops

    def get_filtered_laptops(self, filters):
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
        return laptop_dicts

    def save_results(self, result_json):
        with open('survey/expert-system-results.json', 'w') as f:
            f.write(json.dumps(result_json, indent=4))
        print("Results updated in expert-system-results.json")

class SurveyFileHandler(FileSystemEventHandler):
    def __init__(self, expert_system):
        self.expert_system = expert_system

    def on_modified(self, event):
        if event.src_path.endswith("survey_result.json"):
            print("Detected change in survey_result.json")
            filters = load_survey_data()
            if filters:
                result_json = self.expert_system.get_filtered_laptops(filters)
                self.expert_system.save_results(result_json)

def load_survey_data():
    try:
        with open('survey/survey_result.json', 'r') as f:
            survey_data = json.load(f)
        return {
            "budget": survey_data.get('budget', "N/A"),
            "penggunaan": survey_data.get('penggunaan', "N/A"),
            "merek": survey_data.get('merek', "N/A"),
            "layar": survey_data.get('layar', "N/A"),
            "ram": survey_data.get('ram', "N/A"),
            "penyimpanan": survey_data.get('penyimpanan', "N/A"),
            "keluaran": survey_data.get('keluaran', "N/A")
        }
    except FileNotFoundError:
        print("Error: survey_result.json not found.")
        return None
    except json.JSONDecodeError:
        print("Error: Failed to decode JSON in survey_result.json.")
        return None

if __name__ == "__main__":
    laptop_manager = LaptopManager()
    expert_system = ExpertSystem(laptop_manager)

    event_handler = SurveyFileHandler(expert_system)
    observer = Observer()
    observer.schedule(event_handler, path='survey', recursive=False)
    observer.start()

    try:
        while True:
            time.sleep(1)
    except KeyboardInterrupt:
        observer.stop()
        print("Program stopped by user.")
    observer.join()
