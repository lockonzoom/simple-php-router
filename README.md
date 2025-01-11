
# PHP Routing Example

โปรเจกต์นี้เป็นตัวอย่างการใช้งาน **PHP Routing** เพื่อจัดการกับคำขอ **GET** และ **POST** อย่างมีประสิทธิภาพ โดยสามารถเพิ่มหน้าใหม่หรือเส้นทาง (Route) ได้อย่างง่ายดาย

---

## การเพิ่มหน้าใหม่: Page "About"

### 1. เพิ่มเส้นทางใน `routes.php`
แก้ไขไฟล์ `routes.php` เพื่อเพิ่มเส้นทางสำหรับหน้า About:
```php
<?php
return [
    '/about' => 'AboutController@index',  
];
```

---

### 2. สร้างไฟล์ Controller: `AboutController.php`
สร้างไฟล์ `AboutController.php` ในโฟลเดอร์ `controllers/` พร้อมโค้ดดังนี้:
```php
<?php
class AboutController {  // ชื่อ class ต้องเหมือนชื่อไฟล์ AboutController.php
    public function index() {
        echo "Welcome to the About Page!";
    }
}
```

---

### 3. ทดสอบหน้า About
- เปิดเบราว์เซอร์และไปที่:
```
http://[localhost:port]/about
```
- คุณจะเห็นข้อความ:
```
Welcome to the About Page!
```

---

## ตัวอย่างการทดสอบ GET Request
ตัวอย่างการส่งคำขอ **GET** ไปยังเส้นทางแบบไดนามิก:
- URL: 
```
http://[localhost:port]/content/id/5001/page/1
```

### คำอธิบาย:
- `/content/id/{id}/page/{page}` เป็นเส้นทางแบบไดนามิกที่กำหนดไว้ใน `routes.php`
- ระบบจะส่งค่าพารามิเตอร์ `id=5001` และ `page=1` ไปยังฟังก์ชัน `show` ใน `ContentController.php`

---

## ตัวอย่างการเพิ่มเส้นทางสำหรับ **POST**
### 1. เพิ่มเส้นทางใน `routes.php`
```php
<?php
return [
    '/submit' => 'ContentController@store', // จัดการ POST Request
];
```

---

### 2. สร้างฟอร์ม HTML สำหรับส่ง POST
สร้างฟอร์ม HTML ดังนี้:
```html
<form action="http://[localhost:port]/submit" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    
    <button type="submit">Send</button>
</form>
```

---

### 3. สร้างฟังก์ชัน `store` ใน `ContentController.php`
```php
<?php
class ContentController {
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? 'Unknown';
            $message = $_POST['message'] ?? 'No message';

            echo "Name: $name<br>";
            echo "Message: $message";
        } else {
            echo "This route only accepts POST requests.";
        }
    }
}
```

---

### 4. ทดสอบ POST Request
1. เข้าสู่ฟอร์มที่คุณสร้างไว้
2. กรอกข้อมูลและกด "Send"
3. ระบบจะส่งข้อมูลไปยัง `/submit` และแสดงผลข้อมูลที่ได้รับ

---

## สรุป
- คุณสามารถเพิ่มหน้าใหม่ได้ง่าย ๆ โดยการเพิ่มเส้นทางใน `routes.php` และสร้าง Controller ที่เกี่ยวข้อง
- รองรับทั้ง **GET** และ **POST** อย่างครบถ้วน
- เส้นทางแบบไดนามิกช่วยให้คุณส่งค่าผ่าน URL ได้อย่างง่ายดาย

---

### ตัวอย่างอื่น ๆ
- **GET**: 
```
http://[localhost:port]/content
```
- **POST**:
```
http://[localhost:port]/submit
```

---

หากมีคำถามหรือปัญหาเพิ่มเติม สามารถแจ้งได้ที่ [Developer Contact](mailto:developer@example.com)
