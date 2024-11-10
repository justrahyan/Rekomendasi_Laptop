from laptop_manager import LaptopManager
from expert_system import ExpertSystem
from db_connection import DBConnection
import json

# Menginisialisasi koneksi database
db_connection = DBConnection()

# Mengambil data laptop dari database menggunakan LaptopManager
laptop_manager = LaptopManager(db_connection)
laptops = laptop_manager.get_all_laptops()

# Inisialisasi ExpertSystem dengan data laptop yang diambil
expert_system = ExpertSystem(laptops)

# Contoh filter yang akan diterapkan
filters = {
    "budget": 25000000,
    "usage": "gaming",
    "brand": "asus"
}

# Mengambil hasil filter dan mengonversinya ke format JSON
result_json = expert_system.get_filtered_laptops_as_json(filters)

# Output hasil JSON (untuk diuji atau dikirim ke front-end)
print(result_json)

# Menutup koneksi setelah selesai
db_connection.close()