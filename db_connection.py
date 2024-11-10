import mysql.connector
from mysql.connector import Error

class DBConnection:
    def __init__(self, host="localhost", user="root", password="", database="rekomendasi_laptop"):
        """ Inisialisasi koneksi ke database MySQL. """
        self.host = host
        self.user = user
        self.password = password
        self.database = database
        self.connection = None
        self.connect()

    def connect(self):
        """ Membuat koneksi ke database dan menyimpannya di self.connection. """
        try:
            self.connection = mysql.connector.connect(
                host=self.host,
                user=self.user,
                password=self.password,
                database=self.database 
            )
            if self.connection.is_connected():
                print("Koneksi ke database berhasil.")
            else:
                print("Koneksi tidak berhasil.")
                self.connection = None
        except Error as e: 
            print(f"Terjadi kesalahan saat menghubungkan ke database: {e}")
            self.connection = None

    def close(self): 
        """ Menutup koneksi database jika terbuka. """
        if self.connection and self.connection.is_connected():
            self.connection.close()
            print("Koneksi database ditutup.")

    def execute_query(self, query, params=None):
        if not self.connection or not self.connection.is_connected():
            self.connect()

        if not self.connection or not self.connection.is_connected():
            return []

        try:
            with self.connection.cursor(dictionary=True) as cursor:
                if params:
                    # Final debug print before execution
                    print(f"Query: {query}")
                    print(f"Final Params: {params}, Type: {type(params)}")

                    cursor.execute(query, params)
                else:
                    cursor.execute(query)

                result = cursor.fetchall()
                return result if result else []
        except Error as e:
            print(f"Terjadi kesalahan saat menjalankan query: {e}")
            return []



        # Contoh penggunaan class DBConnection (untuk testing) 
        if name == "main": 
            db = DBConnection()
            hasil = db.execute_query("SELECT * FROM laptop")

            if hasil:
                for row in hasil:
                    print(row)
            else:
                print("Tidak ada data yang ditemukan atau terjadi kesalahan saat menjalankan query.")

            db.close()