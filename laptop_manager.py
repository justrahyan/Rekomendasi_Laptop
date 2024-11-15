from db_connection import DBConnection

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

class LaptopManager:
    def __init__(self):
        db_connection = DBConnection()
        self.conn = db_connection

    def get_laptops_by_filters(self, filters):
        harga = None
        penggunaan = None
        merek = None

        # Map budget to a specific range or value
        if 'budget' in filters:
            budget_mapping = {
                "dibawah_5jt": (0, 5000000),
                "5jt_sampai_10jt": (5000000, 10000000),
                "10jt_sampai_15jt": (10000000, 15000000),
                "15jt_20jt": (15000000, 20000000),
                "diatas_20jt": (20000000, float('inf')),
            }
            harga = budget_mapping.get(filters['budget'], (0, float('inf')))

        # Assign usage and merek if provided
        if 'penggunaan' in filters:
            penggunaan = filters['penggunaan']
        if 'merek' in filters:
            merek = filters['merek']

        return self.get_laptops_by_criteria(harga, penggunaan, merek)

    def get_laptops_by_criteria(self, harga=None, penggunaan=None, merek=None):
        query = "SELECT * FROM laptop WHERE 1=1"
        params = {}

        # Debugging values of each parameter before appending to params

        if harga is not None and isinstance(harga, tuple):
            query += " AND harga BETWEEN %(harga_min)s AND %(harga_max)s"
            params['harga_min'] = harga[0]
            params['harga_max'] = harga[1]

        if penggunaan is not None:
            query += " AND penggunaan = %(penggunaan)s"
            params['penggunaan'] = penggunaan

        if merek is not None:
            query += " AND merek = %(merek)s"
            params['merek'] = merek


        # Execute the query with the dictionary as a single parameter
        result = self.conn.execute_query(query, params)

        # Convert query results to Laptop objects
        laptops = [
            Laptop(
                row['id_laptop'], row['nama_laptop'], row['tahun'], row['kode_laptop'],
                row['merek'], row['seri'], row['penggunaan'], row['ram'], row['penyimpanan'],
                row['GPU'], row['prosessor'], row['OS'], row['display'], row['io_port'],
                row['baterai'], row['berat'], row['webcam'], row['harga'], row['gambar']
            )
            for row in result
        ]

        return laptops