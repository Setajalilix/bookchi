-- ستون‌های لازم برای auth، مالکیت کتاب‌ها و سبد خرید کتابچی
-- اگر این ستون‌ها قبلاً وجود دارند، لازم نیست این فایل را دوباره اجرا کنید.

ALTER TABLE users
    ADD COLUMN name VARCHAR(191) NOT NULL DEFAULT 'کاربر کتابچی',
    ADD COLUMN phone VARCHAR(20) NOT NULL UNIQUE,
    ADD COLUMN password VARCHAR(255) NULL,
    ADD COLUMN address VARCHAR(500) NULL,
    ADD COLUMN postal_code VARCHAR(10) NULL,
    ADD COLUMN created_at DATETIME NULL;

ALTER TABLE books
    ADD COLUMN owner_id INT NULL,
    ADD INDEX books_owner_id_index (owner_id);

ALTER TABLE order_items
    ADD COLUMN quantity INT NOT NULL DEFAULT 1;
