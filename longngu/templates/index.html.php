<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>HapVN - Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; font-family: 'Inter', -apple-system, sans-serif; color: #0f172a; }

        /* BỘ LỌC NÂNG CAO */
        .filter-sidebar { background: #fff; border-radius: 8px; border: 1px solid #e2e8f0; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
        .filter-header-main { background: #fff; padding: 18px 20px; font-weight: 700; font-size: 18px; color: #0f172a; border-bottom: 1px solid #e2e8f0; }
        .filter-block { padding: 18px 20px; border-bottom: 1px solid #f1f5f9; }
        .filter-block:last-child { border-bottom: none; }
        .filter-title { font-weight: 700; color: #334155; font-size: 15px; margin-bottom: 14px; text-transform: uppercase; letter-spacing: 0.5px;}
        
        /* ==========================================================
           CĂN CHỈNH NÚT TRÒN VÀ CHỮ (FIX HOÀN TOÀN LỆCH DÒNG)
           ========================================================== */
        .form-check { 
            display: flex !important; 
            align-items: flex-start !important; /* Căn theo mép trên cùng */
            margin-bottom: 14px !important; 
            padding-left: 4px !important; /* Chừa lề trái để không bị cắt xén */
        }
        .form-check-input { 
            margin: 2px 12px 0 0 !important; /* Đẩy nút tròn xuống đúng 2px để tâm nút khớp tâm chữ */
            width: 18px !important; 
            height: 18px !important; 
            flex-shrink: 0 !important; 
            cursor: pointer !important; 
            border: 2px solid #cbd5e1 !important; 
            float: none !important; 
            position: static !important;
            transform: none !important; /* Xóa các hiệu ứng xô lệch cũ */
        }
        .form-check-input[type="radio"] { border-radius: 50% !important; }
        .form-check-input:checked { background-color: #1d4ed8 !important; border-color: #1d4ed8 !important; } 
        .form-check-label { 
            font-size: 15px !important; 
            color: #475569 !important; 
            cursor: pointer !important; 
            margin: 0 !important; 
            line-height: 1.5 !important; 
            display: block !important; 
            padding-top: 0 !important;
            transform: none !important;
        }
        
        .filter-scroll { max-height: 200px; overflow-y: auto; padding-right: 5px; }
        .filter-scroll::-webkit-scrollbar { width: 4px; }
        .filter-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        
        /* THẺ SẢN PHẨM */
        .product-card { background: #fff; border-radius: 8px; border: 1px solid #e2e8f0; transition: all 0.2s ease; padding: 18px; height: 100%; display: flex; flex-direction: column; }
        .product-card:hover { transform: translateY(-2px); box-shadow: 0 10px 20px rgba(0,0,0,0.06); border-color: #cbd5e1; }
        .product-img { height: 170px; object-fit: contain; margin-bottom: 18px; }
        
        .product-category { font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        .product-title { font-size: 16px; font-weight: 600; color: #0f172a; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; flex-grow: 1; margin-bottom: 14px; }
        .product-price { font-size: 18px; font-weight: 700; color: #1d4ed8; margin-bottom: 18px; }
        
        .btn-buy { background-color: #1d4ed8; color: #fff; border-radius: 50px; font-weight: 600; border: none; padding: 10px 16px; width: 100%; transition: 0.2s; font-size: 15px; }
        .btn-buy:hover { background-color: #1e3a8a; color: #fff; }

        /* NÚT SẮP XẾP */
        .sort-dropdown .btn { background: #fff; border: 1px solid #cbd5e1; color: #334155; font-size: 14px; font-weight: 500; border-radius: 6px; padding: 10px 18px; transition: 0.2s; }
        .sort-dropdown .btn:hover, .sort-dropdown .btn:focus { background: #f8fafc; border-color: #94a3b8; }
        .sort-dropdown .dropdown-item { transition: 0.2s; cursor: pointer; padding: 10px 18px; font-size: 15px; color: #334155; }
        .sort-dropdown .dropdown-item:hover { background-color: #f1f5f9; color: #0f172a; }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>
<?php include 'products.php'; ?>

<div class="container mt-4 mb-5">
    <div class="row">
        
        <div class="col-lg-3" id="sidebarFilter" style="display:none;">
            <div class="filter-sidebar position-sticky" style="top: 90px;">
                <div class="filter-header-main">
                    <i class="fa-solid fa-filter me-2 text-success"></i> BỘ LỌC NÂNG CAO
                </div>
                
                <div class="filter-block" id="block-doituong">
                    <div class="filter-title">Đối tượng sử dụng</div>
                    <div class="filter-scroll">
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="trẻ em" id="dt1"><label class="form-check-label" for="dt1">Trẻ em</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="người lớn" id="dt2"><label class="form-check-label" for="dt2">Người lớn</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="phụ nữ có thai" id="dt3"><label class="form-check-label" for="dt3">Phụ nữ có thai</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="người cao tuổi" id="dt4"><label class="form-check-label" for="dt4">Người cao tuổi</label></div>
                    </div>
                </div>

                <div class="filter-block" id="block-gia">
                    <div class="filter-title">Giá bán</div>
                    <div class="filter-scroll">
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="all" id="pAll" onchange="applyFilters()" checked><label class="form-check-label" for="pAll">Tất cả mức giá</label></div>
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="0-100" id="p1" onchange="applyFilters()"><label class="form-check-label" for="p1">Dưới 100.000đ</label></div>
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="100-300" id="p2" onchange="applyFilters()"><label class="form-check-label" for="p2">100.000đ - 300.000đ</label></div>
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="300-500" id="p3" onchange="applyFilters()"><label class="form-check-label" for="p3">300.000đ - 500.000đ</label></div>
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="500-1000" id="p4" onchange="applyFilters()"><label class="form-check-label" for="p4">500.000đ - 1 triệu</label></div>
                        <div class="form-check"><input type="radio" class="form-check-input" name="advPrice" value="over1000" id="p5" onchange="applyFilters()"><label class="form-check-label" for="p5">Trên 1 triệu</label></div>
                    </div>
                </div>

                <div class="filter-block" id="block-muivi">
                    <div class="filter-title">Mùi vị / Mùi hương</div>
                    <div class="filter-scroll">
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="vani" id="m1"><label class="form-check-label" for="m1">Vani</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="cam" id="m2"><label class="form-check-label" for="m2">Vị Cam</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="dâu" id="m3"><label class="form-check-label" for="m3">Vị Dâu tây</label></div>
                    </div>
                </div>

                <div class="filter-block" id="block-chidinh">
                    <div class="filter-title">Chỉ định / Bệnh lý</div>
                    <div class="filter-scroll">
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="kháng sinh" id="c1"><label class="form-check-label" for="c1">Kháng sinh, kháng viêm</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="tim mạch" id="c2"><label class="form-check-label" for="c2">Tim mạch & Huyết áp</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="dạ dày" id="c3"><label class="form-check-label" for="c3">Tiêu hóa & Dạ dày</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="giảm đau" id="c4"><label class="form-check-label" for="c4">Giảm đau, hạ sốt</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="xương khớp" id="c5"><label class="form-check-label" for="c5">Cơ xương khớp</label></div>
                    </div>
                </div>

                <div class="filter-block" id="block-thietbi">
                    <div class="filter-title">Loại thiết bị</div>
                    <div class="filter-scroll">
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="huyết áp" id="t1"><label class="form-check-label" for="t1">Máy đo huyết áp</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="đường huyết" id="t2"><label class="form-check-label" for="t2">Máy đo đường huyết</label></div>
                        <div class="form-check"><input type="checkbox" class="form-check-input adv-check" value="khẩu trang" id="t3"><label class="form-check-label" for="t3">Khẩu trang, găng tay</label></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12" id="mainGrid">
            
            <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-light">
                <h4 class="fw-bolder m-0" id="catTitle" style="color: #0f172a; font-size: 24px;">Tất cả sản phẩm</h4>
                
                <div class="dropdown sort-dropdown" id="sortDropdownContainer">
                    <button class="btn d-flex align-items-center" type="button" data-bs-toggle="dropdown" id="sortBtnText">
                        <i class="fa-solid fa-bolt text-warning me-2"></i> Sắp xếp: Mới nhất
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-1 py-1" style="border-radius: 8px; min-width: 200px; z-index: 1050;">
                        <li><a class="dropdown-item d-flex align-items-center" onclick="applySort('newest', 'Mới nhất', 'fa-bolt', 'text-warning')"><i class="fa-solid fa-bolt text-warning me-3" style="width:16px; text-align:center;"></i> Mới nhất</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" onclick="applySort('best', 'Bán chạy nhất', 'fa-fire', 'text-danger')"><i class="fa-solid fa-fire text-danger me-3" style="width:16px; text-align:center;"></i> Bán chạy nhất</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" onclick="applySort('rating', 'Đánh giá cao nhất', 'fa-star', 'text-warning')"><i class="fa-solid fa-star text-warning me-3" style="width:16px; text-align:center;"></i> Đánh giá cao nhất</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" onclick="applySort('price-asc', 'Giá thấp đến cao', 'fa-arrow-trend-up', 'text-success')"><i class="fa-solid fa-arrow-trend-up text-success me-3" style="width:16px; text-align:center;"></i> Giá thấp đến cao</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" onclick="applySort('price-desc', 'Giá cao đến thấp', 'fa-arrow-trend-down', 'text-danger')"><i class="fa-solid fa-arrow-trend-down text-danger me-3" style="width:16px; text-align:center;"></i> Giá cao đến thấp</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row" id="productList">
                <?php if(!empty($products)){ foreach ($products as $product) { ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 product-item" 
                         data-price="<?php echo $product['price']; ?>" 
                         data-category="<?php echo $product['category_name']; ?>"
                         data-prescription="<?php echo $product['is_prescription']; ?>">
                        <div class="product-card">
                            <a href="product_detail.php?id=<?php echo $product['product_id']; ?>" class="text-decoration-none d-flex flex-column">
                                <img src="uploads/<?php echo $product['image_url']; ?>" class="product-img w-100" onerror="this.src='https://placehold.co/200x200/f8fafc/94a3b8?text=HapVN'">
                                <div class="product-category"><?php echo $product['category_name']; ?></div>
                                <div class="product-title"><?php echo $product['name']; ?></div>
                                <div class="product-price"><?php echo number_format($product['price'], 0, '.', ','); ?>đ</div>
                            </a>
                            <form action="add_to_cart.php" method="POST" class="mt-auto">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <button type="submit" class="btn btn-buy mt-auto">
                                    <i class="fa-solid fa-cart-plus me-2"></i>Thêm vào giỏ
                                </button>
                            </form>
                        </div>
                    </div>
                <?php }} ?>
            </div>
            
            <div id="no-products" class="text-center mt-5" style="display: none;">
                <div class="p-5 rounded-4 d-inline-block">
                    <img src="https://placehold.co/80x80/e2e8f0/94a3b8?text=!" class="mb-3" style="border-radius: 50%;">
                    <h6 class="text-muted fw-bold">Không tìm thấy sản phẩm</h6>
                    <p class="text-muted small mb-0">Vui lòng thử lại với bộ lọc khác.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    let activeCat = 'all';

    function switchCategoryPage(cat) {
        activeCat = cat;
        const sidebar = document.getElementById('sidebarFilter');
        const grid = document.getElementById('mainGrid');
        const title = document.getElementById('catTitle');
        const globalFilters = document.getElementById('globalFiltersContainer');
        const sortDropdown = document.getElementById('sortDropdownContainer');

        if(cat === 'all') {
            sidebar.style.display = 'none';
            grid.className = 'col-lg-12';
            title.innerText = 'Tất cả sản phẩm';
            
            if(globalFilters) {
                globalFilters.classList.remove('d-none');
                globalFilters.classList.add('d-flex');
            }
            if(sortDropdown) sortDropdown.classList.remove('d-none');
            
        } else {
            sidebar.style.display = 'block';
            grid.className = 'col-lg-9';
            
            if(globalFilters) {
                globalFilters.classList.remove('d-flex');
                globalFilters.classList.add('d-none');
            }
            if(sortDropdown) sortDropdown.classList.add('d-none');
            
            document.getElementById('block-doituong').style.display = 'none';
            document.getElementById('block-muivi').style.display = 'none';
            document.getElementById('block-chidinh').style.display = 'none';
            document.getElementById('block-thietbi').style.display = 'none';

            if(cat === 'rx') {
                title.innerText = 'Thuốc kê đơn (RX)';
                document.getElementById('block-chidinh').style.display = 'block';
            } else if(cat === 'otc') {
                title.innerText = 'Thuốc không kê đơn';
                document.getElementById('block-chidinh').style.display = 'block';
                document.getElementById('block-muivi').style.display = 'block';
            } else if(cat === 'Thực phẩm chức năng') {
                title.innerText = 'Thực phẩm chức năng';
                document.getElementById('block-doituong').style.display = 'block';
                document.getElementById('block-muivi').style.display = 'block';
            } else if(cat === 'Dụng cụ y tế') {
                title.innerText = 'Thiết bị & Dụng cụ y tế';
                document.getElementById('block-thietbi').style.display = 'block';
            }
        }
        document.querySelectorAll('.adv-check').forEach(cb => cb.checked = false);
        const defaultPrice = document.getElementById('pAll');
        if(defaultPrice) defaultPrice.checked = true;
        
        applyFilters();
    }

    document.querySelectorAll('.adv-check').forEach(cb => {
        cb.addEventListener('change', applyFilters);
    });

    function applyFilters() {
        const keyword = document.getElementById('searchInput') ? document.getElementById('searchInput').value.toLowerCase() : '';
        const advPriceInput = document.querySelector('input[name="advPrice"]:checked');
        const advPrice = advPriceInput ? advPriceInput.value : 'all';
        const advChecks = Array.from(document.querySelectorAll('.adv-check:checked')).map(c => c.value);
        
        const mainPriceFilter = document.getElementById('mainPriceFilter');
        const mainBrandFilter = document.getElementById('mainBrandFilter');
        const priceTop = mainPriceFilter ? mainPriceFilter.value : 'all';
        const brandTop = mainBrandFilter ? mainBrandFilter.value.toLowerCase() : 'all';

        const items = document.getElementsByClassName('product-item');
        let count = 0;

        for (let item of items) {
            const p = parseFloat(item.dataset.price);
            const c = item.dataset.category || '';
            const rx = item.dataset.prescription || '';
            const titleEl = item.querySelector('.product-title');
            const name = titleEl ? titleEl.innerText.toLowerCase() : '';
            let show = true;

            if(activeCat !== 'all') {
                if(activeCat === 'rx' && rx !== '1') show = false;
                else if(activeCat === 'otc' && !(rx === '0' && c.toLowerCase().includes('thuốc'))) show = false;
                else if(activeCat !== 'rx' && activeCat !== 'otc' && c !== activeCat) show = false;
            }
            
            if(keyword && !name.includes(keyword)) show = false;
            
            if(activeCat === 'all') {
                if(brandTop !== 'all' && !name.includes(brandTop)) show = false;
                if(priceTop === 'under100' && p >= 100000) show = false;
                if(priceTop === '100-500' && (p < 100000 || p >= 500000)) show = false;
                if(priceTop === 'over500' && p < 500000) show = false;
            }

            if(advPrice === '0-100' && p >= 100000) show = false;
            if(advPrice === '100-300' && (p < 100000 || p >= 300000)) show = false;
            if(advPrice === '300-500' && (p < 300000 || p >= 500000)) show = false;
            if(advPrice === '500-1000' && (p < 500000 || p >= 1000000)) show = false;
            if(advPrice === 'over1000' && p < 1000000) show = false;
            
            if(advChecks.length > 0 && !advChecks.some(k => name.includes(k) || c.toLowerCase().includes(k))) show = false;

            item.style.display = show ? 'block' : 'none';
            if(show) count++;
        }
        const noProd = document.getElementById('no-products');
        if(noProd) noProd.style.display = (count === 0) ? 'block' : 'none';
    }

    function applySort(type, text, iconClass, iconColor) {
        const btn = document.getElementById('sortBtnText');
        if(btn) btn.innerHTML = `<i class="fa-solid ${iconClass} ${iconColor} me-2"></i> Sắp xếp: ${text}`;

        const container = document.getElementById('productList');
        if(!container) return;
        const products = Array.from(container.getElementsByClassName('product-item'));

        products.sort((a, b) => {
            const pA = parseFloat(a.dataset.price);
            const pB = parseFloat(b.dataset.price);
            
            if (type === 'price-asc') return pA - pB;
            if (type === 'price-desc') return pB - pA;
            if (type === 'newest') return 0; 
            
            if (type === 'best' || type === 'rating') return Math.random() - 0.5; 
            return 0;
        });

        container.innerHTML = '';
        products.forEach(p => container.appendChild(p));
    }
</script>
</body>
</html>