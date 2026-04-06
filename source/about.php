<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>About Bella UMU Market</title>
    <style>
        .about-image-centered {
            width: 100%;
            max-width: 900px;
            height: 450px;
            object-fit: cover;
            border-radius: var(--card-radius);
            box-shadow: var(--card-shadow);
            margin: 30px auto;
            display: block;
        }
        .about-hero {
            position: relative;
            overflow: hidden;
            border-radius: var(--card-radius);
            margin: 20px 5%;
            box-shadow: var(--card-shadow);
            text-align: center;
            background: var(--primary);
            color: white;
            padding: 60px 20px;
        }
        .about-hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        .about-hero-overlay h1 {
            font-size: 48px;
            font-weight: 800;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
        }
        .content-section {
            padding: 60px 10%;
            background: white;
            margin-bottom: 20px;
        }
        .content-section h2 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .feature-card {
            background: var(--bg);
            padding: 30px;
            border-radius: var(--card-radius);
            text-align: center;
            transition: transform 0.3s ease;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-card i {
            font-size: 40px;
            color: var(--accent);
            margin-bottom: 20px;
        }
        .feature-card h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .how-it-works-step {
            text-align: center;
            padding: 20px;
        }
        .step-number {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
    <?php include "sidebar.php" ?>

    <!-- Centered Hero Image -->
    <div class="container">
        <img src="../img/about_hero.png" alt="Bella UMU Market Community" class="about-image-centered">
    </div>

    <!-- Hero Content -->
    <div class="about-hero">
        <div class="container">
            <h1 class="page-title">Our Mission</h1>
            <p style="font-size: 20px;">Empowering the UMU community through sustainable commerce.</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title" style="margin-bottom: 30px; text-align: center;">What is Bella UMU Market?</h2>
                    <p style="font-size: 18px; line-height: 1.8; color: #555; text-align: center; max-width: 800px; margin: 0 auto 40px;">
                        Bella UMU Market is Nkozi's premier student-to-student marketplace, designed specifically for the Uganda Martyrs University community. We recognized the need for a safe, reliable, and affordable way for students to exchange goods within the campus environment—whether it's electronics for study, furniture for hostels, or textbooks for the next semester.
                    </p>
                </div>
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fa fa-university"></i>
                        <h3>Campus-Only</h3>
                        <p>Safe and local trading limited to your university community.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fa fa-handshake-o"></i>
                        <h3>Trust Based</h3>
                        <p>Join a marketplace where everyone is a fellow student or faculty member.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="fa fa-leaf"></i>
                        <h3>Sustainable</h3>
                        <p>Reduce waste and save money by giving items a second life on campus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How it Works -->
    <div class="content-section" style="background-color: var(--bg);">
        <div class="container">
            <h2 class="page-title" style="margin-bottom: 30px; text-align: center;">How It Works</h2>
            <div class="row">
                <div class="col-md-4 how-it-works-step">
                    <div class="step-number">1</div>
                    <h3>List Your Item</h3>
                    <p>Snap a photo, set your student-friendly price, and publish in seconds.</p>
                </div>
                <div class="col-md-4 how-it-works-step">
                    <div class="step-number">2</div>
                    <h3>Meet on Campus</h3>
                    <p>Coordinate a safe meeting spot at the library, canteen, or halls of residence.</p>
                </div>
                <div class="col-md-4 how-it-works-step">
                    <div class="step-number">3</div>
                    <h3>Secure the Deal</h3>
                    <p>Hand over the item, get paid, and enjoy your new campus find!</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Redundant Red Section Removed and replaced with Premium Polish -->

    <?php include "footer.php" ?>

</body>
</html>