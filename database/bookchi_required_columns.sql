-- ستون‌های لازم برای auth ساده، مالکیت کتاب‌ها و سبد خرید session-based کتابچی
-- اگر این ستون‌ها قبلاً وجود دارند، لازم نیست این فایل را دوباره اجرا کنید.

ALTER TABLE users
    ADD COLUMN name VARCHAR(191) NOT NULL DEFAULT 'کاربر کتابچی',
    ADD COLUMN phone VARCHAR(20) NOT NULL UNIQUE,
    ADD COLUMN created_at DATETIME NULL;

ALTER TABLE books
    ADD COLUMN user_id INT NULL,
    ADD INDEX books_user_id_index (user_id);
