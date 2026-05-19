<?php $activePage = "sell"; ?>
<?php require_once __DIR__ . '/../../../../config/app.php'; ?>
<?php include LAYOUT_PATH . "/header.php";

?>

<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel"
        >کتابت را بفروش یا معاوضه کن</span
        >
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">
            ثبت کتاب توسط کاربر
        </h1>
        <p class="mt-4 max-w-3xl leading-8 text-coffee/70">
            اطلاعات کتابت را کامل وارد کن تا خریدارها با خیال راحت وضعیت، قیمت و
            روش تحویل را ببینند.
        </p>
    </section>
    <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_360px]">
        <form class="reveal form-card rounded-[2rem] p-6" method="post" enctype="multipart/form-data" action="/books">
            <div class="grid gap-5 md:grid-cols-2">
                <label class="field-label"
                >نام کتاب<input name="title"
                                id="bookTitle"
                                class="input-field mt-2"
                                placeholder="مثلاً ملت عشق"/></label
                >
                <label class="field-label"
                >نویسنده
                    <input class="input-field mt-2" placeholder="نام نویسنده" name="author"/></label
                ><label class="field-label"
                >دسته‌بندی<select class="select-field mt-2" name="category_id">
                        <option>انتخاب کنید...</option>
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                        <?php } ?>
                    </select></label
                ><label class="field-label"
                >وضعیت کتاب
                    <select class="select-field mt-2" name="status">
                        <option value="new">در حد نو</option>
                        <option value="clear">تمیز</option>
                        <option value="have_lines">دارای خط‌کشی</option>
                    </select></label
                ><label class="field-label"
                >قیمت پیشنهادی<input
                            required
                            name="price"
                            class="input-field mt-2"
                            placeholder="۱۶۵٬۰۰۰ تومان"/></label
                ><label class="field-label"
                >شهر<input class="input-field mt-2" name="city" placeholder="تهران"
                    /></label>
            </div>
            <label class="field-label mt-5"
            >تصویر جلد<input class="input-field mt-2" name="cover" id="bookCover" type="file"/> </label
            ><label class="field-label mt-5"
            >توضیحات<textarea
                        name="description"
                        class="textarea-field mt-2"
                        placeholder="وضعیت جلد، صفحات، روش ارسال و نکته‌های مهم را بنویسید"
                ></textarea>
            </label>
            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                <label
                        class="flex items-center gap-3 rounded-2xl bg-white/60 p-4 font-bold"
                ><input type="radio" name="sell_type" value="cash" checked/> فروش نقدی</label
                ><label
                        class="flex items-center gap-3 rounded-2xl bg-white/60 p-4 font-bold"
                ><input type="radio" name="sell_type" value="exchange"/> امکان معاوضه</label
                >
            </div>
            <button class="btn-primary mt-6 w-full px-6 py-4" type="submit">
                ثبت کتاب
            </button>
        </form>
        <aside class="reveal paper-card rounded-[2rem] p-6">
            <h2 class="text-xl font-black">پیش‌نمایش آگهی</h2>
            <div
                    class="book-cover mt-5 h-72 rounded-3xl p-6 text-cream"
                    id="previewCover"
                    style="--cover-a: #7c4a2d; --cover-b: #d89a54"
            >
            </div>
            <h3 id="previewTitle" class="mt-4 text-2xl font-black">
                کتاب شما
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

        // 🖼️ Image preview
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
