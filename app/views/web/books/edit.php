<?php $activePage = "sell"; ?>
<?php require_once __DIR__ . '/../../../../config/app.php'; ?>
<?php include LAYOUT_PATH . "/header.php";
?>

<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel"
        >کتابت را برای فروش ویرایش کن</span
        >
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">
            ویرایش کتاب توسط کاربر
        </h1>
        <p class="mt-4 max-w-3xl leading-8 text-coffee/70">
            اطلاعات کتابت را کامل وارد کن تا خریدارها با خیال راحت وضعیت، قیمت و
            روش تحویل را ببینند.
        </p>
    </section>
    <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_360px]">
        <form class="reveal form-card rounded-[2rem] p-6" method="post" enctype="multipart/form-data" action="/books/update">
            <div class="grid gap-5 md:grid-cols-2">
                <input
                        type="hidden"
                        name="id"
                        value="<?= (int)$book['id'] ?>"
                >
                <label class="field-label"
                >نام کتاب
                    <input
                            name="title"
                            id="bookTitle"
                            class="input-field mt-2"
                            value="<?= htmlspecialchars($book['title']) ?>"
                    ></label
                >
                <label class="field-label"
                >نویسنده
                    <input class="input-field mt-2" value="<?= htmlspecialchars($book['author']) ?>" placeholder="نام نویسنده" name="author"/></label
                ><label class="field-label"
                >دسته‌بندی<select
                            class="select-field mt-2"
                            name="category_id"
                    >
                        <?php foreach ($categories as $category): ?>
                            <option
                                    value="<?= $category['id'] ?>"
                                    <?= $book['category_id'] == $category['id'] ? 'selected' : '' ?>
                            >
                                <?= $category['title'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select></label
                ><label class="field-label"
                >وضعیت کتاب
                    <select class="select-field mt-2" name="status">
                        <option value="new"
                                <?= $book['status'] === 'new' ? 'selected' : '' ?>>
                            در حد نو
                        </option>

                        <option value="clean"
                                <?= $book['status'] === 'clean' ? 'selected' : '' ?>>
                            تمیز
                        </option>

                        <option value="have_lines"
                                <?= $book['status'] === 'have_lines' ? 'selected' : '' ?>>
                            دارای خط کشی
                        </option>
                    </select></label
                ><label class="field-label"
                >قیمت پیشنهادی<input
                            required
                            name="price"
                            value="<?= htmlspecialchars($book['price']) ?>"
                            class="input-field mt-2"
                            placeholder="۱۶۵٬۰۰۰ تومان"/></label
                ><label class="field-label"
                >شهر<input class="input-field mt-2" name="city" placeholder="تهران" value="<?= htmlspecialchars($book['city']) ?>"
                    /></label>
            </div>
            <label class="field-label mt-5"
            >تصویر جلد<input class="input-field mt-2" name="cover" id="bookCover" type="file"/> </label
            ><label class="field-label mt-5"
            >توضیحات<textarea
                        name="description"
                        class="textarea-field mt-2"
                        placeholder="وضعیت جلد، صفحات، روش ارسال و نکته‌های مهم را بنویسید"
                ><?= htmlspecialchars($book['description']) ?></textarea>
            </label>
            <input type="hidden" name="sell_type" value="cash">
            <div class="mt-5 rounded-2xl bg-white/60 p-4 font-bold text-coffee-dark">
                <i class="ti ti-cash"></i> نوع آگهی: فروش نقدی
            </div>
            <button class="btn-primary mt-6 w-full px-6 py-4" type="submit">
                ویرایش کتاب
            </button>
        </form>
        <aside class="reveal paper-card rounded-[2rem] p-6">
            <h2 class="text-xl font-black">پیش‌نمایش آگهی</h2>
            <div
                    class="book-cover mt-5 h-72 rounded-3xl p-6 text-cream"
                    id="previewCover"
                    style="
                            background-image:url('<?= htmlspecialchars($book['cover']) ?>');
                            background-size:cover;
                            background-position:center;
                            "            >
            </div>
            <h3 id="previewTitle" class="mt-4 text-2xl font-black">
                <?= htmlspecialchars($book['title']) ?>
            </h3>
            <p class="mt-5 leading-8 text-coffee/70">
                عکس واضح، قیمت منصفانه و توضیح دقیق باعث می‌شود آگهی سریع‌تر دیده
                شود.
            </p>
        </aside>
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const titleInput = document.getElementById("bookTitle");
        const coverInput = document.getElementById("bookCover");

        const previewTitle = document.getElementById("previewTitle");
        const previewCover = document.getElementById("previewCover");

        titleInput.addEventListener("input", (e) => {
            const value = e.target.value.trim();
            previewTitle.textContent = value !== "" ? value : "کتاب شما";
        });

        coverInput.addEventListener("change", (e) => {
            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = (event) => {
                previewCover.style.backgroundImage = `url(${event.target.result})`;
                previewCover.style.backgroundSize = "cover";
                previewCover.style.backgroundPosition = "center";
            };

            reader.readAsDataURL(file);
        });
    });
</script>
<?php include LAYOUT_PATH . "/footer.php"; ?>
