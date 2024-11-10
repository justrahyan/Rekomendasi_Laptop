from db_connection import DBConnection

def fetch_all_laptops():
    db_connection = DBConnection()
    laptops = db_connection.execute_query("SELECT * FROM laptop")
    
    if laptops is not None and len(laptops) > 0:
        print("Laptop ditemukan:")
        for laptop in laptops:
            print(laptop)
    else:
        print("Tidak ada laptop ditemukan atau terjadi kesalahan.")

    db_connection.close()

if __name__ == "__main__":
    fetch_all_laptops()