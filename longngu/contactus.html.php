<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Thiết bị y tế MedVN</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        .contact-header {
            background: linear-gradient(135deg, #e0f7fa 0%, #e8f5e9 100%);
            padding: 60px 20px;
            border-radius: 15px;
            margin-bottom: 40px;
            text-align: center;
        }
        .info-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
            transition: transform 0.3s;
            border-left: 4px solid var(--primary-color, #00b894);
        }
        .info-box:hover {
            transform: translateY(-5px);
        }
        .info-icon {
            font-size: 2rem;
            color: var(--primary-color, #00b894);
            margin-bottom: 15px;
        }
        .form-control:focus {
            border-color: var(--primary-color, #00b894);
            box-shadow: 0 0 0 0.2rem rgba(0, 184, 148, 0.25);
        }
        .btn-submit {
            background-color: var(--primary-color, #00b894);
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            border: none;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background-color: #00a884;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 184, 148, 0.3);
        }
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>
    <?php include 'contact.php'; ?>

    <div class="container mt-4">
        
        <div class="contact-header shadow-sm">
            <h1 class="fw-bold text-success mb-3"><i class="fa-solid fa-headset"></i> Liên hệ với MedVN</h1>
            <p class="text-muted fs-5">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn 24/7. Đừng ngần ngại để lại tin nhắn!</p>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4">Thông tin của chúng tôi</h3>
                
                <div class="info-box">
                    <i class="fa-solid fa-location-dot info-icon"></i>
                    <h5 class="fw-bold">Địa chỉ cửa hàng</h5>
                    <p class="text-muted mb-0">123 Đường Cầu Giấy, Quận Cầu Giấy, TP. Hà Nội</p>
                </div>

                <div class="info-box">
                    <i class="fa-solid fa-phone-volume info-icon"></i>
                    <h5 class="fw-bold">Điện thoại hỗ trợ</h5>
                    <p class="text-muted mb-1">Hotline chung: <strong>098.313.9310</strong></p>
                    <p class="text-muted mb-0">Tư vấn kỹ thuật thiết bị: <strong>1900.xxxx</strong></p>
                </div>

                <div class="info-box">
                    <i class="fa-solid fa-envelope-open-text info-icon"></i>
                    <h5 class="fw-bold">Hộp thư điện tử</h5>
                    <p class="text-muted mb-0">Chăm sóc khách hàng: cskh@medvn.vn<br>Hợp tác kinh doanh: info@medvn.vn</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                    <h3 class="fw-bold mb-4">Gửi tin nhắn cho MedVN</h3>
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="tel" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Tiêu đề</label>
                                <input type="text" name="subject" class="form-control" placeholder="Bạn cần hỗ trợ về vấn đề gì?">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Nội dung tin nhắn <span class="text-danger">*</span></label>
                                <textarea name="message" class="form-control" rows="5" placeholder="Mô tả chi tiết yêu cầu của bạn..." required></textarea>
                            </div>
                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-submit w-100"><i class="fa-regular fa-paper-plane me-2"></i> Gửi Tin Nhắn Ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center">Bản đồ chỉ đường</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.926558667615!2d105.7981143!3d21.0356269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab41144fbb7f%3A0xc39f9bbf4514ba!2zQ8O0bmcgVmnDqm4gQ-G6p3UgR2nhuqV5!5e0!3m2!1svi!2s!4v1700000000000!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Thiết bị y tế MedVN. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>