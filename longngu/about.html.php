<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - Nhà Thuốc medvn</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        .about-header {
            background: linear-gradient(135deg, #e0f7fa 0%, #e8f5e9 100%);
            padding: 60px 20px;
            border-radius: 15px;
            margin-bottom: 40px;
        }
        .vision-mission-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            height: 100%;
            border-top: 4px solid var(--primary-color);
        }
        .license-box {
            background: #f8f9fa;
            border-left: 4px solid #0984e3; /* secondary-color */
            padding: 20px;
            border-radius: 8px;
        }
        .team-card {
            transition: transform 0.3s;
        }
        .team-card:hover {
            transform: translateY(-5px);
        }
        .team-avatar {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin: 20px auto;
            border: 4px solid var(--primary-color);
            padding: 3px;
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>
    <?php include 'contact.php'; ?>

    <div class="container mt-4">
        
        <div class="about-header text-center shadow-sm">
            <h1 class="fw-bold text-success mb-3"><i class="fa-solid fa-leaf"></i> Nhà Thuốc medvn</h1>
            <p class="text-muted fs-5">Tận tâm chăm sóc sức khỏe gia đình bạn bằng chất lượng và sự minh bạch.</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="vision-mission-box">
                    <h4 class="fw-bold text-primary mb-3"><i class="fa-solid fa-eye me-2"></i>Tầm nhìn</h4>
                    <p class="text-muted">Trở thành nền tảng bán lẻ điện tử dược phẩm uy tín, tiên phong ứng dụng công nghệ để rút ngắn khoảng cách y tế. Chúng tôi nỗ lực mang đến giải pháp chăm sóc sức khỏe toàn diện, nhanh chóng và an toàn cho người Việt.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission-box">
                    <h4 class="fw-bold text-success mb-3"><i class="fa-solid fa-bullseye me-2"></i>Sứ mệnh</h4>
                    <p class="text-muted">Cung cấp 100% thuốc, thực phẩm chức năng và vật tư y tế chính hãng với giá tốt nhất. Cam kết tư vấn chuẩn chuyên môn, tận tình bởi đội ngũ y dược sĩ, đồng hành cùng sức khỏe cộng đồng 24/7.</p>
                </div>
            </div>
        </div>

        <div class="row mb-5 align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1586942425650-81ebfaab39b6?auto=format&fit=crop&q=80&w=800" alt="Nhà thuốc medvn" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-lg-6">
                <h3 class="fw-bold mb-4">Thông tin Doanh nghiệp</h3>
                <ul class="list-unstyled text-muted lh-lg mb-4">
                    <li><i class="fa-solid fa-building me-2 text-success"></i> <strong>Đơn vị chủ quản:</strong> Công ty Cổ phần Dược phẩm medvn</li>
                    <li><i class="fa-solid fa-location-dot me-2 text-danger"></i> <strong>Trụ sở chính:</strong> 123 Đường Cầu Giấy, Quận Cầu Giấy, Hà Nội</li>
                    <li><i class="fa-solid fa-phone me-2 text-primary"></i> <strong>Tổng đài hỗ trợ:</strong> 098.313.9310</li>
                    <li><i class="fa-solid fa-envelope me-2 text-warning"></i> <strong>Email liên hệ:</strong> info@medvn.vn</li>
                </ul>
                
                <div class="license-box">
                    <h5 class="fw-bold mb-3">Giấy phép hoạt động</h5>
                    <p class="mb-2 small text-muted"><i class="fa-solid fa-certificate me-2 text-primary"></i><strong>ĐKKD số:</strong> 0123456789 do Sở KH&ĐT TP. Hà Nội cấp ngày 01/01/2024</p>
                    <p class="mb-2 small text-muted"><i class="fa-solid fa-file-medical me-2 text-primary"></i><strong>GCN đủ điều kiện kinh doanh dược số:</strong> 123/ĐKKDD-HNO</p>
                    <p class="mb-0 small text-muted"><i class="fa-solid fa-user-doctor me-2 text-primary"></i><strong>Dược sĩ phụ trách chuyên môn:</strong> DS. Nguyễn Văn A (CCHN số: 456/CCHN-D-SYT)</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-5 mt-5">
            <h3 class="fw-bold mb-2">Đội ngũ Chuyên môn</h3>
            <p class="text-muted">Những chuyên gia luôn sẵn sàng lắng nghe và đưa ra lời khuyên y tế tốt nhất cho bạn.</p>
        </div>
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="card team-card shadow-sm border-0 text-center h-100 pb-3">
                    <img src="https://i.pravatar.cc/300?img=32" alt="Bác sĩ Cố vấn" class="team-avatar">
                    <div class="card-body p-0 px-3">
                        <h5 class="fw-bold mb-1">BS. CKII Trần Văn B</h5>
                        <p class="text-primary small fw-bold mb-2">Cố vấn Y khoa</p>
                        <p class="text-muted small">Nguyên trưởng khoa Nội Bệnh viện Đa khoa Trung ương. Gần 20 năm kinh nghiệm khám chữa bệnh, cố vấn phác đồ điều trị.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card team-card shadow-sm border-0 text-center h-100 pb-3">
                    <img src="https://i.pravatar.cc/300?img=68" alt="Dược sĩ Trưởng" class="team-avatar">
                    <div class="card-body p-0 px-3">
                        <h5 class="fw-bold mb-1">DS. Nguyễn Văn A</h5>
                        <p class="text-primary small fw-bold mb-2">Dược sĩ phụ trách chuyên môn</p>
                        <p class="text-muted small">Tốt nghiệp loại Giỏi Đại học Dược Hà Nội. Chịu trách nhiệm kiểm soát 100% chất lượng nguồn thuốc nhập vào tại medvn.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card team-card shadow-sm border-0 text-center h-100 pb-3">
                    <img src="https://i.pravatar.cc/300?img=47" alt="Dược sĩ Tư vấn" class="team-avatar">
                    <div class="card-body p-0 px-3">
                        <h5 class="fw-bold mb-1">DS. Lê Thị C</h5>
                        <p class="text-primary small fw-bold mb-2">Dược sĩ Tư vấn Trực tuyến</p>
                        <p class="text-muted small">Tận tâm, chu đáo, giải đáp mọi thắc mắc của khách hàng về công dụng, liều dùng và tương tác thuốc 24/7 qua các kênh Online.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Nhà Thuốc medvn. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>