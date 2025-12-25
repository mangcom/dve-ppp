import pandas as pd
import os

def generate_sql_file(csv_file_path, output_sql_path):
    # 1. อ่านไฟล์ CSV
    try:
        df = pd.read_csv(csv_file_path, encoding='utf-8')
    except Exception as e:
        print(f"อ่านไฟล์ CSV ไม่สำเร็จ: {e}")
        return

    # 2. เตรียมชื่อคอลัมน์ในฐานข้อมูล (ต้องเรียงตามลำดับในไฟล์ CSV)
    db_columns = [
        "id", "college_code", "college_name", "province_vocational", "region",
        "college_type", "address_no", "moo", "soi", "road",
        "sub_district", "district", "province", "postcode", "phone",
        "latitude", "longitude", "website"
    ]

    # ฟังก์ชันสำหรับแปลงค่าให้เป็น format ของ SQL
    def format_value(val):
        # ถ้าเป็นค่าว่าง (NaN หรือ empty string) ให้คืนค่า NULL
        if pd.isna(val) or str(val).strip() == '':
            return "NULL"
        
        # แปลงเป็น String และป้องกัน Single Quote (') ด้วยการใส่ซ้ำ (Escape)
        # เช่น O'Connor -> O''Connor
        val_str = str(val).replace("'", "''")
        
        # คืนค่าเป็น String ที่มี Single Quote ครอบ
        return f"'{val_str}'"

    print(f"กำลังสร้างไฟล์ {output_sql_path} ...")

    # 3. เปิดไฟล์ .sql เพื่อเขียนข้อมูล
    with open(output_sql_path, 'w', encoding='utf-8') as f:
        # วนลูปทีละแถวใน DataFrame
        for index, row in df.iterrows():
            # แปลงค่าทุกคอลัมน์ในแถวนั้นๆ
            values = [format_value(val) for val in row]
            
            # สร้าง string ของ values เช่น '1', '12345', 'วิทยาลัย...', NULL, ...
            values_str = ", ".join(values)
            
            # สร้างคำสั่ง SQL
            sql = f"INSERT INTO college ({', '.join(db_columns)}) VALUES ({values_str});\n"
            
            # เขียนลงไฟล์
            f.write(sql)

    print(f"เสร็จสิ้น! สร้างไฟล์ {output_sql_path} เรียบร้อยแล้ว")
    print(f"จำนวนคำสั่ง INSERT ทั้งหมด: {len(df)}")

if __name__ == "__main__":
    # ระบุชื่อไฟล์ CSV และชื่อไฟล์ SQL ที่ต้องการ
    generate_sql_file('public_college.csv', 'insert_college.sql')