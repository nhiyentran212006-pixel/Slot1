<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* ==========================================
       NAVBAR VIP - THANH TÌM KIẾM & MENU VIÊN THUỐC
       ========================================== */
    .navbar-top { background: #ffffff; padding: 15px 0; border-bottom: none; box-shadow: 0 2px 10px rgba(0,0,0,0.03); position: relative; z-index: 1001; }
    
    .search-bar-custom { display: flex; background: #fff; border-radius: 50px; height: 48px; width: 100%; max-width: 650px; margin: 0 auto; overflow: hidden; border: 2px solid #00b894; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0, 184, 148, 0.1); }
    /* Tăng font chữ input tìm kiếm lên 16px */
    .search-bar-custom input { border: none; outline: none; background: transparent; padding: 0 20px; flex-grow: 1; font-size: 16px; color: #1e293b; }
    /* Tăng icon tìm kiếm lên 18px */
    .search-bar-custom button { background: #00b894; border: none; color: white; width: 70px; cursor: pointer; font-size: 18px; transition: 0.2s; }
    .search-bar-custom button:hover { background: #00947a; }
    
    .navbar-bottom { background: #ffffff; border-top: 1px solid #f1f5f9; box-shadow: 0 4px 12px rgba(0,0,0,0.04); position: sticky; top: 0; z-index: 1000; }
    
    .category-nav { display: flex; gap: 12px; padding: 12px 0; }
    /* Tăng font chữ menu ngang lên 15px */
    .category-nav a { color: #475569; font-weight: 600; font-size: 15px; padding: 10px 22px; border-radius: 50px; display: inline-block; text-decoration: none; background-color: #f1f5f9; transition: 0.3s; cursor: pointer; border: 1px solid transparent; white-space: nowrap; }
    .category-nav a:hover { color: #00b894; background-color: #e6fdf5; border-color: #a7f3d0; }
    .category-nav a.active-nav { background-color: #00b894; color: #ffffff; box-shadow: 0 4px 10px rgba(0,184,148,0.25); border-color: #00b894; }
    
    .btn-hamburger { background: transparent; border: none; padding: 4px 8px; border-radius: 6px; cursor: pointer; transition: 0.2s; }
    .btn-hamburger:hover { background: #f1f5f9; }
    
    /* Tăng font chữ bộ lọc ngang lên 14px */
    .filter-select { padding: 8px 30px 8px 16px !important; font-size: 14px !important; font-weight: 500 !important; color: #334155 !important; border: 1px solid #cbd5e1 !important; border-radius: 8px !important; cursor: pointer; background-color: #fff !important; }
    .filter-select:focus { border-color: #00b894 !important; box-shadow: 0 0 0 3px rgba(0, 184, 148, 0.15) !important; }
    
    /* Tăng font chữ menu 3 gạch lên 16px */
    .offcanvas-menu-item { cursor: pointer; transition: all 0.2s ease; color: #334155; font-weight: 500; font-size: 16px;}
    .offcanvas-menu-item:hover { background-color: #f8fafc; color: #00b894 !important; padding-left: 20px !important; border-left: 3px solid #00b894 !important; }
</style>

<div class="navbar-top">
    <div class="container d-flex align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <button class="btn-hamburger" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuSidebar">
                <i class="fa-solid fa-bars text-success" style="font-size: 26px;"></i>
            </button>
            <a class="navbar-brand fw-bolder text-success m-0" href="index.php" style="font-size: 34px; letter-spacing: -0.5px;">
                <i class="fa-solid fa-leaf"></i> HapVN
            </a>
        </div>
        
        <div class="flex-grow-1 mx-lg-5">
            <div class="search-bar-custom">
                <input type="text" id="searchInput" onkeyup="applyFilters()" placeholder="Tìm kiếm thuốc, bệnh lý, thực phẩm chức năng...">
                <button type="button" onclick="applyFilters()">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>

        <div class="d-flex align-items-center gap-4 d-none d-lg-flex">
            <div class="position-relative cursor-pointer" style="transition: 0.2s;">
                <i class="fa-solid fa-cart-shopping text-secondary" style="font-size: 26px;"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-2 border-white shadow-sm">0</span>
            </div>
            <i class="fa-solid fa-circle-user text-secondary cursor-pointer" style="font-size: 30px;"></i>
        </div>
    </div>
</div>

<div class="navbar-bottom sticky-top">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <div class="category-nav overflow-auto">
            <a onclick="handleGlobalNav('all')" class="active-nav nav-item-all">Tất cả</a>
            <a onclick="handleGlobalNav('rx')" class="nav-item-rx">Thuốc kê đơn</a>
            <a onclick="handleGlobalNav('otc')" class="nav-item-otc">Thuốc không kê đơn</a>
            <a onclick="handleGlobalNav('Thực phẩm chức năng')" class="nav-item-tpcn">TPCN</a>
            <a onclick="handleGlobalNav('Dụng cụ y tế')" class="nav-item-yte">Dụng cụ y tế</a>
        </div>
        
        <div class="d-flex gap-3 py-2 align-items-center" id="globalFiltersContainer">
            <select class="form-select filter-select" id="mainPriceFilter" onchange="applyFilters()">
                <option value="all">Mọi mức giá</option>
                <option value="under100">Dưới 100.000đ</option>
                <option value="100-500">100.000đ - 500.000đ</option>
                <option value="over500">Trên 500.000đ</option>
            </select>
            <select class="form-select filter-select" id="mainBrandFilter" onchange="applyFilters()">
                <option value="all">Mọi thương hiệu</option>
                <option value="omron">Omron</option>
                <option value="traphaco">Traphaco</option>
                <option value="dhg">Dược Hậu Giang</option>
            </select>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="menuSidebar" style="border-right: none; box-shadow: 4px 0 24px rgba(0,0,0,0.06);">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold text-success"><i class="fa-solid fa-list me-2"></i>DANH MỤC</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-0 mt-2">
        <div class="list-group list-group-flush">
            <a onclick="handleGlobalNav('rx')" class="list-group-item list-group-item-action p-3 border-0 offcanvas-menu-item" data-bs-dismiss="offcanvas">
                <i class="fa-solid fa-pills text-success me-3"></i> Thuốc kê đơn (RX)
            </a>
            <a onclick="handleGlobalNav('otc')" class="list-group-item list-group-item-action p-3 border-0 offcanvas-menu-item" data-bs-dismiss="offcanvas">
                <i class="fa-solid fa-capsules text-success me-3"></i> Thuốc không kê đơn
            </a>
            <a onclick="handleGlobalNav('Thực phẩm chức năng')" class="list-group-item list-group-item-action p-3 border-0 offcanvas-menu-item" data-bs-dismiss="offcanvas">
                <i class="fa-solid fa-leaf text-success me-3"></i> Thực phẩm chức năng
            </a>
            <a onclick="handleGlobalNav('Dụng cụ y tế')" class="list-group-item list-group-item-action p-3 border-0 offcanvas-menu-item" data-bs-dismiss="offcanvas">
                <i class="fa-solid fa-stethoscope text-success me-3"></i> Dụng cụ y tế
            </a>
        </div>
    </div>
</div>

<script>
function handleGlobalNav(cat) {
    document.querySelectorAll('.category-nav a').forEach(a => a.classList.remove('active-nav'));
    let targetClass = '';
    if(cat === 'all') targetClass = '.nav-item-all';
    else if(cat === 'rx') targetClass = '.nav-item-rx';
    else if(cat === 'otc') targetClass = '.nav-item-otc';
    else if(cat === 'Thực phẩm chức năng') targetClass = '.nav-item-tpcn';
    else if(cat === 'Dụng cụ y tế') targetClass = '.nav-item-yte';
    
    const targetEl = document.querySelector(targetClass);
    if(targetEl) {
        targetEl.classList.add('active-nav');
    }

    if(typeof switchCategoryPage === 'function') {
        switchCategoryPage(cat);
    }
}
</script>