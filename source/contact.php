<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Bella UMU Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        .contact-hero {
            padding: 60px 0 20px;
            text-align: center;
        }
        .contact-hero h1 {
            font-size: 42px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 10px;
        }
        .contact-hero p {
            color: #666;
            font-size: 18px;
        }
        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            margin-top: 40px;
            margin-bottom: 80px;
        }
        @media (max-width: 991px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
        }
        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .contact-info-item i {
            font-size: 24px;
            color: var(--primary);
            width: 50px;
            height: 50px;
            background: rgba(125, 170, 203, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
    </style>
</head>
<body style="background-color: var(--bg);">

<?php include "header.php" ?>
<?php include "sidebar.php" ?>

<div class="section-wrapper">
    <div class="contact-hero">
        <h1 class="logo-text" style="font-size: 48px;">Get in <span style="color: var(--accent);">Touch</span></h1>
        <p>We'd love to hear from you. Friendly and helpful support for the UMU community.</p>
    </div>

    <div class="contact-container">
        <!-- Left: Info Card -->
        <div class="bella-card" style="padding: 40px;">
            <h2 class="page-title" style="margin-bottom: 20px;">Contact Information</h2>
            <p style="margin-bottom: 40px; color: #666; line-height: 1.6;">
                Have questions or need assistance? Our support team is here to help you every step of the way.
            </p>
            
            <div class="contact-info-item comment-inner-card">
                <i class="fa fa-map-marker"></i>
                <div>
                    <h4 style="margin: 0; font-weight: 700; color: var(--text);">Our Location</h4>
                    <p style="margin: 0; color: #666;">UMU Main Campus, Nkozi, Mpigi District</p>
                </div>
            </div>

            <div class="contact-info-item comment-inner-card">
                <i class="fa fa-phone"></i>
                <div>
                    <h4 style="margin: 0; font-weight: 700; color: var(--text);">Phone Number</h4>
                    <p style="margin: 0; color: #666;">+256 700 000 000</p>
                </div>
            </div>

            <div class="contact-info-item comment-inner-card">
                <i class="fa fa-envelope"></i>
                <div>
                    <h4 style="margin: 0; font-weight: 700; color: var(--text);">Email Address</h4>
                    <p style="margin: 0; color: #666;">support@bellamarket.ug</p>
                </div>
            </div>
        </div>

        <!-- Right: Form -->
        <div class="bella-card" style="padding: 40px;">
            <h2 class="page-title" style="margin-bottom: 30px;">Send us a Message</h2>
            <form action="../login-system/mail.php" method="post">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label style="font-weight: 700; font-size: 13px; text-transform: uppercase; color: #888;">Full Name</label>
                            <input name="fullname" type="text" class="form-control" style="height: 50px; border-radius: 12px; border: 1px solid #eee; background: #fafafa; padding: 0 20px;" placeholder="John Doe" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label style="font-weight: 700; font-size: 13px; text-transform: uppercase; color: #888;">Email Address</label>
                            <input name="email" type="email" class="form-control" style="height: 50px; border-radius: 12px; border: 1px solid #eee; background: #fafafa; padding: 0 20px;" placeholder="john@example.com" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label style="font-weight: 700; font-size: 13px; text-transform: uppercase; color: #888;">Subject</label>
                    <input name="subject" type="text" class="form-control" style="height: 50px; border-radius: 12px; border: 1px solid #eee; background: #fafafa; padding: 0 20px;" placeholder="How can we help?" required>
                </div>

                <div class="form-group mb-4">
                    <label style="font-weight: 700; font-size: 13px; text-transform: uppercase; color: #888;">Message</label>
                    <textarea name="message" rows="5" class="form-control" style="border-radius: 12px; border: 1px solid #eee; background: #fafafa; padding: 20px;" placeholder="Your message here..." required></textarea>
                </div>

                <button type="submit" class="btn btn-accent" style="width: 100%; height: 55px; border-radius: 12px; font-weight: 800; font-size: 16px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 20px rgba(206, 38, 38, 0.2);">Send Message</button>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>
